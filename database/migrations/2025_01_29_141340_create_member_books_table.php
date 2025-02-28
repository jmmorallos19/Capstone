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
        Schema::create('member_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable()->constrained('members')->onDelete('cascade'); // Reference to the member borrowing the book
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('book_id')->nullable()->constrained('books')->onDelete('set null'); // Reference to the book being borrowed (nullable if borrowing a specific copy)
            $table->foreignId('book_copy_id')->nullable()->constrained('book_copies')->onDelete('set null'); // Reference to the specific book copy (nullable if borrowing the book directly)
            $table->string('book_accession')->nullable();
            $table->string('book_copy_accession')->nullable();
            $table->string('status')->default('ongoing');
            $table->integer('fines')->default(0);
            $table->integer('overdue_days')->default(0);
            $table->date('borrowed_at'); // Date when the book was borrowed
            $table->date('due_date')->nullable(); // Due date for returning the book
            $table->date('returned_at')->nullable(); // Date when the book was returned (nullable if not returned yet)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_books');
    }
};
