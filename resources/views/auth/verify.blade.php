@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Aktywuj swoje konto!') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link weryfikacyjny zostal wyslany na podany przez Ciebie adres email.') }}
                        </div>
                    @endif

                    {{ __('Aby przejsc dalej, sprawdz swojego maila i aktywuj konto!') }}
                    <br>
                    {{ __('Jesli nie otrzymales wiadomosci z linkiem aktywacyjnym') }}, <a href="{{ route('verification.resend') }}">{{ __('Kliknij') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
