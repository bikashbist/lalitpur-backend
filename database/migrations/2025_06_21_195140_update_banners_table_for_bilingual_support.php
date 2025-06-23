<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            // Rename the existing image_name to image_name_en
            $table->renameColumn('image_name', 'image_name_en');
            
            // Add the Nepali title column
            $table->string('image_name_np')->after('image_name_en');
        });
    }

    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            // Reverse the changes if needed
            $table->renameColumn('image_name_en', 'image_name');
            $table->dropColumn('image_name_np');
        });
    }
};