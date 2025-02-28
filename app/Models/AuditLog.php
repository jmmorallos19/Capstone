<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Member;

class AuditLog extends Model
{

    protected $table = 'audit_logs';

    protected $fillable = [
        'user_id',             // ID of the user performing the action
        'action',       
        'type', 
        'book_id',             // Reference to the book (nullable if not applicable)
        'book_copy_id',        // Reference to the specific book copy (nullable if not applicable)
        'member_id',           // Reference to the member (nullable if not applicable)
        'activity_description' // Detailed description of the activity
    ];
   
    public function user(){

        return $this->belongsTo(User::class);

    }

    public function book(){

        return $this->belongsTo(Book::class);

    }

    public function bookcopy(){

        return $this->belongsTo(BookCopy::class);

    }

    public function member(){

        return $this->belongsTo(Member::class);

    }

}
