<?php
namespace Modules\Hotels\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use Session;
use Carbon\Carbon;
use Crypt;
use Validator;
use App\Hotel;
use App\Homestay;
use App\Roomtype;
use App\Price;
use DB;
use Decrypt;
class HotelsController extends Controller
{
   public function __construct(){
        $this->middleware('auth:hotels',['except'=>['index','authenticate']]);
        $this->currenttimestamp=Carbon::now()->toDateTimeString();
        $this->currentdate=Carbon::now()->toDateString();
        $this->carbondate=Carbon::now();
    }
     public function index()
    {
        if(Auth::guard('hotels')->check()){
            return redirect('hotels/dashboard');
        }
        $data=array();
         if(isset($_COOKIE['rem_e']) && $_COOKIE['rem_e'] != null && isset($_COOKIE['rem_p']) && $_COOKIE['rem_p'] != null){
        
            $data['u_e'] = $_COOKIE['rem_e'];
        
            $data['u_p'] = Crypt::decrypt($_COOKIE['rem_p']);
           }
        $data['title']="Login Portal";
        return view('hotels::index',$data);
    }
    public function authenticate(Request $request){
   
     $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

     if (Auth::guard('hotels')->attempt([
        'email'     => $request->email, 
        'password'  => $request->password,
        'status'    =>'1',
     ])) 
     {
        if($request->input('remember_me')=="yes"){
                Session::put('remember_me','yes');
            }
           if(Auth::guard('hotels')){
             return redirect()->intended('hotels/dashboard');
           }else{
            Session::flash('error_message', 'You Are not allowed to login please login');
               return redirect('/hotels/admin'); 
           }
           
        }else{

               Session::flash('error_message', 'Invalid Email or Password.');
               return redirect('/hotels/admin'); 
        }

    }
    public function dashboard(){
    if(Auth::guard('hotels')->check()){
      $data['title']='hotels';
      return view('hotels::dashboard',$data);
    }
    }
    public function logout(){
        
        Auth::guard('hotels')->logout();
        return redirect('/hotels/admin');
    }
    
