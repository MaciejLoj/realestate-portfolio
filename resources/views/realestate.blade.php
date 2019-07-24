@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-row">
            <div class="col-md-4 col-sm-6 my-col">
                Row 1 col 1
            </div>
            <div class="col-md-8 col-sm-6 my-col">
                Row 1 col 2
            </div>
        </div>

        <div class="row justify-content-center my-row">
            <div class="col my-col">
                Row 2 col 1
            </div>
        </div>
    </div>

@endsection
