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
        @if (session('status'))
            <div class="alert alert-success alert-dismissible text-center">
            {{ session('status') }}
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
        <span class="badge-statistic" id="areas">hunting areas</span>
    </div>
</div>
<div class="table-responsive">
    <table class="huntingarea-table">
        <thead>
            <tr>
            <th scope="col" style="width: 79px;">ID</th>
            <th scope="col">hunting area</th>
            <th scope="col">description</th>
            <th scope="col">created</th>
            <td scope="col" class="anotation text-right"></td>
            
            </tr>
        </thead>
        <tbody>
            @foreach  ($areas as $k=>$area)
        <tr >
            <td>{{$area->id}}</td>
            <td>{{$area->name}}</td>
            <td>{{$area->description}}</td>
            <td>{{$area->created_at}}</td>
            <td class="text-right pr-0" >
                <form action="{{route('settings.destroy',$area->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button"  data-toggle="modal" data-target="#area_destroy_{{$area->id}}" data-whatever="{{$area->id}}"  name="modal" class="btn btn-outline-danger button-delete align-self-start">DELETE</button>
                    <!-- modal -->
                    <div class="modal fade" id="area_destroy_{{$area->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Delete hsunting area</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left" id="text">
                                Are you sure you want to delete hunting area?
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="area_destroy">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete_id" value="{{$area->id}}">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="block">
   {{ $areas->fragment('areas')->links('layouts.pagination')}}
</div>
    <div class="hunting-areas">
    <form action="{{route('settings.store')}}" method="post">

    <div class="row">

        <div class="col-lg-4 col-xs-12">
            @csrf
            <input type="hidden" name="area_store">
               
                <input type="hidden" name="hunting_area">
                    <div class="d-flex flex-row p-0">
                            <label for="area_name" class="title">name:</label>
                            <input type="text" id="area_name" class="flex-grow-1 custom-input" name="name" value="{{old('name')}}" required>
                    </div>
                    <label for="area_desc" class="title mt-4">description:</label>

                    <div class="d-flex flex-row p-0">
                            <textarea  id="area_desc" name="description"  id="desc" cols="30" rows="10" class="desc custom-input" required>{{old('description')}}</textarea>
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
                            <td><input type="text" name="instance_value" value="{{old('instance_value')}}" class="custom-input w-100" required></td>
                            <td><input type="text" name="instance_description" value="{{old('instance_description')}}" class="custom-input w-100" required></td>
                        </tr>
                        <tr>
                            <td>vMAP MapviewID</td>
                            <td><input type="text" name="mapview_value" value="{{old('mapview_value')}}" class="custom-input w-100" required></td>
                            <td><input type="text" name="mapview_description" value="{{old('mapview_description')}}" class="custom-input w-100" required></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        <button type="submit"  id="area_store" class="btn btn-outline-success btn-add btn-absolute mr-lg-3" >add</button>

    </div>
    </form>

</div>





<div class="row  block">
    <div class="col-12">
        <span class="badge-statistic" id="usergroups">usergroups</span>
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
            <td scope="col" class="anotation text-right"></td>
            
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $k=>$group)
            <tr>
                <td>{{$group->id}}</td>
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
                    <form action="{{route('settings.destroy',$group->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="group_destroy">
                    <button type="button" data-toggle="modal"  data-target="#group_destroy_{{$group->id}}" class="btn btn-outline-danger button-delete align-self-start">DELETE</button>
                        <!-- modal -->
                        <div class="modal fade" id="group_destroy_{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="title">Delete group</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left" id="text">
                                    Are you sure you want to delete user group?
                                </div>
                                <div class="modal-footer">
                                <input type="hidden" name="group_destroy">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="delete_id" value="{{$group->id}}">Delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- endmodal -->
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="block">
 {{
        $groups->fragment('usergroups')->links('layouts.pagination')
}}
</div>
</div>

<div class="usergroups">
<form id="usergroup_store" action="{{route('settings.store')}}" method="post"> <!--add new group -->
@csrf
                    <input type="hidden" name="group_store">
<!-- <div class="row"> -->
    <div class="form-group row">
        <div class="col-lg col-xs-12 pr-0" style="max-width:max-content">
            <label for="group_name" class="title configsets-label mr-0">usergroup name:</label>
        </div>
        <div class="col-lg-3 col-xs-12">
            <input type="text"  class="col custom-input" name="name" id="group_name" required>
        </div>
        <div class="form-group role-radios pl-3 col-lg-3 col-xs-12">
        @foreach($roles as $role)
                            <div class="check-box ">
                                <label class="title " for="{{$role->name}}">
                                is {{$role->name}}?
                                    </label>
                                    <input  type="radio" value="{{$role->id}}" id="{{$role->name}}" name="role_id" class="custom-check" @if ($role->name == 'user') checked @endif>
                            </div>

                        @endforeach
        </div>
        <div class="col areas">
            <span  class="title align-self-start pr-3">hunting areas:</span>
            @foreach ($areas_list as $area)
            <span class="col pl-0 mb-2" style="max-width: max-content;">
                <input type="checkbox" name="areas[]" id="area_{{$area->id}}" value="{{$area->id}}">
                <label  for="area_{{$area->id}}" class="setting-radio mr-0 mb-2">{{$area->name}}</label> 
             </span>
            @endforeach
    <button type="submit" class="btn btn-outline-success btn-add btn-absolute mr-3 ml-3 mr-lg-0" style="position: relative;">add</button>

        </div>
    </div>

        <!-- <div class="col-lg-5 col-xs-12">
                @csrf
                    <input type="hidden" name="group_store">
                    <div class="form-group row pl-3 pr-3">
                            <label for="group_name" class="title configsets-label">usergroup name:</label>
                            <input type="text"  class="col custom-input" name="name" id="group_name" required>
                    </div>
                    @foreach($roles as $role)
                        <div class="check-box ">
                            <label class="title " for="{{$role->name}}">
                            is {{$role->name}}?
                                </label>
                                <input  type="radio" value="{{$role->id}}" id="{{$role->name}}" name="role_id" class="custom-check" @if ($role->name == 'user') checked @endif>
                        </div>

                    @endforeach

        </div>
        <div class="col-lg-7 col-xs-12 areas">

            <div class="form-group row pl-3">
            <span  class="title align-self-start pr-3">hunting areas:</span>
            @foreach ($areas_list as $area)
            <span class="col pr-1 pl-0 pr-3 mb-2" style="max-width: max-content;">
                <input type="checkbox" name="areas[]" id="area_{{$area->id}}" value="{{$area->id}}">
                <label  for="area_{{$area->id}}" class="setting-radio" style=" margin-right: 0;">{{$area->name}}</label> 
             </span>
            @endforeach
            </div>
            
        </div>
    <button type="submit" class="btn btn-outline-success btn-add btn-absolute mr-3 ml-3 mr-lg-0">add</button> -->

    </form> <!--add new group -->

    <!-- </div> -->

