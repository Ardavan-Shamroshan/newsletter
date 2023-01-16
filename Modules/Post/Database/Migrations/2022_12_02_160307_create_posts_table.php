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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('post_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('summary');
            $table->text('body');
            $table->text('image')->nullable();
            $table->integer('views')->default(0);
            $table->string('slug')->unique()->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
