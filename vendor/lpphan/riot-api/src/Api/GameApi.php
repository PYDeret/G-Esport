<?php

namespace Lpphan\Api;

/**
 * Description of Game
 *
 * @author lamphuong
 */
class GameApi extends AbstractApi
{
    protected $version = 'v1.3';

    public function getRecentGames($summonerId)
    {
        $path = "game/by-summoner/{$summonerId}/recent";
        return $this->makeRequest($path);
    }
}