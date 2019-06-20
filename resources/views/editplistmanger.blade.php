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
         
         <form action="/saveeditplist" method="post"    id="my_form2"></form>
 
                <div class="card-body">
              <div class="table-responsive"> 
  
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <input type="hidden" value="{{ $pricelist[0] -> id}}" name="hotelid" form="my_form2" />
                   <tr><td>Room Type</td><td>
                   <select name="roomstypes" value="{{ $pricelist[0] -> roomtypeid}}" class="form-control" id="roomstypes" form="my_form2" require>
@foreach($roomstypes as $data){
<option value="{{ $data -> id}}">  {{ $data -> type}} 
  </option>
}
@endforeach
</select>
</td></tr>
<tr><td>Room Capacity</td>
<td><select name="roomcapacity" class="form-control"  value="{{ $pricelist[0] -> roomcapacityid}}" id="roomcapacity" form="my_form2" require>
@foreach($roomcapacity as $data){
<option value="{{ $data -> id}}">  {{ $data -> capacity}} 
  </option>
}
@endforeach
</select>
</td></tr>
<tr><td>Price $</td><td><input type="number" name="price" value="{{ $pricelist[0] -> price}}" form="my_form2" require /> </td></tr>
<tr><td>Day</td><td><select  name="day" class="form-control" id="day" form="my_form2" require>
<option value="Saturday">  Saturday </option>
<option value="Sunday">  Sunday </option>
<option value="Monday">  Monday </option>
<option value="Tuesday">  Tuesday </option>
<option value="Wednesday">  Wednesday </option>
<option value="Friday">  Friday </option>
<option value="Thursday">  Thursday </option>
</select>
 </td></tr>
  

 <tr  ><td>Number Of Days</td><td><input type="number" value="{{$rangeanddays[1] }}" id="Numberdays" name="Numberdays" form="my_form2" require /> </td>
  <td><input type="radio" name="cond" value="=" <?php if($rangeanddays[0]=="=")  echo 'checked' ;?>  form="my_form2" require>Equal  </td>
   <td>  <input type="radio" name="cond" value="<"  <?php if($rangeanddays[0]=="<")  echo 'checked' ;?> form="my_form2" require>More than </td>
    <td> <input type="radio" name="cond" value=">"  <?php if($rangeanddays[0]==">")  echo 'checked' ;?>  form="my_form2" require>Lower Than</td>
 </tr>
  
 
 </tr>

 <tr><td>Add</td><td><input type="submit" value="Save" name="submit" form="my_form2"></td></tr>
                 
                  
                  
            </table>
            </div></div>  </div></div>

        
        
 

@endsection
