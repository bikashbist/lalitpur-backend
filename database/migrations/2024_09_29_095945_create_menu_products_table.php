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
        Schema::create('menu_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_category_id')->constrained()->onDelete('cascade'); // Foreign key to menu_categories
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->longText('description')->nullable();
            $table->longText('reasons_to_study')->nullable();
            $table->longText('scholarships')->nullable();
            $table->longText('application_process')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_products');
    }
};
