@extends('layouts.layout')
@section('content')
@if ($errors->any())
             <div class="alert alert-danger alert-dismissible text-center">
             @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>    
      @endforeach               
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success alert-dismissible text-center">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif  
<div class="row">
    <div class="col-12">
        <span class="badge-statistic col-6">camera details</span>
    <button class="col-xs-12 btn btn-outline-danger btn-camera-delete" data-toggle="modal" id="{{$camera->id}}"  onclick="modal_data(this.id, 'camera_destroy')" data-target="#exampleModal">delete</button>

    <button class=" col-xs-12 btn btn-outline-success btn-add" data-toggle="modal" data-target="#exampleModalLong">new</button>

    </div>
    @include('layouts.create_cam_modal')
    <form action="{{route('cameras.destroy', $camera->id)}}" method="post">
    @csrf
    @method('DELETE')
    @include('layouts.modal')
    
    </form>
</div>
<div class="details no-gutters">

<div class="row">
    <!-- left -->
    <div class="col-lg-5 col-xs-12">
    <form action="{{route('cameras.update', $camera->id)}}" method="post" id="camera_edit">
        @csrf
        @method('PUT')
        <div class="row no-gutters">
            <div class="col-md-2 col-xs-4">
                  <span class="title">ID:</span> <span class="">{{$camera->id}}</span>
            </div>
            <div class="col-md-5 col-xs-4">
                  <span class="title">camera:</span> <span class="">{{$camera->cam}}</span>                  
            </div>
            <div class="col-md-5 col-xs-4">
                  <span class="title">name:</span> <span class="">{{$camera->cam_name}}</span>                  
            </div>
        </div>
        <span class="title">decription:</span>
        <textarea name="desc" id="" cols="30" rows="10" class="desc">{{$camera->desc}}</textarea>
        <span class="title">position:</span>
        <div class="row">
            <div class="col-6 form-inline">
                <span class="lat  col-lg col-md-12 pr-0 pl-0">latitude:</span>
                <input type="text" class="col custom-input" name="latitude" value="{{$camera->latitude}}">
            </div>
            <div class="col-6 form-inline">
                <span class="lat col-lg  pl-0">Longitude:</span>
                <input type="text" class="col custom-input" name="longitude" value="{{$camera->longitude}}">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="title">model </span>BL460P
            </div>
        </div>
        <div class="row">
            <div class="form-inline col">
            <label class="my-1 mr-2 title" for="inlineFormCustomSelectPref">configset:</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="config_id">
                @foreach($configsets as $configset)
                <option value="{{$configset->id}}" @if($camera->config_id == $configset->id) selected @endif>{{$configset->config_name}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <table class="table table-sm table-bordered text-center">
            <tr>
                <th style="width: 185px;">Key</th>
                <td style="width: 284px;">Value</td>
            </tr>
            <tr>
                <th>Org-Nme </th>
                <td>{{$camera->configset->org_name}}</td>
            </tr>
            <tr>
                <th>SMTP-Server </th>
                <td>{{$camera->configset->server}}</td>
            </tr>
            <tr>
                <th>SMTP-Port </th>
                <td>{{$camera->configset->port}}</td>
            </tr>
            <tr>
                <th>SMTP-User </th>
                <td>{{$camera->configset->user}}</td>
            </tr>
        </table>
        </form>
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
        @foreach($camera->userGroups as $group)
            <span class="usergroups-title">{{$group->name}}</span>
        @endforeach
        </div>

    </div>
</div>

<div class="row block">
    <div class="col-12">
        <span class="badge-statistic">latest images</span>
    </div>
</div>

<div class="row pr-lg" id="images">
@foreach($camimages as $k=>$image)

    <div class="col-lg-4 col-xs-12">
        <div class="text-center">
            <img src="{{trim($image->bild)}}" class="zoom img-fluid w-100" alt="">
        </div>
        <div class="text-right">
            <span class="date">{{date('d.m.Y H:i:s', strtotime($image->datum))}}</span>            
        </div>
    </div>
@endforeach
<images-component cam="{{$camera}}" :cam="{{$camera}}"></images-component>
</div>
    
</div>


    <div class="row text-right">
    <div class="col-12">
        <button type="submit" form="camera_edit" class="btn settings-save btn-details-save">save</button>
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