<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Department::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validateData = $request->validate([
	      'dept_no' => 'required|regex:/^d[0-9]{3}$/|unique:departments',
        'dept_name' => 'required|string:255|unique:departments',
        ]);
        $department = new Department();
        $department->dept_no = $validateData->dept_no;
        $department->dept_name = $validateData->dept_name;
        $department->save();
        
        department::create($validate
        return $department;
        
        
       ]);
        
    ]);
        $employee = Employee::create($validateData);
        return $employee->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validateData = $request->validate([
	      'emp_no' => 'integer',
      	'first_name' => 'string|max:255',
    	  'last_name' => 'string|max:255',
      	'birth_date' => 'date',
	      'hire_date' => 'date|after:birth_date',
      	'gender' => 'string|max:1',
	]);
 
	$employee->update($validateData);
	return $employee;

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $e = $employee;
      	$employee->delete();
	      return $e->toJson();
    }
}
