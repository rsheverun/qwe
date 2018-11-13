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
        <span class="badge-statistic">Grundeinstellungen</span>
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
                <label for="user" class="title" style="white-space: nowrap;">Kurzname:</label>
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
        <span class="badge-statistic" id="areas">Jagdgebiete</span>
    </div>
</div>
<div class="table-responsive">
    <table class="huntingarea-table">
        <thead>
            <tr>
            <th scope="col" style="width: 79px;">ID</th>
            <th scope="col">Jagdgebiet</th>
            <th scope="col">Beschreibung</th>
            <th scope="col">Erstellt</th>
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
            <td class="text-right pr-0" style="width: 175px;">
            <button type="button" data-target="area_update" class=" mb-2 w-100 btn btn-outline-danger button-delete btn-green align-self-start open-modal" value="{{$area->id}}">Bearbeiten</button>
            <button type="button"  data-target="area_destroy" data-whatever="{{$area->id}}"  name="modal" class="w-100 btn btn-outline-danger button-delete align-self-start open-modal" value="{{$area->id}}">Löschen</button>
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
                    <label for="area_desc" class="title mt-4">Beschreibung:</label>

                    <div class="d-flex flex-row p-0">
                            <textarea  id="area_desc" name="description"  id="desc" cols="30" rows="10" class="desc custom-input" required>{{old('description')}}</textarea>
                    </div>
                
                    
           
        </div>
        <div class="col-lg-8 col-xs-12">
        
            <div class="table-responsive">
                <table class="table table-sm table-bordered text-center table-settings">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <th>Wert</th>
                            <th>Beschreibung</th>
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
        <button type="submit"  id="area_store" class="btn btn-outline-success btn-add btn-absolute mr-lg-3" >Hinzufügen</button>

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
            <th scope="col">usergroup-name</th>
            <th scope="col">ADMIN?</th>
            <th scope="col">BENUTZER?</th>
            <th scope="col">GAST?</th>
            <th scope="col">ERSTELLT</th>
            <td scope="col" class="anotation text-right" style="width: 175px;"></td>
            
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
                    <button type="button" data-target="group_update" value="{{$group->id}}" class="mb-2 w-100 btn btn-outline-danger button-delete btn-green align-self-start open-modal">Bearbeiten</button>
                    <div class="edit-group"></div>
                <button type="button"  data-target="group_destroy" value="{{$group->id}}" class="w-100 btn btn-outline-danger button-delete align-self-start open-modal">Löschen</button>
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
    <div class="form-group row" style="min-height: 130px;">
        <div class="col-lg col-xs-12 pr-0 max-content">
            <label for="group_name" class="title configsets-label mr-0">usergroup-name:</label>
        </div>
        <div class="col-lg-3 col-xs-12">
            <input type="text"  class="col custom-input" name="name" id="group_name" required>
        </div>
        <div class="form-group role-radios pl-3 col-lg-3 col-xs-12">
        @foreach($roles as $role)
                            <div class="check-box ">
                                <label class="title " for="{{$role->name}}">
                                @if ($role->name == 'admin')
                                        admin
                                        @elseif($role->name =='user')
                                        BENUTZER
                                    @elseif($role->name == 'guest')
                                        GAST
                                     @endif
                                    ?
                                    </label>
                                    <input  type="radio" value="{{$role->id}}" id="{{$role->name}}" name="role_id" class="custom-check" @if ($role->name == 'user') checked @endif>
                            </div>

                        @endforeach
        </div>
        <div class="col areas">
            <span  class="title align-self-start pr-3">Jagdgebiete:</span>
            @foreach ($areas_list as $area)
            <span class="col pl-0 mb-2" style="max-width: max-content;">
                <input type="checkbox" name="areas[]" id="area_{{$area->id}}" value="{{$area->id}}">
                <label  for="area_{{$area->id}}" class="setting-radio mr-0 mb-2">{{$area->name}}</label> 
             </span>
            @endforeach
            <div class="col-xs-12">
            <button type="submit" class="btn btn-outline-success btn-add btn-absolute" style="position: relative;">Hinzufügen</button>
            </div>

        </div>
    </div>
    </form> <!--add new group -->

    <!-- </div> -->

</div>
</div>
<div class="row block">
    <div class="col-12">
        <span class="badge-statistic" id="users">BENUTZER</span>
    </div>

</div>

