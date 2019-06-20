<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
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
        $select = DB::select('select * from hoteldetails');
        return view('home')->with('hoteldetails',$select);
    }

  public function edithotel(Request $request){
    $this->validate($request, [
        'hotelname' => 'required ',
        'hoteladress' => 'required ',
        'hotelcity' => 'required ',
        'hotelstate' => 'required ',
        'hotelcountry' => 'required ',
        'hotelzipcode' => 'required ',
        'hotelphone' => 'required ',
        'email' => 'required ',
        'hotelid' => 'required ',
    ]);
    $hotelname = $request->input('hotelname');
    $hoteladress = $request->input('hoteladress');
    $hotelcity = $request->input('hotelcity');
    $hotelstate = $request->input('hotelstate');
    $hotelcountry = $request->input('hotelcountry');
    $hotelzipcode = $request->input('hotelzipcode');
    $hotelphone = $request->input('hotelphone');
    $email = $request->input('email');
    $hotelid = $request->input('hotelid');
     
    DB::update('update hoteldetails set name = ? , adress = ?, city = ?, state = ?, country = ?, zipcode = ?, phone = ?, email = ? where  id = ?',
     [ $hotelname , $hoteladress , $hotelcity , $hotelstate , $hotelcountry , $hotelzipcode , $hotelphone , $email , $hotelid]);  
     return back()->with('success','Hotel Edited');
 
    }
    public function updateimage(Request $request)
    {
        $this->validate($request, [
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
            $image = $request->file('thumbnail');
            $hotelid = $request->input('hotelid');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);
    
            DB::update('update hoteldetails set image = ?  where  id = ?',
            [ $input['imagename'] ,$hotelid]);  
            return back()->with('success','Hotel Edited');


        }
    public function Addhotel(Request $request)
    {
        $this->validate($request, [
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hotelname' => 'required ',
            'hoteladress' => 'required ',
            'hotelcity' => 'required ',
            'hotelstate' => 'required ',
            'hotelcountry' => 'required ',
            'hotelzipcode' => 'required ',
            'hotelphone' => 'required ',
            'email' => 'required ',
           
 
        ]);

       
        $hotelname = $request->input('hotelname');
        $hoteladress = $request->input('hoteladress');
        $hotelcity = $request->input('hotelcity');
        $hotelstate = $request->input('hotelstate');
        $hotelcountry = $request->input('hotelcountry');
        $hotelzipcode = $request->input('hotelzipcode');
        $hotelphone = $request->input('hotelphone');
        $email = $request->input('email');
        $image = $request->file('thumbnail');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);


       DB::insert('insert into hoteldetails  (name,adress,city,state,country,zipcode,phone,email,image) values(?,?,?,?,?,?,?,?,?)',[$hotelname,$hoteladress,$hotelcity,$hotelstate,$hotelcountry,$hotelzipcode,$hotelphone,$email,$input['imagename']]);

        return back()->with('success','Hotel Added');
    }

}
