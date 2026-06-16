<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('driver_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'license_number',
                'license_expiry',
                'vehicle_type',
                'vehicle_plate',
            ]);

            $table->foreignId('ambulance_id')
                ->nullable()
                ->after('user_id')
                ->constrained('ambulances')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    
    public function down(): void
    {
        Schema::table('driver_profiles', function (Blueprint $table) {
            $table->dropForeign(['ambulance_id']);
            $table->dropColumn('ambulance_id');

            $table->string('license_number')->nullable();
            $table->date('license_expiry')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_plate')->nullable();
        });
    }
};
