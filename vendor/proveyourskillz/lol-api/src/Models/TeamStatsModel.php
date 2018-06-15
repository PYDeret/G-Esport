<?php namespace PYS\LolApi\Models;

class TeamStatsModel extends AbstractModel
{
    /**
     * @var bool
     */
    public $firstDragon;
    /**
     * @var bool
     */
    public $firstInhibitor;
    /**
     * @var TeamBanModel[]
     */
    public $bans;
    /**
     * @var int
     */
    public $baronKills;
    /**
     * @var bool
     */
    public $firstRiftHerald;
    /**
     * @var bool
     */
    public $firstBaron;
    /**
     * @var int
     */
    public $riftHeraldKills;
    /**
     * @var bool
     */
    public $firstBlood;
    /**
     * @var int
     */
    public $teamId;
    /**
     * @var bool
     */
    public $firstTower;
    /**
     * @var int
     */
    public $vilemawKills;
    /**
     * @var int
     */
    public $inhibitorKills;
    /**
     * @var int
     */
    public $towerKills;
    /**
     * @var int
     */
    public $dominionVictoryScore;
    /**
     * @var string
     */
    public $win;
    /**
     * @var int
     */
    public $dragonKills;
}
