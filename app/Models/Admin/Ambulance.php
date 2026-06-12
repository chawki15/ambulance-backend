<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $fillable = ['type', 'registration', 'license_number', 'license_expiry', 'status',];
}
