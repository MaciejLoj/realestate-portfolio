@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="pb-4">
            Nasze ogloszenia
            <a href="/ogloszenia/dodaj" class="btn btn-success">Dodaj swoje ogloszenie</a>
        </div>

        <div class="jumbotron">
        @if(count($posts)>0)

            @foreach($posts as $post)
                    <div class="row">
                        <div class="col-4">
                            <img class="w-100" src="/storage/cover_images/{{$post->cover_image}}">
                        </div>
                        <div class="col-8">
                            <h3><a href="/ogloszenia/{{ $post->id }}">{{ $post->title }}</a></h3>
                            <small>Utworzone {{ $post->created_at }} przez {{ $post->user_id }}</small>

                                @if($user->roles()->where('name', 'Admin'))

                                    <div>
                                        <a href="/ogloszenia/{{ $post->id }}/edytuj" class="btn btn primary">Edytuj</a>
                                    </div>
                                    <div>
                                        {{ Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST','class' => 'pull-right']) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Usun',['class'=>'btn btn danger']) }}
                                        {{ Form::close() }}
                                    </div>

                                @endif

                        </div>

                    </div>


            @endforeach



            {{-- potrzebne do paginacji --}}
            {{$posts->links()}}
        @else
                <p>Brak ogloszen w bazie!</p>
        @endif
        </div>
    </div>

@endsection
