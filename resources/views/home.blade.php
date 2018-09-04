@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <chartline-component></chartline-component>
                <chartpie-component></chartpie-component>
                <div class="container">
                    <div class="row text-center">
                        <div class="col md-12">
                            <img class="zoom img-fluid" src="https://via.placeholder.com/350x150" alt="">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col md-12">
                            <img class="zoom img-fluid" src="https://via.placeholder.com/350x150" alt="">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col md-12">
                            <img class="zoom img-fluid" src="https://via.placeholder.com/350x150" alt="">
                        </div>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
   
</div>
</div>
@endsection
