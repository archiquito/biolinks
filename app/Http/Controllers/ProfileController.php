<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'user' => Auth::user(),
        ]);
    }
    public function update(ProfileRequest $request, User $user)
    {
        $data = $request->validated();
        $file = $request->file('photo');
        if ($file) {
            $fileOriginalName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $filename = pathinfo($fileOriginalName, PATHINFO_FILENAME). '_' . date('YmdHis') . '.' . $fileExtension;
            $file->storeAs('photos', $filename, 'public');
            $data['photo'] = $filename;
        }
        /** @var User $user */
        $user = Auth::user();
        $user->updateUser($data);
        return redirect()->route('profile.index')->with('message', 'Perfil atualizado com sucesso!');
    }
}
