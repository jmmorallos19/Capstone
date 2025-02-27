<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MemberBook;
use App\Models\Notification;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'library_card_no',
        'name',
        'member_group',
        'year_and_course',
        'student_no',
        'email',
        'phone',
        'address',
        'name_of_guardian',
        'guardian_phone',
        'guardian_address',
        'image_url',
        'barcode',
        'total_books_allowed',
        'total_books_borrowed',
        'currently_borrowed_books',
        'status',
    ];


    public function memberBooks(){
        
        return $this->hasMany(MemberBook::class);
    }

    public function notification(){

        return $this->hasMany(Notification::class);
    }

    public function history(){

        return $this->hasMany(History::class);
    }

}
