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
    $nextTournament = App::call('App\Http\Controllers\TournoiController@getNextTournament');
    return view('tournois', compact('tournois', 'nextTournament'));
});
Route::get('tournoi/{slug}', function($slug){
    $tournoi = App\Tournoi::where('slug', '=', $slug)->firstOrFail();
    $tournoi_equipe = App\TournoisEquipe::all();
    $equipes = App\Equipe::all();
    $users = App\User::where('id', '!=', Auth::id())->get();
    $equipes_users = App\EquipesUsers::all();

    $checker = App::call('App\Http\Controllers\TournoiController@getUsr', ['tid' => $tournoi]);
    $pos1 = App::call('App\Http\Controllers\TournoiController@getPositionTeam1', ['tid' => $tournoi]);
    $pos2 = App::call('App\Http\Controllers\TournoiController@getPositionTeam2', ['tid' => $tournoi]);
    $pos3 = App::call('App\Http\Controllers\TournoiController@getPositionTeam3', ['tid' => $tournoi]);
    $pos4 = App::call('App\Http\Controllers\TournoiController@getPositionTeam4', ['tid' => $tournoi]);

    $mesTeam = App\EquipesUsers::where('user_id', '=', Auth::id())->get();

    return view('tournoi', compact('tournoi', 'equipes' ,'tournoi_equipe', 'users', 'equipes_users', 'slug', 'checker', 'pos1', 'pos2', 'pos3', 'pos4', 'mesTeam') );
});

Route::get('/equipes', function () {
    $equipes = App\Equipe::all();
    $participants = App\Participant::all();
    $users = App\User::all();
    $equipes_users = App\EquipesUsers::all();
    return view('equipes', compact('equipes','participants','users','usersco','equipes_users'));
});
Route::get('equipe/{slug}', function($slug){
    $equipe = App\Equipe::where('slug', '=', $slug)->firstOrFail();
    $equipes_users = App\EquipesUsers::all();
    $users = App\User::all();
    return view('equipe', compact('equipe','users','equipes_users'));
});

Route::get('/news', function(){
    $news = App\News::all();
    return view('news', compact('news'));
});

Route::get('news_in/{slug}', function($slug){
    $news = App\News::where('slug', '=', $slug)->firstOrFail();
    return view('news_in', compact('news'));
});

Route::get('/jeux', function(){
    $jeux = App\Jeu::all();
    return view('jeux', compact('jeux'));
});

Route::get('jeux_in/{slug}', function($slug){
    $jeux = App\Jeu::where('slug', '=', $slug)->firstOrFail();
    return view('jeux_in', compact('jeux'));
});

Route::get('/home', function(){
    $news = App\News::all();
    $jeux = App\Jeu::all();

    $nextTournament = App::call('App\Http\Controllers\TournoiController@getNextTournament');

    return view('new', compact('news', 'jeux', 'nextTournament'));
});

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/doubleauth',  'UserController@doubleauth');
Route::post('/verifDoubleAuth',  ['as' => 'users.doubleauthcheck', 'uses' => 'UserController@doubleauthCheck']);

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
    Route::get('statistiques/{user}', ['as' => 'users.statistiques', 'uses' => 'UserController@statistiques']);
    Route::get('gestion_equipes/{user}', ['as' => 'users.gestion_equipes', 'uses' => 'UserController@mesEquipes']);
    Route::post('gestion_equipes', ['as' => 'users.deleteEquipe', 'uses' => 'UserController@DeleteEquipe']);


});

Route::get('/getMessages', ['as' => 'users.ajaxGet', 'uses' => 'MessagesController@ajaxGet']);

Route::group(['prefix' => 'MobAPI', 'middleware' => ['api', 'cors'],], function () {
    Route::post('/connect', 'APIAppliController@connect');
    Route::post('/getName', 'APIAppliController@getName');
    Route::post('/getMsg', 'APIAppliController@getMsg');
    Route::post('/getOtherUsers', 'APIAppliController@getOtherUsers');
    Route::post('/sendMessage', 'APIAppliController@sendMessage');
    Route::post('/setDoubleAuth', 'APIAppliController@setDoubleAuth');
});

Route::post('equipe/create',  ['as' => 'equipe.create', 'uses' => 'EquipeController@create']);
Route::post('tournoi/join',  ['as' => 'tournoi.join', 'uses' => 'TournoiController@join']);
Route::post('tournoi/avance',  ['as' => 'tournoi.avance', 'uses' => 'TournoiController@avance']);


Route::get('/stream', function(\romanzipp\Twitch\Twitch $twitch){
    $userOrders = \App\Http\Controllers\StreamController::getStream('skumbsr', $twitch);

    echo $userOrders;
});