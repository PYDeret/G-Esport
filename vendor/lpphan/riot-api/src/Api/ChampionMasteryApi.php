<?php

namespace Lpphan\Api;

/**
 * @author lamphuong
 */
class ChampionMasteryApi extends AbstractApi
{
    private $url = 'https://%s.api.pvp.net/championmastery/location/%s/player/';

    
    protected function getBaseUrlWithRegion()
    {
        $region = $this->lolApi->getRegion();
        return sprintf($this->url, $region,
            \Lpphan\RiotApi::$platformIds[$region]);
    }

    public function getChampionMastery($playerId, $championId)
    {
        $path = "$playerId/champion/$championId";
        return $this->makeRequest($path);
    }

    public function getAllChampionMasteryEntries($playerId)
    {
        $path = "$playerId/champions";
        return $this->makeRequest($path);
    }

    public function getTotalMasteryScore($playerId)
    {
        $path = "$playerId/score";
        return $this->makeRequest($path);
    }

    public function getTopChampionMastery($playerId, $count = 3)
    {
        $path = "$playerId/topchampions";
        return $this->makeRequest($path, ['count' => $count]);
    }
}