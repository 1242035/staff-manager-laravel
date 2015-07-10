<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;

class Employee extends Model
{
	use SoftDeletes;

	protected $fillable = ['first_name', 'last_name'];

	protected $dates = ['deleted_at'];

	public function departments() {
		return $this->belongsToMany('App\Department');
	}

	public static function search($query) {
		if(empty($query)) return Collection::make();
		return Employee::where('first_name','like','%'.$query.'%')
			->orWhere('last_name','like','%'.$query.'%')
			->orderBy('first_name','asc')
			->orderBy('last_name','asc')
			->take(5)
			->get(array('id', 'first_name', 'last_name'))
			->map(function($employee) {
				$employee->label = $employee->first_name.' '.$employee->last_name;
				$employee->type = 'employee';
				$employee->url = route('employees.show', $employee->id);
				return $employee;
			});
	}

}
