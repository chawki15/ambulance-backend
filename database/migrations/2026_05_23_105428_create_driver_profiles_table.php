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
        Schema::create('driver_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('license_number');
            $table->date('license_expiry')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_plate')->nullable();
            $table->boolean('is_available')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamp('blocked_at')->nullable();
            $table->string('blocked_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_profiles');
    }
};
