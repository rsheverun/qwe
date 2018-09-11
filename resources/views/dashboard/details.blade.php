@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">camera details</span>
    </div>
</div>
<div class="details no-gutters">

<div class="row">
    <!-- left -->
    <div class="col-md-5 col-xs-12">
        <div class="row no-gutters">
            <div class="col-md-2 col-xs-4">
                  <span class="title">ID:</span> <span class="">1</span>
            </div>
            <div class="col-md-5 col-xs-4">
                  <span class="title">camera:</span> <span class="">mha001</span>                  
            </div>
            <div class="col-md-5 col-xs-4">
                  <span class="title">name:</span> <span class="">Cam at Rosis house</span>                  
            </div>
        </div>
        <span class="title">decription:</span>
        <textarea name="desc" id="" cols="30" rows="10" class="desc"></textarea>
        <span class="title">position:</span>
        <div class="row">
            <div class="col-6">
                <span class="lat">latitude:</span> asdas
            </div>
            <div class="col-6">
                <span class="lat">Longitude:</span> sadasd
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="title">model </span>BL460P
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="title">configset: </span>Default
            </div>
        </div>
        <table class="table table-sm table-bordered text-center">
            <tr>
                <th style="width: 185px;">Key</th>
                <td style="width: 284px;">Value</td>
            </tr>
            <tr>
                <th>Org-Nme </th>
                <td>MHA</td>
            </tr>
            <tr>
                <th>Org-Nme </th>
                <td>MHA</td>
            </tr>
            <tr>
                <th>Org-Nme </th>
                <td>MHA</td>
            </tr>
        </table>
        
    </div><!-- left -->
    <!-- right -->
    <div class="col-md-7 col-xs-12">
        <div class="row no-gutters">
            <div id="map" style="height: 286px;"></div>
        </div>
    </div>
    <div class="row details">
    <div class="col-12">
        <span class="badge-statistic">latest images</span>
    </div>
    <div class="row latest-images col-12 no">
        <div class="col-md-4">
            <img src="{{asset('img/img1.png')}}" class=" img-fluid zoom " alt="">
            <div class="text-right">
                <span class="date">09.08.2018 16:30:34</span>            
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{asset('img/img1.png')}}" class=" img-fluid zoom " alt="">
            <div class="text-right">
                <span class="date">09.08.2018 16:30:34</span>            
            </div>            
        </div>
        <div class="col-md-4">
            <img src="{{asset('img/img1.png')}}" class="img-fluid zoom " alt="">
            <div class="text-right">
                <span class="date">09.08.2018 16:30:34</span>            
            </div>            
        </div>
    </div>
</div>
</div>
</div>
<script>

function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 36.964, lng: -122.015},
          zoom: 18,
          mapTypeId: 'satellite'
        });
        map.setTilt(45);
      }
</script>
@endsection