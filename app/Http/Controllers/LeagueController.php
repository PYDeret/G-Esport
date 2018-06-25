<?php
// Author : PY
// Project : G-Esport
namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LeagueController extends Controller{

    private $url = "https://euw1.api.riotgames.com";

    private $api_key = 'api_key=RGAPI-337d25b9-f4ec-46fe-8ace-222ef367dc9f';

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

    /* Gets the summoner's ID with the summoner's name on parameter */
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
        
        return $matches;
    }

    /* Gets games of the summoner in parameter */
    public function getMatches($accountID, $limit = 5){

        $this->param = "?endIndex=";

        $res = $this->client->request('GET', 
            $this->url.'/lol/match/v3/matchlists/by-account/'.
            $accountID.
            $this->param.$limit.
            '&'.
            $this->api_key
        );
        $contents = $res->getBody()->getContents();
        $contents = json_decode($contents);

        foreach($contents->matches as $game){
            $game->champion = $this->getChampion($game->champion);
            $game->image = $this->getImage($game->champion);
            $game->data = $this->getGameData($game->gameId, $accountID);
        }

        return $contents;
    }

    // Get game data for each game
    public function getGameData($idGame, $idSummoner){


        $res = $this->client->request('GET', 
            $this->url.'/lol/match/v3/matches/'.
            $idGame.
            '?'.
            $this->api_key
        );

        $contents = $res->getBody()->getContents();
        $contents = json_decode($contents);

        $idParticipant = $this->getParticipant($contents->participantIdentities, $idSummoner);

        $stats = $this->getGameStats($contents->participants, $idParticipant);

        return $stats;
    }

    // Get participant number within the game
    public function getParticipant($participants, $idSummoner){

        foreach($participants as $participant){

            if($idSummoner == $participant->player->accountId){
                return $participant->participantId;
            }
        }

    }


    // Get game infos such as kills, assists, deaths, items
    public function getGameStats($participants, $idParticipant){

        foreach($participants as $participant){

            if($participant->participantId == $idParticipant){

                $data = new \StdClass();
                
                $data->spellOne = $this->getSpell($participant->spell1Id);
                $data->spellTwo = $this->getSpell($participant->spell2Id);
                $data->kills = $participant->stats->kills;

                $data->assists = $participant->stats->assists;
                $data->deaths = $participant->stats->deaths;
                $data->win = $participant->stats->win;

                $data->minion = (int)$participant->stats->totalMinionsKilled + (int)$participant->stats->neutralMinionsKilled;


                if(!empty($participant->stats->item0)){
                    $data->item0 = $this->getItem($participant->stats->item0);
                }
                else{
                    $data->item0 = "";
                }

                if(!empty($participant->stats->item1)){
                    $data->item1 = $this->getItem($participant->stats->item1);
                }
                else{
                    $data->item1 = "";
                }

                if(!empty($participant->stats->item2)){
                    $data->item2 = $this->getItem($participant->stats->item2);
                }
                else{
                    $data->item2 = "";
                }

                if(!empty($participant->stats->item3)){
                    $data->item3 = $this->getItem($participant->stats->item3);
                }
                else{
                    $data->item3 = "";
                }

                if(!empty($participant->stats->item4)){
                    $data->item4 = $this->getItem($participant->stats->item4);
                }
                else{
                    $data->item4 = "";
                }

                if(!empty($participant->stats->item5)){
                    $data->item5 = $this->getItem($participant->stats->item5);
                }
                else{
                    $data->item5 = "";
                }

                return $data;
                
            }
        }

    }

    /* Returns summoner spell's picture link */
    public function getSpell($idSpell){

        $path = storage_path() . "/json/spells.json";

        $json = json_decode(file_get_contents($path), true);

        foreach($json['data'] as $spell){
                
            if($spell['key'] == $idSpell){
                return "http://ddragon.leagueoflegends.com/cdn/8.12.1/img/spell/".$spell['image']['full'];
            }
        }     
    }

    /* Returns item's picture link */
    public function getItem($idItem){

        $path = storage_path() . "/json/items.json";

        $json = json_decode(file_get_contents($path), true);

        return "http://ddragon.leagueoflegends.com/cdn/8.12.1/img/item/".$json['data'][$idItem]['image']['full'];

    }

    /* Returns champion's name with id */
    public function getChampion($championId){

        $path = storage_path() . "/json/champs.json";

        $json = json_decode(file_get_contents($path), true);

        foreach($json['data'] as $champion){
                
            if($champion['key'] == $championId){
                return $champion['name'];
            }
        }
    }

    /* Dynamicly returns the link of the champion's splash */
    public function getImage($championName){

        $path = storage_path() . "/json/champs.json"; 
        $json = json_decode(file_get_contents($path), true);

        foreach($json['data'] as $champion){
                
            if($champion['id'] == str_replace(" ", "", $championName) || strtolower($champion['id']) == strtolower(str_replace("'", "", $championName))){             

                return "http://ddragon.leagueoflegends.com/cdn/8.12.1/img/champion/".$champion['image']['full'];
            }
        }
    }
}
