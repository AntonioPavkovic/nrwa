<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;

    protected $primaryKey = ['employee_id', 'start_date'];

    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'job_id',
        'department_id',
    ];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}