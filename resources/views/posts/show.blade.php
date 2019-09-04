@extends('layouts.app')

@section('content')

    <div class="container text-center">

        @if ($post)

            <div class="btn btn-light">
                <a href="/ogloszenia">Powrot do listy ogloszen</a>
            </div>
            <div class="jumbotron">
                <p>{{$post->title}}</p>
                <p><small>Data dodania ogloszenia: {{$post->created_at}}</small></p>
                <p><small>Ogloszenie dodane przez uzytkownika {{$post->user->name}}</small></p>
                <hr>
            </div>
            @if(Auth::check())
                @if(Auth::user()->id == $post->user_id)
                    <a href="/ogloszenia/{{$post->id}}/edytuj" class="btn btn-success">
                        Edytuj Ogloszenie
                    </a>
                @endif
            @endif

        @else
            <p>Ogloszenie jest nieaktualne!!</p>
        @endif

        @if(Auth::check())
            @if(Auth::user()->id == $post->user_id)
                {{Form::open(['action'=>['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])}}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Usun ogloszenie', ['class' => 'btn btn-danger'])}}
                {{Form::close()}}
            @endif
        @endif

    </div>

@endsection
