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
        Schema::create('book_copies', function (Blueprint $table) {
            $table->id();
            // Add foreign key constraint
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->string('copy_no')->nullable(); //c1, c2
            $table->string('accession_no')->nullable();
            $table->text('title')->nullable();
            $table->text('author')->nullable();
            $table->bigInteger('isbn')->nullable();
            $table->bigInteger('isbn13')->nullable();
            $table->text('call_no')->nullable();
            $table->text(column: 'edition')->nullable();
            $table->text('publisher')->nullable();
            $table->year('publication_year');
            $table->text('volume')->nullable();
            $table->integer('pages')->nullable();
            $table->text('subject')->nullable();
            $table->longText('bibliography')->nullable();
            $table->text('description')->nullable();
            $table->text('abstract')->nullable();
            $table->string('book_condition')->nullable()->default('good');
            $table->string('status')->default('available');
            $table->string('library_branch')->default('ICC Library');
            $table->string('barcode', 512);
            $table->timestamps();

        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_copies');
    }
};
