@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formularz zmiany hasła') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row p-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Twój adres e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email"  type="email" class="form-control @error('email') alert alert-danger is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" readonly autofocus>

                                @error('email')
                                    <span class="invalid-feedback alert alert-warning" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row p-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nowe hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') alert alert-danger is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback alert alert-warning" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Potwierdź nowe hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Zresetuj hasło') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
