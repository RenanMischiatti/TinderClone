<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\infoUser;
use App\Models\User;
use App\Models\userFotos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public $request;
    protected $estados;

    public function __construct(Request $request) {
        $this->estados = json_decode(
            Http::get(
                'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
                ['order_by' => 'nome']
            )->body()
        );
        $this->request = $request;
    }

    public function perfil(Request $request)
    {    
        $estados = $this->estados;

        return view('profile.edit', [
            'user' => $request->user(),
            'estados' => $estados
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        infoUser::where('user_id', $request->user()->id)->update([
            'nome' => $request->name,
            'estado' => $request->estado,
            'data_nascimento' => $request->idade,
            'biografia' => $request->biografia
        ]);

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function Fotos(Request $request)
    {
        dd($request->all());
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
