<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoUser extends Model
{
    use HasFactory;

    protected $table = 'users_info';

    protected $fillable = ['user_id', 'nome', 'data_nascimento', 'biografia', 'estado'];


    public function getIdadeAttribute()
    {
        $data_nascimento = new DateTime($this->attributes['data_nascimento']);
        $hoje = new DateTime();
        $idade = $hoje->diff($data_nascimento)->y;
        return $idade;
    }

    public function getPrimeirosNomesAttribute()
    {
        $nomes = explode(' ', $this->attributes['nome']);

        if (count($nomes) >= 2) {
            return $nomes[0] . ' ' . $nomes[1];
        } else {
            return $this->nome;
        }
    }
}
