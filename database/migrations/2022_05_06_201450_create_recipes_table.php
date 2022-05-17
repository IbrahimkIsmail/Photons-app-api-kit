<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kitchen_id');
            $table->foreignId('category_id');
            $table->foreignId('occasion_id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('main_image')->nullable();
            $table->integer('cooking_time')->nullable();
            $table->integer('number_of_people')->nullable();
            $table->json('ingredients')->nullable();
            $table->json('prepares')->nullable();
            $table->enum('status',['published','unpublished'])->default('unpublished');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
