@extends('layouts.app')

@section('content')

    <div class="container">
        <h5 class="jumbotron text-center">Moje ogloszenia</h5>
        <a href="/posts/create" class="btn btn-primary">Dodaj ogloszenie</a>
        <table class="table table-striped">
            <tr>
                <th>Ogloszenie</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <th>{{$post->title}}</th>
                <th><a href="/posts/{{$post->id}}/edit" class="btn btn-danger">Edytuj</a></th>
                <th></th>
            </tr>
            @endforeach
        </table>
    </div>

@endsection
