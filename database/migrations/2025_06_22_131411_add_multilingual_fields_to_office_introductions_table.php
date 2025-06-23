<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('office_introductions', function (Blueprint $table) {
            $table->string('title_en')->nullable();
            $table->string('title_np')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_np')->nullable();
            $table->json('objectives_en')->nullable();
            $table->json('objectives_np')->nullable();

            // Optionally drop old columns if needed
            $table->dropColumn(['title', 'description', 'objectives']);
        });
    }

    public function down()
    {
        Schema::table('office_introductions', function (Blueprint $table) {
            $table->dropColumn([
                'title_en', 'title_np',
                'description_en', 'description_np',
                'objectives_en', 'objectives_np'
            ]);

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->json('objectives')->nullable();
        });
    }
};
