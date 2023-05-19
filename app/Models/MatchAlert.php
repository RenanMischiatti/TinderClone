<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchAlert extends Model
{
    use HasFactory;

    
    protected $table = 'match_notification';

    protected $fillable = ['match_id', 'user_alerted', 'visualized'];
}
