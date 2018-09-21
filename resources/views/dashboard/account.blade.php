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
    <button type="submit" class="btn btn-outline-danger button-delete align-self-start">DELETE</button>
</div>
</form>
<div class="row block">
    <div class="col-12">
        <span class="badge-statistic">usage</span>
    </div>
</div>
<form action="">
<div class="form-group row">
<div class="col-lg-7">
        <label for="staticEmail" class="title" id="date_label">date range:</label>
        <input type="date" id="date_from" class="filter ml-lg-3 mr-3" >
        <input type="date" id="date_to" class="filter">
    </div>
</div>
<!-- <div class="row mb-4 mt-4">
            <label for="staticEmail" class="title col-lg-2 col-xs-12">date range:</label>
        
        <input type="date" class="filter mr-3">
        <input type="date" class="filter">
    </div> -->
</form>
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
            <tr>
                <td>10.08.2018 18:44:11</td>
                <td>mhA001 - Cam at Rosis house</td>
                <td>56</td>
                <td>Lorem ipsum</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div class="row col">
    <span class="sum pr-1">Sum per month: </span> <span class="sum number">112</span>
    </div>
    <div class="block">
 @include('layouts.pagination')
</div>
@endsection