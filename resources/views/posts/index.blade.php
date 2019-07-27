@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <p>Nasze ogloszenia</p>

        @if ($posts)
            @foreach($posts as $post)


        @endforeach

        @else
            <p>Brak ogłoszeń w bazie!</p>
        @endif


    </div>

@endsection
