@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table stripped">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th>Tytul</th>
                    <th>Data utworzenia</th>
                    <th>Autor</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            @foreach($posts as $post)
                <tr>
                    <div class="row">
                        <div class="col-4">
                            {{-- do wykorzystania $post-> mamy wylacznie wszystkie kolumny w tabeli posts,
                            model Post i metod nie mozemy uzyc. Chyba, ze w Controllerze damy Post::where --}}
                            <td><img class="w-100" src="/storage/cover_images/{{$post->cover_image}}"></td>
                        </div>
                        <div class="col-8">
                            <td><a href="/ogloszenia/{{ $post->id }}">{{ $post->title }}</a></td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->user_id }}</td>
                            {{-- @if($user)
                                @if(($user->id == $post->user->id) || ($user->roles->where('name', 'Admin')->first()))
                                    <td>
                                        <a href="/ogloszenia/{{ $post->id }}/edytuj" class="btn btn-primary">Edytuj</a>
                                    </td>
                                    <td>
                                        {{Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST','class' => 'pull-right'])}}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Usun',['class'=>'btn btn-danger'])}}
                                        {{Form::close()}}
                                    </td>
                                @else --}}
                            <td></td>
                            <td></td>
                        </div>
                    </div>
                </tr>
            @endforeach
        </table>
        {{-- potrzebne do paginacji --}}
        {{-- {{$posts->links()}} --}}
    </div>
@endsection
