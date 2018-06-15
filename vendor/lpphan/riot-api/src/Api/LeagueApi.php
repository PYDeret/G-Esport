<?php

namespace Lpphan\Api;

/**
 * Description of LeagueApi
 *
 * @author lamphuong
 */
class LeagueApi extends AbstractApi
{
    const RANKED_SOLO_5X5 = 'RANKED_SOLO_5X5';
    const RANKED_TEAM_5X5 = 'RANKED_TEAM_5X5';
    const RANKED_TEAM_3X3 = 'RANKED_TEAM_3X3';

    protected $version = 'v2.5';

    public function getLeagueBySummonerIds(array $summonerIds)
    {
        $path = 'league/by-summoner/'.implode(',', $summonerIds);
        return $this->makeRequest($path);
    }

    public function getLeagueEntryBySummonerIds(array $summonerIds)
    {
        $path = 'league/by-summoner/'.implode(',', $summonerIds).'/entry';
        return $this->makeRequest($path);
    }

    public function getLeagueByTeamIds(array $teamIds)
    {
        $path = 'league/by-team/'.implode(',', $teamIds);
        return $this->makeRequest($path);
    }

    public function getLeagueEntryByTeamIds(array $teamIds)
    {
        $path = 'league/by-team/'.implode(',', $teamIds).'/entry';
        return $this->makeRequest($path);
    }

    public function getChallengerTier($type)
    {
        $path = 'league/challenger';
        return $this->makeRequest($path, ['type' => $type]);
    }

    public function getMasterTier($type)
    {
        $path = 'league/master';
        return $this->makeRequest($path, ['type' => $type]);
    }
}