<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // In the generated migration file:
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('category')->after('is_active');
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
