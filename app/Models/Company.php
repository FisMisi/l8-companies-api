<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'registration_number',
        'foundation_date',
        'country',
        'zip_code',
        'city',
        'street_address',
        'latitude',
        'longitude',
        'owner',
        'employees',
        'activity',
        'active',
        'email',
        'password',
    ];
}
