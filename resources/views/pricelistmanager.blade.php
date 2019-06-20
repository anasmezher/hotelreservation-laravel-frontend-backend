<style>
.active5,.active5 span,.active5 i{
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
    <li class="breadcrumb-item active">Pricelist Manager</li>
  </ol>

 
   
 
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Pricelist Data Table </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
  
                  <tr>
                  <th>ID</th>
                       <th>Type</th>
                      <th>Capacity</th>
                      <th>Price</th>
                      <th>Days</th>
                      <th>Condition</th>
                      <th>Delete</th>
                       <th>Edit</th>

                    </tr>
                  </thead>
                  <tfoot>
 
                    <tr>
                    <th>ID</th>
                       <th>Type</th>
                      <th>Capacity</th>
                      <th>Price</th>
                      <th>Days</th>
                      <th>Condition</th>
                      <th>Delete</th>
                       <th>Edit</th>
 
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($pricelist as $data) 
                  <tr>
                  <form action="updateplist" method="post"   id="{{ $data -> id}}">
                     <td>{{ $data -> id}}<input type="hidden" name="hotelid" value="{{ $data -> id}}" form="{{ $data -> id}}" /></td>
                      <td>
                     @foreach($roomstypes as $roomstypesdata)  
                      @if(($roomstypesdata->id) == ($data -> roomtypeid) )
                                    {{$roomstypesdata->type}}
                      @endif
                    @endforeach
                      
                      </td>
                     <td>
                     @foreach($roomcapacity as $roomcapacitydata)  
                      @if(($roomcapacitydata->id) == ($data -> roomcapacityid) )
                                    {{$roomcapacitydata->capacity}}
                      @endif
                    @endforeach
                        </td>
                        <td> {{ $data -> price}}</td>
                        <td> {{ $data -> day}}</td>
                        <td> {{ $data -> range}} day</td>
                        
                      <td><a href="/Delplist/{{ $data -> id}}">Delete</a></td>
                      <td><a href="/editplist/{{ $data -> id}}">Edit</a></td>
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
              Add New Pricelist     </div>
              <form action="Addplist" method="post"  enctype="multipart/form-data"  id="my_form2"></form>
                <div class="card-body">
              <div class="table-responsive"> 
  
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

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
<tr><td>Price $</td><td><input type="number" name="price" form="my_form2" require /> </td></tr>
<tr><td>Day</td><td><select name="day" class="form-control" id="day" form="my_form2" require>
<option value="Saturday">  Saturday </option>
<option value="Sunday">  Sunday </option>
<option value="Monday">  Monday </option>
<option value="Tuesday">  Tuesday </option>
<option value="Wednesday">  Wednesday </option>
<option value="Friday">  Friday </option>
<option value="Thursday">  Thursday </option>
</select>
 </td></tr>


 <tr  ><td>Have Range</td><td> <input type="checkbox" name="haverange" id="haverange" ></td>
 
 </tr>
 <tr id="rangefeild"> </td>
 
 </tr>

 <tr><td>Add</td><td><input type="submit" value="Save" name="submit" form="my_form2"></td></tr>
                 
                  
                  
            </table>
            </div></div>  </div></div>

            <script type="text/javascript">

$('#haverange').click(function() {
                if(document.getElementById('haverange').checked) {
                     
                    $("#rangefeild").html(' <td>Number Of Days</td><td><input type="number" id="Numberdays" name="Numberdays" form="my_form2" require /> </td> <td><input type="radio" name="cond" value="=" checked form="my_form2" require>Equal  </td> <td>  <input type="radio" name="cond" value="<" form="my_form2" require>More than </td> <td> <input type="radio" name="cond" value=">" form="my_form2" require>Lower Than</td>');
                } else {
                   
                    $("#rangefeild").html(' ');
                }
            }); 
//   $("#haverange").change(function(){
//       alert('fffff');
//       var range = $(this).val();
 
//             $("#rangefeild").html('<tr><td>Price</td><td><input type="number" name="Number of days" form="my_form2" require /> </td></tr>');
//           }
     
//   });
</script>       
 

@endsection
