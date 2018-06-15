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

Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::get('/stream', function(\romanzipp\Twitch\Twitch $twitch){
    $userOrders = \App\Http\Controllers\StreamController::getStream('skumbsr', $twitch);

    echo $userOrders;
});

Route::get('/lol/{summonerName}', 'LeagueController@getAccount');
