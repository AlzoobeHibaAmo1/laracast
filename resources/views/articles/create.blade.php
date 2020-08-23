@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
@endsection

@section('content')
    <div class="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">new article</h1>

            <form method="POST" action="/articles">
                @csrf
                <div class="field">
                    <label class="label" for="title">Title</label>
                    @if($errors->has('title'))
                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                    @endif
                    <div class="control">
                        <input class="input" type="text" name="title" id="title">

                    </div>

                </div>

                <div class="field">
                    <label class="label" for="excerpt">excerpt</label>

                    <div class="control">
                        <textarea class="textarea" name="excerpt" id="excerpt"></textarea>

                    </div>

                </div>

                <div class="field">
                    <label class="label" for="body">body</label>

                    <div class="control">
                        <textarea class="textarea" name="body" id="body"></textarea>

                    </div>

                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">submit</button>

                    </div>

                </div>
            </form>

        </div>
    </div>

@endsection

