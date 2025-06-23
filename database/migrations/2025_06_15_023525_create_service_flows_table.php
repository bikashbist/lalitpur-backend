<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('service_flows', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('service_slug')->unique();
            $table->text('service_description');
            $table->json('steps')->nullable();
            $table->json('notes')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_flows');
    }
};