<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakeLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(MakeLoginRequest $request)
    {
        $user = $request->attempt();

        if ($user) {
            Auth::login($user);
            return redirect()->to($request->redirect_to ?? route('dashboard'));
        }
        return redirect()->back()->with('message', 'Usuário ou senha inválidos!')->withInput();
    }
}
