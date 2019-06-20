<style>
.active7,.active7 span,.active7 i{
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
    <li class="breadcrumb-item active">Customer Manager  </li>
  </ol>

  <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa fa-sticky-note"></i> Edit Customer </div>
         
         <form action="/saveeditCustomer" method="post"    id="my_form2"></form>
 
              <div class="card-body">
              <div class="table-responsive"> 
  
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <input type="hidden" value="{{ $customers[0]-> id}}" name="customerid" form="my_form2" />
  
<tr><td>First Name</td><td><input type="text" value="{{ $customers[0]-> firstname}}" name="firstname" form="my_form2" require /> </td></tr>
<tr><td>Last Name </td><td><input type="text" value="{{ $customers[0]-> lastname}}" name="lastname" form="my_form2" require /> </td></tr>
<tr><td>Adress</td><td><input type="text" value="{{ $customers[0]-> adress}}" name="adress" form="my_form2"  /> </td></tr>
<tr><td>City  </td><td><input type="text" value="{{ $customers[0]-> city}}" name="city" form="my_form2"  /> </td></tr>
<tr><td>Country</td><td><input type="text"  value="{{ $customers[0]-> country}}" name="country" form="my_form2"  /> </td></tr>
<tr><td>Phone</td><td><input type="number" value="{{ $customers[0]-> phone}}" name="phone" form="my_form2" require /> </td></tr>
<tr><td>Fax</td><td><input type="number" value="{{ $customers[0]-> fax}}" name="fax" form="my_form2"  /> </td></tr>
<tr><td>Email</td><td><input type="email" value="{{ $customers[0]-> email}}" name="email" form="my_form2" require /> </td></tr>
<tr><td>Password</td><td><input type="password" value="{{ $customers[0]-> password}}" name="mPassword" form="my_form2" require /> </td></tr>
              <tr><td>Edit</td><td><input type="submit" value="Save" name="submit" form="my_form2"></td></tr>
                 
                  
                  
            </table>
            </div></div>  </div></div>

        
        
 

@endsection
