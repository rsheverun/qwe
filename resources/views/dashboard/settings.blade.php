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
            <div class="d-flex flex-row col-lg-5 col-xs-12 user-input">
                <label for="user" class="title">Name:</label>
                <input type="text" class="align-self-start flex-grow-1 custom-input">
            </div>
        </div>
        <div class="form-row">
            <div class="d-flex flex-row col-lg-5 col-xs-12">
                <label for="user" class="title">Short Name:</label>
                <input type="text" class="align-self-start flex-grow-1 custom-input">
            </div>
            <div class="d-flex flex-row col pl-lg-3">
            <span>Portal URL: https://mha.mycams.com</span>
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
            <tr>
                <td>1</td>
                <td>My Hunting Area 1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut faucibus fringilla
                    urna in venenatis.</td>
                <td>15.02.2018 15:33:01</td>
                <td class="text-right table-button">
                <button type="button" class="btn btn-outline-danger button-delete" style="margin-bottom: 15px;">Delete</button>
                    
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>My Hunting Area 1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut faucibus fringilla
                    urna in venenatis.</td>
                <td>15.02.2018 15:33:01</td>
                <td class="text-right table-button">
                <button type="button" class="btn btn-outline-danger button-delete" style="margin-bottom: 15px;">Delete</button>
                    
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>My Hunting Area 1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut faucibus fringilla
                    urna in venenatis.</td>
                <td>15.02.2018 15:33:01</td>
                <td class="text-right table-button">
                <button type="button" class="btn btn-outline-danger button-delete" style="margin-bottom: 15px;">Delete</button>
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
        <div class="col-lg-5 col-xs-12">
            <form action="#">
                    <div class="d-flex flex-row p-0">
                            <label for="name" class="title">name:</label>
                            <input type="text" id="name" class="flex-grow-1 custom-input">
                    </div>
                    <div class="d-flex flex-row p-0">
                        <div class="desc-block">
                            <label for="desc" class="title">description:</label>
                            <textarea name="desc" id="" cols="30" rows="10" class="desc custom-input"></textarea>
                        </div>
                    </div>
            </form>
        </div>
        <div class="col-lg-7 col-xs-12">
        
        <div class="table-responsive">
            <table class="table table-sm table-bordered text-center">
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
        <button type="button" class="btn btn-outline-success btn-add">add</button>





        </div>
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
                <button type="button" class="btn btn-outline-danger button-delete" style="margin-bottom: 15px;">Delete</button>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>


<div class="block">
 @include('layouts.pagination')
</div>
<div class="usergroups">
<form action="#">
    <div class="d-flex flex-row col-md-5  block p-0">
        <label for="name" class="title">usergroup name:</label>
        <input type="text" id="name" class="align-self-start flex-grow-1 custom-input">
    </div>
    <div class="check-box">
    <label class="title " for="admin">
    is admin?
        </label>
        <input  type="checkbox" value="" id="admin" class="custom-check">
    </div>
    <div class="check-box">
    <label class="title" for="user">
    is user?
        </label>
        <input  type="checkbox" value="" id="user" class="custom-check">
    </div>
    <div class="check-box">
    <label class="title" for="guest">
    is guest?
        </label>
        <input  type="checkbox" value="" id="guest" class="custom-check">
    </div>
</form>
<div class="row">
<button type="button" class="btn btn-outline-success btn-add btn-absolute">add</button>

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
                <button type="button" class="btn btn-outline-danger button-delete" style="margin-bottom: 15px;">Delete</button>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="block">
@include('layouts.pagination')
</div>
<div class="users">
<form action="#">
    <div class="form-row">
        <div class="d-flex flex-row col-lg-5 col-xs-12 user-input">
                    <label for="firs_tname" class="title">first name:</label>
                    <input type="text" class="align-self-start flex-grow-1 custom-input">
        </div>
        <div class="d-flex flex-row col-lg-6 offset-lg-1 col-xs-12 ">
            <label for="select" class="title">usergroups</label>
        </div>
    </div>
    <div class="form-row">
        <div class="d-flex flex-row col-lg-5 col-xs-12 user-input">
            <label for="last name:" class="title">last name:</label>
            <input type="text" class="align-self-start flex-grow-1 custom-input">
        </div>
    </div>
    <div class="form-row">
        <div class="d-flex flex-row col-lg-5 col-xs-12 ">
            <label for="email" class="title">email:</label>
            <input type="mail" class="align-self-start flex-grow-1 custom-input">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <label class="form-check-label" for="gridCheck">
                
            </label>
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
            eMail notification for new images?
                </label>
        </div>
    </div>
    <div class="credentials">
        <div class="form-row">
            <div class="d-flex flex-row col-lg-5 col-xs-12 user-input">
                <label for="user" class="title">user:</label>
                <input type="text" class="align-self-start flex-grow-1 custom-input">
            </div>
        </div>
        <div class="form-row">
            <div class="d-flex flex-row col-lg-5 col-xs-12 align-self-start">
                <label for="password" class="title">password:</label>
                <input type="password" class="align-self-start flex-grow-1 custom-input">
            </div>
    <button type="button" class="btn btn-outline-success btn-add ml-auto mt-auto">add</button>

        </div>
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
                <button type="button" class="btn btn-outline-danger button-delete" style="margin-bottom: 15px;">Delete</button>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="block">
    @include('layouts.pagination')
</div>

<div class="configsets">
    <form action="#">
    <div class="form-row">
        <div class="d-flex flex-row col-lg-5 col-xs-12 user-input">
                <label for="firs_tname" class="title align-self-start">model:</label>
                <input type="text" class="align-self-start flex-grow-1 custom-input">
        </div>
        <div class="d-flex flex-row col-lg-5  col-xs-12 ">
        <div class="table-responsive  pl-lg-1">
            <table class="table table-sm table-bordered text-center">
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
        <div class="d-flex flex-row col-lg-2 col-xs-12 align-self-end">
        <button type="button" class="btn btn-outline-success btn-add ml-auto">add</button>
        </div>
    </form>
</div>

</div>
<div class="row block text-right">
    <div class="col-12">
        <span class="badge-statistic">save</span>
    </div>
</div>
</div>

@endsection
