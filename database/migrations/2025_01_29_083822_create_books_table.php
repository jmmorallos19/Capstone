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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('accession_no')->nullable();
            $table->text('title')->nullable();
            $table->text('author')->nullable();
            $table->string('isbn')->nullable();
            $table->string('isbn13')->nullable();
            $table->text('call_no')->nullable();
            $table->text(column: 'edition')->nullable();
            $table->text('publisher')->nullable();
            $table->year('publication_year')->nullable();
            $table->text('volume')->nullable();
            $table->integer('pages')->nullable();
            $table->text('subject')->nullable();
            $table->longText('bibliography')->nullable();
            $table->text('description')->nullable();
            $table->text('abstract')->nullable();
            $table->string('status')->default('available');
            $table->integer('borrowed_times')->nullable()->default(0);
            $table->string('book_condition')->nullable()->default('good');
            $table->boolean('is_archive')->default(false);
            $table->string('library_branch')->default('ICC Library');
            $table->string('label')->default('main copy');
            $table->string('total_copies')->default(0);
            $table->string('barcode', 512)->nullable();
            $table->date('archived_at')->nullable(); // Date when the book was returned (nullable if not returned yet)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
