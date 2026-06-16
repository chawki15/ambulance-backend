<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DriverProfile extends Model
{
    protected $fillable = [
        'user_id',
        'ambulance_id',
        'is_available',
        'is_active',
        'blocked_at',
        'blocked_reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ambulance()
    {
        return $this->belongsTo(Ambulance::class);
    }

}