</div>
</div>
<div class="row block">
    <div class="col-12">
        <span class="badge-statistic" id="users">users</span>
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
            <td scope="col" class="anotation text-right"></td>
            
            </tr>
        </thead>
        <tbody>
        @foreach($users as $k=>$user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->nickname}}</td>
                <td>
                @foreach($user->userGroups as $k=>$group)
                    {{$group->name}}@if($k+1 != $user->userGroups->count()), @endif
                @endforeach
                </td>
                <td>{{date('d.m.Y H:i:s', strtotime($user->created_at))}}</td>
                <td>
                @if($user->last_login != null)
                {{date('d.m.Y H:i:s', strtotime($user->last_login))}}
                @endif
                </td>
                <td class="text-right table-button">
                <form action="{{route('settings.destroy',$user->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <input type="hidden" name="user_destroy">
                    <button type="button" data-toggle="modal"   data-target="#user_destroy_{{$user->id}}" class="btn btn-outline-danger button-delete align-self-start">DELETE</button>
                    <!-- modal -->
                    <div class="modal fade" id="user_destroy_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Delete user</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left" id="text">
                                Are you sure you want to delete user?
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="area_destroy">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete_id" value="{{$user->id}}">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- endmodal -->
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="block">
{{
    $users->fragment('users')->links('layouts.pagination')
}}
</div>
<div class="users">


<form id="register" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
    @csrf
<div class="form-group row" >
        <div class="col-lg-2 col-xs-12 users-label" >
            <label for="first_name" class="title">First name:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="first_name"  name="first_name" value="{{old('first_name')}}" required>
        </div>
        <div class="col-lg-7 col-xs-12 offset-lg-1 users-check">
            <span  class="title align-self-start" style="margin-right: 15px;">usergroups:</span>
            @foreach($groups_list as $group)
            <input type="checkbox" name="group[]" id="{{$group->name}}_group" value="{{$group->id}}" @if($group->role->name == 'user') checked @endif >
            <label for="{{$group->name}}_group" class="setting-radio mr-3 mt-1">{{$group->name}}</label>
            @endforeach
        </div>
    </div>

    <div class="form-group row">
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="last_name" class="title">last name:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="last_name" name="last_name" value="{{old('last_name')}}">
        </div>
    </div>
    <div class="form-group row" >
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="staticEmail" class="title">email:</label>
        </div>
        <div class="col-lg-2 col-xs-12 p-lg-0" >
            <input type="text"  class=" custom-input w-100" id="staticEmail" name="email" value="{{old('email')}}">
            <div class="d-flex flex-row form-check email-notify">
          
            <input type="checkbox" id="emailNotify" class="form-check-input" name="notification" value="1">
            <label class="form-check-label pt-1" for="emailNotify">eMail notification for new images?</label>
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
        <span class="badge-statistic" id="configsets">configsets</span>
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
                <td scope="col" class="anotation text-right"></td>
            </tr>
        </thead>
        <tbody>
        @foreach ($configsets as $k=>$configset)
            <tr>
                <td>{{$configset->id}}</td>
                <td>{{$configset->model}}</td>
                <td>{{$configset->config_name}}</td>
                <td>{{date('d.m.Y H:i:s', strtotime($configset->created_at))}}</td>
                <td class="text-right table-button">
                <form action="{{route('settings.destroy',$configset->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="configset_destroy">
                <button type="button" data-toggle="modal"  data-target="#config_destroy_{{$configset->id}}" class="btn btn-outline-danger button-delete align-self-start">DELETE</button>
                 <!-- modal -->
                 <div class="modal fade" id="config_destroy_{{$configset->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Delete config set</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left" id="text">
                                Are you sure you want to delete config set?
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="area_destroy">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete_id" value="{{$configset->id}}">Delete</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- endmodal -->
                </form>
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="block">
    
 {{
        $configsets->fragment('configsets')->links('layouts.pagination')
}}
</div>

<div class="configsets">
<div class="row">
        <div class="col-lg-4 col-xs-12">
            <form  action="{{route('settings.store')}}" method="post">
                @csrf
                <input type="hidden" name="configset_store">
                    <div class="form-group row pl-3 pr-3">
                            <label for="name" class="title configsets-label">model:</label>
                            <input type="text" class="col custom-input" name="model" required>
                    </div>
                    <div class="form-group row pl-3 pr-3">
                            <label for="name" class="title configsets-label ">configset:</label>
                            <input type="text"  class="col custom-input" name="config_name" required>
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
                            <td><input type="text" name="port" class="custom-input w-100" pattern="^[ 0-9]+$" required></td>
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
