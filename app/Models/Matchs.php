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
        return $this->belongsTo(User::class, 'user_one', 'id')
                    ->where('id', '!=', Auth()->user()->id)
                    ->with('info', 'foto');
    }
    public function userTwo()
    {
        return $this->belongsTo(User::class, 'user_two', 'id')
                    ->where('id', '!=', Auth()->user()->id)
                    ->with('info', 'foto');
    }

    public function getUserMatchedAttribute()
    {
        return isset($this->userOne) ? $this->userOne : $this->userTwo;
    }

    public function mensagens()
    {
        return $this->hasMany(Mensagens::class, 'id', 'match_id');
    }
}
