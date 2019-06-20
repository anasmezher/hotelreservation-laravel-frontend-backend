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
              <i class="fas fa-table"></i>
              Hotel Type  Data Table </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
  
                  <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Capacity</th>
                      <th>Delete</th>
                       <th>Edit</th>

                    </tr>
                  </thead>
                  <tfoot>
 
                    <tr>
                    <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Capacity</th>
                      <th>Delete</th>
                       <th>Edit</th>
 
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($rooms as $data) 
                  <tr>
                  <form action="updatecapacity" method="post"   id="{{ $data -> id}}">
                     <td>{{ $data -> id}}<input type="hidden" name="hotelid" value="{{ $data -> id}}" form="{{ $data -> id}}" /></td>
                     <td><img  style='width:60px;height:auto;' src="{{asset('images/'.$data -> image) }}" /></td>
                     <td> {{ $data -> roomname}}</td>
                     <td>
                     @foreach($roomstypes as $roomstypesdata)  
                      @if(($roomstypesdata->id) == ($data -> roomtype) )
                                    {{$roomstypesdata->type}}
                      @endif
                    @endforeach
                      
                      </td>
                     <td>
                     @foreach($roomcapacity as $roomcapacitydata)  
                      @if(($roomcapacitydata->id) == ($data -> roomcapacity) )
                                    {{$roomcapacitydata->capacity}}
                      @endif
                    @endforeach
                        </td>
                      <td><a href="/Delroom/{{ $data -> id}}">Delete</a></td>
                      <td><a href="/editroom/{{ $data -> id}}">Edit</a></td>
                      </form>
                        </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
 
          </div>

       
 


        <div class="card-header">
              <i class="fas fa-table"></i>
              Add New Room     </div>
              <form action="Addroom" method="post"  enctype="multipart/form-data"  id="my_form2"></form>
                <div class="card-body">
              <div class="table-responsive"> 
  
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr><td>Room Name</td><td><input type="text" name="roomname" form="my_form2" require /> </td></tr>
                   <tr><td>Room Type</td><td>
                   <select name="roomstypes" class="form-control" id="roomstypes" form="my_form2" require>
@foreach($roomstypes as $data){
<option value="{{ $data -> id}}">  {{ $data -> type}} 
  </option>
}
@endforeach
</select>
</td></tr>
<tr><td>Room Capacity</td>
<td><select name="roomcapacity" class="form-control" id="roomcapacity" form="my_form2" require>
@foreach($roomcapacity as $data){
<option value="{{ $data -> id}}">  {{ $data -> capacity}} 
  </option>
}
@endforeach
</select>
</td></tr>
<tr><td>Image</td><td><input type="file" name="thumbnail" id="thumbnail" form="my_form2" /> </td></tr>
 <tr><td>Add</td><td><input type="submit" value="Save" name="submit" form="my_form2"></td></tr>
                 
                  
                  
            </table>
            </div></div>  </div></div>

        
 

@endsection
