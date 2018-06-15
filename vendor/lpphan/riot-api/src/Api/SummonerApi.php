<?php

namespace Lpphan\Api;

/**
 * Description of SummonerApi
 *
 * @author lamphuong
 */
class SummonerApi extends AbstractApi
{
    protected $version = 'v1.4';

    public function getSummonerByNames(array $summonerNames)
    {
        $path = 'summoner/by-name/'.implode(',', $summonerNames);
        return $this->makeRequest($path);
    }

    public function getSummonerByIds(array $summonerIds)
    {
        $path = 'summoner/'.implode(',', $summonerIds);
        return $this->makeRequest($path);
    }

    public function getMasteries(array $summonerIds)
    {
        $path = 'summoner/'.implode(',', $summonerIds).'/masteries';
        return $this->makeRequest($path);
    }

    public function getRunes(array $summonerIds)
    {
        $path = 'summoner/'.implode(',', $summonerIds).'/runes';
        return $this->makeRequest($path);
    }

    public function getNames(array $summonerIds)
    {
        $path = 'summoner/'.implode(',', $summonerIds).'/name';
        return $this->makeRequest($path);
    }
}