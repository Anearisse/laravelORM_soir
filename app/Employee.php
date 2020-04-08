<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Employee extends Model
{

    protected $primaryKey = 'emp_no';
    public $timestamps = false;
    
    protected $fillable = [
        'birth_date', 'first_name', 'last_name', 'gender', 'hire_date',
    ];


    
    public function salary ()
    {
        return $this->belongsToMany('App\Salary', 'emp_no')->WithPivot('from_date', 'to_date');
    }

    public function title ()
    {
        return $this->belongsToMany('App\Title', 'emp_no', 'title')->WithPivot('from_date', 'to_date');
    }

    public function deptManager ()
    {
        return $this->hasMany('App\Department', 'emp_no', 'dept_no', 'deptManager');
    }

    public function deptEmp ()
    {
        return $this->hasMany('App\Department', 'emp_no', 'dept_no', 'deptEmp');
    }
    
}
