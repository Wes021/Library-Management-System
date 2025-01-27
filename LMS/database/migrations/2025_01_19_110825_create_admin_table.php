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
    Schema::create('admin', function (Blueprint $table) {
        $table->integer('admin_id')->primary(); // Non-incremental integer primary key
        $table->string('name');
        $table->string('email');
        $table->string('password');
        $table->foreignId('role_id')->constrained()->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::dropIfExists('admin');
}

};
