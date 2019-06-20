<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TypeController extends Controller
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
        $select = DB::select('select * from roomstypes');
        return view('roomtype')->with('hoteltypes',$select);
    }

  public function updatetype(Request $request){
    $this->validate($request, [
        'hoteltype' => 'required ',
         'hoteltypeid' => 'required ',
    ]);
    $hoteltype = $request->input('hoteltype');
    $hoteltypeid = $request->input('hoteltypeid');
     
    DB::update('update roomstypes set type = ?   where  id = ?',
     [ $hoteltype , $hoteltypeid ]);  
     return back()->with('success','Type Edited');
 
    }
    public function  Deltype($ID ){
        DB::table('roomstypes')->delete($ID);
        return back()->with('success','Type Deleted');
    }
    public function Addtype(Request $request)
    {
        $this->validate($request, [
            'hoteltypee' => 'required ',
           
 
        ]);

       
        $hoteltypee = $request->input('hoteltypee');
 


       DB::insert('insert into roomstypes  (type) values(?)',[$hoteltypee]);

        return back()->with('success','Type Added');
    }

}
