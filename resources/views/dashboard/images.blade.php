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
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">images</span>
    </div>
</div>
<form class="images" action="{{route('images.index')}}">
    <div class="form-group row">
            <label for="staticEmail" class="title pl-3" style="width: max-content;">Camera: </label>
        <div class="col" style="max-width: max-content;">
        <select class="filter" id="exampleFormControlSelect1" name="camera_id" style="width: 213px;" required>
                <option value="0">select cam</option>            
                @foreach ($cameras as $camera)
                    <option value="{{$camera->id}}">{{$camera->cam}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg offset-lg-1">
            <label for="staticEmail" class="title" id="date_label">date range:</label>
            <input type="date" id="date_start" name="date_start" class="filter ml-lg-3 mr-3">
            <input type="date" id="date_to" name="date_to" class="filter">
    <button type="submit" id="smbt" name="filter"  class="btn btn-outline-success button-look btn-green btn-details mr-3 ml-3 col-xs-12">Filter</button>
        
        </div>

    </div>
    
</form>
 
<div class="row images">
    <div class="table-responsive col-12">
    <div id="comments-data">
       
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
                    @foreach($camimages as $img)
                            <tr id="img_{{$img->id}}">
                                    <td>
                                    {{$img->camera->cam}} - {{$img->camera->cam_name}} <br>
                                        {{$img->datum}}
                                    </td>
                                    <td>
                                        <img src="{{trim($img->bild)}}" class="zoom " alt="">
                                    </td>
                                    <td>
                                       <comments cam="{{$img}}" :cam="{{$img}}"></comments>

                                    </td>
                                    <td class="text-right table-button">
                                        <div class="button-group">
                                        <form action="{{route('images.destroy',$img->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="button" data-toggle="modal" id="{{$img->id}}"  onclick="modal_data(this.id, 'image_destroy')" data-target="#exampleModal" class="btn btn-outline-danger button-delete" style="margin-bottom: 15px;">Delete</button>
                                            <!-- modal -->
                                                @include('layouts.modal')
                                            <!-- endmodal -->
                                        </form>
                                        <button onclick="location.href='mailto:';" type="button" class="btn btn-outline-success button-look btn-green btn-forward" >forward to <br> email</button>
                                        </div>
                                    </td>
                            </tr>
                    @endforeach
            </tbody>
        </table>
        </div>   
    </div>
</div>
<div class="block">
    {{$camimages->links('layouts.pagination')}}
</div>


@endsection