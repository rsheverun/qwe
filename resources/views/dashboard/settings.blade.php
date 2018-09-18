@extends('layouts.layout')
@section('content')

<div class="row block">
    <div class="col-12">
        <span class="badge-statistic">base settings</span>
    </div>
</div>
<div class="base-settings">
    <form action="">
        <div class="form-row">
            <div class="d-flex flex-row col-lg-4 col-md col-xs-12 user-input">
                <label for="user" class="title">Name:</label>
                <input type="text" class="align-self-start flex-grow-1 custom-input">
            </div>
        </div>
        <div class="form-row">
            <div class="d-flex flex-row col-lg-4 col-md col-sm col-xs-12">
                <label for="user" class="title" >Short Name:</label>
                <input type="text" class="align-self-start col custom-input">
            </div>
            <div class="d-flex flex-row pl-lg-3">
            <span class="ml-1">Portal URL: https://mha.mycams.com</span>
        </div>
    </form>
</div>
</div>

<div class="row block">
    <div class="col-12">
        <span class="badge-statistic">hunting areas</span>
    </div>
</div>
<div class="table-responsive">
    <table class="huntingarea-table">
        <thead>
            <tr>
            <th scope="col" >ID</th>
            <th scope="col">hunting area</th>
            <th scope="col">description</th>
            <th scope="col">created</th>
            <td scope="col" class="anotation text-right">*click on the field to edit</td>
            
            </tr>
        </thead>
        <tbody>
            @foreach($areas as $k=>$area)
            <tr>
                <td>{{$k+1}}</td>
                <td>{{$area->name}}</td>
                <td>{{$area->description}}</td>
                <td>{{$area->created_at}}</td>
                <td class="text-right table-button">
                <form action="{{route('settings.destroy', $area->id)}}" method="post" id="hunting_area_destroy">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="hunting_area">
                    <button type="submit" class="btn btn-outline-danger button-delete" >Delete</button>
                </form>   
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="block">
 @include('layouts.pagination')
</div>

<div class="hunting-areas">
    <div class="row">
        <div class="col-lg-4 col-xs-12">
            <form id="hunting_areas_store" action="{{route('settings.store')}}" method="post">
                @csrf
                <input type="hidden" name="hunting_area">
                    <div class="d-flex flex-row p-0">
                            <label for="name" class="title">name:</label>
                            <input type="text" id="area_name" class="flex-grow-1 custom-input" name="area_name">
                    </div>
                    <label for="desc" class="title mt-4">description:</label>

                    <div class="d-flex flex-row p-0">
                            <textarea  id="area_desc" name="area_desc"  id="desc" cols="30" rows="10" class="desc custom-input"></textarea>
                    </div>
           
        </div>
        <div class="col-lg-8 col-xs-12">
        
            <div class="table-responsive">
                <table class="table table-sm table-bordered text-center table-settings">
                    <thead>
                        <tr>
                            <th>Config Key</th>
                            <th>Value</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>vMAP Instance</td>
                            <td>https:/mha1.vmap.rocks</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>vMAP Instance</td>
                            <td>https:/mha1.vmap.rocks</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>vMAP Instance</td>
                            <td>https:/mha1.vmap.rocks</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <button  id="area_store" class="btn btn-outline-success btn-add btn-absolute mr-lg-3">add</button>

    </form>
    <script type="text/javascript" language="javascript">
$(function() {
      $('#hunting_areas_store').submit(function(e) {
        var $form = $(this);
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        }).done(function() {
          console.log('success');
        }).fail(function() {
          console.log('fail');
        });
        //отмена действия по умолчанию для кнопки submit
        e.preventDefault(); 
      });
    });
</script>

    </div>
</div>
<div class="row  block">
    <div class="col-12">
        <span class="badge-statistic">usergroups</span>
    </div>
</div>

<div class="table-responsive">
    <table class="huntingarea-table">
        <thead>
            <tr>
            <th scope="col" >ID</th>
            <th scope="col">usergroup name</th>
            <th scope="col">is admin?</th>
            <th scope="col">is user?</th>
            <th scope="col">is guest?</th>
            <th scope="col">created</th>
            <td scope="col" class="anotation text-right">*click on the field to edit</td>
            
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Admins</td>
                <td>Yes</td>
                <td>No</td>
                <td>No</td>
                <td>15.02.2018 15:33:01</td>
                <td class="text-right table-button">
                <button type="button" class="btn btn-outline-danger button-delete" >Delete</button>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>


<div class="block">
 @include('layouts.pagination')
</div>
</div>

<div class="usergroups">
<form action="#">
    <div class="form-group row" >
        <div class="col-lg-3 col-xs-12 users-label pr-0" >
            <label for="staticEmail" class="title">usergroup name:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="staticEmail" >
        </div>
        <div class="col col-xs-12 areas">
            <span  class="title align-self-start" style="margin-right: 15px;">hunting areas:</span>
            @foreach ($areas as $area)
            <input type="radio" name="area" id="area{{$area->id}}">
            <label for="area{{$area->id}}" class="setting-radio">{{$area->name}}</label> 
            @endforeach           
        </div>
    </div>
    @foreach($roles as $role)
        <div class="check-box">
            <label class="title " for="{{$role->name}}">
            is {{$role->name}}?
                </label>
                <input  type="checkbox" value="{{$role->id}}" id="admin" class="custom-check">
        </div>
    @endforeach
        <div class="row pl-3 pr-3 text-right">
            <button type="button" class="btn btn-outline-success btn-add btn-absolute">add</button>
        </div>
    </div>
</form>

