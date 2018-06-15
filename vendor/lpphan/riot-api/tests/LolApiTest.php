<?php
use PHPUnit\Framework\TestCase;
use Lpphan\RiotApi;

/**
 * Description of LolApiTest
 *
 * @author lamphuong
 */
class LolApiTest extends TestCase
{

    public function testRegion()
    {
        $api = new RiotApi('$key');
        $this->assertEquals('na', $api->getRegion());
        $api->setRegion('br');
        $this->assertEquals('br', $api->getRegion());
    }

    public function testCache()
    {
        $api = new RiotApi('$key');
        $this->assertInstanceOf(Lpphan\Cache::class, $api->getCache());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetRegion()
    {
        $api = new RiotApi('$key');
        $api->setRegion('vn');
    }

    public function testHttpClient()
    {
        $api = new RiotApi('$key');
        $this->assertInstanceOf(Lpphan\HttpClient::class, $api->getClient());
    }
}
