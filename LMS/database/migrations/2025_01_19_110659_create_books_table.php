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
    Schema::create('books', function (Blueprint $table) {
        $table->integer('book_id')->primary(); // Non-incremental integer primary key
        $table->integer('ISBN');
        $table->string('publisher');
        $table->integer('language_id');
        $table->foreign('language_id')->references('language_id')->on('language')->onDelete('cascade');

        $table->string('year');

        $table->integer('categories_id');
        $table->foreign('categories_id')->references('categories_id')->on('book_categories')->onDelete('cascade');

        $table->string('image');

        $table->unsignedBigInteger('book_status_id');
        $table->foreign('book_status_id')->references('book_status_id')->on('book_status')->onDelete('cascade');

        $table->unsignedBigInteger('created_by');
        $table->foreign('created_by')->references('admin_id')->on('admin')->onDelete('cascade');

        $table->unsignedBigInteger('updated_by');
        $table->foreign('updated_by')->references('admin_id')->on('admin')->onDelete('cascade');
        
        $table->timestamps();
        $table->string('total_copies');
    });
}

public function down(): void
{
    Schema::dropIfExists('books');
}

};
