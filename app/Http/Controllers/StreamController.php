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

            $result = '<iframe
                    src="http://player.twitch.tv/?channel='.$streamName .'"
                    height="720"
                    width="1280"
                    frameborder="0"
                    scrolling="no"
                    allowfullscreen="true">
                </iframe>
                <iframe frameborder="0"
                    scrolling="no"
                    id="chat_embed"
                    src="http://www.twitch.tv/embed/'.$streamName.'/chat"
                    height="500"
                    width="350">
                </iframe>';

            return $result;
        }
    }
}
