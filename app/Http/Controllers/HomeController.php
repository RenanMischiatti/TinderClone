<?php

namespace App\Http\Controllers;

use App\Models\infoUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{

    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * 
     * @return Illuminate\View\View
     */
    public function index(): View 
    {
        $users = User::Has('info')
        ->with('info', 'foto')
        ->where('id', '!=', Auth::user()->id)
        ->get();

        return view('dashboard', compact('users'));
    }
}
