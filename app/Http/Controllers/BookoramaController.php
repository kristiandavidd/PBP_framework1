<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use DeepCopy\f001\B;
use Illuminate\Http\Request;

class BookoramaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $books = Book::all();
        $books = Book::with('category')->get();
        $books = Book::with('bookReview')->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book;
        
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->categoryid = $request->categoryid;

        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
