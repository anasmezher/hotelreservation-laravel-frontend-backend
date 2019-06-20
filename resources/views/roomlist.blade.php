@extends('layouts.app')
<style>
table {
    width: 100%;
    text-align: center;
    margin-top: 10px;
}
tr,td{
    margin-top: 10px; 
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
                <?php $sTime = strtotime($request->startdate); $eTime = strtotime($request->enddate);$diff= (($eTime -$sTime)/3600)/24; ?>
                <div class="panel-heading">Number of days : <?php echo $diff ; ?></div>


                @foreach($rooms as $data)
                    <div class="panel-heading"><center>
                    <img src="{{asset('images/'.$data -> image) }}" style=" width: 50%;" />  </br>
<table>
                    <tr>
<td>
Room Name : {{$data->roomname}} 
</td>
<td>
@foreach($roomstypes as $typesdata)
                    @if(($typesdata->id) == ($data -> roomtype) )
                    Room Type :  {{$typesdata->type}}
                      @endif

                    @endforeach
</td>
                    </tr>
<tr>
<td>
@foreach($roomcapacity as $roomcapacitydata)
                    @if(($roomcapacitydata->id) == ($data -> roomcapacity) )
                    Room capacity :  {{$roomcapacitydata->capacity}}
                      @endif

                    @endforeach
</td>
<td>
<form action="reservationpage" method="post"   id="{{ $data -> id}}"></form>
<input type="hidden" name="roomid" value="{{ $data -> id}}" form="{{ $data -> id}}" />
<input type="hidden" name="startdate" value="{{ $request->startdate}}" form="{{ $data -> id}}" />
<input type="hidden" name="enddate" value="{{ $request->enddate}}" form="{{ $data -> id}}" />
<input type="hidden" name="nights" value="{{ $diff}}" form="{{ $data -> id}}" />
<input type="hidden" name="roomname" value="{{$data->roomname}}" form="{{ $data -> id}}" />
<input type="hidden" name="type" value="{{ $data -> roomtype}}" form="{{ $data -> id}}" />
     
@foreach($pricelist as $pricelistdata)
                    @if((($pricelistdata->roomtypeid) == ($data -> roomtype))&& (($pricelistdata->roomcapacityid) == ($data -> roomcapacity)) )
              
                   @if($pricelistdata->range[0]=="=")
                   @if($pricelistdata->range[2]==$diff)
                   Price :  {{$pricelistdata->price}} $  
                   <input type="hidden" name="price" value="{{ $pricelistdata->price}}" form="{{ $data -> id}}" />
                   @endif
                   @endif
                   @if($pricelistdata->range[0]=="<")
                   @if($pricelistdata->range[2]>$diff)
                   Price :  {{$pricelistdata->price}} $ 
                   <input type="hidden" name="price" value="{{ $pricelistdata->price}}" form="{{ $data -> id}}" /> 
                   @endif
                    @endif
                    @if($pricelistdata->range[0]==">")
                    @if($pricelistdata->range[2]<$diff)
                   Price :  {{$pricelistdata->price}} $  
                   <input type="hidden" name="price" value="{{ $pricelistdata->price}}" form="{{ $data -> id}}" />
                   @endif
                   @endif
                   
                   @endif

                    @endforeach
</td>
</tr>
<tr>
<div style="margin-top:10px;">
                            <div class="col-12">
                                <button type="submit" form="{{ $data -> id}}" class="btn btn-primary col-12 btn-block">
                                Reserve
                                </button>
                            </div>
                        </div> 
 
     
</tr>



</table> 
 
                    </center></div>
 
 
@endforeach


            </div>
        </div>
    </div>
</div>
@endsection
