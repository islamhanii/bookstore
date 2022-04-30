<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Book;
use App\Http\Resources\CatResource;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Validator;

class ApiCatController extends Controller
{
    public function index() {
        $cats = Cat::paginate(10);

        return CatResource::collection($cats);
    }

    /******************************************************************/

    public function show($id) {
        $books = Book::where('books.cat_id', $id)
                      ->orderBy('books.id', 'desc')
                      ->paginate(12);
        
        return BookResource::collection($books);
    }

    /******************************************************************/

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50|unique:cats,name'
        ]);

        if($validator->fails()) {
            $message = ["validation-errors" => $validator->errors()];
            return response()->json($message);
        }
        // read data
        $name = $request->name;

        Cat::create([
            'name' => $name
        ]);

        $message = ["success" => "category created successfully"];
        return response()->json($message);
    }

    /******************************************************************/

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50|unique:cats,name'
        ]);

        if($validator->fails()) {
            $message = ["validation-errors" => $validator->errors()];
            return response()->json($message);
        }
        
        $cat = Cat::findOrFail($id);

        $name = $request->name;

        $cat->update([
            'name' => $name
        ]);

        $message = ["success" => "category updated successfully"];
        return response()->json($message);
    }

    /******************************************************************/

    public function delete($id) {
        Cat::findOrFail($id)->delete();

        $message = ["success" => "category deleted successfully"];
        return response()->json($message);
    }
}
