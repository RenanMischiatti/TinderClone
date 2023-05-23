<?php

namespace App\Http\Controllers;

use App\Models\infoUser;
use App\Models\Matchs;
use App\Models\RegraLike;
use App\Models\User;
use App\Traits\ModalTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    use ModalTrait;

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
        RegraLike::create([
            'user_like' => Auth()->user()->id,
            'user_liked' => $this->request->user_id,
            'liked_or_not' => isset($this->request->acao)
        ]);

        $curtido = RegraLike::where('user_like', $this->request->user_id)
        ->where('user_liked', Auth()->user()->id)
        ->where('liked_or_not', 1)
        ->exists();

        if($curtido && isset($this->request->acao)){
            $userCurtido = User::where('id', $this->request->user_id)->firstorFail();

            Matchs::create([
                'user_one' => Auth()->user()->id,
                'user_two' => $this->request->user_id
            ]);
            Matchs::create([
                'user_one' => $this->request->user_id,
                'user_two' => Auth()->user()->id
            ]);

            return $this->openModal(view('ajax.home.avisoMatch', compact('userCurtido'))->render(), [
                'titulo' => 'Você deu Match com alguem...',
                'classesTitulo' => 'w-100 text-center',
                'closeButton' => false,
                'classesDialog' => 'modal-md modal-dialog-centered',
                'footer' => false
            ]);
        } 

        return false;
    }

}
