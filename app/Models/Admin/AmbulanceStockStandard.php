<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbulanceStockStandard extends Model
{
    protected $fillable = [
        'ambulance_id',
        'medicine_id',
        'standard_quantity',
    ];

    protected $casts = [
        'standard_quantity' => 'integer',
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
