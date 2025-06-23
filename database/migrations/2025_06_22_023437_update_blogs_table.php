<?php

// database/migrations/update_blogs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Remove old columns
            $table->dropColumn(['sub_title', 'title', 'description', 'image']);
            
            // Add new bilingual columns
            $table->string('sub_title_en');
            $table->string('sub_title_np');
            $table->string('title_en');
            $table->string('title_np');
            $table->text('description_en');
            $table->text('description_np');
            $table->string('image_path');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Revert changes if needed
            $table->string('sub_title');
            $table->string('title');
            $table->text('description');
            $table->string('image');
            
            $table->dropColumn([
                'sub_title_en', 'sub_title_np',
                'title_en', 'title_np',
                'description_en', 'description_np',
                'image_path', 'slug', 'is_active'
            ]);
        });
    }
};