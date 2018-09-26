@extends('layouts.layout')
@section('content')

<div class="row">
    <div class="col-12">
        <span class="badge-statistic">images</span>
    </div>
</div>
<form class="images">
<div class="form-group row">
        <label for="staticEmail" class="title pl-3" style="width: max-content;">Camera: </label>
    <div class="col" style="max-width: max-content;">
    <select class="filter" id="exampleFormControlSelect1" name="group" style="width: 213px;" required>
            @foreach ($cameras as $camera)
            <option value="1">{{$camera->cam}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg offset-lg-1">
        <label for="staticEmail" class="title" id="date_label">date range:</label>
        <input type="date" id="date_from" class="filter ml-lg-3 mr-3">
        <input type="date" id="date_to" class="filter">
    </div>
</div>
  <!-- <div class="form-group row images">
    <label for="staticEmail" class="col-sm-1 col-form-label title images-title">Camera: </label>
    <div class="col-sm-3 align-self-center">
        <select class="filter" id="exampleFormControlSelect1" name="group" required>
            <option value="1">All</option>
        </select>
    </div>
    <label for="inputPassword" class="col-sm-2 col-form-label title images-title">date range: </label>
    <div class="col-sm-5 align-self-center">
    <input type="date" id="date_from" class="filter">
    <input type="date" id="date_to" class="filter">
    </div>
  </div> -->
</form>
 
<div class="row images">
<div class="table-responsive col-12">
    <table class="table-images table">
        <thead>
            <tr>
            <th scope="col" style="width: 300px;" >name</th>
            <th scope="col" style="width: 400px;">image</th>
            <th scope="col" style="width: 300px;">comment</th>
            <th scope="col" style="width: 170px;"> </th>
           
            </tr>
        </thead>
        <tbody>
        <tr>
                <td>
                    mhA001 - Cam at Rosis house <br>
                    10.08.2018 18:44:11
                </td>
                <td>
                    <img src="{{asset('img/img1.png')}}" class="zoom " alt="">
                </td>
                <td>
                    <div class="comment">
                        <span class="name">
                            Georg Shotingman, 21.08.2018 05:30:22
                        </span>
                        <span class="msg">
                            Why are there no deers arround?
                        </span> 
                    </div>
                    <input type="textarea" class="comment-text" placeholder="Write a message here..." name="msg">

                </td>
                <td class="text-right table-button">
                    <div class="button-group">
                    <button type="button" class="btn btn-outline-danger button-delete" style="margin-bottom: 15px;">Delete</button>
                    <button type="button" class="btn btn-outline-success button-look btn-green btn-forward" >forward to <br> email</button>
                    </div>
                </td>
            </tr>   
        <tr>
                <td>
                    mhA001 - Cam at Rosis house <br>
                    10.08.2018 18:44:11
                </td>
                <td>
                    <img src="{{asset('img/img1.png')}}" class="zoom " alt="">
                </td>
                <td>
                    <div class="comment">
                        <span class="name">
                            Georg Shotingman, 21.08.2018 05:30:22
                        </span>
                        <span class="msg">
                            Why are there no deers arround?
                        </span> 
                        <span class="name">
                            Georg Shotingman, 21.08.2018 05:30:22
                        </span>
                        <span class="msg">
                            Why are there no deers arround?
                        </span> 
                        <span class="name">
                            Georg Shotingman, 21.08.2018 05:30:22
                        </span>
                        <span class="msg">
                            Why are there no deers arround?
                        </span> 
                        <span class="name">
                            Georg Shotingman, 21.08.2018 05:30:22
                        </span>
                        <span class="msg">
                            Why are there no deers arround?
                        </span> 
                        <span class="name">
                            Georg Shotingman, 21.08.2018 05:30:22
                        </span>
                        <span class="msg">
                            Why are there no deers arround?
                        </span> 
                        <span class="name">
                            Georg Shotingman, 21.08.2018 05:30:22
                        </span>
                       
                    </div>
                    <input type="textarea" class="comment-text" placeholder="Write a message here..." name="msg">

                </td>
                <td class="text-right table-button">
                    <div class="button-group">
                    <button type="button" class="btn btn-outline-danger button-delete" style="margin-bottom: 15px;">Delete</button>
                    <button type="button" class="btn btn-outline-success button-look btn-green btn-forward">forward to <br> email</button>
                    </div>
                </td>
            </tr>   
        </tbody>
    </table>
</div>

        <div class="col-md-6 col-xs-12 ">
            <span class="btn btn-outline-success button-look btn-green pagination-info">20 per page</span>
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

<!-- Load Facebook SDK for JavaScript -->


  <!-- Your share button code -->
  <!-- <div class="fb-share-button" 
    data-href="{{Request::url()}}" 
    data-layout="button_count"> 
  </div> -->

@endsection