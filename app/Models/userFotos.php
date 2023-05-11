<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userFotos extends Model
{
    use HasFactory;

    protected $table = 'users_photo';

    protected $fillable = ['user_id', 'foto_caminho'];


    public function getFotCaminhoAttribute()
    {
        if(filter_var($this->foto_caminho, FILTER_VALIDATE_URL) !== false) {
            return $this->foto_caminho;
        } else {
            return asset('storage/'.$this->foto_caminho);
        }
    }
}