</div>
<div class="row block">
    <div class="col-12">
        <span class="badge-statistic">users</span>
    </div>

</div>

<div class="table-responsive">
    <table class="huntingarea-table">
        <thead>
            <tr>
            <th scope="col" >ID</th>
            <th scope="col">firstname</th>
            <th scope="col">lastname</th>
            <th scope="col">user</th>
            <th scope="col">usergroups</th>
            <th scope="col">created</th>
            <th scope="col">last login</th>
            <td scope="col" class="anotation text-right">*click on the field to edit</td>
            
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Max</td>
                <td>Hunter</td>
                <td>mhunter</td>
                <td>Admins, HG Main, HG
                Guest</td>
                <td>15.02.2018
                15:33:01</td>
                <td>15.02.2018 15:33:01</td>
                <td class="text-right table-button">
                <button type="button" class="btn btn-outline-danger button-delete" >Delete</button>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="block">
@include('layouts.pagination')
</div>
<div class="users">


<form>
    <div class="form-group row" >
        <div class="col-lg-2 col-xs-12 users-label" >
            <label for="staticEmail" class="title">First name:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="staticEmail" >
        </div>
        <div class="col-lg-7 col-xs-12 offset-lg-1">
            <span  class="title align-self-start" style="margin-right: 15px;">usergroups:</span>
            <input type="radio" name="group" id="admins_group">
            <label for="admins_group" class="setting-radio">Admins</label>            
            <input type="radio" name="group" id="guest_group">
            <label for="guest_group" class="setting-radio">HG Guest</label>
            <input type="radio" name="group" id="main_group">
            <label for="main_group" class="setting-radio">HG Main</label>
        </div>
    </div>

    <div class="form-group row">
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="staticEmail" class="title">last name:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="staticEmail" >
        </div>
    </div>
    <div class="form-group row" >
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="staticEmail" class="title">email:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0" >
            <input type="text"  class=" custom-input w-100" id="staticEmail" >
        </div>
    </div>
    <div class="form-group row credentials">
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="staticEmail" class="title">user:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="staticEmail" >
        </div>
    </div>
    <div class="form-group row">
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="staticEmail" class="title">password:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="staticEmail" >
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-outline-success btn-add btn-absolute mr-lg-3">add</button>
            </div>
    </div>
    <div class="form-group row">
 
        </div>
</form>
</div>

<div class="row block">
    <div class="col-12">
        <span class="badge-statistic">configsets</span>
    </div>
</div>
<div class="table-responsive">
    <table class="huntingarea-table">
        <thead>
            <tr>
                <th scope="col" >ID</th>
                <th scope="col">model</th>
                <th scope="col">configset name</th>
                <th scope="col">created</th>
                <td scope="col" class="anotation text-right">*click on the field to edit</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>BL460P</td>
                <td>Default</td>
                <td>15.02.2018 15:33:01</td>
                <td class="text-right table-button">
                <button type="button" class="btn btn-outline-danger button-delete" >Delete</button>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="block">
    @include('layouts.pagination')
</div>

<div class="configsets">
<div class="row">
        <div class="col-lg-4 col-xs-12">
            <form id="hunting_areas_store" action="{{route('settings.store')}}" method="post">
                @csrf
                    <div class="form-group row pl-3 pr-3">
                            <label for="name" class="title">model:</label>
                            <input type="text" id="area_name" class="col custom-input" name="area_name">
                    </div>
                    <div class="form-group row pl-3 pr-3">
                            <label for="name" class="title ">configset:</label>
                            <input type="text" id="area_name" class="col custom-input" name="area_name">
                    </div>

           
        </div>
        <div class="col-lg-5 col-xs-12">
            <div class="table-responsive  pl-lg-1">
                <table class="table table-sm table-bordered text-center table-settings">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <td>Value</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>vMAP Instance</td>
                            <td>https:/mha1.vmap.rocks</td>
                        </tr>
                        <tr>
                            <th>vMAP Instance</td>
                            <td>https:/mha1.vmap.rocks</td>
                        </tr>
                        <tr>
                            <th>vMAP Instance</td>
                            <td>https:/mha1.vmap.rocks</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3">
        <button  id="area_store" class="btn btn-outline-success btn-add btn-absolute mr-lg-3">add</button>
        
        </div>

    </form>

    </div>
    <!-- <form action="#">
    <div class="form-row">
        <div class="d-flex flex-row col-lg-4 col-md-5 col-xs-12 user-input">
                <label for="firs_tname" class="title align-self-start">model:</label>
                <input type="text" class="align-self-start flex-grow-1 custom-input">
        </div>
        <div class="d-flex flex-row col-lg-4 col-md-12 ">
        <div class="table-responsive  pl-lg-1">
            <table class="table table-sm table-bordered text-center table-settings">
                <thead>
                    <tr>
                        <th>Key</th>
                        <td>Value</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>vMAP Instance</td>
                        <td>https:/mha1.vmap.rocks</td>
                    </tr>
                    <tr>
                        <th>vMAP Instance</td>
                        <td>https:/mha1.vmap.rocks</td>
                    </tr>
                    <tr>
                        <th>vMAP Instance</td>
                        <td>https:/mha1.vmap.rocks</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        <div class="d-flex flex-row col-lg-4 col-md-12    col-xs-12 align-self-end">
        <button type="button" class="btn btn-outline-success btn-add ml-auto">add</button>
        </div>
    </form> -->
</div>
<div class="row block text-right">
    <div class="col-12">
        <button class="btn settings-save">save</button>
    </div>
</div>
</div>

</div>

@endsection
