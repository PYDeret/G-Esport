<?php namespace PYS\LolApi\Models;

use PYS\LolApi\Api;
use PYS\LolApi\ApiRequest\Region;

interface ModelInterface
{
    public function getApi(): Api;
    public function wireApi(Api $api): self;
    public function wireRegion(Region $region): self;
}
