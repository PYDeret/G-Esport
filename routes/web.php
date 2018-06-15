<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'GuzzleController@index');

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home',  'HomeController@index');

Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});

//Route::get('/', 'ChatsController@index');
//Route::get('messages', 'ChatsController@fetchMessages');
//Route::post('messages', 'ChatsController@sendMessage');

Route::get('/stream', function (\romanzipp\Twitch\Twitch $twitch){

    $streamName = 'ogaminglol';

    // Get User by Username
    $userResult = $twitch->getStreamsByUserName($streamName);

    // Check, if the query was successfull
    if ($userResult->success()) {

        echo '<iframe
                src="http://player.twitch.tv/?channel='.$streamName .'"
                height="720"
                width="1280"
                frameborder="0"
                scrolling="no"
                allowfullscreen="true">
            </iframe>';

        echo '<iframe frameborder="0"
                scrolling="no"
                id="chat_embed"
                src="http://www.twitch.tv/embed/'.$streamName.'/chat"
                height="500"
                width="350">
            </iframe>';
    }
});
