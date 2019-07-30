@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <p>Dodaj ogloszenie</p>

        {{ Form::open(array('action' => ['PostsController@update', $post->id], 'method' => 'POST')) }}
        	<div class="form-group">
                <!-- title to name, Title to naglowek -->
                {{ Form::label('title', 'Tytul ogloszenia') }}
                <!-- name = title, placeholder = Title -->
                {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Tytul' ] )}}
                <!-- name = title, value = $post->title , [] = atrybuty wewnatrz, classa itp -->
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Tresc ogloszenia') }}
                {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Tresc' ] )}}
            </div>
            {{ Form::hidden('_method', 'PUT')}}
            {{ Form::submit('Edytuj ogloszenie', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

    </div>

@endsection

 <!-- composer require "laravelcollective/html" -->
