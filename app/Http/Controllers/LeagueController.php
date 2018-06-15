<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LeagueController extends Controller{

    private $url = "https://euw1.api.riotgames.com";

    private $api_key = 'api_key=RGAPI-d3dcbe47-86d1-4b5b-bff5-b29b82cf2750';

    private $client;

    private $param;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->client = new \GuzzleHttp\Client();
    }

    /* Récupère le compte avec le nom */
    public function getAccount($summonerName){

        
        $res = $this->client->request('GET', 
            $this->url.'/lol/summoner/v3/summoners/by-name/'
            .$summonerName.
            '?'.
            $this->api_key
        );
        $contents = $res->getBody()->getContents();
        $contents = json_decode($contents);

        $matches = $this->getMatches($contents->accountId);

        print_r($matches);        
    }

    /* Récupère les games avec l'id de summoner */
    public function getMatches($accountID, $limit = 2){

        $this->param = "?endIndex=";

        $res = $this->client->request('GET', 
            $this->url.'/lol/match/v3/matchlists/by-account/'.
            $accountID.
            $this->param.
            '&'.
            $this->api_key
        );
        $contents = $res->getBody()->getContents();
        $contents = json_decode($contents);

        foreach($contents->matches as $game){
            $game->champion = $this->getChampion($game->champion);
            $game->image = $this->getImage($game->champion);
        }

        return $contents;
    }

    /* Récupère les champions avec l'id */
    public function getChampion($championId){

        $path = storage_path() . "/json/champs.json"; // ie: /var/www/laravel/app/storage/json/filename.json

        $json = json_decode(file_get_contents($path), true);

        foreach($json['data'] as $champion){
                
            if($champion['key'] == $championId){
                return $champion['name'];
            }
        }
    }

    public function getImage($championId){

        $path = storage_path() . "/json/champs.json"; // ie: /var/www/laravel/app/storage/json/filename.json

        $json = json_decode(file_get_contents($path), true);

        foreach($json['data'] as $champion){
                
            if($champion['key'] == $championId){
                return $champion['image'];
            }
        }
    }
}
