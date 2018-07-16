<?php

namespace App\Http\Controllers;
use \romanzipp\Twitch\Twitch;

class StreamController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getStream($streamName, \romanzipp\Twitch\Twitch $twitch){

        $userResult = $twitch->getStreamsByUserName($streamName);

        if ($userResult->success()) {

            $result = '';

            return view('/stream', compact('streamName'));
        }
    }
}
