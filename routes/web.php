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

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about',[
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles/{article}', 'ArticlesController@show');

   // Route::get('/test', function () {

       // $name = request('name');

        //return view('test', [
        //    'name' => $name
       // ]);
   // });

//Route::get('/post/{post}', function ($post) {

   // $posts = [
     // 'first' => '1',
     //   'second' => '2'
   // ];
    //if (! array_key_exists($post, $posts)){
     //   abort(404, 'sorry, that post was not found');
   // }

    //return view('post', [
       // 'post' => $posts[$post]
   // ]);
//});

Route::get('/posts/{post}', 'PostsController@show');


