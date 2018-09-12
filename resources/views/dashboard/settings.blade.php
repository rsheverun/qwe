@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <span class="badge-statistic">base settings</span>
    </div>
</div>
<div class="d-flex flex-row col-md-4  name p-0">
   <label for="name" class="title">name:</label>
   <input type="text" id="name" class="flex-grow-1">
</div>
<div class="d-flex flex-row col-md-4 name p-0">
   <label for="name" class="title">short name:</label>
   <input type="text" id="name" class="flex-grow-1">

</div>
<div class="row">
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
<div class="row no-gutters">
<div class="col-md-6 col-xs-12 ">
            <span class="btn btn-outline-success button-look btn-green pagination-info">20 per page</span>
        </div>
        <div class="col-md-6 text-right">
          <nav aria-label="Page navigation example">
            <ul class="pagination custom-pagination">
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
          </nav>
        </div>
</div>
<div class="row">
    <div class="col-md-4 no-gutters">
        <div class="d-flex flex-row name p-0">
            <label for="name" class="title">name:</label>
            <input type="text" id="name" class="flex-grow-1">
        </div>
        <div class="form-group">
            <label for="desc" class="title">description:</label>
            <textarea name="desc" id="" cols="30" rows="10" class="desc"></textarea>
        </div>
    </div>
    <div class="col-md-8 name">
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
    <div class="row no-gutters">
        <div class="col-12  text-right">
            <button type="button" class="btn btn-outline-success button-look btn-green">add</button>
        </div>
    </div>
    </div>
</div>
<div class="row">
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
</div>
@endsection
