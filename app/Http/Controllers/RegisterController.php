<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title'=> 'Register'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        // pake bcrypt
        // $validatedData['password'] = bcrypt($validatedData['password']);
        // pake hash
        $validatedData['password'] = Hash::make($validatedData['password']);
        // validate dari variable di atas (store)
        User::create($validatedData);
        // setelah validate di retrun ke halaman login
        return redirect ('login')->with('success', 'Berhasil Registrasi');
    }
}
