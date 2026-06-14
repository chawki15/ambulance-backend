<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbulanceMedicineStock extends Model
{
    protected $fillable = [
        'ambulance_id',
        'medicine_id',
        'quantity',
        'is_active',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'is_active' => 'boolean',
    ];

    public function ambulance()
    {
        return $this->belongsTo(Ambulance::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
