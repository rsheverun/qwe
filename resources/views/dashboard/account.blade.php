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
    <account-data></account-data>
</div>
@endsection