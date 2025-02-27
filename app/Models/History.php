<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';

    protected $fillable = [
        'user_id',
        'book_id',
        'book_copy_id',
        'member_id',
        'member_book_id',
        'status',
        'book_accession',
        'book_copy_accession'
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function book()
    {

        return $this->belongsTo(Book::class);
    }

    public function bookCopy()
    {

        return $this->belongsTo(BookCopy::class);
    }

    public function member()
    {

        return $this->belongsTo(Member::class);
    }

    public function memberBook()
    {
        return $this->belongsTo(MemberBook::class);
    }
}
