@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="pb-4">
            Nasze ogloszenia
            <a href="/posts/create" class="btn btn-success">Dodaj ogloszenie</a>
        </div>

        @if ($posts)

            @foreach($posts as $post)
                <div class="jumbotron">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <p><small>{{$post->created_at}}</small></p>
                    <small>Utworzone przez uzytkownika {{$post->user->name}}</small>
                </div>
            @endforeach

            {{$posts->links()}}
        @else
            <p>Brak ogłoszeń w bazie!</p>
        @endif


    </div>

@endsection
