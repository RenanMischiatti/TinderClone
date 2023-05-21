<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    use HasFactory;

    protected $table = 'match';

    protected $fillable = ['user_one', 'user_two'];

    public function userOne()
    {
        return $this->belongsTo(User::class, 'user_one', 'id');
    }

    public function userTwo()
    {
        return $this->belongsTo(User::class, 'user_two', 'id');
    }

    public function user()
    {
        return 'relacao entre user_one e user_two, onde o valor dessa coluna não seja igual ao auth()->user()->id, ou seja, acessar a relação do outro usuario que dei match';
    }
}
