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
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');

            $table->index('post_id','post_tag_post_idx');
            $table->index('tag_id','post_tag_tag_idx');

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade'); // Добавьте это

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade'); // Добавьте это
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tags');
    }
};
