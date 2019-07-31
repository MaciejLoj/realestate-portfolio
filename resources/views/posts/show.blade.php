@extends('layouts.app')

@section('content')

    <div class="container text-center">

        @if ($post)

            <div class="btn btn-light">
                <a href="/posts">Powrot do listy ogloszen</a>
            </div>
            <div class="jumbotron">
                <p>{{$post->title}}</p>
                <small>Data dodania ogloszenia {{$post->created_at}}</small>
                <hr>
            </div>
            <a href="/posts/{{$post->id}}/edit" class="btn btn-success">
                Edytuj Ogloszenie
            </a>

        @else
            <p>Ogloszenie jest nieaktualne!!</p>
        @endif

        {{Form::open(['action'=>['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {{Form::close()}}

    </div>

@endsection
