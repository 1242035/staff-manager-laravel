<?php

namespace App\Http\Controllers;

use \Request;

use \Response;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Department;

class ApiController extends Controller
{
	public function searchEmployees() {
		$query = Request::input('q');
		if(empty($query)) return Response::json(array(), 400);
		$data = Employee::search($query)->toArray();
		return Response::json($data);
	}

	public function searchDepartments() {
		$query = Request::input('q');
		if(empty($query)) return Response::json(array(), 400);
		$data = Department::search($query)->toArray();
		return Response::json($data);
	}

	public function searchAll() {
		$query = Request::input('q');
		if(empty($query)) return Response::json(array(), 400);
		$data = array_merge(
			Employee::search($query)->toArray(),
			Department::search($query)->toArray()
		);
		return Response::json($data);
	}
}
