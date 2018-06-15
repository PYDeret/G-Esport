<?php namespace PYS\LolApi\ApiRequest;

use PYS\LolApi\Mapper\LeagueMapper;

class LeagueRequest extends AbstractRequest implements ApiRequestInterface
{
    protected static $mapperClass = LeagueMapper::class;

    protected $type = 'league';

    protected $summonerId;

    /**
     * MatchRequest constructor.
     *
     * @param int $summonerId
     */
    public function __construct(int $summonerId)
    {
        $this->summonerId = $summonerId;
    }

    public function getSubtypes(): array
    {
        return ['leagues/by-summoner' => $this->summonerId];
    }
}
