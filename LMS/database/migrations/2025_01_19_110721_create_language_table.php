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
    Schema::create('language', function (Blueprint $table) {
        $table->integer('language_id')->primary(); // Non-incremental integer primary key
        $table->string('language_name');
    });
}

public function down(): void
{
    Schema::dropIfExists('language');
}

};
