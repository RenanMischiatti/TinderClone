<?php

namespace App\Http\Controllers;

use App\Models\infoUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::Has('info')
        ->with('info', 'foto')
        ->where('id', '!=', Auth::user()->id)
        ->get();

        


        return view('dashboard', compact('users'));
    }
}
