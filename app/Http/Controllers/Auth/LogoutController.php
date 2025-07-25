<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::logout();
        session()->invalidate();

        return redirect('/login');
    }
}
