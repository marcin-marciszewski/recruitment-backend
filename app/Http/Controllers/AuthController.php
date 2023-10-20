<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request): Response
    {

        $fiedls = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fiedls['name'],
            'email' => $fiedls['email'],
            'password' => bcrypt($fiedls['password'])
        ]);

        $token = $user->createToken('mytoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request): Response
    {

        $fiedls = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fiedls['email'])->first();

        if (!$user || !Hash::check($fiedls['password'], $user->password)) {
            return response(['message' => 'Bad credentials'], 201);
        }

        $token = $user->createToken('mytoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request): Response
    {
        auth()->user()->tokens()->delete();
        return response(['message' => 'Logged out'], 201);
    }
}
