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
    Schema::create('user_logs', function (Blueprint $table) {
        $table->integer('log_id')->primary(); // Non-incremental integer primary key
        $table->integer('user_id');
        $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
        $table->string('action');
        $table->string('description');
        $table->string('entity_type');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('user_logs');
}

};
