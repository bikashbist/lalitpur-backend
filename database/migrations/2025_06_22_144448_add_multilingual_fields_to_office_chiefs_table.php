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
    Schema::table('office_chiefs', function (Blueprint $table) {
        $table->string('name_en')->nullable();
        $table->string('name_np')->nullable();
        $table->string('position_en')->nullable();
        $table->string('position_np')->nullable();
        $table->string('office_en')->nullable();
        $table->string('office_np')->nullable();
        $table->text('message_en')->nullable();
        $table->text('message_np')->nullable();
    });
}

public function down()
{
    Schema::table('office_chiefs', function (Blueprint $table) {
        $table->dropColumn([
            'name_en', 'name_np', 
            'position_en', 'position_np',
            'office_en', 'office_np',
            'message_en', 'message_np'
        ]);
    });
}

};
