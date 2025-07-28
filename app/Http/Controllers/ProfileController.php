<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'user' => Auth::user(),
        ]);
    }
    public function update(Request $request, User $user)
    {
        $user->updateUser($request->all());
        return redirect()->route('profile')->with('message', 'Perfil atualizado com sucesso!');
    }
}
