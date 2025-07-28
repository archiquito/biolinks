<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function showLinkForm()
    {
        return view('link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request, Link $link)
    {
        /** @var User $user */
        $user = Auth::user();
        $link->createLink($request->validated(), $user->id);
        return redirect()->route('link.create')->with('message', 'Link criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {

        $link->update($request->updateLink());

        return redirect()->route('dashboard')->with('message', 'Link atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('dashboard')->with('message', 'Link excluído com sucesso!');
    }
    /**
     * Update the position of the specified resource.
     */
    public function updatePosition(UpdateLinkRequest $request, Link $link)
    {
        /** @var User $user */
        $user = Auth::user();

        $position = $request->position;

        if ($position === 'up') {

            $link->moveUp();
        } elseif ($position === 'down') {

            $link->moveDown();
        }

        return redirect()->route('dashboard')->with('message', 'Posição do link atualizada com sucesso!');
    }
}
