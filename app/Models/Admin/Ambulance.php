<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_type',
        'vehicle_plate',
        'license_number',
        'license_expiry',
        'status',
    ];

    protected $casts = [
        'license_expiry' => 'date',
    ];

    public function getTypeAttribute(): ?string
    {
        return $this->vehicle_type;
    }

    public function getRegistrationAttribute(): ?string
    {
        return $this->vehicle_plate;
    }

    public function medicineStocks()
    {
        return $this->hasMany(AmbulanceMedicineStock::class);
    }

    public function stockStandards()
    {
        return $this->hasMany(AmbulanceStockStandard::class);
    }

    public function driverProfile()
    {
        return $this->hasOne(DriverProfile::class);
    }
}
