<?php

namespace Lpphan;

use GuzzleHttp\Client;

/**
 * Description of Client
 *
 * @author lamphuong
 */
class HttpClient implements ClientInterface
{
    /**
     *
     * @var Client
     */
    protected $guzzle;
    
    public function __construct()
    {
        $this->guzzle = new Client();
    }

    public function get($url)
    {
        return $this->guzzle->get($url);
    }
}