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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('book_id')->nullable();   // Link to book
            $table->foreignId('book_copy_id')->nullable(); // Link to book copy
            $table->foreignId('member_id')->nullable(); // Link to member
            $table->foreignId('member_book_id')->nullable(); // Link to member
            $table->string('status')->nullable();
            $table->string('book_accession')->nullable();
            $table->string('book_copy_accession')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
