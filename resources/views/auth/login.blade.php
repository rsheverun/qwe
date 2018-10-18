@extends('layouts.layout')

@section('content')
<div class="container">
@if(Session::has('alert'))

<div class="alert alert-success">

    {{ Session::get('alert') }}

    @php

    Session::forget('alert');

    @endphp

</div>

@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Login') }}</div> -->

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Nickname') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ old('nickname') }}" required autofocus>

                               @if ($errors->has('nickname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn camera-save">
                                    {{ __('Login') }}
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
