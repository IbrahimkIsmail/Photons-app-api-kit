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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_min')->nullable();
            $table->string('whatsApp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('viber')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('google')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('android_url')->nullable();
            $table->string('ios_url')->nullable();
            $table->string('app_url')->nullable();
            $table->string('app_ratio')->nullable();
            $table->enum('app_status',['up','down'])->nullable();
            $table->boolean('have_update')->default(false);
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
        Schema::dropIfExists('settings');
    }
};
