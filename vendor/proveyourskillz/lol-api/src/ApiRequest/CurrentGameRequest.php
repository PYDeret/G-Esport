<?php namespace PYS\LolApi\ApiRequest;

use PYS\LolApi\Mapper\CurrentGameMapper;

class CurrentGameRequest extends AbstractRequest
{
    protected static $mapperClass = CurrentGameMapper::class;

    protected $type = 'spectator';

    protected $summonerId;

    /**
     * CurrentGameRequest constructor.
     *
     * @param int $summonerId
     */
    public function __construct(int $summonerId)
    {
        $this->summonerId = $summonerId;
    }

    public function getSubtypes(): array
    {
        return [
            'active-games',
            'by-summoner' => $this->summonerId,
        ];
    }
}