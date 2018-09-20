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
<div id="app">
    <div class="table-responsive">
    <table class="huntingarea-table">
        <thead>
            <tr>
            <th scope="col" style="width: 79px;">ID</th>
            <th scope="col">hunting area</th>
            <th scope="col">description</th>
            <th scope="col">created</th>
            <td scope="col" class="anotation text-right">*click on the field to edit</td>
            
            </tr>
        </thead>
        <tbody>
        <tr v-for="(item, index) in items">
            <td>@{{index+1}}</td>
            <td>@{{item.name}}</td>
            <td>@{{item.description}}</td>
            <td>@{{item.created_at}}</td>
            <td class="text-right pr-0" @click.prevent="deleteItem(item)">
            @csrf
            <button type="button" class="btn btn-outline-danger button-delete" >Delete</button>

            </td>

        </tr>
        </tbody>
    </table>
</div>

<div class="block">
 @include('layouts.pagination')
</div>
    <div class="hunting-areas">
    <div class="row">
        <div class="col-lg-4 col-xs-12">
                @csrf
                <p class="text-center alert alert-danger"
                    v-bind:class="{ hidden: hasError }">Please fill all fields!</p>
                    <p class="text-center alert alert-danger"
                    v-bind:class="{ hidden: hasUnique }">The Name has already been taken.</p>
                <input type="hidden" name="hunting_area" v-model="newItem.hunting_area">
                    <div class="d-flex flex-row p-0">
                            <label for="area_name" class="title">name:</label>
                            <input type="text" id="area_name" class="flex-grow-1 custom-input" name="area_name" v-model="newItem.area_name" required>
                    </div>
                    <label for="area_desc" class="title mt-4">description:</label>

                    <div class="d-flex flex-row p-0">
                            <textarea  id="area_desc" name="area_desc"  id="desc" cols="30" rows="10" class="desc custom-input" v-model="newItem.area_desc" required></textarea>
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
        <button  id="area_store" class="btn btn-outline-success btn-add btn-absolute mr-lg-3" @click.prevent="createItem()">add</button>
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
            <th scope="col" style="width: 79px;">ID</th>
            <th scope="col">usergroup name</th>
            <th scope="col">is admin?</th>
            <th scope="col">is user?</th>
            <th scope="col">is guest?</th>
            <th scope="col">created</th>
            <td scope="col" class="anotation text-right">*click on the field to edit</td>
            
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $k=>$group)
            <tr>
                <td>{{$k+1}}</td>
                <td>{{$group->name}}</td>
                <td>
                    @if($group->role->name === "admin")
                        Yes
                        @else No
                    @endif
                </td>
                <td>
                @if($group->role->name == "user")
                        Yes
                        @else No
                    @endif
                </td>
                <td>
                @if($group->role->name == "guest")
                        Yes
                        @else No
                    @endif
                </td>
                <td>{{date('d.m.Y H:i:s', strtotime($group->created_at))}}</td>
                <td class="text-right table-button">
                    <form action="{{route('settings.destroy',$group->id)}}">
                        <input type="hidden" name="group_destoy">
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
</div>

<div class="usergroups">

<div class="row">
        <div class="col-lg-5 col-xs-12">
            <form id="hunting_areas_store" action="{{route('settings.store')}}" method="post"> <!--add new user -->
                @csrf
                    <div class="form-group row pl-3 pr-3">
                            <label for="name" class="title configsets-label">usergroup name:</label>
                            <input type="text" id="area_name" class="col custom-input" name="area_name">
                    </div>
                    @foreach($roles as $role)
                        <div class="check-box ">
                            <label class="title " for="{{$role->name}}">
                            is {{$role->name}}?
                                </label>
                                <input  type="radio" value="{{$role->id}}" id="{{$role->name}}" name="role" class="custom-check">
                            <!-- <label>
                            <span class="label title">is {{$role->name}}?</span>

                                <input type="checkbox" class="checkbox" name="checkbox-test">
                                <span class="checkbox-custom"></span>
                            </label> -->
                        </div>

                    @endforeach

        </div>
        <div class="col-lg-7 col-xs-12 areas">
            <span  class="title align-self-start pr-3">hunting areas:</span>
            <span class="col pr-1 mt-1 pl-0 pr-3" v-for="item in items" style="max-width: max-content;">
            <input type="radio" name="area" v-bind:id="item.name">
            <label  v-bind:for="item.name" class="setting-radio mt-1" style=" margin-right: 0;">@{{item.name}}</label> 
        </span>
        </div>
    <button type="button" class="btn btn-outline-success btn-add btn-absolute mr-3 ml-3 mr-lg-0">add</button>
    </form> <!--add new user -->

    </div>

