<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    use HasFactory;

    protected $table = 'match';

    protected $fillable = ['user_one', 'user_two'];

    public function userMatched()
    {
        return $this->belongsTo(User::class, 'user_two', 'id');
    }
}
