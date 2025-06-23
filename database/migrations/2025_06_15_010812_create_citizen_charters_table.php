<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('citizen_charters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('introduction');
            $table->json('commitments');
            $table->string('working_days');
            $table->string('working_hours');
            $table->json('services');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('citizen_charters');
    }
};