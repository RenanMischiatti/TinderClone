<?php

namespace App\Http\Controllers;

use App\Models\Matchs;
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
        ->when()
        ->with('user')
        ->get();

        dd($matchs);

        return view('chat');
    }
}
