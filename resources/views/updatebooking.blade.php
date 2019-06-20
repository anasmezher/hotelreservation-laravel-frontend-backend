<style>
.active5,.active5 span,.active5 i{
    color:white !important;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@extends('layouts.admin')

@section('content')


<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
       Dashboard 
    </li>
    <li class="breadcrumb-item active">Pricelist Manager  </li>
  </ol>

  <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa fa-sticky-note"></i> Edit Pricelist </div>
         
         <form action="/saveeditbooking" method="post"    id="my_form2"></form>
 
                <div class="card-body">
              <div class="table-responsive"> 
  
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <input type="hidden" value="{{ $roombooking[0] -> id}}" name="bookingid" form="my_form2" />
                   <tr><td>Change Room  </td><td>
                   <select name="rooms" value="{{ $roombooking[0] -> roomid}}" class="form-control" id="rooms" form="my_form2" require>
@foreach($rooms as $data){
<option value="{{ $data -> id}}">  {{ $data -> roomname}} 
  </option>
}
@endforeach
</select>
</td></tr>
 

 
 
 </tr>

 <tr><td>Add</td><td><input type="submit" value="Save" name="submit" form="my_form2"></td></tr>
                 
                  
                  
            </table>
            </div></div>  </div></div>

        
        
 

@endsection
