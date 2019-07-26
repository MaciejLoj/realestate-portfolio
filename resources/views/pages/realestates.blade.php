@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-3 pt-5">
                <img src="/images/logo_nieruchomosci.jpg" class="w-100">
            </div>

            <div class="col-9 p-5">
                <div class="d-flex justify-content-start"><h1>{{$title}}</h1></div>
                <div class="d-flex justify-content-start">
                    @foreach ($cities as $city)
                        <div class="pr-4">{{$city}}</div>
                    @endforeach
                </div>
                <div class="pt-3">
                    <a href="">www.nieruchomosci.pl</a>
                </div>
            </div>

        </div>

        <div class="row pt-4">

            <div class="col-4">
                <img src="/images/dom.jpeg" class="w-100">
            </div>

            <div class="col-4">
                <img src="/images/dom.jpeg" class="w-100">
            </div>

            <div class="col-4">
                <img src="/images/dom.jpeg" class="w-100">
            </div>

        </div>

    </div>
@endsection
