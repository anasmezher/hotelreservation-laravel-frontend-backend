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
                
                @if(isset($reserved))

                @if($reserved=="1")
                <div class="panel-heading"><center>Thank you</center></div>
                <div class="panel-heading">You reserved this room </div>
                @else
                <div class="panel-heading"><center>Sorry</center></div>
                <div class="panel-heading">Room Can't be  reserved </div>
                @endif


                @endif
                <br/><br/>
                        <a href="/">Reserve Roome</a>  


            </div>
        </div>
    </div>
</div>
@endsection
