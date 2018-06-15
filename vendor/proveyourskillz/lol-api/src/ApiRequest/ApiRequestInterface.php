<?php namespace PYS\LolApi\ApiRequest;

use PYS\LolApi\Mapper\MapperInterface;

interface ApiRequestInterface
{
    public function getType(): string;
    public function getSubtypes(): array;
    public function getVersion(): ?int;
    public function getMapper(): MapperInterface;
}
