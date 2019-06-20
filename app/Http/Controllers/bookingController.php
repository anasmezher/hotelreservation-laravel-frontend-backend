<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class bookingController extends Controller
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
         
        $rooms = DB::select('select * from rooms');
        $roombooking = DB::select('select * from booking');
        $customers = DB::select('select * from customers');
        
        return view('bookingmanager')->with('roombooking',$roombooking)->with('rooms',$rooms)->with('customers',$customers);
    }

 

    public function  Delbooking($ID ){
        DB::table('booking')->delete($ID);
        return back()->with('success','booking Deleted');
    }

    


    public function  saveeditbooking(Request $request){

        $this->validate($request, [
            'rooms' => 'required ',
            'bookingid' => 'required ',
 
 
        ]);

       
        $rooms = $request->input('rooms');
        $bookingid = $request->input('bookingid');
    
  
        DB::update('update booking set roomid = ?    where  id = ?',
         [ $rooms , $bookingid ]);  
         return back()->with('success','Booking Edited');
     


    }
    public function  updatebooking($ID ){
 
 
        $rooms = DB::select('select * from rooms');
        $roombooking = DB::select('select * from booking where id='.$ID);
        $customers = DB::select('select * from customers');
        
        return view('updatebooking')->with('roombooking',$roombooking)->with('rooms',$rooms)->with('customers',$customers);
 

    }



}
