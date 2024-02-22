<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                "id_user" => 1,
                "nik" => "1234567890123456",
                "full_name" => "Alfian",
                "username" => "alfianchii",
                "gender" => "male",
                "born" => "2005-10-27",
                "address" => "Tangerang",
                "phone" => "082334784621",
                "email" => "alfianganteng@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "Y",
                "role" => "admin",
                "created_at" => now(),
            ],
            [
                "id_user" => 2,
                "nik" => "0987654321098745",
                "full_name" => "Ogi",
                "username" => "asawgi",
                "gender" => "male",
                "born" => "2002-03-29",
                "address" => "Jakarta",
                "phone" => "082346421378",
                "email" => "saugi.dev@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "Y",
                "role" => "admin",
                "created_at" => now(),
            ],
            [
                "id_user" => 3,
                "nik" => "5876090987454321",
                "full_name" => "Nugraha",
                "username" => "lolioverflow",
                "gender" => "male",
                "born" => "1997-05-29",
                "address" => "Jakarta",
                "phone" => "082346213478",
                "email" => "nugraha@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "Y",
                "role" => "officer",
                "created_at" => now(),
            ],
            [
                "id_user" => 4,
                "nik" => "6090874543587921",
                "full_name" => "Moepoi",
                "username" => "moepoi",
                "gender" => "male",
                "born" => "2001-02-25",
                "address" => "Jakarta",
                "phone" => "082341233462",
                "email" => "moe.poi@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "Y",
                "role" => "reader",
                "created_at" => now(),
            ],
            [
                "id_user" => 5,
                "nik" => "8746090543587921",
                "full_name" => "Galih",
                "username" => "masgalih",
                "gender" => "male",
                "born" => "2004-06-23",
                "address" => "Sumatra",
                "phone" => "082341462233",
                "email" => "mas.galih@gmail.com",
                "password" => Hash::make("password"),
                "flag_active" => "N",
                "role" => "reader",
                "created_at" => now(),
            ],
        ]);
    }
}