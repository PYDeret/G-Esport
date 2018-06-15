<?php

namespace Lpphan\Api;

/**
 * Description of MatchApi
 *
 * @author lamphuong
 */
class MatchApi extends AbstractApi
{
    protected $version = 'v2.2';

    public function getMatch($matchId)
    {
        $path = "match/$matchId";
        return $this->makeRequest($path);
    }

    public function getMatchList($summonerId)
    {
        $path = "matchlist/by-summoner/$summonerId";
        return $this->makeRequest($path);
    }
}