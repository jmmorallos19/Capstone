<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MemberBook;
use App\Models\Book;

class BookCopy extends Model
{
    /** @use HasFactory<\Database\Factories\BookCopyFactory> */
    use HasFactory;

    protected $table = 'book_copies';

    protected $fillable = [
        'book_id',
        'copy_no',
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
        'book_condition',
        'bibliography',
        'description',
        'abstract',
        'status',
        'barcode'
    ];

    public function book(){


        return $this->belongsTo(Book::class);
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
