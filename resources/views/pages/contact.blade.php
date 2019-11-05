@extends('layouts.new_app')

@section('content')

    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-5" >

            {{-- Do dodania formularz - Laravel Collective --}}

            <form action="#" method="post">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" placeholder="Imię">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Nazwisko">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Email">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="" id="" class="form-control" placeholder="Twoja wiadomość" cols="30" rows="10"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Wyślij">
                </div>
              </div>

            </form>
          </div>
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
