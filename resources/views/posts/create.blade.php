@extends('layouts.app')

@section('content')

<div class="container">
    <p class="text-center">Dodaj ogłoszenie</p>
    <div class="row">

    {{ Form::open(array('action' => 'PostsController@store', 'method' => 'POST', 'files' => true )) }}
        {{-- 'enctype' => 'multipart/form-data' --}}
        <div class="form-group row">

            {{ Form::select('location', [
                'Bemowo' => 'Bemowo',
                'Białołęka' => 'Białołęka',
                'Bielany' => 'Bielany',
                'Mokotów' => 'Mokotów',
                'Ochota' => 'Ochota',
                'Praga Północ' => 'Praga Północ',
                'Praga Południe' => 'Praga Południe',
                'Śródmieście' => 'Śródmieście',
                'Targówek' => 'Targówek',
                'Ursynów' => 'Ursynów',
                'Żoliborz' => 'Żoliborz'
            ], null, ['class' => 'form-control', 'placeholder' => 'Wybierz dzielnicę'])}}
        </div>

        <div class="form-group row">
            {{ Form::text('street', '',['class' => 'form-control', 'placeholder' => 'Ulica'])}}
        </div>

        <div class="form-group row">
            {{ Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Cena'])}} zł
        </div>

        <div class="form-group row">
            {{ Form::number('area_sqm', '', ['class' =>'form-control', 'placeholder' => 'Powierzchnia']) }} m<sup>2</sup>
        </div>

        <div class="form-group row">
            {{ Form::select('number_of_rooms', [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '3+' => '3+'
            ], null, ['class' => 'form-control', 'placeholder' => 'Ilość pokoi']) }}
        </div>

        <div class="form-group row">
            {{ Form::select('house_or_flat', [
                'mieszkanie' => 'mieszkanie',
                'dom' => 'dom'
            ], null, ['class' => 'form-control', 'placeholder' => 'Mieszkanie / dom']) }}
        </div>

        <div class="form-group row">
            {{ Form::select('market_type', [
                'rynek pierwotny' => 'rynek pierwotny',
                'rynek wtórny' => 'rynek wtórny'
            ], null, ['class' => 'form-control', 'placeholder' => 'Rynek wtórny / pierwotny']) }}
        </div>

    	<div class="form-group row">
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Tytul'])}}
        </div>

        <div class="form-group row">
            {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Treść ogłoszenia'])}}
        </div>

        <div class="form-group">
            {{ Form::label('cover_image', 'Dodaj zdjęcie') }}
            <br>
            {{ Form::file('cover_image')}}
        </div>

        {{ Form::submit('Dodaj ogloszenie', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

    </div>
    {{-- <form action="{{ action('PostsController@store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="document">Documents</label>
            <div class="needsclick dropzone" id="document-dropzone">

            </div>
        </div>
        <div>
            <input class="btn btn-danger" type="submit">
        </div>
    </form> --}}

</div>

@endsection
