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
                     <div class="panel-heading"><center>
                    Customer Details
                    <form action="editmeascustomer" method="post"   id="my_form2"></form>
                <div class="card-body">
              <div class="table-responsive"> 
  
              <table    width="100%" cellspacing="0">
              
              <input type="hidden" name="customerid" value="{{ $select[0]->id}}" form="my_form2"/>
<tr><td>First Name</td><td><input type="text" value="{{$select[0]->firstname}}" class="form-control" name="firstname" form="my_form2" require /> </td></tr>
<tr><td>Last Name </td><td><input type="text" value="{{$select[0]->lastname}}"  class="form-control" name="lastname" form="my_form2" require /> </td></tr>
<tr><td>Adress</td><td><input type="text" value="{{$select[0]->adress}}"  class="form-control" name="adress" form="my_form2"  /> </td></tr>
<tr><td>City  </td><td><input type="text" value="{{$select[0]->city}}"  class="form-control" name="city" form="my_form2"  /> </td></tr>
<tr><td>Country</td><td><input type="text" value="{{$select[0]->country}}"  class="form-control"  name="country" form="my_form2"  /> </td></tr>
<tr><td>Phone</td><td><input type="number" value="{{$select[0]->phone}}"  class="form-control" name="phone" form="my_form2" require /> </td></tr>
<tr><td>Fax</td><td><input type="number" value="{{$select[0]->fax}}"  class="form-control" name="fax" form="my_form2"  /> </td></tr>
<tr><td>Email</td><td><input type="email" value="{{$select[0]->email}}"  class="form-control" name="email" form="my_form2" require /> </td></tr>
<tr><td>Password</td><td><input type="password" value="{{$select[0]->password}}"  class="form-control"   name="mpassword" form="my_form2" require /> </td></tr>
 
            </table>
<div style="margin-top:10px;">
                            <div class="col-12">
                                <button type="submit"  form="my_form2" class="btn btn-primary col-12 btn-block">
                                Edit
                                </button>
                            </div>
                        </div> <br/><br/>
                        <a href="/">Reserve Roome</a>  
     
 
 
                    </center></div>
 
 
 


            </div>
        </div>
    </div>
</div>
@endsection
