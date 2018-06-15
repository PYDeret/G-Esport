<?php namespace PYS\LolApi\ApiRequest\Query;

abstract class AbstractQuery implements QueryInterface
{
    /**
     * @var string[]
     */
    protected static $queryParams;
    /**
     * @var array
     */
    protected $query;

    /**
     * AbstractQuery constructor.
     *
     * @param array $query
     */
    public function __construct(array $query = [])
    {
        $this->query = $this->filterQuery($query);
    }

    public function filterQuery(array $query): array
    {
        return array_filter($query, function ($key) {
            return in_array($key, static::$queryParams, true);
        }, ARRAY_FILTER_USE_KEY);
    }

    public function toArray(): array
    {
        return $this->query;
    }
}