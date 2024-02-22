<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Decrease
        DB::unprepared('
            CREATE TRIGGER TR_decrease_book_stock_AI 
            AFTER INSERT 
            ON `rec_book_receipts` FOR EACH ROW
            BEGIN
                UPDATE mst_books SET stock = mst_books.stock - NEW.amount
                    WHERE mst_books.id_book = NEW.id_book;
            END
        ');

        // Increase
        DB::unprepared('
            CREATE TRIGGER TR_increase_book_stock_AU 
            AFTER UPDATE 
            ON `rec_book_receipts` FOR EACH ROW
            BEGIN
                UPDATE mst_books SET stock = mst_books.stock + OLD.amount
                WHERE mst_books.id_book = OLD.id_book;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `TR_decrease_book_stock_AI`');
        DB::unprepared('DROP TRIGGER `TR_increase_book_stock_AU`');
    }
};
