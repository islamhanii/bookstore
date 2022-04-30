<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiBookController extends Controller
{
    // function get all books
    public function index() {
        $books = Book::paginate(12);

        return BookResource::collection($books);
    }

    /************************************************************************/

    // function get specific book
    public function show($id) {
        $book = Book::findOrFail($id);
        return new BookResource($book);
    }

    /************************************************************************/

    // function search for book
    public function search($keyword) {
        $books = Book::select('id', 'name', 'desc', 'img', 'cat_id')->orderBy('id', 'desc')
                ->orWhere("name", "like", "%$keyword%")
                ->orWhere("desc", "like", "%$keyword%")
                ->orWhere("author", "like", "%$keyword%")
                ->paginate(12);

        return BookResource::collection($books);
    }

    /************************************************************************/

    // function store new book
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'author' => 'required|string|min:5|max:100',
            'desc' => 'required|string|min:75|max:65530',
            'cat_id' => 'required|integer|exists:cats,id',
            'img' => 'required|image|mimes:jpg,jpeg,png,jfif|max:1024'
        ]);

        if($validator->fails()) {
            $message = ["validation-errors" => $validator->errors()];
            return response()->json($message);
        }

        $path = Storage::putFile("books", $request->file("img"));

        // read data
        $name = $request->name;
        $author = $request->author;
        $cat_id = $request->cat_id;
        $desc = $request->desc;

        Book::create([
            'name' => $name,
            'author' => $author,
            'desc' => $desc,
            'cat_id' => $cat_id,
            'img' => $path
        ]);

        $message = ["success" => "book added successfully"];
        return response()->json($message);
    }

    /************************************************************************/

    // function update exist book
    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'author' => 'required|string|min:5|max:100',
            'desc' => 'required|string|min:75|max:65530',
            'cat_id' => 'required|integer|exists:cats,id',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,jfif|max:1024'
        ]);

        if($validator->fails()) {
            $message = ["validation-errors" => $validator->errors()];
            return response()->json($message);
        }
        
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
        $cat_id = $request->cat_id;

        $book->update([
            'name' => $name,
            'author' => $author,
            'desc' => $desc,
            'cat_id' => $cat_id,
            'img' => $path
        ]);

        $message = ["success" => "book updated successfully"];
        return response()->json($message);
    }

    /************************************************************************/

    // function delet exist book
    public function delete($id) {
        $book = Book::findOrFail($id);
        Storage::delete($book->img);
        $book->delete();

        $message = ["success" => "book deleted successfully"];
        return response()->json($message);
    } 
}
