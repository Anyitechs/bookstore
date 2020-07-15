<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'book_id', 'user_id', 'review',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
