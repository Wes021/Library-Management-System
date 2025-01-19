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
        Schema::create('borrowing', function (Blueprint $table) {
            $table->integer('borrow_id')->primary();
            $table->integer('user_id');
            $table->integer('book_id');
            $table->integer('book_status_id');
            $table->timestamp('borrowed_at');
            $table->timestamp('returned_at');
            $table->decimal('fine_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowing');
    }
};
