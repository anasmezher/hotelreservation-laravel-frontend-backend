<style>
.active7,.active7 span,.active7 i{
    color:white !important;
}
</style>

@extends('layouts.admin')

@section('content')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
       Dashboard 
    </li>
    <li class="breadcrumb-item active">Customer Manager</li>
  </ol>

 
   
 
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Customers Data Table </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
  
                  <tr>
                  <th>ID</th>
                       <th>First Name</th>
                      <th>Last Name</th>
                      <th>Adress</th>
                      <th>City</th>
                      <th>Country</th>
                      <th>Phone</th>
                      <th>Fax</th>
                      <th>Email</th>
                      <th>Delete</th>
                       <th>Edit</th>

                    </tr>
                  </thead>
                  <tfoot>
 
                    <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Adress</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Fax</th>
                    <th>Email</th>
                    <th>Delete</th>
                    <th>Edit</th>
 
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($customers as $data) 
                  <tr>
                        <td> {{ $data -> id}}</td>
                        <td> {{ $data -> firstname}}</td>
                        <td> {{ $data -> lastname}}</td>
                        <td> {{ $data -> adress}}  </td>
                        <td> {{ $data -> city}}  </td>
                        <td> {{ $data -> country}}  </td>
                        <td> {{ $data -> phone}}  </td>
                        <td> {{ $data -> fax}}  </td>
                        <td> {{ $data -> email}}  </td>
                        
                      <td><a href="/DelCustomer/{{ $data -> id}}">Delete</a></td>
                      <td><a href="/editCustomer/{{ $data -> id}}">Edit</a></td>
                   
                        </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
 
          </div>

       
 


        <div class="card-header">
              <i class="fas fa-table"></i>
              Add New Customer     </div>
              <form action="AddCustomer" method="post"   id="my_form2"></form>
                <div class="card-body">
              <div class="table-responsive"> 
  
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 
<tr><td>First Name</td><td><input type="text" name="firstname" form="my_form2" require /> </td></tr>
<tr><td>Last Name </td><td><input type="text" name="lastname" form="my_form2" require /> </td></tr>
<tr><td>Adress</td><td><input type="text" name="adress" form="my_form2"  /> </td></tr>
<tr><td>City  </td><td><input type="text" name="city" form="my_form2"  /> </td></tr>
<tr><td>Country</td><td><input type="text" name="country" form="my_form2"  /> </td></tr>
<tr><td>Phone</td><td><input type="number" name="phone" form="my_form2" require /> </td></tr>
<tr><td>Fax</td><td><input type="number" name="fax" form="my_form2"  /> </td></tr>
<tr><td>Email</td><td><input type="email" name="email" form="my_form2" require /> </td></tr>
<tr><td>Password</td><td><input type="password"   name="mpassword" form="my_form2" require /> </td></tr>
 <tr><td>Add</td><td><input type="submit" value="Save" name="submit" form="my_form2"></td></tr>
                 
                  
                  
            </table>
            </div></div>  </div></div>

            
 

@endsection
