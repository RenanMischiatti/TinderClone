<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagens extends Model
{
    use HasFactory;

    protected $table = 'mensagens_match';

    protected $fillable = ['match_id', 'user_id', 'mensagem'];
}
