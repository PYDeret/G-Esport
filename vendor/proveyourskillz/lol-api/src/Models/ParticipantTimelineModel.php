<?php namespace PYS\LolApi\Models;

class ParticipantTimelineModel extends AbstractModel
{
    /**
     * @var string
     */
    public $lane;
    /**
     * @var int
     */
    public $participantId;
    /**
     * @var array
     */
    public $csDiffPerMinDeltas;
    /**
     * @var array
     */
    public $goldPerMinDeltas;
    /**
     * @var array
     */
    public $xpDiffPerMinDeltas;
    /**
     * @var array
     */
    public $creepsPerMinDeltas;
    /**
     * @var array
     */
    public $xpPerMinDeltas;
    /**
     * @var string
     */
    public $role;
    /**
     * @var array
     */
    public $damageTakenDiffPerMinDeltas;
    /**
     * @var array
     */
    public $damageTakenPerMinDeltas;
}
