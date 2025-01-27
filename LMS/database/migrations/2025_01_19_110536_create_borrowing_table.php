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
        $table->integer('borrow_id')->primary(); // Non-incremental integer primary key

        $table->integer('user_id');
        $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
       
        $table->integer('book_id');
        $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade'); 

        $table->integer('borrow_status_id');
        $table->foreign('borrow_status_id')->references('borrow_status_id')->on('borrow_status')->onDelete('cascade');
        $table->timestamp('borrowed_at');
        $table->timestamp('returned_at');
        $table->decimal('fine_amount');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('borrowing');
}

};
