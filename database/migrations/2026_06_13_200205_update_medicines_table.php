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
        Schema::table('medicines', function (Blueprint $table) {

            $table->dropColumn(['description', 'expiry_date']);

            $table->text('photo')->nullable()->after('name');

            $table->foreignId('category_id')
                ->after('id')
                ->constrained('categories')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicines', function (Blueprint $table) {

            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_id', 'photo']);

            $table->text('description')->nullable();
            $table->date('expiry_date')->nullable();
        });
    }
};
