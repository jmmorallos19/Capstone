<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookCopy;
use App\Models\Member;

class Notification extends Model
{
    
    protected $table = 'notifications';

    protected $fillable = [
        'user_id',           // Name of the person lending the book
        'book_id',
        'book_copy_id',     // Reference to the specific book copy
        'book_copy_accession',
        'member_id',        // Reference to the member who borrowed/returned the book
        'user_role',
        'type',             // Type of notification ('borrowed', 'returned')
        'is_read',
        'description' // Detailed description of the activity
    ];
    
    public function book(){

        return $this->belongsTo(Book::class);
    }
    
    public function bookCopy(){

        return $this->belongsTo(BookCopy::class);
    }

    public function member(){

        return $this->belongsTo(Member::class);
    }

    public function user(){

        return $this->belongsTo(user::class);
    }
}
