<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Admin Assistance',
            'phone' => '0600000000',
            'password' => Hash::make('Admin@12345'),
            'role' => User::ROLE_ADMIN,
            'specialty' => null,
        ];

        if (Schema::hasColumn('users', 'status')) {
            $data['status'] = 'available';
        }

        if (Schema::hasColumn('users', 'is_active')) {
            $data['is_active'] = true;
        }

        User::updateOrCreate(
            ['email' => 'admin@assistance-medicale.com'],
            $data
        );
    }
}
