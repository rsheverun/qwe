@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">Statistics</span>
    </div>
</div>
<div class="row statistics">
    <div class="col-md-4  col-xs-12 text-center">
        <h4 class="number">476</h4>
        <p class="text-statistics">Total number of images per camera</p>
    </div>
    <div class="col-md-4 col-xs-12 text-center">
        <h4 class="number">12</h4>
        <p class="text-statistics">images last 24 hour per camera</p>
    </div>
    <div class="col-md-4 col-xs-12 text-center">
        <h4 class="number">4</h4>
        <p class="text-statistics">number of cameras with 0 and >1 image last 24h</p>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">activity stream</span>
    </div>
</div>
<div class="row activity">
    <div class="col-6">
        <div class="info">
            <h6 class="title">new image</h6> 
            <span class="date">10.08.2018 18:44:11</span>
        </div>
        <div class="label-cam">
            mhA001 - Cam at Rosis house
        </div>
        <button type="button" class="btn btn-outline-success button-look button-img" >look more</button>
    </div>
    <div class="col-6 text-right">
        <img src="{{asset('img/img1.png')}}" class="zoom img-fluid" alt="">
    </div>
</div>
<hr>
<div class="row activity no-image">
    <div class="col-6">
         <div class="info">
            <h6 class="title">new image</h6> 
            <span class="date">10.08.2018 18:44:11</span>
        </div>
        <div class="label-cam">
            mhA001 - Cam at Rosis house
        </div>
    </div>
        <div class="col-6 text-right">
        <button type="button" class="btn btn-outline-success button-look">look more</button>
           
    </div>
</div>
<hr>
<div class="row activity no-image">
    <div class="col-6">
         <div class="info">
            <h6 class="title">new image</h6> 
            <span class="date">10.08.2018 18:44:11</span>
        </div>
        <div class="label-cam">
            mhA001 - Cam at Rosis house
        </div>
    </div>
        <div class="col-6 text-right">
        <button type="button" class="btn btn-outline-success button-look">look more</button>
           
    </div>
</div>
<hr>
<div class="row activity">
    <div class="col-6">
        <div class="info">
            <h6 class="title">new image</h6> 
            <span class="date">10.08.2018 18:44:11</span>
        </div>
        <div class="label-cam">
            mhA001 - Cam at Rosis house
        </div>
        <button type="button" class="btn btn-outline-success button-look button-img">look more</button>
    </div>
    <div class="col-6 text-right">
        <img src="{{asset('img/img2.png')}}" class="zoom img-fluid" alt="">
    </div>
</div>
@endsection