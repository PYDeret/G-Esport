<?php
require __DIR__ . './../vendor/autoload.php';
$API_KEY = require __DIR__ . '/key.php';

use PYS\LolApi\ApiRequest\Region;

$api = new PYS\LolApi\Api($API_KEY);

$currentGame = $api
    ->summoner(Region::EUW, 19196451)
    ->currentGame();

var_dump($currentGame->participants);
