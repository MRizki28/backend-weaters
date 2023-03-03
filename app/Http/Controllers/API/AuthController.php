<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'username' => 'required|unique:user',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'check your validation',
                'errors' => $validator->errors()
            ],Response::HTTP_NOT_ACCEPTABLE);
        }

        $validator = $validator->validated();
        $validator['password'] = Hash::make($validator['password']);

        try {
            $user = User::create($validator);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed',
                'errors' => $th->getMessage(),
            ]);
        }

        return response()->json([
            'message' => 'success create user',
            'data' => $user
        ],Response::HTTP_OK);
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'min:5', 'max:15'],
            'password' => ['required', 'min:5', 'max:15'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/cuaca');
        }
 
        return back()->with('error', 'Username atau password tidak ditemukan');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/cms/login')->with('status', 'Anda telah berhasil logout');
    }
}
