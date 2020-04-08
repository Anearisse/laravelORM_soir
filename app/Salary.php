<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Salary extends Model


{

    protected $primary_key = 'emp_no';
    
    protected $fillable = [
        'emp_no', 'salary',
    ];

    public function employee() 
     {
          return $this->belongsTo('App\Employee', 'emp_no');
     }

    }