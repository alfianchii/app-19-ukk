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
        Schema::create('rec_book_receipts', function (Blueprint $table) {
            $table->id("id_book_receipt");
            $table->unsignedBigInteger("id_book");
            $table->unsignedBigInteger("id_user");
            $table->integer("amount");
            $table->date("from_time");
            $table->date("to_time");
            $table->enum("status", ["taken", "returned", "overdue"])->default("taken");
            $table->date("date_returned")->nullable();

            $table->foreign("id_book")
                ->references("id_book")
                ->on("mst_books")
                ->onDelete("CASCADE");
            $table->foreign("id_user")
                ->references("id_user")
                ->on("mst_users")
                ->onDelete("CASCADE");

            $table->string("created_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rec_book_receipts');
    }
};
