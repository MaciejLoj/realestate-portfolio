@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="pb-4">
            Nasze ogloszenia
            <a href="/ogloszenia/dodaj" class="btn btn-success">Dodaj ogloszenie</a>
        </div>

        @if ($posts)

            @foreach($posts as $post)
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="w-100" src="/storage/cover_images/{{$post->cover_image}}">
                        </div>
                        <div class="col-md-8">
                            <h3><a href="/ogloszenia/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>Utworzone {{$post->created_at}} przez {{$post->user_id}}</small>
                        </div>
                    </div>
                </div>
            @endforeach

            {{$posts->links()}}
        @else
            <p>Brak ogłoszeń w bazie!</p>
        @endif

    </div>

@endsection
