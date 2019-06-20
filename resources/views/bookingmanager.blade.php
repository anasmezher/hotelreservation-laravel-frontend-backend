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
                  <thead>
  
                  <tr>
                      <th>ID</th>
                      <th>Room</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Customer Name</th>
                      <th>Delete</th>
                       <th>Edit</th>
                       
                    </tr>
                  </thead>
                  <tfoot>
 
                    <tr>
                    <th>ID</th>
                    <th>Room</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Customer Name</th>
                      <th>Delete</th>  
                       <th>Edit</th>
                       
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($roombooking as $data) 
                  <tr>
                   
                     <td>{{ $data -> id}} </td>
                      <td>
                      @foreach($rooms as $roomdata)  
                      
                       @if(($roomdata->id) == ($data -> roomid) )
                                    {{$roomdata->roomname}}
                       @endif
                    @endforeach
                       </td>
                      <td> {{$data -> startdate}} </td> 
                      <td> {{ $data -> enddate}}"  </td>
                      <td> 
                      @foreach($customers as $customerdata)  
                      
                      @if(($customerdata->id) == ($data -> customerid) )
                                   {{$customerdata->firstname  }}     {{$customerdata->lastname  }}
                      @endif
                   @endforeach
  </td>
                      <td><a href="/Delbooking/{{ $data -> id}}">Delete</a></td>
                      <td><a href="/updatebooking/{{ $data -> id}}">Edit</a></td>
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
