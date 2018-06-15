<?php

namespace Lpphan\Api;

/**
 * Description of StatsApi
 *
 * @author lamphuong
 */
class StatsApi extends AbstractApi
{
    protected $version = 'v1.3';

    public function getRankedStats($summonerId)
    {
        $path = "stats/by-summoner/$summonerId/ranked";
        return $this->makeRequest($path);
    }

    public function getPlayerStats($summonerId)
    {
        $path = "stats/by-summoner/$summonerId/summary";
        return $this->makeRequest($path);
    }
}