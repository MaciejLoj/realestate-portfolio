@extends('layouts.app')

@section('content')

    <div class="container text-center">

        @if ($post)

            <div class="btn btn-dark">
                <a href="/posts">Powrot do ogloszen</a>
            </div>
            <div class="jumbotron">
                <p>{{$post->title}}</p>
                <hr>
                <small>Data dodania ogloszenia {{$post->created_at}}</small>
            </div>

        @else
            <p>Ogloszenie jest nieaktualne!!</p>
        @endif


    </div>

@endsection
