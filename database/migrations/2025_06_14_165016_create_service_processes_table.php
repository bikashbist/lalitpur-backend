<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('service_processes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('introduction');
            $table->json('services'); // For the ordered list
            $table->json('documents'); // For the bullet list
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_processes');
    }
};