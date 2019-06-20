@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Online Booking</div>
<form class="form-horizontal" action="viewrooms" method="post" style="padding:10px;">
<div   style="margin-top:10px;">
<label for="startdate"class=" control-label">Start Date*</label>

<input type="date"    class="form-control" name="startdate" id="stdate" require>
</div>
<div   style="margin-top:10px;">
<label for="enddate" class=" control-label">End Date*</label>

<input type="date" class="form-control" name="enddate" id="enddate" require>
</div>
<div  style="margin-top:10px;">
<label for="room-type"  class=" control-label">Room Type*</label>

<select name="room-type" name="roomtype" class="form-control" id="room-type" require>
@foreach($roomstypes as $data){
<option value="{{ $data -> id}}">{{ $data -> id}}  {{ $data -> type}} 
  </option>

 
}
@endforeach
</select>
</div>
<div style="margin-top:10px;">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary col-12 btn-block">
                                View Availability
                                </button>
                            </div>
                        </div> 
</form>
                <div class="panel-body">
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