    public function propertydetail(Request $request){
      
         if(Auth::guard('hotels')->check()){
           
         $rules=[
            'information'    =>'required',
            'hname'          => 'required',
            'type'           =>'required',
            'cperson'        =>'required',
            'description'    =>'required',
            'rating'         =>'required',
            'basecurrency'   =>'required',
             'nrooms'        =>'required',
             'country'       =>'required',
             'state'         =>'required',
             'city'          =>'required',
             'area'          =>'required',
             'phone'         =>'required',
             'mobile'        =>'required',
             'email'         =>'required',
             'checkin'       =>'required',
             'checkout'      =>'required',
             'latitude'      =>'required',
             'longitude'     =>'required',
             'roomtype'      =>'required',
             'price'         =>'required',
             'services.*'    =>'required',
             'image1'        =>'required',
             'rimage'        =>'required',
             'adults'        =>'required',
             'childrens'     =>'required',
             'noofrooms'     =>'required',
             'baseprice'     =>'required', 
  

           
             ];
        $messages =[
            'information.required'=>'Information Required',
            'hname.required'  =>'Hotel Name is required',
            'type.required'   => 'Hotel type is required',
            'cperson.required'=>'Contact Person is required', 
            'description.required' => 'Description is required',
            'rating.required'     =>'Rating is required',
            'basecurrency.required'=>'BaseCurrency is required',
            'nrooms.required'      =>'Number of Rooms is required',  
            'country.required'  =>'Country Name is required',
            'state.required'    =>'State is required',  
            'city.required'     => 'City Name is required',
            'area.required'     =>'Area Name is required',
            'phone.required'    => 'Phone is required',
            'mobile.required'   =>'Mobile is required',
            'email.required'    =>'Email is required',
            'checkin.required'  =>'Checkin is required',
            'checkout.required' =>'Checkout is required', 
            'latitude.required'=>'Latitude is required',
            'longitude.required'=>'Longitude is required',
            'roomtype.required' =>'Roomtype is required',
            'price.required'    =>'Price is required',
            'services.*.required'          =>'Services is required',
            'image1.required'            =>'Image is required',
            'rimage.required'            =>'Image is required',
            'childrens.required'         =>'Number of Children required',
            'noofrooms.required'         =>'Number of Rooms Required',
            'adults.required'            =>'Number of Adults Required',
            'baseprice.required'         =>'Base Price is Required',

            
          
        ];
        
         $validator = Validator::make($request->all(),$rules,$messages);
         
          if ($validator->fails()) {

            return redirect('hotels/dashboard')
                        ->withErrors($validator)
                        ->withInput();               
        }
       
        
         $homestay['information'] =$request->get('information');
         $homestay['hname']       =$request->get('hname');
         $homestay['email']       =$request->get('email');
         $homestay['rating']      =$request->get('rating');
         $homestay['type']        =$request->get('type');
         $homestay['trooms']      =$request->get('nrooms');
         $homestay['checkin']     =$request->get('checkin');
         $homestay['checkout']    =$request->get('checkout'); 
         $homestay['description'] =$request->get('description');
         $homestay['area']        =$request->get('area');
         $homestay['city']        =$request->get('city');
         $homestay['state']       =$request->get('state');
         $homestay['country']     =$request->get('country');
         $homestay['basecurrency']=$request->get('basecurrency');
         $homestay['cperson']     =$request->get('cperson');
         $homestay['phone']       =$request->get('phone');
         $homestay['mobile']      =$request->get('mobile');
         $homestay['latitude']    =$request->get('latitude');
         $homestay['longitude']   =$request->get('longitude');
         $homestay['baseprice']   =$request->get('baseprice');
         
         if($request->has('taxincluded')){
         $homestay['istaxincluded']=$request->get('taxincluded');
          }else{
            $homestay['istaxincluded']='0';
           }
         if($request->has('payathotel')){
         $homestay['payathotel']=$request->get('payathotel');
          }else{
            $homestay['payathotel']='0';
           }
          if($request->has('cancelationrule')){
            $homestay['cancelation_rule']=implode(",",$request->get('cancelationrule'));          
         
          }else{
            $homestay['cancelation_rule']='0';
           }
           

 

        if($request->hasFile('image1')){
            $images=$request->file('image1');
            
            if(is_array($images)){
              foreach($images as $image){
            $image_upload_path=public_path('/images/');
            $image_file_extension=$image->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
            $image->move($image_upload_path,$image_filename);
            $pimages[]=$image_filename;
            }
            $fimage= implode("," ,$pimages);
            $homestay['image']=$fimage;
          }else{
             $homestay['image']=$image_filename;
          }

        }
         if(is_array($request->get('services'))){
          $services= implode(",", $request->get('services'));
          $homestay['amenitiesnservices']=$services;
          }else{
          $homestay['amenitiesnservices']=$request->get('services');
          }

          $homestay['created_by']=Auth::guard('hotels')->user()->id;  
          // hotel create goes here
          $homestaycreate= Homestay::create($homestay)->id;
        //hotel information ends
        // room type information starts here
         if($request->hasFile('rimage')){
            $rimages=$request->file('rimage');
             
            if(is_array($rimages)){
              foreach($rimages as $rimage){
            $image_upload_path=public_path('/images/');
            $image_file_extension=$rimage->getClientOriginalExtension();
            $rimage_filename  = time() . '-' .rand(111111,999999).'.'.$rimage->getClientOriginalExtension();
           
            $rimage->move($image_upload_path,$rimage_filename);
            $roomimages[]=$rimage_filename;
            
             
            }
            $roomimage= implode("," ,$roomimages);
            $roomtype['rimage']=$roomimage;
          }else{
             $roomtype['rimage']=$rimage_filename;
          }

        }
         
         $roomtype['hotel_id']= $homestaycreate;
         $roomtype['rtype']   =$request->get('roomtype');
         $roomtype['price']   =$request->get('price');
         $roomtype['nrooms']  =$request->get('noofrooms');     
         $roomtype['nadults'] =$request->get('adults');
         $roomtype['nchildrens']=$request->get('childrens');
         $roomtype['created_by'] =Auth::guard('hotels')->user()->id;
         //dd($roomtype);
         $roomtypecreate=Roomtype::create($roomtype)->id;
         
      //roomtype ends
       //price starts here 
         $hotels['rtype_id']=$roomtypecreate;
         $hotels['hotel_id']=$homestaycreate;
         $hotels['price'] =$request->get('avgprice');
         $hotels['created_by']=Auth::guard('hotels')->user()->id;
         $pricecreate=Price::create($hotels);
       // price ends
        //$salt='abcdef';
        //$hencrypted = Crypt::encryptString($salt.$homestaycreate);
        //$rencrypted = Crypt::encryptString($salt.$roomtypecreate);
       
        
    if($homestaycreate && $roomtypecreate>0){
     return redirect('hotels/dashboard')->with('success_msg','Property Listed Successfully,we will contact you soon after review.');
     }else{
        return redirect('hotels/dashboard')->with('error_msg','Property doesnot listed successfully,please try again..');
     }    

    
    }
    }

    public function propertydetailist($hid,$rid){
         if(Auth::guard('hotels')->check()){
         $hdecrypted = Crypt::decryptString($hid);
         $harray=str_split($hdecrypted,6);
         $rdecrypted = Crypt::decryptString($rid);
         $rarray=str_split($rdecrypted,6);
         $hotel_id=$harray[1];
         $room_id=$rarray[1];       
         $data['title']='Property Detail';
         $data['trooms']=Homestay::where('id',$hotel_id)->select('trooms')->first();
         $data['nrooms']=Roomtype::where('id',$room_id)->select('nrooms')->first();
         $data['leftrooms']=$data['trooms']->trooms-$data['nrooms']->nrooms;
      return view('hotels::propertydetail',$data);
    }
}

}
