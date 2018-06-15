<?php
use PHPUnit\Framework\TestCase;
use Lpphan\RiotApi;

/**
 * Description of CacheTest
 *
 * @author lamphuong
 */
class CacheTest extends TestCase
{

    public function testCache()
    {
        $api = new RiotApi('key');
        $cache = $api->getCache();

        $cache->set('test', 'lol', 60);
        $this->assertEquals('lol', $cache->get('test'));
    }
}
