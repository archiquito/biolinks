<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = $request->registerCreate();

        if (!$user) {
            // Registration successful
            return redirect()->back()->with('message', 'Falha ao registrar usuário.')->withInput();
        }
         return redirect()->route('home')->with('success', 'Usuário registrado com sucesso!');
        // Registration failed
       
    }
}

