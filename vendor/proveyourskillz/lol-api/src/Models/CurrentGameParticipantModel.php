<?php namespace PYS\LolApi\Models;

class CurrentGameParticipantModel extends AbstractModel
{
    /**
     * The ID of the profile icon used by this participant
     * @var int
     */
    public $profileIconId;

    /**
     * The ID of the champion played by this participant
     * @var int
     */
    public $championId;

    /**
     * The summoner name of this participant
     * @var string
     */
    public $summonerName;

    /**
     * The runes used by this participant
     * @var RuneModel[]
     */
    public $runes;

    /**
     * Flag indicating whether or not this participant is a bot
     * @var bool
     */
    public $bot;

    /**
     * The team ID of this participant, indicating the participant's team
     * @var int
     */
    public $teamId;

    /**
     * The ID of the second summoner spell used by this participant
     * @var int
     */
    public $spell2Id;

    /**
     * The masteries used by this participant
     * @var MasteryModel[]
     */
    public $masteries;

    /**
     * The ID of the first summoner spell used by this participant
     * @var int
     */
    public $spell1Id;

    /**
     * The summoner ID of this participant
     * @var int
     */
    public $summonerId;
}