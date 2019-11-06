@extends('layouts.new_app')

@section('content')

    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row">

          {{-- Formularz kontaktowy - lewo --}}
          <div class="col-lg-8 mb-5" >

            {{-- do zamiany na RealEstateController@send_message -> wysylanie maila poprzez formularz  --}}
            {{ Form::open(array('action' => 'PostsController@store', 'method' => 'POST' )) }}

                {{-- Imie oraz nazwisko w jednym wierszu --}}
                <div class="form-group row">
                    <div class="col-md-6 mb-4 mb-lg-0">
                        {{ Form::text('customer_name', '', ['class' => 'form-control', 'placeholder' => 'Imię' ] )}}
                    </div>

                    <div class="col-md-6">
                        {{ Form::text('customer_surname', '', ['class' => 'form-control', 'placeholder' => 'Nazwisko']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        {{ Form::text('customer_email', '', ['class' => 'form-control', 'placeholder' => 'Email']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        {{ Form::textarea('customer_message', '', ['class' => 'form-control', 'placeholder' => 'Twoja wiadomość', 'cols' => '30', 'rows' => '9' ] )}}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                    {{ Form::submit('Wyślij', ['class' => 'btn btn-block btn-primary text-white py-3 px-5']) }}
                    </div>
                </div>

            {{ Form::close() }}

          </div>

          {{-- Dane kontaktowe - panel boczny prawy --}}
          <div class="col-lg-4 ml-auto">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-black mb-4">Kontakt</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black">Adres:</span>
                  <span> - </span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Telefon:</span><span> - </span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span> - </span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
