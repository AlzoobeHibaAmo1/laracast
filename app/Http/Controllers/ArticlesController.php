<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index(){
        if (request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }else{
            $articles = Article::latest()->get();
        }
        return view('articles.index', ['article'=> Article::latest()->get()]);
    }

    public function show(Article $article){
        return view('articles.show', ['article'=> $article]);
    }

    public function create(){
        return view('articles.create', [
            'tags' => Tag::all()
        ]);

    }

    public function store(){
        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));


        $article->save();

        return redirect('/articles');


    }

    public function edit(Article $article){
        return view('articles.edit', ['article'=> $article]);
    }

    public function update(Article $article){

        $article->update($this->validateArticle());

        $article->save();

        return redirect('/articles/'. $article->id);
    }

    public function destroy(){

    }

    /**
     * @return array
     */
    public function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'

        ]);
    }
}
