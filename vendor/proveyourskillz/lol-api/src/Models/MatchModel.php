<?php namespace PYS\LolApi\Models;

class MatchModel extends AbstractModel
{
    /**
     * @var int
     */
    public $seasonId;
    /**
     * @var int
     */
    public $queueId;
    /**
     * @var int
     */
    public $gameId;
    /**
     * List of ParticipantModel identities
     * @var ParticipantIdentityModel[]
     */
    public $participantIdentities;
    /**
     * @var string
     */
    public $gameVersion;
    /**
     * @var string
     */
    public $platformId;
    /**
     * @var string
     */
    public $gameMode;
    /**
     * @var int
     */
    public $mapId;
    /**
     * @var string
     */
    public $gameType;
    /**
     * List of Team statistics
     * @var TeamStatsModel[]
     */
    public $teams;
    /**
     * List of Participants
     * @var ParticipantModel[]
     */
    public $participants;
    /**
     * @var int
     */
    public $gameDuration;
    /**
     * @var int
     */
    public $gameCreation;
}
