<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public $timestapms = false;
    protected $primaryKey = 'location_id';

    protected $fillable = [
        'street_adress',
        'postal_code',
        'city',
        'street_province',
        'country_id'
    ];
}
