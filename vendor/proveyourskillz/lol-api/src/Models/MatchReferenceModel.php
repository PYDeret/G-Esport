<?php namespace PYS\LolApi\Models;

class MatchReferenceModel extends AbstractModel
{
    /**
     * @var string
     */
    public $lane;
    /**
     * @var int
     */
    public $gameId;
    /**
     * @var int
     */
    public $champion;
    /**
     * @var string
     */
    public $platformId;
    /**
     * @var int
     */
    public $season;
    /**
     * @var int
     */
    public $queue;
    /**
     * @var string
     */
    public $role;
    /**
     * @var int
     */
    public $timestamp;
}
