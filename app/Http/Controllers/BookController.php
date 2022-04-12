<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // function show all books
    public function index() {
        $items = Book::select('id', 'name', 'desc', 'author')->paginate(8);

        return view('index', [
            "books" => $items
        ]);
    }

    /************************************************************************/

    // function show specific book
    public function show($id) {
        $book = Book::findOrFail($id);

        return view('show-book', [
            "book" => $book
        ]);
    }

    /************************************************************************/

    // function search books contains specific word
    public function search($keyword) {
        $books = Book::select('id', 'name', 'desc', 'author')
                ->orWhere("name", "like", "%$keyword%")
                ->orWhere("desc", "like", "%$keyword%")
                ->orWhere("author", "like", "%$keyword%")
                ->paginate(8);

        return view("search-books", [
            'keyword' => $keyword,
            'books' => $books
        ]);
    }

    /************************************************************************/

    // function show create book form
    public function create() {
        return view('create-book');
    }

    /************************************************************************/

    // function store new book
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'author' => 'required|string|min:5|max:100',
            'desc' => 'required|string|min:75|max:65530',
            'img' => 'mimes:jpg,jpeg,png|size:2048'
        ]);

        // read data
        $name = $request->name;
        $author = $request->author;
        $desc = $request->desc;

        Book::create([
            'name' => $name,
            'author' => $author,
            'desc' => $desc
        ]);

        return redirect(url("/books"));
    }

    /************************************************************************/

    // function show edit book form
    public function edit($id) {
        $book = Book::findOrFail($id);

        return view('edit-book', [
            'book' => $book
        ]);
    }

    /************************************************************************/

    // function update exist book
    public function update($id, Request $request) {
        $book = Book::findOrFail($id);

        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'author' => 'required|string|min:5|max:100',
            'desc' => 'required|string|min:75|max:65530',
            'img' => 'image|mimes:jpg,jpeg,png|size:2048'
        ]);

        // read data
        $name = $request->name;
        $author = $request->author;
        $desc = $request->desc;

        $book->update([
            'name' => $name,
            'author' => $author,
            'desc' => $desc
        ]);

        return redirect(url("/books/show/{$id}"));
    }

    /************************************************************************/

    // function delet exist book
    public function delete($id) {
        Book::findOrFail($id)->delete();

        return redirect(url("/books"));
    } 
}
