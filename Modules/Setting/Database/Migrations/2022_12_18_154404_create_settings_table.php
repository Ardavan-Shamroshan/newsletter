<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('terms')->nullable();
            $table->text('keywords')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('google_map')->nullable();
            $table->text('copyright')->nullable();
            $table->text('logo')->nullable();
            $table->text('icon')->nullable();
            $table->timestamps();
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
