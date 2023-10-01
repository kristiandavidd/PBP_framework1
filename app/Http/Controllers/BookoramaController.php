<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Models\Category;
use DeepCopy\f001\B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        // dd($request->all());
        // $request->validate([
        //     'isbn' => 'required|regex:/^\d{1,}-\d{1,3}-\d{1,5}-\d{1,}$/',
        //     'title' => 'required',
        //     'categoryid' => 'required|exists:categories,id',
        //     'author' => 'required',
        //     'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        // ]);
    
        $categoryName = $request->category;
        $category = Category::where('name', $categoryName)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Kategori tidak valid');
        }

        $book = new Book;
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;

        $book->category()->associate($category);

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
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $isbn)
    {
        $categoryName = $request->category;
        $category = Category::where('name', $categoryName)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Kategori tidak valid');
        }

        $book = Book::where('isbn', $isbn)->first();

        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Buku tidak ditemukan');
        }

        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->category()->associate($category);
        $book->author = $request->author;
        $book->price = $request->price;

        

        $book->save();

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($isbn)
    {
        Log::info('Destroy method called for ISBN: ' . $isbn);
        // Temukan buku berdasarkan ISBN
        $book = Book::where('isbn', $isbn)->first();

        // Periksa apakah buku ditemukan
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Buku tidak ditemukan');
        }

        // Hapus buku
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Data buku berhasil dihapus');
    }
    
}
