<?php
require __DIR__ . './../vendor/autoload.php';
$API_KEY = require __DIR__ . '/key.php';

use PYS\LolApi\ApiRequest\Region;

$api = new PYS\LolApi\Api($API_KEY);

$summoner = $api->summoner(Region::EUW, 19196451);
$leagues = $summoner->leaguesPositions();

$another_league = $api->leaguePosition(Region::EUW, 19196451);

print_r($leagues->leaguesPlayed);
print_r($another_league->leaguesPlayed);




