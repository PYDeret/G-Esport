<?php
require __DIR__ . './../vendor/autoload.php';
$API_KEY = require __DIR__ . '/key.php';

use PYS\LolApi\ApiRequest\Region;

$api = new PYS\LolApi\Api($API_KEY);

$match = $api->match(Region::EUW, 3329302609);

echo 'List of summoners:' . PHP_EOL;
foreach ($match->participantIdentities as $identity) {
    echo $identity->participantId . ' ' . $identity->player->summonerName . PHP_EOL;
}
