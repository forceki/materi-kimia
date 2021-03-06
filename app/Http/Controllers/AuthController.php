<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember))
        {
            return back()->with('status', 'Invalid login details');
        }

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}


