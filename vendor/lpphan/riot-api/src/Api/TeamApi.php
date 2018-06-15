<?php

namespace Lpphan\Api;

/**
 * Description of TeamApi
 *
 * @author lamphuong
 */
class TeamApi extends AbstractApi
{
    protected $version = 'v2.4';

    public function getTeamsBySummonerId(array $summonerIds)
    {
        $path = 'team/by-summoner/'.implode(',', $summonerIds);
        return $this->makeRequest($path);
    }

    public function getTeamsByTeamIds(array $teamIds)
    {
        $path = 'team/'.implode(',', $teamIds);
        return $this->makeRequest($path);
    }
}