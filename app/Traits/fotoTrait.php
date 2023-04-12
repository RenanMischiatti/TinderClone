<?php

namespace App\Traits;

use App\Models\userFotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

trait fotoTrait {

    public function adicionarFoto(Request $request)
    {
        $ultimaFoto = userFotos::where('user_id', Auth::user()->id)->orderBy('ordem_fotos', 'DESC')->first();
        $posição = isset($ultimaFoto) ? $ultimaFoto->ordem_fotos + 1 : 1;
        
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
                'ordem_fotos' => $posição
            ]);

            DB::commit();

            return 1;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    public function excluirFoto(Request $request)
    {

    }
    public function editarFoto(Request $request)
    {
        
    }
}