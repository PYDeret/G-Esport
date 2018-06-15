<?php namespace PYS\LolApi\Laravel;

use Illuminate\Support\Facades\Facade as BaseFacade;
use PYS\LolApi\Api;

class Facade extends BaseFacade
{
    public static function getFacadeAccessor()
    {
        return 'lol-api';
    }
}
