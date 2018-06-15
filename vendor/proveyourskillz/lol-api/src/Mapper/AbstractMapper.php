<?php namespace PYS\LolApi\Mapper;

use JsonMapper;
use PYS\LolApi\Exceptions\WrongMapperException;
use PYS\LolApi\Models\ModelInterface;

abstract class AbstractMapper implements MapperInterface
{
    protected $mapper;
    protected static $model;

    /**
     * AbstractMapper constructor.
     */
    public function __construct()
    {
        $this->mapper = new JsonMapper();
    }

    public function getModeInstance(): ModelInterface
    {
        return new static::$model;
    }

    public function map($data): ModelInterface
    {
        $model = $this->mapper->map($data, $this->getModeInstance());
        if (!$model instanceof ModelInterface) {
            throw new WrongMapperException('You must always map to object that implements ModelInterface');
        }

        return $model;
    }
}
