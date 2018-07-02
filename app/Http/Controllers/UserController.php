<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Quotation;

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

    
}