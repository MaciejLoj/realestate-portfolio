@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="btn btn-light">
            <a href="/ogloszenia">Powrot do listy ogloszen</a>
        </div>
        <div class="jumbotron">
        @if($post)
            <div class="row">
                <div class="col-4">
                    <img class="w-100" src="/storage/cover_images/{{ $post->cover_image }}">
                </div>
                <div class="col-8">
                    <p>{{ $post->title }}</p>
                    <p>{{ $post->body }}
                    <hr>
                    <p><small>Data dodania ogloszenia: {{$post->created_at}}</small></p>
                    <p><small>Ogloszenie dodane przez uzytkownika {{$post->user->name}}</small></p>
                </div>
            </div>
            @if ($user)
                @if(($user->id == $post->user->id) || ($user->roles->where('name','Admin')->first()))
                     {{-- || ($user->roles()->where('name','Admin'))) --}}
                    <div>
                        <a href="/ogloszenia/{{$post->id}}/edytuj" class="btn btn-success">
                            Edytuj Ogloszenie
                        </a>
                        {{Form::open(['action'=>['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])}}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Usun ogloszenie', ['class' => 'btn btn-danger'])}}
                        {{Form::close()}}
                    </div>
                @else
                    <div></div>
                @endif
            @else
                <div></div>
            @endif
        @endif

        </div>
    </div>
@endsection
