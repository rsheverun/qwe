@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <span class="badge-statistic col-6">camera details</span>
    <button class="col-xs-12 btn btn-outline-danger btn-camera-delete">delete</button>

    <button class=" col-xs-12 btn btn-outline-success btn-add">new</button>

    </div>
    
</div>
<div class="details no-gutters">

<div class="row">
    <!-- left -->
    <div class="col-lg-5 col-xs-12">
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
    <div class="col-lg-7 col-xs-12">
        <div class="row no-gutters">
            <div id="map" style="height: 286px; margin-top: 0;"></div>
        </div>
        <div class="row no-gutters">
            <div class="col-12 text-right">
                <a href="#" class="btn btn-outline-success button-look btn-green btn-details">show interactive map</a>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-12">
            <span class="title">usergroups</span>
            </div>
        </div>
        <div class="row no-gutters">
            <span class="usergroups-title">usergroups</span>
            <span class="usergroups-title">usergroups</span>

        </div>

    </div>
</div>
<div class="row block">
    <div class="col-12">
        <span class="badge-statistic">latest images</span>
    </div>
</div>
<div class="row pr-lg-3">
    <div class="col-lg col-xs-12">
        <div class="text-center">
            <img src="{{asset('img/img1.png')}}" class="zoom img-fluid w-100" alt="">
        </div>
        <div class="text-right">
            <span class="date">09.08.2018 16:30:34</span>            
        </div>
    </div>
    <div class="col-lg col-xs-12">
        <div class="text-center">
            <img src="{{asset('img/img1.png')}}" class="zoom img-fluid  w-100" alt="">
        </div>
        <div class="text-right">
            <span class="date">09.08.2018 16:30:34</span>            
        </div>
    </div>
    <div class="col-lg col-xs-12 pr-lg-0">
        <div class="text-center">
            <img src="{{asset('img/img1.png')}}" class="zoom img-fluid  w-100  " alt="">
        </div>
        <div class="text-right">
            <span class="date">09.08.2018 16:30:34</span>            
        </div>
    </div>
</div>
    
</div>
        <!-- <div class="row col-12">
            <div class="text-right">
                <a href="#" class="btn btn-outline-success button-look btn-green">show all images</a>
            </div>
        </div>
        <div class="btn-save col-12">
                <div class="text-right">
                    <span class="badge-statistic">save</span>
                </div>
        </div> -->
        <div class="row text-right">
            <div class="col-12">
            <a href="#" id="btn_all_img" class="btn btn-outline-success button-look btn-green btn-details">show all images</a>
            </div>
        </div>
        <div class="row text-right">
    <div class="col-12">
        <button class="btn settings-save btn-details-save">save</button>
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