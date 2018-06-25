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



Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::get('users/profile/{user}',  ['as' => 'users.profile', 'uses' => 'UserController@profile']);
Route::post('users/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::post('users/updateLol',  ['as' => 'users.updateLol', 'uses' => 'UserController@updateLeague']);
Route::post('users/updateAbout',  ['as' => 'users.updateAbout', 'uses' => 'UserController@updateAbout']);


Route::get('/stream', function(\romanzipp\Twitch\Twitch $twitch){
    $userOrders = \App\Http\Controllers\StreamController::getStream('skumbsr', $twitch);

    echo $userOrders;
});

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

//Route::get('/lol/{summonerName}', 'LeagueController@getAccount');
