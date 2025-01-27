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
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->integer('admin_logs_id')->primary(); // Non-incremental integer primary key
            $table->string('action');
            $table->string('description');
            $table->timestamps();
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('admin_logs');
    }
    
};
