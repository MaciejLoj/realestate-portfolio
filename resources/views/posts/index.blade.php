@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <p>Nasze ogloszenia</p>

        @if ($posts)

            @foreach($posts as $post)
                <div class="jumbotron">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>{{$post->created_at}}</small>
                </div>
            @endforeach

            {{$posts->links()}}
        @else
            <p>Brak ogłoszeń w bazie!</p>
        @endif


    </div>

@endsection
