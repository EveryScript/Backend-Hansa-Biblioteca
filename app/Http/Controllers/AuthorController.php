<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    public function __construct()
    {
    }
    // Get all authors
    public function index() {
        $authores = Author::all();

        return response()->json([
            'status' => 'success',
            'authors' => $authores
        ]);
    }
    // Get author by id
    public function show($id) {
        $author = Author::find($id)->load('libros');

        return response()->json([
            'status' => 'success',
            'author' => $author
        ]);
    }
    // Create author
    public function store(AuthorRequest $request) {

        Author::create($request->validated());

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Author created'
        ], 200);
    }
    // Update author
    public function update(AuthorRequest $request, $id) {

        Author::where('id', $id)->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Author updated',
        ], 200);
    }
    // Delete author
    public function destroy($id) {

        $author = Author::where('id', $id);
        if(is_object($author)) {
            $author->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Author deleted',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Error on author deleted',
            ], 500);
        }

    }
}
