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
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">Statistics</span>
    </div>
</div>
<div class="row statistics">
    <div class="col-lg-3 offset-lg-1 col-md-4  col-xs-12 text-center">
        <h4 class="number-statistics">{{$count_all_images}}</h4>
        <p class="text-statistics">Total number of images per camera</p>
    </div>
    <div class="col-lg-2 offset-lg-1 col-md-4 col-xs-12 text-center">
        <h4 class="number-statistics">{{$count_day_images}}</h4>
        <p class="text-statistics">images last 24 hour per camera</p>
    </div>
    <div class="col-lg-3 offset-lg-1 col-md-4 col-xs-12 text-center">
        <h4 class="number-statistics">{{$count_day_cameras}}</h4>
        <p class="text-statistics">number of cameras with 0 and >1 image last 24h</p>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">activity stream</span>
    </div>
</div>
@if($data->count() != null)
    @foreach ($data as $item) 
    @if ($item->name == 'new device')
    <div class="row activity no-image">
        <div class="col-lg-6 col-xs-12">
            <div class="info">
                <h6 class="title">{{$item->name}}</h6> 
                <span class="date">{{date('d.m.Y H:i:s', strtotime($item->date))}}</span>
            </div>
            <div>
                Camera <span class="label-cam">{{$item->camera->cam_name or 'empty'}}</span> was added.
            </div>
        </div>
        @hasanyrole('admin|user')
            <div class="col-lg-6 col-xs-12 w-100 text-right">
                <a href="{{ route('cameras.show', $item->camera_id) }}" class="btn btn-outline-success button-look btn-green">look more</a>
            </div>
        @endhasanyrole
    </div>
    <hr>
    @elseif ($item->name == 'new image')  
    <div class="row activity">
        <div class="col-6">
            <div class="info">
                <h6 class="title">{{$item->name}}</h6> 
                <span class="date">{{date('d.m.Y H:i:s', strtotime($item->date))}}</span>
            </div>
            <div class="label-cam">
                {{$item->camImage->camera->cam or 'empty'}} - {{$item->camImage->camera->cam_name or 'empty'}}
            </div>
        </div>
        <div class="col-6 text-right">
            <img src="{{asset($item->camImage->bild)}}" class="zoom img-fluid" alt="{{$item->id}}">
        </div>
    </div>
    <hr>
    @endif
    @endforeach
@else
<p class="text-center label-cam">No available data</p>
<hr>
@endif



<div class="block">
    {{$data->links('layouts.pagination')}}
</div>


@endsection