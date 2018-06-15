<?php

namespace Lpphan;

/**
 * Description of LolApi
 *s
 * @author lamphuong
 */
class RiotApi
{
    /**
     *
     * @var string
     */
    protected $apiKey;

    /**
     *
     * @var string
     */
    protected $region = 'na';

    /**
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     *
     * @var CacheInterface
     */
    protected $cache;

    /**
     *
     * @var array
     */
    public static $platformIds = [
        'na' => 'NA1',
        'euw' => 'EUW1',
        'br' => 'BR1',
        'lan' => 'LA1',
        'las' => 'LA2',
        'oce' => 'OC1',
        'eune' => 'EUN1',
        'tr' => 'TR1',
        'ru' => 'RU',
        'kr' => 'KR',
        'jp' => 'JP1'
    ];

    public function __construct($apiKey, CacheInterface $cache = null)
    {
        $this->apiKey = $apiKey;

        if (is_null($cache)) {
            $cache = new Cache();
        }

        $this->client = new HttpClient();
        $this->cache  = $cache;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setRegion($region)
    {
        if (!array_key_exists($region, self::$platformIds)) {
            throw new \InvalidArgumentException('Wrong region format');
        }
        $this->region = $region;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setClient(ClientInterface $client)
    {
        if (!$client instanceof ClientInterface) {
            throw new \InvalidArgumentException('Client must be an instance of Lpphan\ClientInterface');
        }

        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setCache(CacheInterface $cache)
    {
        if (!$cache instanceof CacheInterface) {
            throw new \InvalidArgumentException('Cache must be an instance of Lpphan\ClientInterface');
        }

        $this->cache = $cache;
    }

    public function getCache()
    {
        return $this->cache;
    }

    public function remember(Response $response, $minutes = 1)
    {
        $this->cache->set($response->getUrl(), $response->getBody(),
            $minutes * 60);
    }

    public function summonerApi()
    {
        return new Api\SummonerApi($this);
    }

    public function championApi()
    {
        return new Api\ChampionApi($this);
    }

    public function championMastery()
    {
        return new Api\ChampionMasteryApi($this);
    }

    public function currentGame()
    {
        return new Api\CurrentGameApi($this);
    }

    public function game()
    {
        return new Api\GameApi($this);
    }

    public function league()
    {
        return new Api\LeagueApi($this);
    }

    public function match()
    {
        return new Api\MatchApi($this);
    }

    public function staticApi()
    {
        return new Api\StaticApi($this);
    }

    public function stats()
    {
        return new Api\StatsApi($this);
    }

    public function status()
    {
        return new Api\StatusApi($this);
    }

    public function team()
    {
        return new Api\TeamApi($this);
    }
}