<?php

namespace App\Http\Controllers;

use App\Models\Matchs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{

    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index()
    {
        $matchs = Matchs::where(function($query) {
            $query->where('user_one', Auth()->user()->id)
                  ->orWhere('user_two', Auth()->user()->id);
        })
        ->with(['userOne', 'userTwo'])
        ->get()
        ->map(function ($match) {
            $match->userMatched = isset($match->userOne) ? $match->userOne : $match->userTwo;
            return $match;
        });

        return view('chat', compact('matchs'));
    }

    public function chat()
    {
        

        return 
    }
}
