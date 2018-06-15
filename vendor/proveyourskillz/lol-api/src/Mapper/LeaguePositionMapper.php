<?php namespace PYS\LolApi\Mapper;

use PYS\LolApi\Models\CurrentLeaguePositionModel;
use PYS\LolApi\Models\LeaguePositionModel;
use PYS\LolApi\Models\ModelInterface;

class LeaguePositionMapper extends AbstractMapper
{
    protected static $model = LeaguePositionModel::class;

    public function map($data): ModelInterface
    {
        $leaguePosition = new LeaguePositionModel;
        $leaguePosition->leaguesPlayed = $this->mapper->mapArray(
            $data,
            [],
            CurrentLeaguePositionModel::class
        );

        return $leaguePosition;
    }
}
