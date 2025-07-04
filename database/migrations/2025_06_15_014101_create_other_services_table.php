<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('other_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('link')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('other_services');
    }
};