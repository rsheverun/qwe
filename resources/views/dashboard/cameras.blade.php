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
                    <a href="#" class="btn btn-outline-success button-look">details</a>
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
                    <a href="#" class="btn btn-outline-success button-look">details</a>
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
                    <a href="#" class="btn btn-outline-success button-look">details</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

    
        <div class="col-md-6 col-xs-12 ">
            <span class="btn btn-outline-success button-look pagination-info">20 per page</span>
        </div>
        <div class="col-md-6 text-right">
          <nav aria-label="Page navigation example">
            <ul class="pagination custom-pagination">
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
          </nav>
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