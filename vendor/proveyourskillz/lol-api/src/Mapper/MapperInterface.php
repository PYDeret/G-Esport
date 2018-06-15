<?php namespace PYS\LolApi\Mapper;

use PYS\LolApi\Models\ModelInterface;

interface MapperInterface
{
    public function map($data): ModelInterface;
}
