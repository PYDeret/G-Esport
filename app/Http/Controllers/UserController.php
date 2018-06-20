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

        $leagueData = app('App\Http\Controllers\LeagueController')->getAccount($lolAcc);

        return view('users.edit', compact('user', 'leagueData'));
    }

    public function profile(User $user)
    {   
        $user = Auth::user();

        $lolAcc = $this->getLolData($user->id);

        return view('users.profile', compact('user', 'lolAcc'));
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

    public function updateLeague()
    { 
        
        $this->validate(request(), [
            'lolLogin' => 'required'
        ]);

        $leagueData = \App\LeagueUser::updateOrCreate(['user' => request('idUsr')], ['name' => request('lolLogin')]);

        $leagueData->save();

        return back();
    }
}