<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;

class BookController extends Controller
{
    public function index(): View
    {
        /** @var \Illuminate\Database\Eloquent\Collection $books */
        $books = Book::with('category')->get();
        $stock = $books->sum('stock');

        return view('books.index', compact('books', 'stock'));
    }

    public function create(): View
    {
        $categories = Category::query()->orderBy('name')->get();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Saving data after validation
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:books,title', // New rule: unique
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'), // New rule: dynamic maximum up to the current year
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
        ]);

        Book::query()->create($validated);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        $categories = Category::query()->orderBy('name')->get();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        // Validate by excluding the book title currently being edited to avoid duplicate detection
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:books,title,' . $book->id,
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
