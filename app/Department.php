<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
	use SoftDeletes;

	protected $fillable = ['name'];

	protected $dates = ['deleted_at'];

	public function employees() {
		return $this->belongsToMany('App\Employee');
	}

	public static function search($query) {
		if(empty($query)) return Collection::make();
		return Department::where('name','like','%'.$query.'%')
			->orderBy('name','asc')
			->take(5)
			->get(array('id', 'name'))
			->map(function($department) {
				$department->label = $department->name;
				$department->type = 'department';
				$department->url = route('departments.show', $department->id);
				return $department;
			});
	}
}
