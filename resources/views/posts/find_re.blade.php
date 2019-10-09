@extends('layouts.app')

@section('content')


{{-- dzielnica, cena, powierzchnia, liczba pokoi, rynek pierwotny/wtorny + rok budowy,
 ogrzewanie, rodzaj zabudowy, pietro, przyjazne dla zwierzat  --}}

 <div class="container text-center">
     <p><strong>Znajdz ogloszenie</strong></p>
     <br>

     {{ Form::open(array('action' => 'PostsController@find_realestate_db', 'method' => 'POST')) }}
     	<div class="form-group">
             {{ Form::label('location', 'Dzielnica') }}
             {{ Form::select('location', ['Bielany' => 'Bielany', 'Zoliborz' => 'Zoliborz', 'Mokotow' => 'Mokotow'], null, ['placeholder' => 'Wybierz dzielnice'])}}
             {{-- Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...']); --}}
         </div>
         <br>
         <div class="form-group">
               {{ Form::label('min_price', 'Cena od') }}
               {{ Form::number('min_price') }}
               {{ Form::label('max_price', 'do') }}
               {{ Form::number('max_price') }}
           </div>
         <br>
         <br>
         {{ Form::submit('Szukaj', ['class' => 'btn btn-primary']) }}

     {{ Form::close() }}

 </div>

{{-- wiecej filtrow, javascript --}}

@endsection
