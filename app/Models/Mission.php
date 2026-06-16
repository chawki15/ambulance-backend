<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [
        'patient_full_name',
        'patient_age',
        'patient_phone',
        'patient_address',
        'latitude',
        'longitude',
    ];
}
