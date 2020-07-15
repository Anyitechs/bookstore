<?php

namespace App\Http\Controllers;

use App\Book;
use App\Review;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('reviews');

        if(request('title')){
            $books->where('title', 'LIKE', '%'.request('title').'%');
        }

        if(request('author_id')){
            $books->where('author_id', request('author_id'));
        }

        if(request('sort_by') === 'title'){
            $books->orderBy('title', 'asc');
        }

        if(request('sort_by') === 'avg_review'){
            $books->addSelect(['average_reviews' => Review::select('count(*) as avg_reveiw')
                ->whereColumn('book_id', 'books.id')
                ->orderBy('avg_reveiw', 'asc')
                ->limit(1)
            ]);
        }
        return($books->get());

    
        
        return BookResource::collection($books->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'isbn' => 'required|digits:13|unique:books,isbn',
            'title' => 'required|string',
            'description' => 'required|string',
            'author_id' => 'required|integer|exists:authors,id'
        ]);
      

        $book = Book::create([
            'author_id' => $request->author_id,
            'isbn' => $request->isbn,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new BookResource($book);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
