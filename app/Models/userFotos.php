<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userFotos extends Model
{
    use HasFactory;

    protected $table = 'users_photo';

    protected $fillable = ['user_id', 'foto_caminho', 'ordem_fotos'];
}
