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
             'EtapeId' => 1,
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        $tournoi = \App\Tournoi::where('slug', '=', $slug)->firstOrFail();
        $tournoi_equipe = \App\TournoisEquipe::all();
        $equipes = \App\Equipe::all();
        $users = \App\User::where('id', '!=', Auth::id())->get();
        $equipes_users = \App\EquipesUsers::all();
        $mesTeam = \App\EquipesUsers::where('user_id', '=', Auth::id())->get();

        $checker = $this->getUsr($tournoi);

        $pos1 = $this->getPositionTeam1($tournoi);

        $pos2 = $this->getPositionTeam2($tournoi);

        $pos3 = $this->getPositionTeam3($tournoi);

        $pos4 = $this->getPositionTeam4($tournoi);

        return view('tournoi', compact('tournoi', 'equipes' ,'tournoi_equipe', 'users', 'equipes_users', 'slug', 'checker', 'pos1', 'pos2', 'pos3', 'pos4', 'mesTeam') );
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

    public function getPositionTeam1($idTournoi){


        $teams = DB::table('equipes')->select('equipes.libelle', 'equipes.id', 'equipes.slug')
                ->join("tournois_equipes", "tournois_equipes.EquipeId", "=", "equipes.id", 'inner')
                ->where([['tournois_equipes.TournoiId', '=', $idTournoi->id],
                        ['tournois_equipes.EtapeId','=', 1]])->get();

        return $teams;

    }

    public function getPositionTeam2($idTournoi){


        $teams = DB::table('equipes')->select('equipes.libelle', 'equipes.id', 'equipes.slug')
                ->join("tournois_equipes", "tournois_equipes.EquipeId", "=", "equipes.id", 'inner')
                ->where([['tournois_equipes.TournoiId', '=', $idTournoi->id],
                        ['tournois_equipes.EtapeId','=', 2]])->get();

        return $teams;

    }

    public function getPositionTeam3($idTournoi){


        $teams = DB::table('equipes')->select('equipes.libelle', 'equipes.id', 'equipes.slug')
                ->join("tournois_equipes", "tournois_equipes.EquipeId", "=", "equipes.id", 'inner')
                ->where([['tournois_equipes.TournoiId', '=', $idTournoi->id],
                        ['tournois_equipes.EtapeId','=', 3]])->get();

        return $teams;

    }

    public function getPositionTeam4($idTournoi){


        $teams = DB::table('equipes')->select('equipes.libelle', 'equipes.id', 'equipes.slug')
                ->join("tournois_equipes", "tournois_equipes.EquipeId", "=", "equipes.id", 'inner')
                ->where([['tournois_equipes.TournoiId', '=', $idTournoi->id],
                        ['tournois_equipes.EtapeId','=', 4]])->get();

        return $teams;

    }


    public function avance(Request $request){
        
        $monEquipe = $request->input('myteam');

        $autreEquipe = $request->input("otherteam");

        $numTournoi = $request->input("numTournoi");

        $slug = $request->input('slug');

        $myTeamQuery = DB::table('tournois_equipes')->select('EtapeId', 'id')
                ->where([['TournoiId', '=', $numTournoi],
                        ['EquipeId','=', $monEquipe]])->first();

        $otherTeamQuery = DB::table('tournois_equipes')->select('EtapeId', 'id')
                ->where([['TournoiId', '=', $numTournoi],
                        ['EquipeId','=', $autreEquipe]])->first();

        $tournoi = \App\Tournoi::where('slug', '=', $slug)->firstOrFail();
        $tournoi_equipe = \App\TournoisEquipe::all();
        $equipes = \App\Equipe::all();
        $users = \App\User::where('id', '!=', Auth::id())->get();
        $equipes_users = \App\EquipesUsers::all();
        $mesTeam = \App\EquipesUsers::where('user_id', '=', Auth::id())->get();

        $checker = $this->getUsr($tournoi);

        $pos1 = $this->getPositionTeam1($tournoi);
        $pos2 = $this->getPositionTeam2($tournoi);
        $pos3 = $this->getPositionTeam3($tournoi);
        $pos4 = $this->getPositionTeam4($tournoi);

        if(count($pos1) < 3){
            DB::table('tournois_equipes')
            ->where('id', $myTeamQuery->id)
            ->update(['EtapeId' => 5]); 
        }
        else{
            DB::table('tournois_equipes')
            ->where('id', $myTeamQuery->id)
            ->update(['EtapeId' => $myTeamQuery->EtapeId + 1]); 
        }

        $idcheker = $myTeamQuery->EtapeId + 1;

        if($idcheker == 5){
            DB::table('tournois')
            ->where('id', $numTournoi)
            ->update(['EquipeWin_id' => $myTeamQuery->id]); 
        }

        return view('tournoi', compact('tournoi', 'equipes' ,'tournoi_equipe', 'users', 'equipes_users', 'slug', 'checker', 'pos1', 'pos2', 'pos3', 'pos4', 'mesTeam') );

    }
}
