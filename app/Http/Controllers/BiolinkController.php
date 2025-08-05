<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BiolinkController extends Controller
{
    public function __invoke(User $user)
    {
        $links = $user->links()->orderBy('position')->get();
        if ($user) {
            return view('biolinks', compact('user', 'links'));
        }
        return redirect()->back()->with('message', 'Usuário ou senha inválidos!')->withInput();
    }
}
