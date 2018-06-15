<?php namespace PYS\LolApi\Models;

class ParticipantModel extends AbstractModel
{
    /**
     * @var ParticipantStatsModel
     */
    public $stats;
    /**
     * @var int
     */
    public $participantId;
    /**
     * @var RuneModel[]
     */
    public $runes;
    /**
     * @var ParticipantTimelineModel
     */
    public $timeline;
    /**
     * @var int
     */
    public $teamId;
    /**
     * @var int
     */
    public $spell2Id;
    /**
     * @var MasteryModel[]
     */
    public $masteries;
    /**
     * @var string
     */
    public $highestAchievedSeasonTier;
    /**
     * @var int
     */
    public $spell1Id;
    /**
     * @var int
     */
    public $championId;
}
