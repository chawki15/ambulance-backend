<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public const ROLE_ADMIN = 'admin';
    public const ROLE_DRIVER = 'driver';
    public const ROLE_GENERAL_DOCTOR = 'general_doctor';
    public const ROLE_EMERGENCY_DOCTOR = 'emergency_doctor';

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'profile_photo',
        'password',
        'role',
        'status',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function isAdmin(): bool
    {
        return $this->hasRole(self::ROLE_ADMIN);
    }

    public function isDriver(): bool
    {
        return $this->hasRole(self::ROLE_DRIVER);
    }

    public function isGeneralDoctor(): bool
    {
        return $this->hasRole(self::ROLE_GENERAL_DOCTOR);
    }

    public function isEmergencyDoctor(): bool
    {
        return $this->hasRole(self::ROLE_EMERGENCY_DOCTOR);
    }
}
