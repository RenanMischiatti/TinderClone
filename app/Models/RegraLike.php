<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegraLike extends Model
{
    use HasFactory;

    protected $table = 'regra_like';

    protected $fillable = ['user_like', 'user_liked'];
}
