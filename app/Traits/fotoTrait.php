<?php

namespace App\Traits;

use App\Models\userFotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait fotoTrait {

    public function fotoUser()
    {
        $user = Auth::user();
        return view('ajax.fotos.divFotos', compact('user'))->render();
    }

    public function adicionarFoto(Request $request)
    {
        DB::beginTransaction();
        try {

            $imagem_array_1 = explode(';', $request->foto);
            $imagem_array_2 = explode(',', $imagem_array_1[1]);
            $imagem = base64_decode($imagem_array_2[1]);
            $nomeImagem = md5(Auth::user()->id.'-'.date('Y-m-d H:i:s')).'.png';
    
            File::put('storage/foto_perfil/'.$nomeImagem, $imagem);

            userFotos::create([
                'user_id' => Auth::user()->id,
                'foto_caminho' => 'foto_perfil/'.$nomeImagem,
            ]);

            DB::commit();

            return [
                'html' => $this->fotoUser(),
                'sucesso' => true,
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
    }
    public function excluirFoto(Request $request)
    {
        if(userFotos::where('user_id', Auth::user()->id)->count() == 1){
            abort(405, 'Não pode excluir sua única foto.');
        }
        $foto = userFotos::where('id', $request->foto_id);
        $caminho = $foto->first()->foto_caminho;
        if($foto->delete()) {
            File::delete(public_path('storage/'.$caminho));
            return [
                'html' => $this->fotoUser(),
                'sucesso' => true,
            ];
        } else {
            abort(405, 'Erro ao Excluir Foto');
        }

    }
}