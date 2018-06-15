<?php namespace PYS\LolApi\Models;

use PYS\LolApi\Models\AbstractModel;

class ObserverModel extends AbstractModel
{
    /**
     * Key used to decrypt the spectator grid game data for playback
     * @var string
     */
    public $encryptionKey;
}