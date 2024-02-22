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
        Schema::create('dt_book_genres', function (Blueprint $table) {
            $table->id("id_book_genre");
            $table->unsignedBigInteger("id_book");
            $table->unsignedBigInteger("id_genre");

            $table->foreign("id_book")
                ->references("id_book")
                ->on("mst_books")
                ->onDelete("CASCADE");
            $table->foreign("id_genre")
                ->references("id_genre")
                ->on("mst_genres")
                ->onDelete("CASCADE");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_book_genres');
    }
};