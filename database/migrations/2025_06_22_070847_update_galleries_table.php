<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->renameColumn('image_name', 'image_name_en');
            $table->string('image_name_np')->after('image_name_en');
            $table->string('title_en')->after('image_name_np');
            $table->string('title_np')->after('title_en');
            $table->string('category')->after('title_np');
            $table->string('video_url')->nullable()->after('image_path');
        });
    }

    public function down()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->renameColumn('image_name_en', 'image_name');
            $table->dropColumn(['image_name_np', 'title_en', 'title_np', 'category', 'video_url']);
        });
    }
};
