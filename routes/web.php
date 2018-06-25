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
