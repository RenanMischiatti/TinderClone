<?php

namespace App\Http\Controllers;

use App\Models\infoUser;
use App\Models\RegraLike;
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
        $users = User::has('info')
        ->with('info', 'foto')
        ->where('id', '!=', auth()->user()->id)
        ->whereNotIn('id', function ($query) {
            $query->select('user_liked')
                ->from('regra_like')
                ->where('user_like', auth()->user()->id);
        })
        ->get();

        return view('dashboard', compact('users'));
    }

    public function likeDislike()
    {
        $curtido = RegraLike::where('user_liked', Auth()->user()->id)
        ->where('user_like', $this->request->user)
        ->where('liked_or_not', 1)
        ->exists();

        if($curtido) {
            return $this->modalAviso();
        }

        RegraLike::create([
            'user_like' => Auth()->user()->id,
            'user_liked' => $this->request->user_id,
            'liked_or_not' => isset($this->request->acao)
        ]);



        return $this->request->acao;
    }

}
