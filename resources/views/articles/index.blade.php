@extends('layout')

@section('content')

    <ul class="style1">

        @forelse($article as $articles)

            <li class="first">
                <h3><a href="/articles/{{$articles->id}}">{{$articles->title}}</a></h3>
                <p>{{$articles->excerpt}}</p>
            </li>

        @empty
            <p>no relevent articles yet</p>
        @endforelse
    </ul>

    @endsection
