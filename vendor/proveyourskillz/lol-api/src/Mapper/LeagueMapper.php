<?php namespace PYS\LolApi\Mapper;

use PYS\LolApi\Models\LeagueListModel;
use PYS\LolApi\Models\LeagueModel;
use PYS\LolApi\Models\ModelInterface;

class LeagueMapper extends AbstractMapper
{
    protected static $model = LeagueModel::class;

    public function map($data): ModelInterface
    {
        $leagueModel = new LeagueModel;
        $leagueModel->leagueList = $this->mapper->mapArray(
            $data,
            [],
            LeagueListModel::class
        );

        return $leagueModel;
    }
}
