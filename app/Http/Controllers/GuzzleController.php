<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class GuzzleController extends Controller
{
    public function index(){

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        echo $res->getStatusCode();
        // 200
        echo $res->getHeaderLine('content-type');
        // 'application/json; charset=utf8'
        echo $res->getBody();

    }
}
