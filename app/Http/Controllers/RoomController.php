<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RoomController extends Controller
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
        $rooms = DB::select('select * from rooms');
        $pricelist = DB::select('select * from pricelist');
        $roomcapacity = DB::select('select * from roomcapacity');
        
        return view('roommanger')->with('roomstypes',$roomstypes)->with('rooms',$rooms)->with('pricelist',$pricelist)->with('roomcapacity',$roomcapacity);
    }



    public function Addroom(Request $request)
    {
        $this->validate($request, [
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roomname' => 'required ',
            'roomstypes' => 'required ',
            'roomcapacity' => 'required ',
 
           
 
        ]);

       
        $roomname = $request->input('roomname');
        $roomstypes = $request->input('roomstypes');
        $roomcapacity = $request->input('roomcapacity');
  
        $image = $request->file('thumbnail');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

       DB::insert('insert into rooms  (roomname,roomtype,roomcapacity,image) values(?,?,?,?)',[$roomname,$roomstypes,$roomcapacity,$input['imagename']]);

        return back()->with('success','room Added');
    }

    public function  Delroom($ID ){
        DB::table('rooms')->delete($ID);
        return back()->with('success','room Deleted');
    }

    
    public function  updateroomimage(Request $request){
        $this->validate($request, [
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
            $image = $request->file('thumbnail');
            $hotelid = $request->input('hotelid');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);
    
            DB::update('update rooms set image = ?  where  id = ?',
            [ $input['imagename'] ,$hotelid]);  
            return back()->with('success','Hotel Edited');



    }



    public function  saveeditRoom(Request $request){

        $this->validate($request, [
            'roomname' => 'required ',
            'roomstypes' => 'required ',
            'roomcapacity' => 'required ',
            'hotelid' => 'required ',
           
 
        ]);

       
        $roomname = $request->input('roomname');
        $roomstypes = $request->input('roomstypes');
        $roomcapacity = $request->input('roomcapacity');
        $hotelid = $request->input('hotelid');
        DB::update('update rooms set roomname = ? ,roomtype = ? ,roomcapacity = ?  where  id = ?',
         [ $roomname ,$roomstypes ,$roomcapacity , $hotelid ]);  
         return back()->with('success','Room Edited');
     


    }
    public function  editroom($ID ){
 
        $roomstypes = DB::select('select * from roomstypes');
        $rooms = DB::select('select * from rooms where id='.$ID);
        $pricelist = DB::select('select * from pricelist');
        $roomcapacity = DB::select('select * from roomcapacity');
        
        return view('editroommanger')->with('roomstypes',$roomstypes)->with('rooms',$rooms)->with('pricelist',$pricelist)->with('roomcapacity',$roomcapacity);
     



    }



}
