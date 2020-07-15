<?php

namespace App\Http\Controllers;

use App\Book;
use App\Review;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $review = Review::firstOrCreate(
            [
                'user_id' => $request->user()->id,
                'book_id' => $book->id,
            ],
            ['review' => $request->review]
        );
        return new ReviewResource($review);
    }
}
