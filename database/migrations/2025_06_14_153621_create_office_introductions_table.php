<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('office_introductions', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_np');
            $table->text('description_en');
            $table->text('description_np');
            $table->string('image')->nullable();
            $table->json('objectives_en')->nullable();
            $table->json('objectives_np')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('office_introductions');
    }
};
