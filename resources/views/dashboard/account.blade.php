@extends('layouts.layout')
@section('content')
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
            <div class="col-lg-7">
                <label for="staticEmail" class="title" id="date_label">date range:</label>
                <input type="date" id="date_start" name="date_start" class="filter" onchange="document.getElementById('smbt').click()" required>
                <input type="date" id="date_to" name="date_to" class="filter" onchange="document.getElementById('smbt').click()" required>
                <button type="submit" id="smbt" style="display: none;" name="filter"></button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="huntingarea-table">
                <thead>
                    <tr>
                        <th scope="col" >Day</th>
                        <th scope="col">camera</th>
                        <th scope="col">number of images</th>
                        <th scope="col">transfer in mb</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index=>$items)
                   
                        @foreach($items as $date=>$item)
                        <?php $count_mb = 0?>
                    <tr>
                    <td>{{$date}}</td>
                        <td>{{$item->first()->camera->cam}} - {{$item->first()->camera->cam_name}}</td>
                        <td>{{$item->count()}} </td> 
                        <td>
                        @foreach($item as $i)
                        <?php 
                            $count_mb += File::size($i->bild)
                        ?>
                        @endforeach
                        {{number_format((float)$count_mb/1048576, 2, '.', '')}}
                        </td>
                    </tr>
                    <input type="hidden" value="{{$count += $item->count()}}">
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row col">
            <span class="sum pr-1">Sum per month: </span> <span class="sum number">{{$count}}</span>
        </div>
    </div>
    </form>

@endsection