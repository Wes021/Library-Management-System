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
    Schema::create('borrow_logs', function (Blueprint $table) {
        $table->integer('borrow_log_id')->primary(); // Non-incremental integer primary key

        $table->integer('borrow_id');
        $table->foreign('borrow_id')->references('borrow_id')->on('borrowing')->onDelete('cascade');

        $table->integer('user_id');
        $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');

        $table->integer('book_id');
        $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');
        
        $table->string('action');
        $table->string('notes');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('borrow_logs');
}

};
