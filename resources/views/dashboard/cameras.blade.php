@extends('layouts.layout')
@section('content')
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
            <tr>
                <td>1</td>
                <td>mha001</td>
                <td>Cam at Rosis house</td>
                <td>bl460p</td>
                <td>default</td>
                <td>10.08.2018 18:44:11</td>
                <td>5</td>
                <td class="text-right table-button">
                    <a href="{{ route('details') }}" class="btn btn-outline-success button-look btn-green btn-details">details</a>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>mha001</td>
                <td>Cam at Rosis house</td>
                <td>bl460p</td>
                <td>default</td>
                <td>10.08.2018 18:44:11</td>
                <td>5</td>
                <td class="text-right table-button">
                    <a href="{{ route('details') }}" class="btn btn-outline-success button-look btn-green btn-details">details</a>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>mha001</td>
                <td>Cam at Rosis house</td>
                <td>bl460p</td>
                <td>default</td>
                <td>10.08.2018 18:44:11</td>
                <td>5</td>
                <td class="text-right table-button">
                    <a href="{{ route('details') }}" class="btn btn-outline-success button-look btn-green btn-details">details</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

    </div>
    <div class="block">
 @include('layouts.pagination')
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