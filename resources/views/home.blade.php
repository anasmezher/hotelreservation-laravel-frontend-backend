<style>
.active1,.active1 span,.active1 i{
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
    <li class="breadcrumb-item active">Hotel Details</li>
  </ol>

    
         
         
         
        
  @if(!$hoteldetails )

  <div class="card-header">
              <i class="fas fa-table"></i>
              Enter Your Hotel Details  Data   </div>
              <form action="addhotel" method="post" enctype="multipart/form-data"  id="my_form"></form>
                <div class="card-body">
              <div class="table-responsive"> 
              
                  
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 
                  
 
                   <tr><td>Name</td><td><input type="text" name="hotelname" form="my_form" /> </td></tr>
                   <tr><td>Adress</td><td><input type="text" name="hoteladress" form="my_form" /> </td></tr>
                   <tr><td>City</td><td><input type="text" name="hotelcity" form="my_form" /> </td></tr>
                   <tr><td>State</td><td><input type="text" name="hotelstate" form="my_form" /> </td></tr>
                   <tr><td>Country</td><td><input type="text" name="hotelcountry" form="my_form" /> </td></tr>
                   <tr><td>Zip Code</td><td><input type="text" name="hotelzipcode" form="my_form" /> </td></tr>
                   <tr><td>Phone Number</td> <td><input type="number" name="hotelphone" form="my_form" /> </td></tr>
                   <tr><td>Email</td><td><input type="email" name="email" form="my_form" /> </td></tr>
                   <tr><td>Image</td><td><input type="file" name="thumbnail" id="thumbnail" form="my_form" /> </td></tr>
                   <tr><td>Add</td><td><input type="submit" value="Save" name="submit" form="my_form"></td></tr>
                 
                  
                  
            </table>
         
         
        
  @else
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Hotel Details  Data Table </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
  
                  <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>City</th>
                       <th>State</th>
                       <th>Country</th>
                       <th>Zip Code</th>
                       <th>Phone Number</th>
                       <th>Email</th>
                      
                       
                    </tr>
                  </thead>
                  <tfoot>
 
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>City</th>
                       <th>State</th>
                       <th>Country</th>
                       <th>Zip Code</th>
                       <th>Phone Number</th>
                       <th>Email</th>
                      
                       
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($hoteldetails as $data) 
                  <tr>
                     <td>{{ $data -> id}}</td>
                      <td><img  style='width:60px;height:auto;' src="{{asset('images/'.$data -> image) }}" /></td>
                      <td>{{ $data -> name}}</td>
                      <td>{{ $data -> adress}}</td>
                      <td>{{ $data -> city}}</td>
                      <td>{{ $data -> state}}</td>
                      <td>{{ $data -> country}}</td>
                      <td>{{ $data -> zipcode}}</td>
                      <td>{{ $data -> phone}}</td>
                      <td>{{ $data -> email}}</td>
                      
                      

                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
 
          </div>

       

        </div> 
                            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa fa-sticky-note"></i> Edit Hotel </div>
         
         <form action="edithotel" method="post"    id="my_form2"></form>
                <div class="card-body">
              <div class="table-responsive">     
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 
                  
                  <input type="hidden" value="{{ $data -> id}}" name="hotelid" form="my_form2" />
                  <tr> <td>Name</td><td><input type="text" value="{{ $data -> name}}" name="hotelname" form="my_form2" /> </td> </tr>
                  <tr><td>Address</td><td><input type="text" value="{{ $data -> adress}}" name="hoteladress" form="my_form2" /> </td> </tr>
                  <tr> <td>City</td><td><input type="text" value="{{ $data -> city}}" name="hotelcity" form="my_form2" /> </td> </tr>
                  <tr><td>State</td> <td><input type="text" value="{{ $data -> state}}" name="hotelstate" form="my_form2" /> </td> </tr>
                  <tr> <td>Country</td><td><input type="text" value="{{ $data -> country}}" name="hotelcountry" form="my_form2" /> </td> </tr>
                  <tr><td>Zip Code</td> <td><input type="text" value="{{ $data -> zipcode}}" name="hotelzipcode" form="my_form2" /> </td> </tr>
                  <tr><td>Phone Number</td><td><input type="text" value="{{ $data -> phone}}" name="hotelphone" form="my_form2" /> </td> </tr>
                  <tr>  <td>Email</td><td><input type="email" name="email" value="{{ $data -> email}}" form="my_form2" /> </td> </tr>
                   
                  <tr> <td>Edit</th><td><input type="submit" value="Edit" name="submit" form="my_form2"></td>
                  </tr>
                  
                  
            </table>
         
         
         
        </div></div>        
         


        <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa fa-sticky-note"></i> Edit Hotel Image</div>
         
         <form action="updateimage" method="post" enctype="multipart/form-data"  id="my_form3"></form>
                <div class="card-body">
              <div class="table-responsive">     
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Old Image</th>
                      <th>New Image</th>
 
                       <th>Edit</th>
                    </tr>
                  </thead>
                  
                  <tr>
                  <td><img  style='width:160px;height:auto;' src="{{asset('images/'.$data -> image) }}" /></td>
                     
                  <td><input type="file" name="thumbnail" id="thumbnail" form="my_form3" /> </td>
                  <input type="hidden" value="{{ $data -> id}}" name="hotelid" form="my_form3" />
                   
                 <td><input type="submit" value="Edit" name="submit" form="my_form3"></td>
                  </tr>
                  
                  
            </table>
         
         
         
        </div></div>        </div></div>

        

@endif

@endsection
