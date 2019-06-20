<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PricelistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomstypes = DB::select('select * from roomstypes'); 
        $pricelist = DB::select('select * from pricelist');
        $roomcapacity = DB::select('select * from roomcapacity');
        
        return view('pricelistmanager')->with('roomstypes',$roomstypes)->with('pricelist',$pricelist)->with('roomcapacity',$roomcapacity);
    }

 

    public function Addplist(Request $request)
    {


if($request->input('Numberdays')){
    $this->validate($request, [
 
        'roomstypes' => 'required ',
        'roomcapacity' => 'required ',
        'price' => 'required ',
        'day' => 'required ',
        'Numberdays' => 'required ',
        'cond' => 'required ',      

    ]);
    $Numberdays = $request->input('Numberdays');
    $cond = $request->input('cond');
   
    $range=$cond.' '.$Numberdays;

}else{
    $this->validate($request, [
 
        'roomstypes' => 'required ',
        'roomcapacity' => 'required ',
        'price' => 'required ',
        'day' => 'required ',
    

    ]);
    $range='= 1';
}
    
    $roomstypes = $request->input('roomstypes');
    $roomcapacity = $request->input('roomcapacity');
    $price = $request->input('price');
    $day = $request->input('day');

  

       DB::insert('insert into pricelist  (roomtypeid,roomcapacityid,price,day,range) values(?,?,?,?,?)',[$roomstypes,$roomcapacity,$price,$day,$range]);

        return back()->with('success','room Added');
    }

    public function  Delplist($ID ){
        DB::table('pricelist')->delete($ID);
        return back()->with('success','room Deleted');
    }

     


    public function  saveeditplist(Request $request){

 
    $this->validate($request, [
 
        'roomstypes' => 'required ',
        'roomcapacity' => 'required ',
        'price' => 'required ',
        'day' => 'required ',
        'Numberdays' => 'required ',
        'cond' => 'required ',      

    ]);
    $Numberdays = $request->input('Numberdays');
    $cond = $request->input('cond');
   
    $range=$cond.' '.$Numberdays;
    $hotelid=$request->input('hotelid');
    
    $roomstypes = $request->input('roomstypes');
    $roomcapacity = $request->input('roomcapacity');
    $price = $request->input('price');
    $day = $request->input('day');
      
        DB::update('update pricelist set roomtypeid = ? ,roomcapacityid = ? ,price = ? ,day = ? ,range = ?  where  id = ?',
         [ $roomstypes ,$roomcapacity ,$price , $day,$range,$hotelid ]);  
         return back()->with('success','Room Edited');
     


    }
    public function  editplist($ID ){
 
        $roomstypes = DB::select('select * from roomstypes'); 
        $pricelist = DB::select('select * from pricelist where id='.$ID);
        $roomcapacity = DB::select('select * from roomcapacity');
        $rangeanddays=explode(" ", $pricelist[0]->range);
      
        return view('editplistmanger')->with('rangeanddays',$rangeanddays)->with('roomstypes',$roomstypes)->with('pricelist',$pricelist)->with('roomcapacity',$roomcapacity);
     



    }



}
