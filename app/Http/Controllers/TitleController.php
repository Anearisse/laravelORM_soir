<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;
use App\Employee;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function index(Employee $employee)
    {
        return $employee->titles;
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Employee $employee
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {   
         $title = $employee->titles->where('to_date', '>', now())
         ->update([('to_date'=>date_format(now(), 'Y-m-d')]);
         
         $new title = new Title();
         $new_title->emp_no = $mployee->emp_no;
         $new_title->title = $request->title;
         $new_title->from_date = date_format(now(), 'Y-m-d');
         $new_title->to_date = '9999-01-01');
         $new_title->save();
         return $new_title
    }

    /**
     * Display the specified resource.
     * @param \App\Title $title : numéro du titre de l'employé
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee, $employee, Title $title)
    {
        return $employee->titles()->order('to_date', 'desc')->skip($title - 1)->limit(1)->get();
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        $validateData = $request->validate([
	      'emp_no' => 'integer',
      	'first_name' => 'string|max:255',
    	  'last_name' => 'string|max:255',
      	'birth_date' => 'date',
	      'hire_date' => 'date|after:birth_date',
      	'gender' => 'string|max:1',
	]);
 
	$title->update($validateData);
	return $title;

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        $t = $title;
      	$title->delete();
	      return $t->toJson();
    }
}
