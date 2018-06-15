<?php namespace PYS\LolApi\Models;

class CurrentGameModel extends AbstractModel
{
    /**
     * The ID of the game
     * @var int
     */
    public $gameId;

    /**
     * The game start time represented in epoch milliseconds
     * @var int
     */
    public $gameStartTime;

    /**
     * The ID of the platform on which the game is being played
     * @var string
     */
    public $platformId;

    /**
     * The game mode
     * @var string
     */
    public $gameMode;

    /**
     * The ID of the map
     * @var int
     */
    public $mapId;

    /**
     * The game type
     * @var string
     */
    public $gameType;

    /**
     * Banned champion information
     * @var BannedChampionModel[]
     */
    public $bannedChampions;

    /**
     * The observer information
     * @var ObserverModel
     */
    public $observers;

    /**
     * The participant information
     * @var CurrentGameParticipantModel[]
     */
    public $participants;

    /**
     * The amount of time in seconds that has passed since the game started
     * @var int
     */
    public $gameLength;

    /**
     * The queue type (queue types are documented on the Game Constants page)
     * @var int
     */
    public $gameQueueConfigId;

}
