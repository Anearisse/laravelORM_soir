<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Department extends Model


{

     protected $primary_key = 'dept_no';

     protected $fillable = [
         'dept_no', 'dept_name',
     ];

     public function deptManager() 
     {
          return $this->belongsToMany('App\Employee', 'emp_no', 'dept_no', 'deptManager')->WithPivot('from_date', 'to_date');
     }

     public function deptEmp ()
     {
         return $this->belongsToMany('App\Employee', 'emp_no', 'dept_no', 'deptEmp')->WithPivot('from_date', 'to_date');
     }
 
} 
 