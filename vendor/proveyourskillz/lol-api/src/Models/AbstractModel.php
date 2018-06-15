<?php namespace PYS\LolApi\Models;

use PYS\LolApi\Api;
use PYS\LolApi\ApiRequest\Region;
use PYS\LolApi\Exceptions\NonApiModel;

abstract class AbstractModel implements ModelInterface
{
    /**
     * Region of request
     * @var Region
     */
    public $region;
    /**
     * @var Api
     */
    private $wiredApi;

    public function wireRegion(Region $region): ModelInterface
    {
        $this->region = $region;

        return $this;
    }

    public function wireApi(Api $api): ModelInterface
    {
        $this->wiredApi = $api;

        return $this;
    }

    public function getApi(): Api
    {
        if ($this->wiredApi) {
            return $this->wiredApi;
        }

        throw new NonApiModel('Model was not instantiated by API Request');
    }
}
