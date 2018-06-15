<?php namespace PYS\LolApi\ApiRequest;

use PYS\LolApi\ApiRequest\Query\QueryInterface;

interface ApiQueryRequestInterface
{
    public function getQuery(): QueryInterface;
    public function setQuery(QueryInterface $query): void;
}