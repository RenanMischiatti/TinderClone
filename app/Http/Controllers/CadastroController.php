<?php

namespace App\Http\Controllers;

use App\Models\infoUser;
use App\Models\User;
use App\Models\userFotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CadastroController extends Controller
{

    protected $request;
    protected $estados;

    public function __construct(Request $request) {
        if(env('APP_ENV') != 'local') {

            $this->estados = json_decode(
                Http::get(
                    'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
                    ['order_by' => 'nome']
                    )->body()
                );
        } else {
            $this->estados = ['São paulo'];
        }
        $this->request = $request;
    }
    
    public function cadastroIndex()
    {
        $estados = $this->estados;
        $user = $this->request->user();
        return view('profile.partials.cadastro', compact(['estados', 'user']));
    }

    public function cadastroCreate()
    {
        $validator = Validator::make($this->request->all(), [
            'name' => 'required',
            'estado' => 'required',
            'idade' => 'required',
            'imagem' => 'required|min:100',
        ], [
            'name.required' => 'O nome é necessário',
            'estado.required' => 'O estado é necessário',
            'idade.required' => 'Idade é necessario',
            'imagem.min' => 'Sua foto é necessária'
        ]);

        if ($validator->passes()) {

            DB::beginTransaction();

            try {

                User::where('id', Auth::user()->id)->update(['cadastrado' => 1]);

                infoUser::create([
                    'user_id' => Auth::user()->id,
                    'nome' => $this->request->name,
                    'data_nascimento' => $this->request->idade,
                    'biografia' => isset($this->request->biografia) ? $this->request->biografia : '',
                    'estado' => $this->request->estado
                ]);

                $imagem_array_1 = explode(';', $this->request->imagem);
                $imagem_array_2 = explode(',', $imagem_array_1[1]);
                $imagem = base64_decode($imagem_array_2[1]);
                $nomeImagem = md5(Auth::user()->id.'-'.date('d-m-y')).'.png';
        
                File::put('storage/foto_perfil/'.$nomeImagem, $imagem);

                userFotos::create([
                    'user_id' => Auth::user()->id,
                    'foto_caminho' => 'foto_perfil/'.$nomeImagem
                ]);

                DB::commit();
                return route('dashboard');
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }

        } 
        else {
            abort(405, $validator->errors()->first());
        }
    }
}
