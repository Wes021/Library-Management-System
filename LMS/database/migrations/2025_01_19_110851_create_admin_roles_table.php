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
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->integer('role_id')->primary(); // Non-incremental integer primary key
            $table->string('role_name');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('admin_roles');
    }
    
};
