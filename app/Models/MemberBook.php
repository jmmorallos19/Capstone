<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Book;
use App\Models\BookCopy;

class MemberBook extends Model
{
    /** @use HasFactory<\Database\Factories\MemberBookFactory> */
    use HasFactory;

    protected $table = 'member_books';

    protected $fillable = [
        'member_id',          // ID of the member borrowing the book
        'user_id',            // ID of the user who lend the book
        'book_id',            // ID of the book being borrowed
        'book_copy_id',       // ID of the specific book copy being borrowed
        'book_accession',
        'book_copy_accession',
        'status',             // Borrow Status
        'borrowed_at',        // Date when the book was borrowed
        'fines',
        'overdue_days',
        'due_date',           // Due date for returning the book
        'returned_at',        // Date when the book was returned (nullable)
    ];


    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function bookCopy()
    {
        return $this->belongsTo(BookCopy::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function history(){

        return $this->hasMany(History::class);
    }
}
