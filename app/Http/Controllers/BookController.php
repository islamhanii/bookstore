<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // function show all books
    public function index() {
        $items = Book::select('id', 'name', 'desc', 'img', 'author')->paginate(12);

        return view('books.index', [
            "books" => $items
        ]);
    }

    /************************************************************************/

    // function show specific book
    public function show($id) {
        $book = Book::findOrFail($id);

        return view('books.show', [
            "book" => $book
        ]);
    }

    /************************************************************************/

    // function search books contains specific word
    public function search($keyword) {
        $books = Book::select('id', 'name', 'desc', 'img', 'author')
                ->orWhere("name", "like", "%$keyword%")
                ->orWhere("desc", "like", "%$keyword%")
                ->orWhere("author", "like", "%$keyword%")
                ->paginate(12);

        return view("books.search", [
            'keyword' => $keyword,
            'books' => $books
        ]);
    }

    /************************************************************************/

    // function show create book form
    public function create() {
        return view('books.create');
    }

    /************************************************************************/

    // function store new book
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'author' => 'required|string|min:5|max:100',
            'desc' => 'required|string|min:75|max:65530',
            'img' => 'required|image|mimes:jpg,jpeg,png|max:1024'
        ]);

        $path = Storage::putFile("books", $request->file("img"));

        // read data
        $name = $request->name;
        $author = $request->author;
        $desc = $request->desc;

        Book::create([
            'name' => $name,
            'author' => $author,
            'desc' => $desc,
            'img' => $path
        ]);

        return redirect(url("/books"));
    }

    /************************************************************************/

    // function show edit book form
    public function edit($id) {
        $book = Book::findOrFail($id);

        return view('books.edit', [
            'book' => $book
        ]);
    }

    /************************************************************************/

    // function update exist book
    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'author' => 'required|string|min:5|max:100',
            'desc' => 'required|string|min:75|max:65530',
            'img' => 'image|mimes:jpg,jpeg,png|max:1024'
        ]);
        
        $book = Book::findOrFail($id);
        $path = $book->img;

        if($request->hasFile("img")) {
            if($path !== null)  Storage::delete($path);
            $path = Storage::putFile("books", $request->file("img"));
        }

        // read data
        $name = $request->name;
        $author = $request->author;
        $desc = $request->desc;

        $book->update([
            'name' => $name,
            'author' => $author,
            'desc' => $desc,
            'img' => $path
        ]);

        return redirect(url("/books/show/{$id}"));
    }

    /************************************************************************/

    // function delet exist book
    public function delete($id) {
        $book = Book::findOrFail($id);
        Storage::delete($book->img);
        $book->delete();

        return redirect(url("/books"));
    } 
}
