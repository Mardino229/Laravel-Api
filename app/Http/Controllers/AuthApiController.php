<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthApiController extends Controller
{
    public function create(Request $request) {

        $request->validate([
            "name" => "required|min:5|string",
            "email" => "required|email|unique:users",
            "password" => "required|min:8"
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $user = User::find(Auth::user()->id);

            $token = $user->createToken($request->email);

            return response()->json($token->plainTextToken);

        }

        return response()->json(["message"=>"Bad Credentials"]);

    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $user = User::find($request->id);

//        $user->tokens()->delete();

        $user->tokens()->delete();

        return response()->json();
    }
}
