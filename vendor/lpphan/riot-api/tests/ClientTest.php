<?php

use Lpphan\RiotApi;
use PHPUnit\Framework\TestCase;

/**
 * Description of ClientTest
 *
 * @author lamphuong
 */
class ClientTest extends TestCase{
    
    public function testClient(){
        $api = new RiotApi('key');
        $client = $api->getClient();
        
        $res = $client->get('https://google.com');
        
        $code = $res->getStatusCode();
        
        $this->assertEquals(200, $code);
    }
    
}
