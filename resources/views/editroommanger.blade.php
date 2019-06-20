<style>
.active2,.active2 span,.active2 i{
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
    <li class="breadcrumb-item active">Room Manager</li>
  </ol>

  <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa fa-sticky-note"></i> Edit Room </div>
         
         <form action="/saveeditRoom" method="post"    id="my_form2"></form>
                <div class="card-body">
              <div class="table-responsive">     
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      
                  <input type="hidden" value="{{ $rooms[0] -> id}}" name="hotelid" form="my_form2" />
                   <tr><td>Room Name</td><td><input type="text" name="roomname" VALUE="{{$rooms[0] ->roomname}}" form="my_form2" require /> </td></tr>
                   <tr><td>Room Type</td><td>
                   <select name="roomstypes" value="{{ $rooms[0] -> roomtype}}" class="form-control" id="roomstypes" form="my_form2" require>
@foreach($roomstypes as $data){
<option value="{{ $rooms[0] -> id}}">  {{ $data -> type}} 
  </option>
}
@endforeach
</select>
</td></tr>
<tr><td>Room Capacity</td>
<td><select name="roomcapacity" value="{{ $rooms[0] -> roomcapacity}}" class="form-control" id="roomcapacity" form="my_form2" require>
@foreach($roomcapacity as $data){
<option value="{{ $rooms[0] -> id}}">  {{ $data -> capacity}} 
  </option>
}
@endforeach
</select>
</td></tr>
                  <tr> <td>Edit</th><td><input type="submit" value="Edit" name="submit" form="my_form2"></td>
                  </tr>
                  
                  
            </table>
         
         
         
        </div></div>        
         


        <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa fa-sticky-note"></i> Edit Room Image</div>
         
         <form action="/updateroomimage" method="post" enctype="multipart/form-data"  id="my_form3"></form>
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
                  <td><img  style='width:160px;height:auto;' src="{{asset('images/'.$rooms[0] -> image) }}" /></td>
                     
                  <td><input type="file" name="thumbnail" id="thumbnail" form="my_form3" /> </td>
                  <input type="hidden" value="{{ $rooms[0] -> id}}" name="hotelid" form="my_form3" />
                   
                 <td><input type="submit" value="Edit" name="submit" form="my_form3"></td>
                  </tr>
                  
                  
            </table>
         
         
         
        </div></div>   
 
 
 
  </div></div>

        
 

@endsection
