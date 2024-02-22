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
        Schema::create('history_book_wishlists', function (Blueprint $table) {
            $table->id("id_book_wishlist");
            $table->unsignedBigInteger("id_book");
            $table->unsignedBigInteger("id_user");

            $table->foreign("id_book")
                ->references("id_book")
                ->on("mst_books")
                ->onDelete("CASCADE");
            $table->foreign("id_user")
                ->references("id_user")
                ->on("mst_users")
                ->onDelete("CASCADE");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_book_wishlists');
    }
};
