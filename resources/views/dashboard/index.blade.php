@extends('layouts.layout')
@section('content')
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
@foreach ($data as $item) 
@if ($item->name == 'new device')
<div class="row activity no-image">
    <div class="col-lg-6 col-xs-12">
         <div class="info">
            <h6 class="title">{{$item->name}}</h6> 
            <span class="date">{{date('d.m.Y H:i:s', strtotime($item->date))}}</span>
        </div>
        <div class="label-cam">
            {{$item->camera->cam or 'empty'}} - {{$item->camera->cam_name or 'empty'}}
        </div>
    </div>
    @hasanyrole('admin|user')
        <div class="col-6 text-right">
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


<div class="block">
    {{$data->links('layouts.pagination')}}
</div>


@endsection