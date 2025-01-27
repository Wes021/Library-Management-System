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
        Schema::create('user_status', function (Blueprint $table) {
            $table->integer('user_status_id')->primary(); // Non-incremental integer primary key
            $table->string('user_status')->unique();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('user_status');
    }
    
};
