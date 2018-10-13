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
<form class="images d-flex" action="{{route('images.index')}}">
    <div class="form-group filter-camera">
        <label for="staticEmail" class="title pr-3 mt-2">Camera: </label>
        <select class="filter mt-2" id="exampleFormControlSelect1" name="camera_id" required>
            <option value="0">select cam</option>            
                @foreach ($cameras as $camera)
                    <option value="{{$camera->id}}">{{$camera->cam}}</option>
                @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="staticEmail" class="title" id="date_label">date range:</label>
        <input  placeholder="From" id="date_start" name="date_start" class="filter-date pl-1 ml-lg-3 mr-3  mt-2 mb-2" type="text" 
                onfocus="(this.type='date')" required>
        <input  id="date_to" name="date_to" class="filter-date pl-1 ml-lg-3 mr-3  mt-2 mb-2" type="text" 
                placeholder="To" onfocus="(this.type='date')"  required>
        <button type="submit" id="smbt" name="filter"  class="btn btn-outline-success button-look btn-green btn-details btn-filter">Filter</button>
    </div>    
</form>
 
<div class="row">
    <div class="table-responsive col-12">
    <div id="comments-data">
       
    <table class="table-images table">
            <thead>
                <tr>
                <th scope="col" style="width: 300px;" >name</th>
                <th scope="col" style="width: 400px;">image</th>
                @hasanyrole('admin|user')
                    <th scope="col" style="width: 300px;">comments</th>
                @endhasanyrole
                <th scope="col" style="width: 170px;"> </th>
            
                </tr>
            </thead>
            <tbody>
                @if($camimages->count() != 0)
                    @foreach($camimages as $img)
                            <tr id="img_{{$img->id}}">
                                    <td>
                                    {{$img->camera->cam}} - {{$img->camera->cam_name}} <br>
                                    <span class="image-date">{{date('d.m.Y H:i:s', strtotime($img->datum))}}</span>
                                    </td>
                                    <td>
                                        <img src="{{trim($img->bild)}}" class="zoom " alt="{{$img->id}}">
                                    </td>
                                    @hasanyrole('admin|user')
                                        <td class="comment-wrapper">
                                            <comments cam="{{$img}}" :cam="{{$img}}"></comments>
                                        </td>
                                    @endhasanyrole
                                    <td class="text-right table-button">
                                        <div class="button-group">
                                        @hasanyrole('admin|user')
                                            <form action="{{route('images.destroy',$img->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="button" data-toggle="modal" id="{{$img->id}}"  onclick="modal_data(this.id, 'image_destroy')" data-target="#exampleModal" class="btn btn-outline-danger button-delete" style="margin-bottom: 15px;">Delete</button>
                                                    <!-- modal -->
                                                        @include('layouts.modal')
                                                    <!-- endmodal -->
                                            </form>
                                        @endhasanyrole
                                            <button onclick="location.href='mailto:';" type="button" class="btn btn-outline-success button-look btn-green btn-forward" >forward to <br> email</button>
                                        </div>
                                    </td>
                            </tr>
                    @endforeach
                @else
                    <td colspan="4" class="text-center">No data available in table</td>
                @endif
            </tbody>
        </table>
        </div>   
    </div>
</div>
<div class="block">
    {{$camimages->links('layouts.pagination')}}
</div>


@endsection