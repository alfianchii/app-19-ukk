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
        Schema::create('mst_books', function (Blueprint $table) {
            $table->id("id_book");
            $table->string("title");
            $table->string("author");
            $table->string("publisher");
            $table->year("year_published");
            $table->text("synopsis");
            $table->string("cover")->nullable();
            $table->unsignedBigInteger("stock");

            $table->string("created_by")->nullable();
            $table->string("updated_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_books');
    }
};
