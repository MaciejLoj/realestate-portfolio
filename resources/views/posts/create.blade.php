@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <p>Dodaj ogloszenie</p>

        {{ Form::open(array('action' => 'PostsController@store', 'method' => 'POST')) }}
        	<div class="form-group">
                <!-- title to name, Title to naglowek -->
                {{ Form::label('title', 'Tytul ogloszenia') }}
                <!-- name = title, placeholder = Title -->
                {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Tytul' ] )}}
                <!-- name = title, value = '', [] = atrybuty wewnatrz, classa itp -->
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Tresc ogloszenia') }}
                {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Tresc' ] )}}
            </div>
            {{ Form::submit('Dodaj ogloszenie', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

    </div>

@endsection

 <!-- composer require "laravelcollective/html" -->
