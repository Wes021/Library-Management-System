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
    Schema::create('user', function (Blueprint $table) {
        $table->integer('user_id')->primary(); // Non-incremental integer primary key
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('gender');
        $table->string('phone_number')->unique();
        $table->integer('user_status_id');
        $table->foreign('user_status_id')->references('user_status_id')->on('user_status')->onDelete('cascade');
        $table->string('profile_picture')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('user');
}

};
