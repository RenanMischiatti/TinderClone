<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public $estados;
    public $request;

    public function __construct(Request $request) {

        $this->estados = json_decode(
            Http::get(
                'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
                ['order_by' => 'nome']
            )->body()
        );

        $this->request = $request;
    }


    public function cadastro()
    {
        $estados = $this->estados;
        $user = $this->request->user();

        return view('profile.partials.cadastro', compact(['estados', 'user']));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {    
        $estados = $this->estados;
        
        return view('profile.edit', [
            'user' => $request->user(),
            'estados' => $estados
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
