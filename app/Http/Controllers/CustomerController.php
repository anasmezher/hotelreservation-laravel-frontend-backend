<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
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
        $customers = DB::select('select * from customers'); 
        
        return view('customermanager')->with('customers',$customers);
    }

 

    public function AddCustomer(Request $request)
    { 
        $this->validate($request, [
     
            'firstname' => 'required ',
            'lastname' => 'required ',
            'phone' => 'required ',
            'mpassword' => 'required ',
            'email' => 'required '     
    
        ]);
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        
        $adress=$request->input('adress');
        $customerid = $request->input('customerid');
        $city = $request->input('city');
        $country = $request->input('country');
        $phone = $request->input('phone');
        $fax = $request->input('fax');
        $email = $request->input('email');
        $mpassword = $request->input('mpassword');

       DB::insert('insert into customers  (password,firstname,lastname,adress,city,country,phone,fax,email) values(?,?,?,?,?,?,?,?,?)',[$mpassword,$firstname ,$lastname ,$adress , $city,$country,$phone,$fax, $email]);

        return back()->with('success','customer Added');
    }

    public function  DelCustomer($ID ){
        DB::table('customers')->delete($ID);
        return back()->with('success','customer Deleted');
    }

     


    public function  saveeditCustomer(Request $request){

 
    $this->validate($request, [
 
        'firstname' => 'required ',
        'lastname' => 'required ',
        'phone' => 'required ',
        'mPassword' => 'required ',
        'email' => 'required '     
        
    ]);
    $firstname = $request->input('firstname');
    $lastname = $request->input('lastname');
    $mPassword = $request->input('mPassword');
    
    $adress=$request->input('adress');
    $customerid = $request->input('customerid');
    $city = $request->input('city');
    $country = $request->input('country');
    $phone = $request->input('phone');
    $fax = $request->input('fax');
    $email = $request->input('email');
        DB::update('update customers set Password = ? ,firstname = ? ,lastname = ? ,adress = ? ,city = ? ,country = ?,phone = ?,fax = ?,email = ?  where  id = ?',
         [$mPassword, $firstname ,$lastname ,$adress , $city,$country,$phone,$fax, $email,$customerid ]);  
         return back()->with('success','customer Edited');
     


    }
    public function  editCustomer($ID ){
 
    
        $customers = DB::select('select * from customers where id='.$ID);
 
        return view('editcustomer')->with('customers',$customers);
     



    }



}
