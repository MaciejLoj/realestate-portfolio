@extends('layouts.app')


@section('content')

<div class="container">
    <div class="jumbotron">
        <p class="text-center">Czego szukasz?</p>
        <a href="/znajdz-nieruchomosc" class="btn btn-primary">Nieruchomosci</a>
        <a href="/znajdz-pozostale" class="btn btn-success">Pozostale</a>
        {{ Form::open(array('action' => ['PostsController@find_post_db'])) }}
            <div class="form-group">
                <!-- title to name, Title to naglowek -->
                {{ Form::label('keyword', 'Wyszukaj slowo kluczowe') }}
                <!-- name = title, placeholder = Title -->
                {{ Form::text('keyword')}}
                <!-- name = title, value = $post->title , [] = atrybuty wewnatrz, classa itp -->
            </div>
        {{ Form::close() }}
    </div>
</div>

@endsection
