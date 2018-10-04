@extends('layouts.layout')
@section('content')

<div class="row">
    <div class="col-12">
        <span class="badge-statistic">images</span>
    </div>
</div>
<form class="images" action="{{route('images')}}">
    <div class="form-group row">
            <label for="staticEmail" class="title pl-3" style="width: max-content;">Camera: </label>
        <div class="col" style="max-width: max-content;">
        <select class="filter" id="exampleFormControlSelect1" name="camera_id" style="width: 213px;" onchange="document.getElementById('smbt').click()" required>
                <option value="1">select cam</option>            
                @foreach ($cameras as $camera)
                <option value="{{$camera->id}}">{{$camera->cam}}</option>
                @endforeach
            </select>
            <button type="submit" id="smbt" name="filter" style="display: none;"></button>
        </div>
        <div class="col-lg offset-lg-1">
            <label for="staticEmail" class="title" id="date_label">date range:</label>
            <input type="date" id="date_start" class="filter ml-lg-3 mr-3" onchange="document.getElementById('smbt').click()" required>
            <input type="date" id="date_to" class="filter" onchange="document.getElementById('smbt').click()" required>
        </div>
    </div>
    
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
            @foreach($cameras as $camera)
                @foreach($cameras->first()->camimages as $img)
                    <tr>
                            <td>
                            {{$camera->cam}} - {{$camera->cam_name}} <br>
                                {{$img->datum}}
                            </td>
                            <td>
                                <img src="{{trim($img->bild)}}" class="zoom " alt="">
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
                    @endforeach
                @endforeach   
            </tbody>
        </table>
    </div>
</div>

@endsection