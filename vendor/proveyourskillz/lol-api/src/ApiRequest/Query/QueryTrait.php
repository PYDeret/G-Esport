<?php namespace PYS\LolApi\ApiRequest\Query;

trait QueryTrait
{
    /**
     * @var QueryInterface
     */
    protected $query;

    /**
     * @return QueryInterface
     */
    public function getQuery(): QueryInterface
    {
        return $this->query;
    }

    /**
     * @param QueryInterface $query
     */
    public function setQuery(QueryInterface $query): void
    {
        $this->query = $query;
    }
}