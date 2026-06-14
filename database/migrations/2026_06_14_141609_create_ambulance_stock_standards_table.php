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
        Schema::create('ambulance_stock_standards', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ambulance_id')
                ->constrained('ambulances')
                ->cascadeOnDelete();

            $table->foreignId('medicine_id')
                ->constrained('medicines')
                ->cascadeOnDelete();

            // الكمية المرجعية
            $table->integer('standard_quantity')->default(0);
            $table->timestamps();

            $table->unique(['ambulance_id', 'medicine_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulance_stock_standards');
    }
};
