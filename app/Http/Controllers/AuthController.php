<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth;
    protected $redirectTo = '/';
    protected $loginTo    = '/admin/';

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        if (\Auth::attempt($credentials,$request->has('remember')))
        {
            return redirect()->to($this->loginTo);
        }

        return redirect()->back()->withInput()->with('error', 'Email ou senha inválidos');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->to($this->redirectTo);
    }
}
