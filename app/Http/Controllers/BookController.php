<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $query = $request->input('query');

        $books = Book::when($query, function ($q) use ($query) {
            return $q->where('title', 'like', "%{$query}%")
                    ->orWhere('author', 'like', "%{$query}%");

        })->get();

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
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
            'genre' => 'required',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, book $book)
    {
        $validate = $request->validate([

            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required',
            'published_year' => 'required|integer',
            'genre' => 'required|string|max:255'

        ]);

        $book ->update($validate);

        return redirect ()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
