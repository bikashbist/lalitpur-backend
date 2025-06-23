<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->string('brand')->nullable();
            $table->string('condition')->nullable();
            $table->integer('stock')->default(0);
            $table->string('category'); // Men, Women, Children
            $table->string('shop_category'); // Glasses, Sunglasses, Contacts
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
