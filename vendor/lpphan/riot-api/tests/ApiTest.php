<?php
use Lpphan\RiotApi;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{

    public function testGetBaseUrl()
    {
        $api = new RiotApi('test');
        $summoner = $api->summonerApi();

        $reflector = new ReflectionClass('\Lpphan\Api\SummonerApi');
        $method = $reflector->getMethod('getBaseUrlWithRegion');
        $method->setAccessible(true);

        $res = $method->invoke($summoner);
        $this->assertEquals('https://na.api.pvp.net/api/lol/na/v1.4/', $res);

        $api->setRegion('br');
        $res1 = $method->invoke($summoner);
        $this->assertSame('https://br.api.pvp.net/api/lol/br/v1.4/', $res1);
    }

    public function testChampionMastery()
    {
        $api = new RiotApi('test');
        $chamM = $api->championMastery();

        $reflector = new ReflectionClass('\Lpphan\Api\ChampionMasteryApi');
        $method = $reflector->getMethod('getBaseUrlWithRegion');
        $method->setAccessible(true);

        $result = $method->invoke($chamM);

        $this->assertEquals('https://na.api.pvp.net/championmastery/location/NA1/player/', $result);

        $api->setRegion(Lpphan\Regions::BR);

        $result1 = $method->invoke($chamM);
        $this->assertEquals('https://br.api.pvp.net/championmastery/location/BR1/player/', $result1);
    }

    /**
     * @expectedException \Lpphan\Exception\Http403Exception
     * @expectedExceptionCode 403
     */
    public function testInvalidKey()
    {
        $api = new RiotApi('key');
        $summoner = $api->summonerApi();

        $summoner->getSummonerByNames(['hai']);
    }
    
}
