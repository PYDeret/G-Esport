<?php

namespace App\Http\Controllers;

use App\Equipe;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Illuminate\Support\Facades\App;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function check($userName){

        $user = DB::table('users')->select('users.id','users.name as name_dude', 'about', 'league_users.name as league_name')
        ->join("league_users", "league_users.user", "=", "users.id", 'left')
        ->where('users.name', '=', $userName)->get();

        if(!empty($user[0]->league_name)){
            $leagueData = app('App\Http\Controllers\LeagueController')->getAccount($user[0]->league_name);
        }
        else{
            $leagueData = "";
        }

        return view('users.edit', compact('user', 'leagueData'));
        
    }

    public function getLolData($user){

        $lolAcc = DB::table('league_users')->where('user', '=', $user)
                    ->first();

        if(empty($lolAcc)){
            $lolAcc = "";
        }
        else{
           $lolAcc = $lolAcc->name; 
        }

        return $lolAcc;

    }

    public function edit(User $user)
    {   
        $user = Auth::user();

        $lolAcc = $this->getLolData($user->id);

        if(!empty($lolAcc)){
            $leagueData = app('App\Http\Controllers\LeagueController')->getAccount($lolAcc);
        }
        else{
            $leagueData = "";
        }

        return view('users.edit', compact('user', 'leagueData'));
    }

    public function profile(User $user)
    {   
        $user = Auth::user();

        $lolAcc = $this->getLolData($user->id);

        if(!empty($lolAcc)){
            $leagueData = app('App\Http\Controllers\LeagueController')->getAccount($lolAcc);
        }
        else{
            $leagueData = "";
        }

        return view('users.profile', compact('user', 'lolAcc', 'leagueData'));
    }

    public function update(User $user)
    { 
        $user = Auth::user();
        
        $this->validate(request(), [
            'passwd' => 'required|min:6|confirmed'
        ]);

        $user->password = bcrypt(request('passwd'));

        $user->save();

        return back();
    }

    public function updateAbout(User $user){
        $user = Auth::user();

        $user->about = request('aboutTxt');

        if(empty($user->about)){
            $user->about = "";
        }

        $user->save();

        return back();
    }

    public function updateAuth(User $user){
        $user = Auth::user();

        $user->doubleAuth = request('check');
        $user->numTel = request('numTel');

        if($user->doubleAuth == "off"){
            $user->doubleAuth = "";
            $user->numTel = "";
        }

        $user->save();

        return back();
    }

    public function updateLeague()
    { 
        
        if(empty(request('lolLogin'))){
            $lolLogin = "";
        }
        else{
            $lolLogin = request('lolLogin');
        }

        $leagueData = \App\LeagueUser::updateOrCreate(['user' => request('idUsr')], ['name' => $lolLogin]);

        $leagueData->save();

        return back();
    }


    public function mesEquipes(User $user){

        $user = Auth::user();


        $mesEquipes = new \stdClass();


        $mesEquipes->myteams = $this->getMyteams($user->id);


        return view('users.gestion_equipes', compact('mesEquipes','user'));

    }


    public function DeleteEquipe(Request $request){

        $id = $request->input('id');


        DB::table('equipes_users')->where('equipes_users.equipe_id', '=', $id)->delete();

        DB::table('equipes')->where('equipes.id', '=', $id)->delete();

        $user = Auth::user();


        $mesEquipes = new \stdClass();


        $mesEquipes->myteams = $this->getMyteams($user->id);


        return view('users.gestion_equipes', compact('mesEquipes','user'));


    }

    

    public function statistiques(User $user){

        $user = Auth::user();


        $stats = new \stdClass();

        $stats->tournoisplay = $this->getTournois($user->id);
       // $stats->createteam = $this->getcreateTeam($user->id);
        $stats->inteam = $this->getInteam($user->id);
        $stats->datedinscription = $this->getdatedinscription($user->id);

        return view('users.statistiques', compact('stats','user'));

    }



    public function getMyteams($id){

        $myteams = DB::table('equipes')->select('equipes.id','equipes.libelle','equipes.description','equipes.userId','equipes.created_at','equipes.updated_at')
            ->join("equipes_users", "equipes_users.equipe_id", "=", "equipes.id", 'left')
            ->join("users", "users.id", "=", "equipes_users.user_id", 'left')
            ->where('equipes.userId', '=', $id)
            ->distinct()
            ->get();

        return $myteams;

    }


    public function getTournois($id){

        $tournois = DB::table('tournois')->select('tournois.id','tournois.libelle','tournois.description','tournois.image', 'tournois.EquipeWin_id','tournois.DateDebut','tournois.DateFin','tournois.HeureDebut','tournois.HeureFin','tournois.created_at','tournois.updated_at')
            ->join("tournois_equipes", "tournois_equipes.TournoiId", "=", "tournois.id", 'left')
            ->join("equipes_users", "equipes_users.equipe_id", "=", "tournois_equipes.EquipeId", 'left')
            ->join("users", "users.id", "=", "equipes_users.user_id", 'left')
            ->where('users.id', '=', $id)
            ->distinct()
            ->get();


        return $tournois;

    }



  /*  public function getcreateTeam($id){

        $equipecreate = DB::table('equipes')->select('equipes.id','equipes.libelle','equipes.description','equipes.userId','equipes.created_at','equipes.updated_at')
            ->where('equipes.userId', '=', $id)
            ->get();

        return $equipecreate;
    }*/
    public function getInteam($id){

        $equipes = DB::table('equipes')->select('equipes.id','equipes.libelle','equipes.description','equipes.userId','equipes.created_at','equipes.updated_at')
            ->join("equipes_users", "equipes_users.equipe_id", "=", "equipes.id", 'left')
            ->join("users", "users.id", "=", "equipes_users.user_id", 'left')
            ->where('users.id', '=', $id)
            ->get();


        return $equipes;

    }

    public function getdatedinscription($id){


        $user = DB::table('users')->select('users.id','users.created_at')
            ->where('users.id', '=', $id)
            ->first();

        return $user;
    }




    public function doubleauth(User $user){
        return view('test');
    }

    public function doubleauthCheck(User $user){
        
        if(request('token') != request('sms')){
            $error = true;
            return view('test', compact('error'));
        }
        else{
            return redirect('/home');
        }
    }

    
}