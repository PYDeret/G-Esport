<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use DB;


class EquipeController extends Controller
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
    public function create(Request $request){

        $user = Auth::user();

        $joueurs = $request->input('team');
        $nom = $request->input('nom');
        $desc = $request->input('desc');
        $slug = str_replace(" ", "_", $nom);
        $slug = str_replace("&", "et", $slug);
        $slug = str_replace("é", "e", $slug);
        $slug = str_replace("è", "e", $slug);
        $slug = str_replace("à", "a", $slug);
        $slug = str_replace("ê", "e", $slug);
        $slug = str_replace("â", "a", $slug);
        $slug = str_replace("ù", "u", $slug);

        $tim = DB::table('equipes')->insertGetId(
            ['libelle' => $nom,
             'description' => $desc,
             'slug' => $slug,
             'userId' => $user->id,
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s'),
             ]
        );

        foreach($joueurs as $unJoueur){
            
            DB::table('equipes_users')->insert(
                ['equipe_id' => $tim,
                 'user_id' => $unJoueur
                ]
            );
        }
    }
}
