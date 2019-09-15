@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="pb-4">
            Nasze ogloszenia
            <a href="/ogloszenia/dodaj" class="btn btn-success">Dodaj ogloszenie</a>
        </div>

        <div>
        @if(count($posts)>0)
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
                                <td><img class="w-100" src="/storage/cover_images/{{$post->cover_image}}"></td>
                            </div>
                            <div class="col-8">
                                <td><a href="/ogloszenia/{{ $post->id }}">{{ $post->title }}</a></td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->user->name }}</td>
                                @if($user)
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
                                    @else
                                        <td></td>
                                        <td></td>
                                    @endif
                                @else
                                    <td></td>
                                    <td></td>
                                @endif
                            </div>
                        </div>
                    </tr>
                @endforeach
            </table>


            {{-- potrzebne do paginacji --}}
            {{$posts->links()}}
        @else
                <p>Brak ogloszen w bazie!</p>
        @endif
        </div>
    </div>

@endsection
