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
        Schema::create('mst_users', function (Blueprint $table) {
            $table->id("id_user");
            $table->string('nik', 16);
            $table->string('full_name');
            $table->string('username', 30);
            $table->enum('gender', ["male", "female"]);
            $table->date('born');
            $table->text('address');
            $table->string('phone', 13)->unique();
            $table->string('email')->unique();
            $table->string('profile_picture')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('flag_active', ["Y", "N"])->default("Y");
            $table->enum('role', ["reader", "officer", "admin"])->default("reader");

            $table->string("created_by")->nullable();
            $table->string("updated_by")->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_users');
    }
};