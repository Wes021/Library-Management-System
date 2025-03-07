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
    Schema::create('borrow_status', function (Blueprint $table) {
        $table->integer('borrow_status_id')->primary(); // Non-incremental integer primary key
        $table->string('borrow_status');
    });
}

public function down(): void
{
    Schema::dropIfExists('borrow_status');
}

};
