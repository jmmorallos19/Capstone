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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to the user performing the action
            $table->string('action')->nullable(); // Type of activity (added, updated, borrowed, returned)
            $table->string('type')->nullable();
            $table->foreignId('book_id')->nullable(); // Reference to the book (nullable if not applicable)
            $table->foreignId('book_copy_id')->nullable(); // Reference to the book copy (nullable if not applicable)
            $table->foreignId('member_id')->nullable(); // Reference to the member (nullable if not applicable)
            $table->text('activity_description')->nullable(); // Detailed description of the activity
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
