<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function __construct()
    {
    }
    // Get all books
    public function index()
    {
        $books = Book::with('author')
            ->orderBy('updated_at', 'DESC')
            ->get();

        return response()->json([
            'status' => 'success',
            'books' => $books
        ]);
    }
    // Get book by id
    public function show($id)
    {
        $book = Book::find($id)->load('author')->load('loans');

        return response()->json([
            'status' => 'success',
            'book' => $book
        ]);
    }
    // Create book
    public function store(BookRequest $request)
    {
        Book::create($request->validated());

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Book created'
        ], 200);
    }
    // Update book
    public function update(BookRequest $request, $id)
    {
        Book::where('id', $id)->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Book updated',
        ], 200);
    }
    // Delete book
    public function destroy($id)
    {
        $book = Book::where('id', $id);
        if (is_object($book)) {
            $book->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Book deleted',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Error on book deleted',
            ], 500);
        }
    }
}
