<?php
require __DIR__ . './../vendor/autoload.php';
$API_KEY = require __DIR__ . '/key.php';

use PYS\LolApi\ApiRequest\Region;

$api = new PYS\LolApi\Api($API_KEY);

$summoner = $api->summoner(Region::EUW, 19196451);
$matchList = $summoner->matches([
    'beginIndex' => 0,
    'endIndex' => 1,
]);

$match = $matchList->matchByNumber(0);

echo $match->gameId . $match->gameType . $match->gameMode;
