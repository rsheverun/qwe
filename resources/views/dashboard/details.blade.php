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
        <div class="row no-gutters mb-3  flex-wrap camera-info">
                    <div class="d-flex align-items-baseline pr-3">
                  <span class="title">ID:</span> <span class="pl-1 pr-1">{{$camera->id}}</span>
            </div>
            <div class="d-flex align-items-baseline pr-3">
                  <span class="title">camera:</span> <span class="pl-1 pr-1">{{$camera->cam}}</span>                  
            </div>
            <div class="pr-3">
                  <span class="title">name:</span> <span class="pl-1 pr-1">{{$camera->cam_name}}</span>                  
            </div>
        </div>
        <span class="title">decription:</span>
        <textarea name="desc" id="" cols="30" rows="10" class="desc mt-3 mb-3">{{$camera->desc}}</textarea>
        <span class="title">position:</span>
        <div class="row mt-3">
            <div class="d-flex pt-2">
                <label class="lat pl-3 pr-3">Latitude:</label>
                <input type="text" class="custom-input lat-input" name="latitude" value="{{$camera->latitude}}">
            </div>
            <div class="d-flex pt-2">
                <label class="lat pr-3 pl-3">Longitude:</label>
                <input type="text" class="custom-input lat-input" name="longitude" value="{{$camera->longitude}}">
            </div>
        </div>
        <div class="row mt-3">
            <div class="form-inline col">
            <label class="my-1 mr-2 title" for="inlineFormCustomSelectPref">model:</label>
            <select class="filter lat-input" id="inlineFormCustomSelectPref" name="cam_model_id">
                @foreach($camera_models as $model)
                <option value="{{$model->id}}" @if($camera->cam_model->id == $model->id) selected @endif>{{$model->name}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="row">
            <div class="form-inline col">
            <label class="my-1 mr-2 title" for="inlineFormCustomSelectPref">configset:</label>
            <select class="filter lat-input" id="inlineFormCustomSelectPref" name="config_id">
                @foreach($configsets as $configset)
                <option value="{{$configset->id}}" @if($camera->config_id == $configset->id) selected @endif>{{$configset->config_name}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <table class="table table-sm table-bordered text-center mt-3">
            <tr>
                <th style="width: 185px;">Key</th>
                <td style="width: 284px;">Value</td>
            </tr>
            <tr>
                <th>Org-Nme </th>
                <td>{{$camera->configset->org_name or 'empty'}}</td>
            </tr>
            <tr>
                <th>SMTP-Server </th>
                <td>{{$camera->configset->server or 'empty'}}</td>
            </tr>
            <tr>
                <th>SMTP-Port </th>
                <td>{{$camera->configset->port or 'empty'}}</td>
            </tr>
            <tr>
                <th>SMTP-User </th>
                <td>{{$camera->configset->user or 'empty'}}</td>
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
                <a href="https://www.google.com/maps/?q={{$camera->latitude}},{{$camera->longitude}}" target="_blank" class="btn btn-outline-success button-look btn-green btn-details mb-3">show interactive map</a>
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
        <div class="text-center img-height">
            <img id="{{$image->id}}" src="{{trim($image->bild)}}" class="zoom zoom-absolute img-fluid w-100" alt="{{$image->id}}">
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
         // The location of Uluru
    var uluru = {lat: {{$camera->latitude}}, lng: {{$camera->longitude}}};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 14, center: uluru, mapTypeId:google.maps.MapTypeId.SATELLITE});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
      }
</script>
@endsection