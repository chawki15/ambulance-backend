<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('driver', 'ambulances');

        Schema::table('ambulances', function (Blueprint $table) {

            $table->enum('status', [
                'available',
                'mission',
                'maintenance'
            ])->default('available')->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('ambulances', function (Blueprint $table) {

            $table->dropColumn('status');
        });

        Schema::rename('ambulances', 'drivers');
    }
};
