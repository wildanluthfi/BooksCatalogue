<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request->CoverURL );

        if (!$request->CoverURL) {
            $validation = $request->validate([
                'title' => 'required',
                'synopsis' => 'required',
                'author' => 'required',
                'year' => 'required',
            ]);

            Book::create([
                // 'user_id' => auth()->user()->id,
                'Title' => $request->title,
                'Author' => $request->author,
                'Synopsis' => $request->synopsis,
                'ReleaseYear' => $request->year,
                'CoverURL' => 'https://unsplash.it/200/300.jpg'
            ]);
        } else {
            $validation = $request->validate([
                'title' => 'required',
                'synopsis' => 'required',
                'author' => 'required',
                'year' => 'required',
                'CoverURL' => 'file|image|mimes:jpeg,jpg,png,gif,webp|max:2048'
                // image.* 
                // for multiple images submission
            ]);

            $file = $validation['CoverURL'];
    
            $extension = $file->getClientOriginalExtension();
    
            $title = str_replace(" ","-",$request->title);
    
            $date = now()->year . "-" . now()->month . '-' . now()->day . '-';
    
            $filename = $date . $title . '.' . $extension;
    
            $path = $file->storeAs(
                '', $filename, 'azure'
            );

            Book::create([
                // 'user_id' => auth()->user()->id,
                'Title' => $request->title,
                'Author' => $request->author,
                'Synopsis' => $request->synopsis,
                'ReleaseYear' => $request->year,
                'CoverURL' => 'https://willwebapp.blob.core.windows.net/willcontainer/'.$filename
    
            ]);
        }

        return redirect('/')->with('status', 'Upload Done Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $reviews = Book::find($book->id)->reviews;

        return view('detail', compact('book', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        // $book = Book::where('id', '1');

        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);

        return redirect('/')->with('status', 'Book deleted succesfully');
    }
}
