@extends('layouts.app')

@section('content')


{{-- dzielnica, cena, powierzchnia, liczba pokoi, rynek pierwotny/wtorny + rok budowy,
 ogrzewanie, rodzaj zabudowy, pietro, przyjazne dla zwierzat  --}}

 <div class="container text-center">
     <p>Znajdz ogloszenie</p>

     {{ Form::open(array('action' => 'PostsController@find_realestate_db', 'method' => 'POST')) }}
     	<div class="form-group">
             {{ Form::label('location', 'Dzielnica') }}
             {{ Form::select('location', ['B' => 'Bielany', 'Z' => 'Zoliborz', 'M' => 'Mokotow'], null, ['placeholder' => 'Wybierz dzielnice'])}}
             {{-- Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...']); --}}
         </div>
         <div class="form-group">
               {{ Form::label('price', 'Cena od') }}
               {{ Form::number('min_price') }}
               <p>do</p>
               {{ Form::number('min_price') }}
           </div>

         {{ Form::submit('Szukaj', ['class' => 'btn btn-primary']) }}

     {{ Form::close() }}

 </div>

{{-- wiecej filtrow, javascript --}}

@endsection
