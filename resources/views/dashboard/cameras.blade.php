@extends('layouts.layout')
@section('content')
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
        <span class="badge-statistic">map</span>
    </div>
</div>
<div id="map"></div>
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">cameras</span>
    </div>
</div>
<div class="row activity">
    <div class="table-responsive col-12">
    <table class="custom-table">
        <thead>
            <tr>
            <th scope="col" >ID</th>
            <th scope="col">Camera</th>
            <th scope="col">Name</th>
            <th scope="col">Model</th>
            <th scope="col">Configset</th>
            <th scope="col">Last image</th>
            <th scope="col">Total images</th>
            <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cameras as $k=>$camera)

            <tr>
                <td>{{$k+1}}</td>
                <td>{{$camera->cam}}</td>
                <td>{{$camera->cam_name}}</td>
                <td>{{$camera->cam_model}}</td>
                <td>default</td>
                <td>
                    {{$camera->camImages->max('datum')}}
                </td>
                <td>
                {{$camera->camImages->count()}}
                </td>
                <td class="text-right table-button">
                    <a href="{{ route('cameras.show', $camera->id) }}" class="btn btn-outline-success button-look btn-green btn-details">details</a>
                </td>
            </tr>
            
        @endforeach
         
        </tbody>
    </table>
</div>

    </div>
    <div class="block">
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