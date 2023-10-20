<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookCotroller extends Controller
{
    public function index(): View
    {
        return view('books.index', [
            'books' => Book::latest()->filter(request([
                'category', 'search',
            ]))->paginate(10),
            'categories' => Category::all()
        ]);
    }

    public function show(Book $book): View
    {
        return view('books.show', [
            'book' => $book, 'category' => Category::find($book->category_id)
        ]);
    }

    public function create(): View
    {
        return view('books.create', ['categories' => Category::all()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('books', 'title')],
            'author' => 'required',
            'issue_year' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Book::create($formFields);
        return redirect('/')->with('message', 'Nowy tytuł został dodany poprawnie.');
    }

    public function edit(Book $book): View
    {
        return view('books.edit', ['book' => $book, 'categories' => Category::all()]);
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'issue_year' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);

        $book->update($formFields);
        return redirect('books/' . $book->id)->with('message', 'Dane ' . $book->title . ' zostały zaktualizowane.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect('/')->with('message', $book->title . ' została usunięta.');
    }
}
