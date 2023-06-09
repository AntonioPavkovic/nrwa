<?php

namespace App\Models;

use App\Models\Employee as ModelsEmployee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'job_id',
        'salary',
        'commission_pct',
        'manager_id',
        'department_id'
    ];


    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'manager_id');
    }
}


