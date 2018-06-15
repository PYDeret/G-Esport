<?php namespace PYS\LolApi\Models;

class LeagueListModel extends AbstractModel
{
    /**
     * @var string
     */
    public $tier;
    /**
     * @var string
     */
    public $queue;
    /**
     * @var string
     */
    public $name;
    /**
     * List of League items
     * @var LeagueItemModel[]
     */
    public $entries;
}
