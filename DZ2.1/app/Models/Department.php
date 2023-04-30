<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_name',
        'manager_id',
        'location_id'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id');
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
