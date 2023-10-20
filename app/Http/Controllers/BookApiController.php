<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', Rule::unique('books', 'title')],
            'author' => 'required',
            'issue_year' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);
        return Book::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Book::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return $book;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Book::destroy($id);
    }

    /**
     * Search functionality
     * @param str $value
     * 
     */
    public function search($value)
    {
        return Book::where('title', 'like', '%' . $value . '%')->orWhere('author', 'like', '%' . $value . '%')->get();
        // return Book::where('author', 'like', '%' . $value . '%');
    }
}
