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
use App\Traits\fotoTrait;

class ProfileController extends Controller
{
    use fotoTrait;

    public $request;
    protected $estados;

    public function __construct(Request $request) {

        if(env('APP_ENV') == 'local') {

            $this->estados = json_decode(
                Http::get(
                    'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
                    ['order_by' => 'nome']
                    )->body()
                );
        } else {
            $this->estados = collect(['nome' => 'São paulo']);
        }
        $this->request = $request;
    }

    public function perfil(Request $request)
    {    
        $estados = $this->estados;

        return view('profile.edit', [
            'user' => $request->user(),
            'divUser' => $this->fotoUser(),
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
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        infoUser::where('user_id', $request->user()->id)->delete();
        $fotos = userFotos::where('user_id', $request->user()->id)->get();

        if(count($fotos)) {
            foreach($fotos as $foto) {
                $fotoDB = userFotos::where('id', $foto->id);
            
                if($fotoDB->delete()) {
                    File::delete(public_path('storage/'.$foto->foto_caminho));
                }
            }
        }


        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
