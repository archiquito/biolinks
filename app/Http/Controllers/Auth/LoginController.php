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
            // Redirect to the intended page or a default page
            return redirect()->to($request->redirect_to ?? route('home'));
        }
        return redirect()->back()->with('message', 'Usuário ou senha inválidos!')->withInput();
    }
}
