<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('publication_processes', function (Blueprint $table) {
            $table->id();
            $table->string('page_title');
            $table->string('section_title');
            $table->text('section_description');
            $table->json('process_steps'); // Store steps as JSON
            $table->json('required_documents'); // Store documents as JSON
            $table->json('download_links'); // Store links as JSON
            $table->integer('order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('publication_processes');
    }
};