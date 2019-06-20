@extends('layouts.app')
<style>
table {
    width: 100%;
    text-align: center;
    margin-top: 10px;
}
tr,td{
    margin-top: 10px; 
    text-align: left;
}
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><center>Room List</center></div>
                <div class="panel-heading">Start Date : {{$request->startdate}}</div>
                <div class="panel-heading">End Date : {{$request->enddate}}</div>
                <div class="panel-heading">Number of days : {{$request->nights}}</div>
                <div class="panel-heading">Price : {{$request->price}} $</div>
                <div class="panel-heading">Room Name : {{$request->roomname}} </div>

                
                    <div class="panel-heading"><center>
                    Customer Details
                    
                <div class="card-body">
              <div class="table-responsive"> 
  
              <table    width="100%" cellspacing="0">
             

              @if(isset($login))
              <form action="reserveforocustomer" method="post"   id="my_form22">
 <tr><td>First Name</td><td><input type="text" value="{{$selectuser[0]->firstname}}" class="form-control" name="firstname" form="my_form22" require /> </td></tr>
<tr><td>Last Name </td><td><input type="text" value="{{$selectuser[0]->lastname}}"  class="form-control" name="lastname" form="my_form22" require /> </td></tr>
<tr><td>Adress</td><td><input type="text" value="{{$selectuser[0]->adress}}"  class="form-control" name="adress" form="my_form22"  /> </td></tr>
<tr><td>City  </td><td><input type="text" value="{{$selectuser[0]->city}}"  class="form-control" name="city" form="my_form22"  /> </td></tr>
<tr><td>Country</td><td><input type="text" value="{{$selectuser[0]->country}}"  class="form-control"  name="country" form="my_form22"  /> </td></tr>
<tr><td>Phone</td><td><input type="number" value="{{$selectuser[0]->phone}}"  class="form-control" name="phone" form="my_form22" require /> </td></tr>
<tr><td>Fax</td><td><input type="number" value="{{$selectuser[0]->fax}}"  class="form-control" name="fax" form="my_form22"  /> </td></tr>
<tr><td>Email</td><td><input type="email" value="{{$selectuser[0]->email}}"  class="form-control" name="email" form="my_form22" require /> </td></tr>
<input type="hidden" name="customerid" value="{{ $selectuser[0] -> id}}" form="my_form22" />
                     
                        @else
<form action="reservefornewcustomer" method="post"   id="my_form22">
<tr><td>First Name</td><td><input type="text" class="form-control" name="firstname" form="my_form22" require /> </td></tr>
<tr><td>Last Name </td><td><input type="text" class="form-control" name="lastname" form="my_form22" require /> </td></tr>
<tr><td>Adress</td><td><input type="text" class="form-control" name="adress" form="my_form22"  /> </td></tr>
<tr><td>City  </td><td><input type="text" class="form-control" name="city" form="my_form22"  /> </td></tr>
<tr><td>Country</td><td><input type="text" class="form-control"  name="country" form="my_form22"  /> </td></tr>
<tr><td>Phone</td><td><input type="number" class="form-control" name="phone" form="my_form22" require /> </td></tr>
<tr><td>Fax</td><td><input type="number" class="form-control" name="fax" form="my_form22"  /> </td></tr>
<tr><td>Email</td><td><input type="email" class="form-control" name="email" form="my_form22" require /> </td></tr>
<tr><td>Password</td><td><input type="password" class="form-control"   name="mpassword" form="my_form22" require /> </td></tr>
 
                        @endif

            </table>
<input type="hidden" name="roomid" value="{{ $request -> roomid}}" form="my_form22"/>
<input type="hidden" name="startdate" value="{{ $request->startdate}}" form="my_form22" />
<input type="hidden" name="enddate" value="{{ $request->enddate}}" form="my_form22" />
<input type="hidden" name="nights" value="{{ $request -> nights}}" form="my_form22" />
<input type="hidden" name="type" value="{{ $request -> type}}" form="my_form22" />
<input type="hidden" name="price" value="{{ $request -> price}}" form="my_form22" />
<div style="margin-top:10px;">
                            <div class="col-12">
                                <button type="submit"  form="my_form22" class="btn btn-primary col-12 btn-block">
                                Reserve
                                </button>
                            </div>
                        </div> 
 
     
 
                        </form>
                    </center></div>
 
 
 


            </div>
        </div>
    </div>
</div>
@endsection