<div class="table-responsive">
    <table class="huntingarea-table">
        <thead>
            <tr>
            <th scope="col" style="width: 79px;">ID</th>
            <th scope="col">VORNAME</th>
            <th scope="col">NACHNAME</th>
            <th scope="col">BENUTZER</th>
            <th scope="col">usergroups</th>
            <th scope="col">ERSTELLT</th>
            <th scope="col">LETZTER LOGIN</th>
            <td scope="col" class="anotation text-right" style="width: 175px;"></td>
            
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
                <button type="button" data-target="user_update" value="{{$user->id}}" class="mb-2 w-100 btn btn-outline-danger button-delete btn-green align-self-start open-modal">Bearbeiten</button>
                <button type="button" data-target="user_destroy" value="{{$user->id}}"  class="w-100 btn btn-outline-danger button-delete align-self-start open-modal">Löschen</button>
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
            <label for="first_name" class="title">VORNAME:</label>
        </div>
        <div class="col-lg col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="first_name"  name="first_name" value="{{old('first_name')}}" required>
        </div>
        <div class="col-lg-7 col-xs-12 offset-lg-1 users-check">
            <span  class="title align-self-start" style="margin-right: 15px;">usergroups:</span>
            @foreach($groups_list as $group)
            <input type="checkbox" name="group[]" id="{{$group->id}}_group" value="{{$group->id}}" @if($group->role->name == 'user') checked @endif >
            <label for="{{$group->id}}_group" class="setting-radio mr-3 mt-1">{{$group->name}}</label>
            @endforeach
        </div>
    </div>

    <div class="form-group row">
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="last_name" class="title">NACHNAME:</label>
        </div>
        <div class="col-lg col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="last_name" name="last_name" value="{{old('last_name')}}">
        </div>
        <div class="col-lg-8 col-xs-12">

        </div>
    </div>
    <div class="form-group row" >
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="staticEmail" class="title">email:</label>
        </div>
        <div class="col-lg col-xs-12 p-lg-0" >
            <input type="email"  class=" custom-input w-100" id="staticEmail" name="email" value="{{old('email')}}">
            <div class="d-flex flex-row form-check email-notify">
                <input type="checkbox" id="emailNotify" class="form-check-input" name="notification" value="1">
                <label class="form-check-label pt-1" for="emailNotify">Die E-Mail muss eine gültige E-Mail-Adresse sein.</label>
            </div>
        </div>
        <div class="col-lg-8 col-xs-12">

        </div>
    </div>
    <div class="form-group row credentials">
        <div class="col-lg-2 col-xs-12 users-label">
                <label for="nickname" class="title">BENUTZER:</label>
        </div>
        <div class="col-lg col-xs-12 p-lg-0">
            <input type="text"  class=" custom-input w-100" id="nickname" name="nickname" value="{{ old('nickname') }}" required autofocu>
        </div>
        <div class="col-lg-8 col-xs-12">

        </div>
    </div>
    <div class="form-group row">
    <div class="col-lg-2 col-xs-12 users-label">
            <label for="password" class="title">PASSWORT:</label>
        </div>
        <div class="col-lg col-xs-12 p-lg-0">
            <input type="password"  class=" custom-input w-100" id="password" name="password" required>
        </div>
        <div class="col-lg-8 col-xs-12">

        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-outline-success btn-add btn-absolute mr-lg-3">Hinzufügen</button>
            </div>
    </div>
    <div class="form-group row">
 
        </div>
</form>
</div>

<div class="row block">
    <div class="col-12">
        <span class="badge-statistic" id="configsets">KONFIGURATIONEN</span>
    </div>
</div>
<div class="table-responsive">
    <table class="huntingarea-table">
        <thead>
            <tr>
                <th scope="col" style="width: 79px;" >ID</th>
                <th scope="col">MODELL</th>
                <th scope="col">KONFIGURATIONSNAMEF</th>
                <th scope="col">created</th>
                <td scope="col" class="anotation text-right" style="width:175px;"></td>
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

                <input type="hidden" name="configset_destroy">
                <button type="button" data-target="config_update" value="{{$configset->id}}" class="mb-2 w-100 btn btn-outline-danger button-delete btn-green align-self-start open-modal">Bearbeiten</button>
                <button type="button" data-target="config_destroy" value="{{$configset->id}}" class="w-100 btn btn-outline-danger button-delete align-self-start open-modal">Löschen</button>
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
                            <label for="name" class="title configsets-label">modell:</label>
                            <input type="text" class="col custom-input" name="model" required>
                    </div>
                    <div class="form-group row pl-3 pr-3">
                            <label for="name" class="title configsets-label ">KONFIGURATIONEN:</label>
                            <input type="text"  class="col custom-input" name="config_name" required>
                    </div>

           
        </div>
        <div class="col-lg-5 col-xs-12">
            <div class="table-responsive  pl-lg-1">
                <table class="table table-sm table-bordered text-center table-settings">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <td>Wert</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($keys as $key=>$value)
                        @if($key<=3 )
                            @continue
                            @endif
                        <tr>
                            <th>{{$value}}</td>
                            <td><input type="text" name="{{$value}}" class="custom-input w-100" required></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3">
        <button  id="configset_store" class="btn btn-outline-success btn-add btn-absolute mr-lg-3">Hinzufügen</button>
        
        </div>

    </form>

    </div>
</div>

<div class="row block text-right">
    <div class="col-12">
        <button class="btn settings-save">Speichern</button>
    </div>
</div>
</div>

</div>

@endsection
