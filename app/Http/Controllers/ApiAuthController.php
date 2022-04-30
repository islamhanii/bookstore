<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email|min:10|max:255',
            'password' => 'required|string|min:8|max:255'
        ]);

        if($validator->fails()) {
            return Response::json([
                'validation-errors' => $validator->errors()
            ]);
        }

        //create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken("auth-token");
        return Response::json([
            'token' => $token->plainTextToken
        ]);
    }

    /*****************************************************************************/

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:10|max:255',
            'password' => 'required|string|min:8|max:255'
        ]);

        if($validator->fails()) {
            return Response::json([
                'validation-errors' => $validator->errors()
            ]);
        }

        $creditionals = [
            'email' =>  $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($creditionals)) {
            $user = User::where('email', $request->email)->first();

            $token = $user->createToken("auth-token");
            return Response::json([
                'token' => $token->plainTextToken
            ]);
        }

        return Response::json([
            'validation-errors' => 'invalid email or password'
        ]);
    }

    /*****************************************************************************/

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return Response::json([
            'message' => 'you logged out successfully'
        ]);
    }
}
