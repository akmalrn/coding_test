<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'isbn' => 'required|string|unique:books,isbn',
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ]);

        $validated['id'] = Str::uuid()->toString();

        $book = Book::create($validated);
        $book->load('author');

        return response()->json([
            'message' => 'Buku berhasil ditambahkan.',
            'data' => $book,
        ], 201);
    }

    public function show($id)
    {
        $book = Book::with('author')->find($id);

        if (!$book) {
            return response()->json(['message' => 'Buku tidak ditemukan.'], 404);
        }

        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Buku tidak ditemukan.'], 404);
        }

        $validated = $request->validate([
            'isbn' => 'required|string|unique:books,isbn,' . $id,
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book->update($validated);
        $book->load('author');

        return response()->json([
            'message' => 'Buku berhasil diperbarui.',
            'data' => $book,
        ]);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Buku tidak ditemukan.'], 404);
        }

        $book->delete();
        return response()->json(['message' => 'Buku berhasil dihapus.']);
    }
}
