<?php

namespace App\Http\Controllers;

use App\Models\Matchs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index()
    {
        $matchs = Matchs::where(function($query) {
            $query->where('user_one', Auth()->user()->id)
                  ->orWhere('user_two', Auth()->user()->id);
        })
        ->with(['user_one', 'user_two'])
        ->get();

        dd($matchs);
        return view('chat', compact('matchs'));
    }
}
