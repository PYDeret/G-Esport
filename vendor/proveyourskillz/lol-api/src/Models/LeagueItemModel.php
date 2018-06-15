<?php namespace PYS\LolApi\Models;


class LeagueItemModel
{
    /**
     * @var string
     */
    public $rank;
    /**
     * @var bool
     */
    public $hotStreak;
    /**
     * List of MiniSeries
     * @var MiniSeriesModel[]
     */
    public $entries;
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
     * @var bool
     */
    public $freshBlood;
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
    public $playerOrTeamId;
    /**
     * @var int
     */
    public $leaguePoints;
}
