@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('text.title')</div>
                <form action="{{ route('change_locale') }}">
                {{ csrf_field() }}
                <select name="lang" onchange="this.form.submit()">
                    <option value="en" @if(Session::get('lang') == "en") selected @endif>En</option>
                    <option value="ger" @if(Session::get('lang') == "ger") selected @endif>Ger</option>
                </select>
                </form>
            
                <div class="card-body">
                
                @lang('text.all')
                <a href="{{ route('home') }}">back</a>
            </div>
        </div>

    </div>
    
</div>
</div>

@endsection
