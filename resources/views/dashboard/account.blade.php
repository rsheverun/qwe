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
<div class="row block">
    <div class="col-12">
        <span class="badge-statistic">base settings</span>
    </div>
</div>
<form action="{{route('account.destroy', Auth::user()->id)}}" method="post">
@csrf
@method('DELETE')
<div class="d-flex justify-content-between flex-row">
    <span class="align-self-center">Delete this Account and all Data permanently</span>    
    <button type="button" data-toggle="modal" id="{{Auth::user()->id}}"  onclick="modal_data(this.id, 'user_destroy')" data-target="#exampleModal" class="btn btn-outline-danger button-delete align-self-start">DELETE</button>
<!-- modal -->
    @include('layouts.modal')
<!-- endmodal -->
</div>
</form>
<div class="row block">
    <div class="col-12">
        <span class="badge-statistic">usage</span>
    </div>
</div>
<div id="account_data">
    <form action="{{route('account.index')}}">
        <div class="form-group row">
            <div class="col">
                <label for="staticEmail" class="title pr-3" id="date_label">date range:</label>
                <input  id="date_start" name="date_start" class="filter-date mr-3  mt-2 pl-1" 
                    type="text" onfocus="(this.type='date')"
                    placeholder="From" required>
                <input  id="date_to" name="date_to" class="filter-date mt-2 pl-1 mb-2 mr-3" type="text" 
                    onfocus="(this.type='date')"
                    placeholder="To" required>
        <button type="submit" id="smbt" name="filter"  class="btn btn-outline-success button-look btn-green btn-details btn-filter">Filter</button>

            </div>
        </div>
        <div class="table-responsive">
            <table class="huntingarea-table">
                <thead>
                    <tr>
                        <th scope="col" >Day</th>
                        <th scope="col">camera</th>
                        <th scope="col" @if($data->count()==0) class="text-center" @endif>number of images</th>
                        <th scope="col" @if($data->count()==0) class="text-center" @endif>transfer in mb</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->count()!=0)
                        @foreach ($data as $date=>$item)
                    
                            <?php $count_mb = 0?>
                        <tr>
                        <td>{{$date}}</td>
                            <td style="white-space: nowrap; max-width: 250px;">{{$item->first()->camera->cam}} - {{$item->first()->camera->cam_name}}</td>
                            <td>{{$item->count()}} </td> 
                            <td>
                            @foreach($item as $i)
                            <?php 
                                $count_mb += filesize($i->bild)
                            ?>
                            @endforeach
                            {{number_format((float)$count_mb/1048576, 2, '.', '')}}
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <td colspan="4" class="text-center">{{$msg}}</td>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="row col pt-3">
            <span class="sum pr-1">Sum per month: </span> <span class="sum number">{{$count}}</span>
        </div>
    </div>
   
    </form>
    <div class="block">
        {{$data->links('layouts.pagination')}}
    </div>
@endsection