<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CapacityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $select = DB::select('select * from roomcapacity');
        return view('roomcapacity')->with('hotelcapacity',$select);
    }

  public function updatecapacity(Request $request){
    $this->validate($request, [
        'hotelcapacity' => 'required ',
         'hotelcapacityid' => 'required ',
    ]);
    $hotelcapacity = $request->input('hotelcapacity');
    $hotelcapacityid = $request->input('hotelcapacityid');
     
    DB::update('update roomcapacity set capacity = ?   where  id = ?',
     [ $hotelcapacity , $hotelcapacityid ]);  
     return back()->with('success','capacity Edited');
 
    }
    public function  Delcapacity($ID ){
        DB::table('roomcapacity')->delete($ID);
        return back()->with('success','capacity Deleted');
    }
    public function Addcapacity(Request $request)
    {
        $this->validate($request, [
            'hotelcapacity' => 'required ',
           
 
        ]);

       
        $hotelcapacity = $request->input('hotelcapacity');
 


       DB::insert('insert into roomcapacity  (capacity) values(?)',[$hotelcapacity]);

        return back()->with('success','capacity Added');
    }

}
