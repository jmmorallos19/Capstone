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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('library_card_no')->unique();
            $table->string('name')->nullable();
            $table->string('member_group')->nullable();
            $table->string('year_and_course')->nullable();
            $table->string('student_no')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('name_of_guardian')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('guardian_phone', 15)->nullable();
            $table->string('image_url')->nullable();
            $table->string('barcode', 512)->nullable();
            $table->integer('total_books_allowed')->default(3);
            $table->integer('currently_borrowed_books')->default(0);
            $table->integer('total_books_borrowed')->default(0);
            $table->integer('total_fines')->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
