<style>
.active3,.active3 span,.active3 i{
    color:white !important;
}
</style>

@extends('layouts.admin')

@section('content')


<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
       Dashboard 
    </li>
    <li class="breadcrumb-item active">Room Type Manager</li>
  </ol>

 
   
 
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Hotel Type  Data Table </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
  
                  <tr>
                      <th>ID</th>
                      <th>Type</th>
                      <th>Delete</th>
                       <th>Edit</th>
                       
  
                    </tr>
                  </thead>
                  <tfoot>
 
                    <tr>
                    <th>ID</th>
                      <th>Type</th>
                      <th>Delete</th>
                       <th>Edit</th>
                       
  
                       
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($hoteltypes as $data) 
                  <tr>
                  <form action="updatetype" method="post"   id="{{ $data -> id}}">
                     <td>{{ $data -> id}}<input type="hidden" name="hoteltypeid" value="{{ $data -> id}}" form="{{ $data -> id}}" /></td>
                      <td><input type="text" name="hoteltype" form="{{ $data -> id}}" value="{{ $data -> type}}" /></td>
                      <td><a href="/Deltype/{{ $data -> id}}">Delete</a></td>
                      <td><input type="submit" value="Edit" name="submit" form="{{ $data -> id}}"></td>
                      </form>
                        </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
 
          </div>

       

        </div> 

        <div class="card-header">
              <i class="fas fa-table"></i>
              Add Hotel Type Details  Data   </div>
              <form action="Addtype" method="post"  id="my_form2"></form>
                <div class="card-body">
              <div class="table-responsive"> 
              
                  
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 
                  
 
                   <tr><td>Type Name</td><td><input type="text" name="hoteltypee" form="my_form2" /> </td></tr>
                   <tr><td>Add</td><td><input type="submit" value="Save" name="submit" form="my_form2"></td></tr>
                 
                  
                  
            </table>
             </div></div>

        
 

@endsection
