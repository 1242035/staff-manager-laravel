<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentEmployeeTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('department_employee', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('department_id')->unsigned();
			$table->integer('employee_id')->unsigned();
			$table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
			$table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('department_employee');
	}
}
