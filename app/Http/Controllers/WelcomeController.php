<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class WelcomeController extends Controller
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
    public function index(Request $request)
    {

        $loginvalue = $request->session()->get('customerlogin');
if($loginvalue=='1'){
    $email = $request->session()->get('customeremail');
    $cpassword = $request->session()->get('customerpassword');
    $select = DB::select('select * from customers where email ="'.$email.'" AND password="'.$cpassword.'"');
    if($select){
        $request->session()->put('customerlogin', '1');
        $request->session()->put('customeremail', $email);
        $request->session()->put('customerpassword', $cpassword);
   
        $select = DB::select('select * from roomstypes');
        
        return view('welcome')->with('roomstypes',$select)->with('login','1') ;
    }}else{
        $select = DB::select('select * from roomstypes');
        return view('welcome')->with('roomstypes',$select); 
     }

    


     
    }

    public function viewrooms(Request $request){
        $loginvalue = $request->session()->get('customerlogin');
if($loginvalue=='1'){
    $email = $request->session()->get('customeremail');
    $cpassword = $request->session()->get('customerpassword');
    $select = DB::select('select * from customers where email ="'.$email.'" AND password="'.$cpassword.'"');
    if($select){
        $request->session()->put('customerlogin', '1');
        $request->session()->put('customeremail', $email);
        $request->session()->put('customerpassword', $cpassword);
        $roomtype = $request->input('room-type');
        $roomstypes = DB::select('select * from roomstypes'); 
        $pricelist = DB::select('select * from pricelist');
        $roomcapacity = DB::select('select * from roomcapacity');
        $select = DB::select('select * from rooms where roomtype ='.$roomtype);   
        return view('roomlist')->with('rooms',$select)->with('request',$request)->with('request',$request)->with('roomstypes',$roomstypes)->with('pricelist',$pricelist)->with('roomcapacity',$roomcapacity)->with('login','1') ;
     
    } }else{
        $roomtype = $request->input('room-type');
        $roomstypes = DB::select('select * from roomstypes'); 
        $pricelist = DB::select('select * from pricelist');
        $roomcapacity = DB::select('select * from roomcapacity');
        $select = DB::select('select * from rooms where roomtype ='.$roomtype);   
        return view('roomlist')->with('rooms',$select)->with('request',$request)->with('request',$request)->with('roomstypes',$roomstypes)->with('pricelist',$pricelist)->with('roomcapacity',$roomcapacity) ;
     
     }

    

    }


    public function reservationpage(Request $request){
        $loginvalue = $request->session()->get('customerlogin');
if($loginvalue=='1'){
    $email = $request->session()->get('customeremail');
    $cpassword = $request->session()->get('customerpassword');
    $select = DB::select('select * from customers where email ="'.$email.'" AND password="'.$cpassword.'"');
    if($select){
        return view('reservationpage')->with('request',$request)->with('selectuser',$select)->with('login','1') ;
    }}else{
        return view('reservationpage')->with('request',$request);
     }

   

        
    }

    
    public function customerlogin( Request $request ){
        $loginvalue = $request->session()->get('customerlogin');
        if($loginvalue=='1'){
            $email = $request->session()->get('customeremail');
            $cpassword = $request->session()->get('customerpassword');
            $select = DB::select('select * from customers where email ="'.$email.'" AND password="'.$cpassword.'"');
            if($select){
                return view('customerpage')->with('login','1')->with('select',$select);
            } }else{
                return view('customerlogin')->with('found','un') ;
             }
        
            
        
    }
    
    public function logoutcustomer(Request $request ){

        $request->session()->put('customerlogin', '0');
        $select = DB::select('select * from roomstypes');
        return view('welcome')->with('roomstypes',$select); 
    }
    public function registercustomer(Request $request ){
        $email = $request->input('email');
        $select = DB::select('select * from customers where email ="'.$email.'"');
         if($select){
            return view('customerlogin')->with('found','1');
         }else{

            $password_confirmation = $request->input('password_confirmation');
            $email = $request->input('email');
            $mpassword = $request->input('cpassword');
    if($password_confirmation==$mpassword){
        DB::insert('insert into customers  (password,email ,firstname,lastname,adress,city,country,phone,fax ) values(?,?,?,?,?,?,?,?,?)',[$mpassword, $email,'','','','','','','']);
    
        return view('customerlogin')->with('success','customer Added')->with('found','0');
    }else{
        return view('customerlogin')->with('success','customer not Added')->with('found','not');
    }
          
}        
        
   
    }

    public function logincustomer(Request $request ){
        $email = $request->input('email');
        $cpassword = $request->input('cpassword');
        $select = DB::select('select * from customers where email ="'.$email.'" AND password="'.$cpassword.'"');
        if($select){
            $request->session()->put('customerlogin', '1');
            $request->session()->put('customeremail', $email);
            $request->session()->put('customerpassword', $cpassword);
            return view('customerpage')->with('login','1')->with('select',$select);
         }else{
            return view('customerlogin')->with('success','customer not loged in ')->with('found','notlogged'); 
         }
    }
    
    
    public function customerpage(Request $request ){
        $loginvalue = $request->session()->get('customerlogin');
if($loginvalue=='1'){
    $email = $request->session()->get('customeremail');
    $cpassword = $request->session()->get('customerpassword');
    $select = DB::select('select * from customers where email ="'.$email.'" AND password="'.$cpassword.'"');
    if($select){
        $request->session()->put('customerlogin', '1');
        $request->session()->put('customeremail', $email);
        $request->session()->put('customerpassword', $cpassword);
        return view('customerpage')->with('login','1')->with('select',$select);
    }}else{
        return view('customerlogin')->with('success','customer not loged in ')->with('found','notlogged'); 
     }

        
    }

    public function reserveforocustomer(Request $request ){ 
         $this->validate($request, [
     
            'firstname' => 'required ',
            'lastname' => 'required ',
            'phone' => 'required ', 
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

        DB::update('update customers set firstname = ? ,lastname = ? ,adress = ? ,city = ? ,country = ?,phone = ?,fax = ?,email = ?  where  id = ?',
         [ $firstname ,$lastname ,$adress , $city,$country,$phone,$fax, $email,$customerid ]);  
       $roomid = $request->input('roomid');
       $startdate = $request->input('startdate');
       $enddate = $request->input('enddate'); 

       DB::insert('insert into booking  (roomid,startdate,enddate,customerid) values(?,?,?,?)',[$roomid,$startdate ,$enddate ,$customerid ]);
     
       return view('thankyoupage')->with('success','reserve Added')->with('reserved','1');
        
    }
    

    public function reservefornewcustomer(Request $request ){
        $email = $request->input('email');
        $select = DB::select('select * from customers where email ="'.$email.'"');
         if($select){
            return view('customerlogin')->with('success','customer not loged in ')->with('found','notlogged'); 
         }else{


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
           $customerid = DB::getPdo()->lastInsertId();;
           $roomid = $request->input('roomid');
           $startdate = $request->input('startdate');
           $enddate = $request->input('enddate'); 
 
           DB::insert('insert into booking  (roomid,startdate,enddate,customerid) values(?,?,?,?)',[$roomid,$startdate ,$enddate ,$customerid ]);
         
           return view('thankyoupage')->with('success','reserve Added')->with('reserved','1');
    } 
        
    }
    public function thankyoupage(Request $request ){
        return view('thankyoupage')->with('success','reserve Added')->with('reserved','1');


    }



    public function editmeascustomer(Request $request ){
   
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

        DB::update('update customers set Password = ? ,firstname = ? ,lastname = ? ,adress = ? ,city = ? ,country = ?,phone = ?,fax = ?,email = ?  where  id = ?',
         [$mpassword, $firstname ,$lastname ,$adress , $city,$country,$phone,$fax, $email,$customerid ]); 
    
             $select = DB::select('select * from customers where email ="'.$email.'" AND password="'.$mpassword.'"');
             if($select){
                 $request->session()->put('customerlogin', '1');
                 $request->session()->put('customeremail', $email);
                 $request->session()->put('customerpassword', $mpassword);
                 return view('customerpage')->with('login','1')->with('select',$select);
             } 
    }

    

    



    









}
