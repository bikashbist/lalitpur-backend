<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('team_members', function (Blueprint $table) {
        $table->string('name_en')->after('id');
        $table->string('name_np')->after('name_en');
        $table->string('position_en')->after('name_np');
        $table->string('position_np')->after('position_en');
    });
}

public function down()
{
    Schema::table('team_members', function (Blueprint $table) {
        $table->dropColumn(['name_en', 'name_np', 'position_en', 'position_np']);
    });
}

};
