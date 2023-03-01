<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt(['email' =>$request->email, 'password' => $request->password])) {
            return redirect()->back();
        }

        return redirect()->route('home');

    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'nik' => 'required|min:16|unique:users',
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'email' => 'required'
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'password_confirmation' => bcrypt($request->password_confirmation),
            'role' => 'user'
        ]);

        //user login
        auth()->loginUsingId($user->id);


        return redirect()->route('home');
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
