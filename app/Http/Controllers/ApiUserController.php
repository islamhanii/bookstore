<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ApiUserController extends Controller
{
    public function index() {
        $users = User::select('id', 'name', 'email', 'role', 'created_at', 'updated_at')->paginate(10);
        return UserResource::collection($users);
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'role' => 'required|in:user,admin,manager'
        ]);

        if($validator->fails()) {
            return Response::json(["validation-errors" => $validator->errors()]);
        }

        User::findOrFail($id)->update([
            'role' => $request->role
        ]);

        return Response::json(["message" => "role updated successfully"]);
    }

    public function delete($id) {
        User::findOrFail($id)->delete();

        return Response::json(["message" => "user deleted successfully"]);
    }
}
