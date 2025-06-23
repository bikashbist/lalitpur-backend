<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('team_lalitpur_members', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->string('name_en');
            $table->string('name_np');
            $table->string('position_en');
            $table->string('position_np');
            $table->string('phone');
            $table->string('email');
            $table->boolean('is_spokesperson')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_lalitpur_members');
    }
};