<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cat;

class CatController extends Controller
{
    public function index() {
        $cats = Cat::paginate(10);

        return view('cats.index', [
            "cats" => $cats
        ]);
    }

    /******************************************************************/

    public function show($id) {
        $cat = Cat::findOrFail($id);

        $books = Book::select('id', 'name', 'desc', 'img')
                      ->where('books.cat_id', $id)
                      ->orderBy('books.id', 'desc')
                      ->paginate(12);
        
        return view('cats.show', [
            'cat' => $cat,
            'books' => $books
        ]);
    }

    /******************************************************************/

    public function create() {
        return view('cats.create');
    }

    /******************************************************************/

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:50|unique:cats,name'
        ]);

        // read data
        $name = $request->name;

        Cat::create([
            'name' => $name
        ]);

        return redirect(url("/cats"));
    }

    /******************************************************************/

    public function edit($id) {
        $cat = Cat::findOrFail($id);

        return view('cats.edit', [
            'cat' => $cat
        ]);
    }

    /******************************************************************/

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:50|unique:cats,name'
        ]);
        
        $cat = Cat::findOrFail($id);

        $name = $request->name;

        $cat->update([
            'name' => $name
        ]);

        return redirect(url("/cats/show/{$id}"));
    }

    /******************************************************************/

    public function delete($id) {
        Cat::findOrFail($id)->delete();

        return redirect(url("/cats"));
    }
}
