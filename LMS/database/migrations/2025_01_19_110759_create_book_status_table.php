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
    Schema::create('book_status', function (Blueprint $table) {
        $table->integer('book_status_id')->primary(); // Non-incremental integer primary key
        $table->string('status');
    });
}

public function down(): void
{
    Schema::dropIfExists('book_status');
}

};
