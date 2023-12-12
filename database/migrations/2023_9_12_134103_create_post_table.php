<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->string('slug');
            $table->json("body_json");
            $table->smallInteger('reading_time');
            $table->longText('body_html');
            $table->string("thumbnail_image")->nullable();
            $table->text("description")->nullable();

            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
