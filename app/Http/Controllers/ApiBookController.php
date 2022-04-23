<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use App\Models\Book;

class ApiBookController extends Controller
{
    public function index() {
        $books = Book::get();

        return BookResource::collection($books);
    }

    public function show($id) {
        $book = Book::findOrFail($id);
        return new BookResource($book);
    }
}
