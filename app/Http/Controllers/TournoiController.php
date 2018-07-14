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

        $tournoi = $request->input('id_tournoi');

        $joueurs = $request->input('equipe');

        $slug = $request->input('slug');

        DB::table('tournois_equipes')->insert(
            ['TournoiId' => $tournoi,
             'EquipeId' => $joueurs[0],
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        $tournoi = \App\Tournoi::where('slug', '=', $slug)->firstOrFail();
        $tournoi_equipe = \App\TournoisEquipe::all();
        $equipes = \App\Equipe::all();
        $users = \App\User::where('id', '!=', Auth::id())->get();
        $equipes_users = \App\EquipesUsers::all();

        $checker = $this->getUsr($tournoi);

        return view('tournoi', compact('tournoi', 'equipes' ,'tournoi_equipe', 'users', 'equipes_users', 'slug', 'checker') );
    }

    public function getUsr($idTournoi){

        $value = "true";

        $lstId = array();

        $users = DB::table('equipes_users')->select('equipes_users.user_id')
                ->join("tournois_equipes", "tournois_equipes.EquipeId", "=", "equipes_users.equipe_id", 'right')
                ->where('tournois_equipes.TournoiId', '=', $idTournoi->id)->get();

        

        if(!empty($users)){

            foreach($users as $user){
                array_push($lstId, $user->user_id);
            }

            $user = Auth::user();

            if(!empty($user) && in_array($user->id, $lstId)){
                $value = "false";
            }
        }

        //die(print_r($lstId));

        return $value;
    }
}
