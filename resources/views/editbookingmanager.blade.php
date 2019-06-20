<style>
.active6,.active6 span,.active6 i{
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
    <li class="breadcrumb-item active">Booking Manager</li>
  </ol>

 
   
 
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Hotel Booking  List </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                  <tbody>
                  @foreach($roombooking as $data) 
                  <tr>
                  <form action="saveeditbooking" method="post"   id="my_form2">
                  <input type="hidden" value="{{ $data -> id}}" name="bookid" form="my_form2" />
                  <tr><td>ID</td> <td>{{ $data -> id}} </td></tr>
                     <tr><td>Room</td>  <td>
                            <select name="roombookingid" value="{{ $roombooking -> roomid}}" class="form-control" id="roombookingid" form="my_form2" require>
                                    @foreach($rooms as $data){
                                    <option value="{{ $data -> id}}">  {{ $data -> roomname}} 
                                    </option>
                                    }
                                    @endforeach
                            </select>
                        </td></tr>
                        <tr><td>Start Date</td>  <td><input type="date" value=" {{$data -> startdate}}" name="bookid" form="my_form2" /> </td></tr>
                        <tr><td>End Date</td>  <td><input type="date" value=" {{$data -> enddate}}" name="enddate" form="my_form2" /> </td>  </td></tr> 
                        <tr><td>Customer Name</td>  <td>
                            <select name="customerid" value="{{ $data -> customerid}}" class="form-control" id="customerid" form="my_form2" require>
                                    @foreach($customers as $customerdata){
                                    <option value="{{ $customerdata -> id}}">   {{$customerdata->firstname  }}     {{$customerdata->lastname  }}
                                    </option>
                                    }
                                    @endforeach
                            </select>
                        </td> </tr>                   
                        <tr><td>Save</td>  <td><input type="submit" value="Save" name="submit" form="my_form2"></td>
                      </form>
                        </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
 
          </div>

       

        </div> 
 
             </div></div>

        
 

@endsection
