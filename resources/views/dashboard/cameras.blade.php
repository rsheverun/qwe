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
        <span class="badge-statistic">map</span>
    </div>
</div>
<div id="map"></div>
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">cameras</span>
        @hasanyrole('admin|user')
            <button type="button" class=" col-xs-12 btn btn-outline-success btn-add open-modal" data-target="create_cam" value="1">new</button>
        @endhasanyrole
    </div>
</div>
<div class="row activity ml-1 mr-1">
    <div class="table-responsive">
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
            @hasanyrole('admin|user')
                <th scope="col"> </th>
            @endhasanyrole
            </tr>
        </thead>
        <tbody>
        @if($cameras->count()!= 0)
            @foreach ($cameras as $k=>$camera)
                    <tr style="@if($k+1 == $cameras->count()) border-bottom: none;@endif">
                        <td>{{$camera->id}}</td>
                        <td>{{$camera->cam}}</td>
                        <td>{{$camera->cam_name}}</td>
                        <td>{{$camera->cam_model->name}}</td>
                        <td>default</td>
                        <td>
                            {{date('d.m.Y H:i:s', strtotime($camera->camImages->max('datum')))}}
                        </td>
                        <td>
                        {{$camera->camImages->count()}}
                        </td>
                        @hasanyrole('admin|user')

                        <td class="text-right table-button">
                            <a href="{{ route('cameras.show', $camera->id) }}" 
                                class="btn btn-outline-success button-look btn-green btn-details">
                                details
                            </a>
                        </td>
                        @endhasanyrole

                    </tr>
            @endforeach
        @else
            <td colspan="7" class="text-center">No data available in table</td>
        @endif
        </tbody>
    </table>
</div>

</div>
    <div class="block">
        {{$cameras->links('layouts.pagination')}}
    </div>

    
</div>    
<script>

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          mapTypeId:google.maps.MapTypeId.SATELLITE,
          center: {lat: {{$latitude}}, lng: {{$longitude}}}
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });
        
        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      var locations = [
        @foreach ($cameras as $camera)
                {lat: {{$camera->latitude}}, lng: {{$camera->longitude}}},
        @endforeach
      ]
</script>
@endsection
