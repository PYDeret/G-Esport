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


Route::get('/', function () {
    return view('new');
});
Route::get('/posts', function () {
    $posts = App\Post::all();
    return view('posts', compact('posts'));
});
Route::get('post/{slug}', function($slug){
    $post = App\Post::where('slug', '=', $slug)->firstOrFail();
    return view('post', compact('post'));
});
Route::get('/pages', function () {
    $pages = App\Page::all();
    return view('pages', compact('pages'));
});
Route::get('page/{slug}', function($slug){
    $page = App\Page::where('slug', '=', $slug)->firstOrFail();
    return view('page', compact('page'));
});
Route::get('/tournois', function () {
    $tournois = App\Tournoi::all();
    return view('tournois', compact('tournois'));
});
Route::get('tournoi/{slug}', function($slug){
    $tournoi = App\Tournoi::where('slug', '=', $slug)->firstOrFail();
    return view('tournoi', compact('tournoi'));
});

Route::get('/equipes', function () {
    $equipes = App\Equipe::all();
    return view('equipes', compact('equipes'));
});
Route::get('equipe/{slug}', function($slug){
    $equipe = App\Equipe::where('slug', '=', $slug)->firstOrFail();
    return view('equipe', compact('equipe'));
});

Route::get('/league-of-legends', function () {
    $jeu = App\Jeu::where('slug', '=', 'leagueoflegends')->firstOrFail();
    return view('league-of-legends', compact('jeu'));
});
Route::get('/fortnite', function () {
    $jeu = App\Jeu::where('slug', '=', 'fortnite')->firstOrFail();
    return view('fortnite', compact('jeu'));
});


Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/doubleauth',  'UserController@doubleauth');
Route::post('/verifDoubleAuth',  ['as' => 'users.doubleauthcheck', 'uses' => 'UserController@doubleauthCheck']);

Route::get('/home',  'HomeController@index');
Route::get('/news',  'NewsController@index');
Route::get('/news/{news}',  'NewsController@news');

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
    Route::post('updateAuth',  ['as' => 'users.updateAuth', 'uses' => 'UserController@updateAuth']);
    Route::get('messages/{user}', ['as' => 'users.messages', 'uses' => 'MessagesController@index']);
    Route::get('messages/create/{user}', ['as' => 'users.messages.create', 'uses' => 'MessagesController@create']);
    Route::post('messages/create/{user}', ['as' => 'users.messages.createHasUsr', 'uses' => 'MessagesController@createHasUsr']);
    Route::post('messages/{user}', ['as' => 'users.messages.store', 'uses' => 'MessagesController@store']);
    Route::get('messages/show/{id}', ['as' => 'users.messages.show', 'uses' => 'MessagesController@show']);
    Route::put('messages/show/{id}', ['as' => 'users.messages.update', 'uses' => 'MessagesController@update']);
});

Route::get('/getMessages', ['as' => 'users.ajaxGet', 'uses' => 'MessagesController@ajaxGet']);

Route::get('/stream', function(\romanzipp\Twitch\Twitch $twitch){
    $userOrders = \App\Http\Controllers\StreamController::getStream('skumbsr', $twitch);

    echo $userOrders;
});