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


Route::group(['prefix' => 'users'], function () {
    Route::get('{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
    Route::get('check/{userName}', ['as' => 'users.check', 'uses' => 'UserController@check']);
    Route::get('profile/{user}',  ['as' => 'users.profile', 'uses' => 'UserController@profile']);
    Route::post('update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
    Route::post('updateLol',  ['as' => 'users.updateLol', 'uses' => 'UserController@updateLeague']);
    Route::post('updateAbout',  ['as' => 'users.updateAbout', 'uses' => 'UserController@updateAbout']);
    Route::get('messages/{user}', ['as' => 'users.messages', 'uses' => 'MessagesController@index']);
    Route::get('messages/create/{user}', ['as' => 'users.messages.create', 'uses' => 'MessagesController@create']);
    Route::post('messages/{user}', ['as' => 'users.messages.store', 'uses' => 'MessagesController@store']);
    Route::get('messages/show/{id}', ['as' => 'users.messages.show', 'uses' => 'MessagesController@show']);
    Route::put('messages/show/{id}', ['as' => 'users.messages.update', 'uses' => 'MessagesController@update']);
});




Route::get('/stream', function(\romanzipp\Twitch\Twitch $twitch){
    $userOrders = \App\Http\Controllers\StreamController::getStream('skumbsr', $twitch);

    echo $userOrders;
});

/*Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});*/

//Route::get('/lol/{summonerName}', 'LeagueController@getAccount');
