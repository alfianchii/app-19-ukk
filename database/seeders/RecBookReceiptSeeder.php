<?php

namespace Database\Seeders;

use App\Models\RecBookReceipt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecBookReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecBookReceipt::insert([
            [
                "id_book" => 1,
                "id_user" => 4,
                "amount" => 2,
                "from_time" => now()->format('Y-m-d'),
                "to_time" => now()->subDays(-7)->format('Y-m-d'),
                "status" => "returned",
                "date_returned" => now()->subDays(-2)->format('Y-m-d'),
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_book" => 2,
                "id_user" => 5,
                "amount" => 1,
                "from_time" => now()->subDays(29)->format('Y-m-d'),
                "to_time" => now()->subDays(22)->format('Y-m-d'),
                "status" => "taken",
                "date_returned" => null,
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_book" => 3,
                "id_user" => 4,
                "amount" => 4,
                "from_time" => now()->subDays(8)->format('Y-m-d'),
                "to_time" => now()->subDays(1)->format('Y-m-d'),
                "status" => "overdue",
                "date_returned" => null,
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_user" => 4,
                "id_book" => 2,
                "amount" => 2,
                "from_time" => now()->subDays(8)->format('Y-m-d'),
                "to_time" => now()->subDays(1)->format('Y-m-d'),
                "status" => "returned",
                "date_returned" => now()->subDays(3)->format('Y-m-d'),
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_user" => 4,
                "id_book" => 2,
                "amount" => 5,
                "from_time" => now()->subDays(8)->format('Y-m-d'),
                "to_time" => now()->subDays(1)->format('Y-m-d'),
                "status" => "returned",
                "date_returned" => now()->subDays(3)->format('Y-m-d'),
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_user" => 4,
                "id_book" => 2,
                "amount" => 1,
                "from_time" => now()->subDays(8)->format('Y-m-d'),
                "to_time" => now()->subDays(1)->format('Y-m-d'),
                "status" => "returned",
                "date_returned" => now()->subDays(3)->format('Y-m-d'),
                "created_by" => 1,
                "created_at" => now(),
            ],
            [
                "id_book" => 2,
                "id_user" => 6,
                "amount" => 1,
                "from_time" => now()->subDays(29)->format('Y-m-d'),
                "to_time" => now()->subDays(22)->format('Y-m-d'),
                "status" => "taken",
                "date_returned" => null,
                "created_by" => 1,
                "created_at" => now(),
            ],
        ]);
    }
}
