<?php


namespace App\Http\Controllers;


class PostsController
{
    public function show($post){
         $posts = [
        'first' => '1',
           'second' => '2'
        ];
        if (! array_key_exists($post, $posts)){
          abort(404, 'sorry, that post was not found');
         }

        return view('post', [
         'post' => $posts[$post]
         ]);
    }
}
