<?php namespace PYS\LolApi\ApiRequest;

use PYS\LolApi\Mapper\MapperInterface;

abstract class AbstractRequest implements ApiRequestInterface
{
    /*
     * Name of mapper class
     * @var string
     */
    protected static $mapperClass;

    public function getType(): string
    {
        return $this->type ?? '';
    }

    public function getSubtypes(): array
    {
        return $this->subtypes ?? [];
    }

    public function getVersion(): ?int
    {
        return $this->version ?? 3;
    }

    public function getMapper(): MapperInterface
    {
        return new static::$mapperClass;
    }
}
