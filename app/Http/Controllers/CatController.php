<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;

class CatController extends Controller
{
    public function index() {
        $cats = Cat::paginate(12);

        return view('cats.index', [
            "cats" => $cats
        ]);
    }

    /******************************************************************/

    public function create() {
        return view('cats.create');
    }

    /******************************************************************/

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:50'
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
            'name' => 'required|string|min:3|max:50'
        ]);
        
        $cat = Cat::findOrFail($id);

        $name = $request->name;

        $cat->update([
            'name' => $name
        ]);

        return redirect(url("/cats"));
    }

    /******************************************************************/

    public function delete($id) {
        Cat::findOrFail($id)->delete();

        return redirect(url("/cats"));
    }
}