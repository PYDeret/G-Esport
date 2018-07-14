<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use DB;


class TournoiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function join(Request $request){

        $user = Auth::user();

        $joueurs = $request->input('id_tournoi');

        


        $equipes = \App\Equipe::all();
        $participants = \App\Participant::all();
        $users = \App\User::where('id', '!=', Auth::id())->get();
        $equipes_users = \App\EquipesUsers::all();
        return view('equipes', compact('equipes','participants','users','equipes_users'));
    }
}
