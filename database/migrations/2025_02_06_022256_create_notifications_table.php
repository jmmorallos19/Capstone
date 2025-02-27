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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('book_id')->nullable();   // Link to book
            $table->foreignId('book_copy_id')->nullable(); // Link to book copy
            $table->string('book_copy_accession')->nullable();
            $table->foreignId('member_id')->nullable(); // Link to member
            $table->string('user_role')->nullable();
            $table->string('type')->nullable(); // e.g., 'borrowed', 'returned'
            $table->boolean('is_read')->default(false);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
