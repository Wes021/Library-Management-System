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
    Schema::create('book_categories', function (Blueprint $table) {
        $table->integer('categories_id')->primary(); // Non-incremental integer primary key
        $table->string('category_name');
    });
}

public function down(): void
{
    Schema::dropIfExists('book_categories');
}

};
