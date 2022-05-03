<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        $users = User::select('id', 'name', 'email', 'role', 'created_at')->paginate(10);

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function edit($id) {
        $user = User::findOrFail($id);

        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update($id, Request $request) {
        $request->validate([
            'role' => 'required|in:user,admin,manager'
        ]);

        // read data
        $role = $request->role;

        User::findOrFail($id)->update([
            'role' => $role
        ]);

        return redirect(url('/users'));
    }

    public function delete($id) {
        User::findOrFail($id)->delete();
        DB::table('personal_access_tokens')->where('tokenable_id', '=', $id)->delete();

        return redirect(url("/users"));
    }
}
