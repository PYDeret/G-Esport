<?php

namespace Lpphan\Api;

/**
 * Description of CurrentGameApi
 *
 * @author lamphuong
 */
class CurrentGameApi extends AbstractApi
{
    protected $version = 'v1.0';
    private $url = 'https://%s.api.pvp.net/observer-mode/rest/';

    protected function getBaseUrlWithRegion()
    {
        return sprintf($this->url, $this->lolApi->getRegion());
    }

    public function getCurrentGame($summonerId)
    {
        $path = "consumer/getSpectatorGameInfo/".\Lpphan\RiotApi::$platformIds[$this->lolApi->getRegion()]."/{$summonerId}";
        return $this->makeRequest($path);
    }

    public function getFeaturedGame()
    {
        return $this->makeRequest('featured');
    }
}