</div>
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
            <th scope="col" style="width: 79px;">ID</th>
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


<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
    @csrf
<div class="form-group row" >
        <div class="col-lg-2 col-xs-12 users-label" >
            <label for="first_name" class="title">First name:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="first_name"  name="first_name">
        </div>
        <div class="col-lg-7 col-xs-12 offset-lg-1">
            <span  class="title align-self-start" style="margin-right: 15px;">usergroups:</span>
            @foreach($groups as $group)
            <input type="radio" name="group" id="{{$group->name}}_group" value="{{$group->id}}">
            <label for="{{$group->name}}_group" class="setting-radio usergroup-radio mt-1">{{$group->name}}</label>
            @endforeach
            <!-- <input type="radio" name="group"  id="admins_group">
            <label for="admins_group" class="setting-radio usergroup-radio" style="margin-bottom: 0;">Admins</label>            
            <input type="radio" name="group" id="guest_group">
            <label for="guest_group" class="setting-radio usergroup-radio mt-1">HG Guest</label>
            <input type="radio" name="group" id="main_group">
            <label for="main_group" class="setting-radio usergroup-radio">HG Main</label> -->
        </div>
    </div>

    <div class="form-group row">
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="last_name" class="title">last name:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="last_name" name="last_name">
        </div>
    </div>
    <div class="form-group row" >
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="staticEmail" class="title">email:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0" >
            <input type="text"  class=" custom-input w-100" id="staticEmail" name="email">
            <div class="d-flex flex-row email-notify">
            <input type="checkbox" id="emailNotify" class="custom-check" name="notification" value="1">
            <label for="emailNotify">eMail notification for new images?</label>
            </div>
            

        </div>
    </div>
    <div class="form-group row credentials">
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="nickname" class="title">user:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="nickname" name="nickname" value="{{ old('nickname') }}" required autofocu>
        </div>
    </div>
    <div class="form-group row">
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="password" class="title">password:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="password"  class=" custom-input w-100" id="password" name="password" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-outline-success btn-add btn-absolute mr-lg-3">add</button>
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
                <th scope="col" style="width: 79px;" >ID</th>
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
                <input type="hidden" name="configset_store">
                    <div class="form-group row pl-3 pr-3">
                            <label for="name" class="title configsets-label">model:</label>
                            <input type="text" id="area_name" class="col custom-input" name="model" required>
                    </div>
                    <div class="form-group row pl-3 pr-3">
                            <label for="name" class="title configsets-label ">configset:</label>
                            <input type="text" id="area_name" class="col custom-input" name="config_name" required>
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
                            <th>Org-Nme</td>
                            <td><input type="text" name="org_name" class="custom-input w-100" required></td>
                        </tr>
                        <tr>
                            <th>SMTP-Server</td>
                            <td><input type="text" name="server" class="custom-input w-100" required></td>
                        </tr>
                        <tr>
                            <th>SMTP-Port</td>
                            <td><input type="text" name="port" class="custom-input w-100" required></td>
                        </tr>
                        <tr>
                            <th>SMTP-User</td>
                            <td><input type="text" name="user" class="custom-input w-100" required></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3">
        <button  id="configset_store" class="btn btn-outline-success btn-add btn-absolute mr-lg-3">add</button>
        
        </div>

    </form>

    </div>
</div>
<div class="row block text-right">
    <div class="col-12">
        <button class="btn settings-save">save</button>
    </div>
</div>
</div>

</div>

@endsection
