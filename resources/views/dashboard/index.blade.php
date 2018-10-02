@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">Statistics</span>
    </div>
</div>
<div class="row statistics">
    <div class="col-lg-2 offset-lg-1 col-md-4  col-xs-12 text-center">
        <h4 class="number">{{$count_all_images}}</h4>
        <p class="text-statistics">Total number of images per camera</p>
    </div>
    <div class="col-lg-2 offset-lg-2 col-md-4 col-xs-12 text-center">
        <h4 class="number">{{$count_day_images}}</h4>
        <p class="text-statistics">images last 24 hour per camera</p>
    </div>
    <div class="col-lg-2 offset-lg-2 col-md-4 col-xs-12 text-center">
        <h4 class="number">{{$count_day_cameras}}</h4>
        <p class="text-statistics">number of cameras with 0 and >1 image last 24h</p>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">activity stream</span>
    </div>
</div>
@foreach ($data as $item)   
<div class="row activity">
    <div class="col-6">
        <div class="info">
            <h6 class="title">new image</h6> 
            <span class="date">{{date('d.m.Y H:i:s', strtotime($item->datum))}}</span>
        </div>
        <div class="label-cam">
            {{$item->camera->cam}} - {{$item->camera->cam_name}}
        </div>
    </div>
    <div class="col-6 text-right">
        <img src="{{asset($item->bild)}}" class="zoom img-fluid" alt="">
    </div>
</div>
<hr>
@endforeach


<!-- <div class="row activity">
    <div class="col-6">
        <div class="info">
            <h6 class="title">new image</h6> 
            <span class="date">10.08.2018 18:44:11</span>
        </div>
        <div class="label-cam">
            mhA001 - Cam at Rosis house
        </div>
        <button type="button" class="btn btn-outline-success button-look button-img btn-green">look more</button>
    </div>
    <div class="col-6 text-right">
        <img src="{{asset('img/img2.png')}}" class="zoom img-fluid" alt="">
    </div>
</div> -->

@endsection