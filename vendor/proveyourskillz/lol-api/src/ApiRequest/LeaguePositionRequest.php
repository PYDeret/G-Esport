<?php namespace PYS\LolApi\ApiRequest;

use PYS\LolApi\Mapper\LeaguePositionMapper;

class LeaguePositionRequest extends AbstractRequest implements ApiRequestInterface
{
    protected static $mapperClass = LeaguePositionMapper::class;

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
        return ['positions/by-summoner' => $this->summonerId];
    }
}
