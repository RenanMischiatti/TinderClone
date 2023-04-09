<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoUser extends Model
{
    use HasFactory;

    protected $table = 'users_info';

    protected $fillable = ['user_id', 'nome', 'data_nascimento', 'biografia', 'estado'];
}
