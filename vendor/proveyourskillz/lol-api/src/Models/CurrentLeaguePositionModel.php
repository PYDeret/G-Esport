<?php namespace PYS\LolApi\Models;

class CurrentLeaguePositionModel extends AbstractModel
{
    /**
     * @var string
     */
    public $queueType;
    /**
     * @var bool
     */
    public $hotStreak;
    /**
     * @var int
     */
    public $wins;
    /**
     * @var bool
     */
    public $veteran;
    /**
     * @var int
     */
    public $losses;
    /**
     * @var string
     */
    public $playerOrTeamId;
    /**
     * @var string
     */
    public $tier;
    /**
     * @var string
     */
    public $playerOrTeamName;
    /**
     * @var bool
     */
    public $inactive;
    /**
     * @var string
     */
    public $rank;
    /**
     * @var bool
     */
    public $freshBlood;
    /**
     * @var string
     */
    public $leagueName;
    /**
     * @var int
     */
    public $leaguePoints;
}
