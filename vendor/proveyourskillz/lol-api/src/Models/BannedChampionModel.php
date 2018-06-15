<?php namespace PYS\LolApi\Models;

use PYS\LolApi\Models\AbstractModel;

class BannedChampionModel extends AbstractModel
{
    /**
     * The turn during which the champion was banned
     * @var int
     */
    public $pickTurn;

    /**
     * The ID of the banned champion
     * @var int
     */
    public $championId;

    /**
     * The ID of the team that banned the champion
     * @var int
     */
    public $teamId;
}