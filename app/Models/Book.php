<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MemberBook;
use App\Models\BookCopy;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'accession_no',
        'title',
        'author',
        'isbn',
        'isbn13',
        'call_no',
        'edition',
        'publisher',
        'publication_year',
        'pages',
        'subject',
        'volume',
        'bibliography',
        'description',
        'abstract',
        'total_copies',
        'label',
        'book_condition',
        'status',
        'borrowed_times',
        'is_archive',
        'barcode',
        'archived_at',
    ];

    public function bookCopies(){

        return $this->hasMany(BookCopy::class);
    }

    public function memberBook(){

        return $this->hasMany(MemberBook::class);
    }

    public function notification(){

        return $this->hasMany(Notification::class);
    }

    public function history(){

        return $this->hasMany(History::class);
    }
}
