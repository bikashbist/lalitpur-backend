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
       // In the migration file
        Schema::create('tourism_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('year'); // Nepali year (e.g. "२०८०")
            $table->integer('domestic_tourists');
            $table->integer('foreign_tourists');
            $table->float('growth_rate');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourism_statistics');
    }
};
