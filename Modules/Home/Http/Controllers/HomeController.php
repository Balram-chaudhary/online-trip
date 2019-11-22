<?php
namespace Modules\Home\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Activities;
use App\Roomtype;
use App\Booking;
use App\Homestay;
use App\Price;
use App\Bus;
use App\Seat;
use App\Flight;
use DB;
use Session;
use Carbon\Carbon;
use Mapper;
use App\Hotel;
use Validator;
use Mail;
use App\Jobs\Signupjob;
use App\Mail\Signup;
class HomeController extends Controller
{
    public function index()
    {
       $data['religious']=Activities::where('del_flag','=','0')
                          ->where('type','=','re')
                          ->take(8)
                          ->get();
       $data['junglesafary']=Activities::where('del_flag','=','0')
	                      ->where('type','=','j')
	                      ->take(8)
	                      ->get();
	     $data['trekking']=Activities::where('del_flag','=','0')
   	                      ->where('type','=','t')
   	                      ->take(8)
   	                      ->get();   
   	   $data['cities']=Homestay::where('del_flag','=','0')
                          ->where('special_type','=','p')
   	                      ->take(8)
   	                      ->get();    
   	  $data['specials']=Activities::where('del_flag','=','0')
   	                      ->take(8)
   	                      ->get(); 
      $data['mountainflights']=Flight::where('del_flag','=','0')
                              ->where('f_type','=','m')
                              ->take(8)
                              ->get();
      $data['domesticflights']=Flight::where('del_flag','=','0')
                              ->where('f_type','=','d')
                              ->take(8)
                              ->get(); 
      $data['activities'] = Activities::where('del_flag','=','0')
                           ->where('is_popular','=','y')
                           ->take(8)
                           ->get();                                                                          
        return view('home::index',$data);
    }
   public function propertylist()
   {
    return view('home::dashboard');
   }     
   public function propertylistpost(Request $request)
   {
   
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

            return redirect('/property/listing')
                        ->withErrors($validator)
                        ->withInput();               
        }
       
        
         $homestay['information'] =$request->get('information');
         $homestay['hname']       =$request->get('hname');
         $homestay['is_verified'] ='n';
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

            
          // hotel create goes here
          $homestaycreate= Homestay::create($homestay)->id;
        //hotel information ends
        // room type information starts here
         if($request->hasFile('rimage')){
            $rimages=$request->file('rimage');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$rimages->getClientOriginalExtension();
            $rimage_filename  = time() . '-' .rand(111111,999999).'.'.$rimages->getClientOriginalExtension();
            $rimages->move($image_upload_path,$rimage_filename);  
            $roomtype['rimage']=$rimage_filename;
          

        }
         
         $roomtype['hotel_id']= $homestaycreate;
         $roomtype['rtype']   =$request->get('roomtype');
         $roomtype['price']   =$request->get('price');
         $roomtype['nrooms']  =$request->get('noofrooms');     
         $roomtype['nadults'] =$request->get('adults');
         $roomtype['nchildrens']=$request->get('childrens');
         $roomtypecreate=Roomtype::create($roomtype)->id;
         
      //roomtype ends
       //price starts here 
         //$hotels['rtype_id']=$roomtypecreate;
         //$hotels['hotel_id']=$homestaycreate;
         //$hotels['price'] =$request->get('avgprice');
         //$pricecreate=Price::create($hotels);
       // price ends
        //$salt='abcdef';
        //$hencrypted = Crypt::encryptString($salt.$homestaycreate);
        //$rencrypted = Crypt::encryptString($salt.$roomtypecreate);
       
        
    if($homestaycreate && $roomtypecreate>0){
     return redirect('/property/listing')->with('success_msg','Property Listed Successfully,we will contact you soon after review.');
     }else{
        return redirect('/property/listing')->with('error_msg','Property doesnot listed successfully,please try again..');
     }    

   
   
   }

   public function specials()
   {
   	$data['specials']=Activities::where('del_flag','=','0')
   	                 ->get();
   	    return view('home::special',$data);             
   }
   public function cities()
   {
        $data['cities']=Activities::where('del_flag','=','0')
                       ->where('type','=','c')
                       ->get();
        return view('home::cities',$data);     

   }
    public function trekking()
   {
        $data['trekking']=Activities::where('del_flag','=','0')
                       ->where('type','=','t')
                       ->get();
        return view('home::trekking',$data);     

   }
       public function religious()
   {
        $data['religious']=Activities::where('del_flag','=','0')
                       ->where('type','=','re')
                       ->get();
        return view('home::religious',$data);     

   }
       public function junglesafary()
   {
        $data['junglesafary']=Activities::where('del_flag','=','0')
                       ->where('type','=','j')
                       ->get();
        return view('home::junglesafary',$data);     

   }
   public function junglesafarydetail($id)
   {
     $data['junglesafary']=Activities::find($id);
     return view('home::junglesafarydetail',$data);
   }
   public function religiousdetail($id)
   {
     $data['religious']=Activities::find($id);
     return view('home::religiousdetail',$data);
   }
   public function trekkingdetail($id)
   {
      $data['trekking']=Activities::find($id);
      $related_type=$data['trekking']->type;
      $data['trekkings'] =Activities::where('del_flag','=','0')
                       ->where('type','=',$related_type)
                       ->orderByRaw("RAND()")
                       ->take(4)
                       ->get();
     return view('home::trekkingdetail',$data);
   }
   public function citiesdetail($id)
   {
     $data['cities']=Activities::find($id);
     return view('home::citiesdetail',$data);
   }
   public function specialsdetail($id)
   {
     $data['specials']=Activities::find($id);
     return view('home::specialsdetail',$data);
   }
    public function activities(Request $request)
   { 
       $term  =$request->get('activity');
       $data['activities'] =DB::table('activities')
                                ->select('id','aname','area','city','type','image','description','add_info','price','pickup_time','hour','minute','del_flag')
                                ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($term){
                         $query->where('aname','like','%'.$term.'%');       
                         })
                          
                          ->get();
        return view('home::activities',$data);     
   }
   public function activitiesdetail($id)
   {
    session()->put(['activities_id'=>$id]);
    $data['activities']=Activities::find($id);
    $images=$data['activities']->image;
    $data['images']=explode(',',$images);  
    $related_type=$data['activities']->type;
    $data['related']   =Activities::where('del_flag','=','0')
                       ->where('type','=',$related_type)
                       ->where('id','!=',$id)
                       ->orderByRaw("RAND()")
                       ->take(3)
                       ->get();
    foreach($data['related'] as $r){
    $rimages=$r->image;
    }
    $data['images']=explode(',',$rimages);
      return view('home::activitiesdetail',$data);
   }
public function activitiesavailability(Request $request){
  $data['checkin']=$request->get('checkin');
  $data['traveller']=explode(' ',$request->get('traveller'));
  $data['passanger']=$data['traveller'][0]; 
  $id=session::get('activities_id');

 $data['availableactivities']=Activities::where('del_flag','=','0')
                               ->where('nadults','=',$data['checkin'])
                               ->where('checkin_date','=',$data['passanger'])
                               ->where('id','=',$id)
                               ->first();
if($data['availableactivities']===NULL){
$data['activity']=Activities::where('del_flag','=','0')
                 ->where('id','=',$id)
                 ->first();
session()->put(['activities_id'=>$id,'passanger'=>$data['passanger'],'checkin'=>$data['checkin'],'activity'=>$data['activity']]); 
}else{
echo 'Activity Not Found';
}
return view('home::activitiesavailability',$data);  
}
public function activitiesreview()
{
 $data['passanger']=session::get('passanger');
 $data['checkin']=session::get('checkin');
 $data['activity']=session::get('activity');
  return view('home::activitiesreview',$data);
}

   public function search(Request $request)
   {
       $term  =$request->srhText;
       $listing =DB::table('activities')
                                ->select('id','aname','area','city','type')
                                ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($term){
                         $query->where('aname','like','%'.$term.'%')
                               ->orWhere('area','like','%'.$term.'%')
                               ->orWhere('city','like','%'.$term.'%') 
                               ->orWhere('type','like','%'.$term.'%');       
                         })
                          ->groupBy('aname')
                          ->get();
          $html='';
         if($listing->count()>0){
         foreach($listing as $list){
          $html.='<ul>';
          $html.='<li class="activity" style="margin: 0;display: block;font-size: 12px;line-height: 16px;
    overflow: hidden;border-bottom: 1px solid #cacaca!important;padding: 10px 12px 10px 8px!important;
    cursor: pointer;letter-spacing: 1px;text-align:left">';
          $html.='<a style="color:black; text-decoration:none !important;" href="'.route('activities.detail',[$list->id]).'">';
          $html.=$list->aname;
          $html.='</li>';
          $html.='</ul>';
          }
         echo $html;
          }else{
               echo '<h3 class="text-center" style="color:red">Data Not found</h3>';
          }
    }

    public function hotels(Request $request)
    {
      $from=$request->get('from');
      if(preg_match("/,/", $from)){
      $data = explode(',',$from);
      $data['hname']=$data[0];     
      $data['city']=$data[1];
      $data['checkindata'] =$request->get('checkin');
      $data['checkoutdata'] =$request->get('checkout');
      $data['checkin'] =date('Y-m-d H:i:s', strtotime($data['checkindata']));
      $data['checkout']=date('Y-m-d H:i:s',strtotime($data['checkoutdata']));
      
      $checkin =Carbon::parse($data['checkin']);
      $checkout=Carbon::parse($data['checkout']);
      $data['totaldays']=$checkout->diffInDays($checkin);
      $data['total']=$request->get('total');
      $data['all'] =explode(' ',$data['total']);
      $data['adults']=$data['all'][0];
      $data['childs']=$data['all'][2];
      $data['rooms'] =$data['all'][5];
      $data['longlat']=Homestay::where('city','=',$data['city'])
                                ->where('type','=','h')
                                ->where('del_flag','=','0')
                                ->where('is_verified','=','y')
                                ->first();
      $latitude=$data['longlat']->latitude;
      $longitude=$data['longlat']->longitude;   
      $data['areas'] = Homestay::selectRaw('*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
    ->having('distance', '<',30)
    ->orderBy('distance')
    ->where('type','=','h')
    ->where('del_flag','=','0')
    ->where('is_verified','=','y')
    ->where('hname','!=',$data['hname'])
    ->get();  
      session()->put([
        'hname'      =>$data['hname'],
        'city'        =>$data['city'],
        'checkin'     =>$data['checkindata'],
        'checkout'    =>$data['checkoutdata'],
        'adults'      =>$data['adults'],
        'childs'      =>$data['childs'],
        'rooms'       =>$data['rooms'],
        'totaldays'   =>$data['totaldays'] 
                          ]);
      $data['roomtype']=Roomtype::where('del_flag','=','0')->get();
      $data['hotelresult']=DB::table('booking')
                           ->join('homestayhotels', 'booking.hotel_id', '=', 'homestayhotels.id')
                           ->join('roomtypes', 'booking.rtype_id', '=', 'roomtypes.id')
                           ->select('homestayhotels.*','roomtypes.*','booking.*')
                          ->Where('homestayhotels.trooms','>','booking.nbookedroom')
                          ->Where('homestayhotels.city','=',$data['city'])
                          ->Where('homestayhotels.hname','=',$data['hname'])
                          ->Where('homestayhotels.type','=','h')
                          ->where('homestayhotels.del_flag','=','0')
                          ->where('homestayhotels.is_verified','=','y')
                          ->whereDate('booking.checkin_date','=',$data['checkin'])
                          ->whereDate('booking.checkout_date','=',$data['checkout'])
                          ->Where('booking.is_booked','=','0')
                          ->where('roomtypes.del_flag','=','0')
                          ->orderBy('booking.id','desc')
                          ->get();
             if(sizeof($data['hotelresult'])>0){
               return '<h1>No Result Found</h1>';
             }else{
                 $data['hotels'] = DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.type','=','h')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y')
                                 ->where('homestayhotels.city','=',$data['city'])
                                 ->where('homestayhotels.hname','=',$data['hname'])
                                 ->get();
                  

                 $images=$data['hotels']['0']->image;
                     if (preg_match('/,/', $images))
                        {
                        $data['images']=explode(',',$images);  
                        }else{
                        $data['images']=$images;
                        }

             
             $data['hotelsprice']= DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.type','=','h')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y')
                                 ->where('homestayhotels.city','=',$data['city'])
                                 ->where('homestayhotels.hname','=',$data['hname'])
                                 ->orderBy('homestayhotels.baseprice','AESC')  
                                 ->get();
                       
                  $pimages=$data['hotelsprice']['0']->image;
                  if (preg_match('/,/', $pimages))
                        {
                        $data['pimages']=explode(',',$pimages);  
                        }else{
                        $data['pimages']=$pimages;
                        } 
             
             $data['hotelsrating']=DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y') 
                                 ->where('homestayhotels.type','=','h')
                                 ->where('homestayhotels.city','=',$data['city'])
                                 ->where('homestayhotels.hname','=',$data['hname'])
                                 ->orderBy('homestayhotels.rating','AESC')  
                                 ->get();   
                  $rimages=$data['hotelsrating']['0']->image;
                  if (preg_match('/,/', $rimages))
                        {
                        $data['rimages']=explode(',',$rimages);  
                        }else{
                        $data['rimages']=$rimages;
                        }    
                                      
                        
             }
          }else{
      $data = explode('(' , rtrim($from, ')'));    
      $data['city']=$data[0];
      $data['checkindata'] =$request->get('checkin');
      $data['checkoutdata'] =$request->get('checkout');
      $data['checkin'] =date('Y-m-d H:i:s', strtotime($data['checkindata']));
      $data['checkout']=date('Y-m-d H:i:s',strtotime($data['checkoutdata']));
      
      $checkin =Carbon::parse($data['checkin']);
      $checkout=Carbon::parse($data['checkout']);
      $data['totaldays']=$checkout->diffInDays($checkin);
      $data['total']=$request->get('total');
      $data['all'] =explode(' ',$data['total']);
      $data['adults']=$data['all'][0];
      $data['childs']=$data['all'][2];
      $data['rooms'] =$data['all'][5];
      $data['longlat']=Homestay::where('city','=',$data['city'])
                                ->where('type','=','h')
                                ->where('del_flag','=','0')
                                ->where('is_verified','=','y')
                                ->first();
      $latitude=$data['longlat']->latitude;
      $longitude=$data['longlat']->longitude;   
      $data['areas'] = Homestay::selectRaw('*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
    ->having('distance', '<',30)
    ->orderBy('distance')
    ->where('del_flag','=','0')
    ->where('is_verified','=','y')  
    ->where('type','=','h')
    ->where('city','!=',$data['city'])
    ->get();  
      session()->put([
        'city'        =>$data['city'],
        'checkin'     =>$data['checkindata'],
        'checkout'    =>$data['checkoutdata'],
        'adults'      =>$data['adults'],
        'childs'      =>$data['childs'],
        'rooms'       =>$data['rooms'],
        'totaldays'   =>$data['totaldays'] 
                          ]);
      $data['roomtype']=Roomtype::where('del_flag','=','0')->get();
      $data['hotelresult']=DB::table('booking')
                           ->join('homestayhotels', 'booking.hotel_id', '=', 'homestayhotels.id')
                           ->join('roomtypes', 'booking.rtype_id', '=', 'roomtypes.id')
                           ->select('homestayhotels.*','roomtypes.*','booking.*')
                          ->Where('homestayhotels.trooms','>','booking.nbookedroom')
                           ->Where('homestayhotels.city','=',$data['city'])
                          ->Where('homestayhotels.type','=','h')
                          ->where('homestayhotels.del_flag','=','0')
                          ->where('homestayhotels.is_verified','=','y')
                          ->whereDate('booking.checkin_date','=',$data['checkin'])
                          ->whereDate('booking.checkout_date','=',$data['checkout'])
                          ->Where('booking.is_booked','=','0')
                          ->where('roomtypes.del_flag','=','0')
                          ->orderBy('booking.id','desc')
                          ->get();
             if(sizeof($data['hotelresult'])>0){
               return '<h1>No Result Found</h1>';
             }else{
                 $data['hotels'] = DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y')  
                                 ->where('homestayhotels.type','=','h')
                                 ->where('homestayhotels.city','=',$data['city'])
                                 ->get();
                
             $data['hotelsprice']= DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y')
                                 ->where('homestayhotels.type','=','h')
                                 ->where('homestayhotels.city','=',$data['city'])
                                 ->orderBy('homestayhotels.baseprice','AESC')  
                                 ->get();
                       
               
             
             $data['hotelsrating']=DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y')
                                 ->where('homestayhotels.type','=','h')
                                 ->where('homestayhotels.city','=',$data['city'])
                                 ->orderBy('homestayhotels.rating','AESC')  
                                 ->get();                                                                          
             
              }
          
      
       }
    
     return view('home::hotelsearch',$data);               

   }
    
    public function hotelareasearch(Request $request)
    {
        $term  =$request->srhText;
       
       $cities =DB::table('homestayhotels')
                                    ->select('id','area','city','type','hname')
                                    ->where('del_flag','=','0')
                                    ->where('is_verified','=','y') 
                                    ->where('type','=','h')
                                    ->orderBy('id','desc')
                                    ->where(function($query) use ($term){
                             $query->where('city','like','%'.$term.'%');
                             })
                             ->groupBy('city')
                             ->get();
         $citiescount =DB::table('homestayhotels')
                                    ->select('id','area','city','type','hname')
                                    ->where('del_flag','=','0')
                                    ->where('is_verified','=','y')
                                    ->where('type','=','h')
                                    ->orderBy('id','desc')
                                    ->where(function($query) use ($term){
                             $query->where('city','like','%'.$term.'%')
                                    ->orWhere('hname','like','%'.$term.'%')
                                    ->orWhere('area','like','%'.$term.'%');
 
                             })
                             ->get();
         $hotels =DB::table('homestayhotels')
                                    ->select('id','area','city','type','hname')
                                    ->where('del_flag','=','0')
                                    ->where('is_verified','=','y')  
                                    ->where('type','=','h')
                                    ->orderBy('id','desc')
                                    ->where(function($query) use ($term){
                             $query->where('hname','like','%'.$term.'%');
                                   
                             })
                             ->groupBy('hname')
                             ->get();
                

     
                      
                     if($cities->count()>0){
                      $html='';   
                      $html.='<div class="areatitle" id="areatitle" style=" border-bottom:1px solid #cacaca!important;
                padding: 10px 12px 10px 8px!important;line-height:16px;font-size: 12px;letter-spacing: 1px;text-align:right;"><h4><span><i class="fa fa-map"></i>&nbsp;Cities</span></h4></div>';
                     foreach($cities as $city){
                      if($city->city){
                      $html.='<ul>';
                      $html.='<li class="link-class-homestay" style="margin: 0;display: block;font-size: 12px;line-height: 16px;
                overflow: hidden;border-bottom:1px solid #cacaca!important;padding: 10px 12px 10px 8px!important;
                cursor: pointer;letter-spacing: 1px;text-align:left;">';
                      $html.=$city->city.'('.count($citiescount).' '.'hotel'.')';
                      $html.='</li>';
                      $html.='</ul>';  
                      }
                    }
                   echo $html;
                   }
                  if($hotels->count()>0){
                      $html='';
                      $html.='<div class="areatitle" id="areatitle" style=" border-bottom:1px solid #cacaca!important;
                padding: 10px 12px 10px 8px!important;line-height:16px;font-size: 12px;letter-spacing: 1px;text-align:right;"><h4><span><i class="fa fa-hotel"></i></i>&nbsp;Hotels</span></h4></div>';
                     foreach($hotels as $hotel){
                      if($hotel->hname){
                      $html.='<ul>';
                      $html.='<li class="link-class-homestay" style="margin: 0;display: block;font-size: 12px;line-height: 16px;
                overflow: hidden;border-bottom:1px solid #cacaca!important;padding: 10px 12px 10px 8px!important;
                cursor: pointer;letter-spacing: 1px;text-align:left;">';
                      $html.=$hotel->hname.','.$hotel->city;
                      $html.='</li>';
                      $html.='</ul>';  
                      }
                    }
                    echo $html;
                   }
                if(!sizeof($hotels)>0 && !sizeof($cities)>0){
                    echo '<h3 class="text-center">No Match found</h3>';
              }     
          
    }

       public function hotelsearch(Request $request)
       {
         $term  = $request->srcText;
         $data['hname']=session::get('hname');
         $data['city']=session::get('city');
         if($data['hname']===NULL){
         $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                     ->where('homestayhotels.is_verified','=','y')   
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                    ->where(function($query) use ($term){
             $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get();
                
                    $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                    ->orderBy('homestayhotels.baseprice','desc')          
                    ->where(function($query) use ($term){
                     $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get(); 
               

               
            $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                    ->orderBy('homestayhotels.rating','desc')  
                    ->where(function($query) use ($term){
             $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get(); 
             
                     $html='';
                 if($listing->count()>0){
                 foreach($listing as $list){
                $images=$list->image;
                $oimages=explode(',',$images);
                
              $html.='<div class="container" id="hotels">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area .','. $list->city .','.$list->country;
              $html.='</h4><br>';
              $html.='<h4 class="display-text rating">';
              $html.=($list->rating=='1'?'<span><i class="fas fa-star"></i></span>':($list->rating=='2'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='3'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='4'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='5'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':'detarnU')))));

              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Amenitites" data-content="'.$list->description.'">Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Policy" data-content="'.$list->description.'">Policy</a>'; 
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('hotels.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';          
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Hotel Not found</h3>';
                  }

           }else{
          $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                    ->where(function($query) use ($term){
             $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get();
                
                    $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                    ->orderBy('homestayhotels.baseprice','desc')          
                    ->where(function($query) use ($term){
                     $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get(); 
               

               
            $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                    ->orderBy('homestayhotels.rating','desc')  
                    ->where(function($query) use ($term){
             $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get(); 
             
                     $html='';
                 if($listing->count()>0){
                 foreach($listing as $list){
                $images=$list->image;
                $oimages=explode(',',$images);
                
              $html.='<div class="container" id="hotels">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area .','. $list->city .','.$list->country;
              $html.='</h4><br>';
              $html.='<h4 class="display-text rating">';
              $html.=($list->rating=='1'?'<span><i class="fas fa-star"></i></span>':($list->rating=='2'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='3'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='4'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='5'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':'detarnU')))));

              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Amenitites" data-content="'.$list->description.'">Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Policy" data-content="'.$list->description.'">Policy</a>'; 
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('hotels.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';          
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Hotel Not found</h3>';
                  }

  


         }              
         
}

       public function sort(Request $request){
          $data['hname']=session::get('hname');
          $data['city']=session::get('city');
           if($data['hname']===NULL){
              if($request->type =='1'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])                   
                    ->wherebetween('homestayhotels.baseprice',['0','4000'])
                   ->get();
                }
             if($request->type =='2'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city']) 
                   ->wherebetween('homestayhotels.baseprice',['4000','8000'])
                   ->get();
                     }   

                      if($request->type =='3'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                    ->wherebetween('homestayhotels.baseprice',['8000','12000'])
                   ->get();
                     }   

                   if($request->type =='4'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                   ->wherebetween('homestayhotels.baseprice',['12000','16000'])
                   ->get();
                     }
                     if($request->type =='5'){
               $listing ==DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.baseprice','>','16000')
                   ->get();
                     }


                     if($request->type =='All'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                    ->get(); 
                     }


                     $html='';
                 if($listing->count()>0){
                 foreach($listing as $list){
                  $images=$list->image;
                $oimages=explode(',',$images);

              $html.='<div class="container" id="hotels">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area .','. $list->city .','.$list->country;
              $html.='</h4><br>';
              $html.='<h4 class="display-text rating">';
              $html.=($list->rating=='1'?'<span><i class="fas fa-star"></i></span>':($list->rating=='2'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='3'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='4'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='5'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':'detarnU')))));

              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4><br>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Amenitites" data-content="'.$list->description.'">Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Policy" data-content="'.$list->description.'">Policy</a>'; 
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('hotels.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';          
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Hotel Not found</h3>';
                  }
                 
           }else{
              if($request->type =='1'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])                   
                    ->wherebetween('homestayhotels.baseprice',['0','4000'])
                   ->get();
                }
             if($request->type =='2'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y') 
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city']) 
                   ->wherebetween('homestayhotels.baseprice',['4000','8000'])
                   ->get();
                     }   

                      if($request->type =='3'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                    ->wherebetween('homestayhotels.baseprice',['8000','12000'])
                   ->get();
                     }   

                   if($request->type =='4'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                   ->wherebetween('homestayhotels.baseprice',['12000','16000'])
                   ->get();
                     }
                     if($request->type =='5'){
               $listing ==DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.baseprice','>','16000')
                   ->get();
                     }


                     if($request->type =='All'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                    ->get(); 
                     }


                     $html='';
                 if($listing->count()>0){
                 foreach($listing as $list){
                  $images=$list->image;
                $oimages=explode(',',$images);

              $html.='<div class="container" id="hotels">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area .','. $list->city .','.$list->country;
              $html.='</h4><br>';
              $html.='<h4 class="display-text rating">';
              $html.=($list->rating=='1'?'<span><i class="fas fa-star"></i></span>':($list->rating=='2'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='3'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='4'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='5'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':'detarnU')))));

              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Amenitites" data-content="'.$list->description.'">Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Policy" data-content="'.$list->description.'">Policy</a>'; 
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('hotels.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';          
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Hotel Not found</h3>';
                  }
 

         }
       
                        
         }

        public function ratingsorthotel(Request $request)
        {
          $data['hname']=session::get('hname');
          $data['city']=session::get('city');
          if($data['hname']===NULL){
          if($request->type =='unrated'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','ur')
                   ->get();
                     }
          if($request->type =='1'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','1')
                   ->get();
                     }
             if($request->type =='2'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','2')
                   ->get();
                     }   

                      if($request->type =='3'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','3')
                   ->get();
                     }   

                   if($request->type =='4'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','4')
                   ->get();
                     }

                     if($request->type =='5'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                     ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','5')
                   ->get();
                     }



                     if($request->type =='All'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->where('homestayhotels.city','=',$data['city'])
                    ->get(); 
                     }


                     $html='';
                 if($listing->count()>0){
                 foreach($listing as $list){
                  $images=$list->image;
                $oimages=explode(',',$images);

              $html.='<div class="container" id="hotels">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area .','. $list->city .','.$list->country;
              $html.='</h4><br>';
              $html.='<h4 class="display-text rating">';
              $html.=($list->rating=='1'?'<span><i class="fas fa-star"></i></span>':($list->rating=='2'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='3'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='4'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='5'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':'detarnU')))));

              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Amenitites" data-content="'.$list->description.'">Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Policy" data-content="'.$list->description.'">Policy</a>'; 
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('hotels.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';          
                        
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Hotel Not found</h3>';
                  }
     }else{
      if($request->type =='unrated'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                     ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','ur')
                   ->get();
                     }
          if($request->type =='1'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','1')
                   ->get();
                     }
             if($request->type =='2'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','2')
                   ->get();
                     }   

                      if($request->type =='3'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','3')
                   ->get();
                     }   

                   if($request->type =='4'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','4')
                   ->get();
                     }

                     if($request->type =='5'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                   ->where('homestayhotels.rating','5')
                   ->get();
                     }



                     if($request->type =='All'){
               $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')   
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['city'])
                    ->get(); 
                     }


                     $html='';
                 if($listing->count()>0){
                 foreach($listing as $list){
                  $images=$list->image;
                $oimages=explode(',',$images);

              $html.='<div class="container" id="hotels">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area .','. $list->city .','.$list->country;
              $html.='</h4><br>';
              $html.='<h4 class="display-text rating">';
              $html.=($list->rating=='1'?'<span><i class="fas fa-star"></i></span>':($list->rating=='2'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='3'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='4'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='5'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':'detarnU')))));

              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Amenitites" data-content="'.$list->description.'">Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Policy" data-content="'.$list->description.'">Policy</a>'; 
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('hotels.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';          
                        
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Hotel Not found</h3>';
                  }


    }


        }
        

         public function nearbylocation(Request $request)
         {
            $id=$request->type;
            $data['hotels']=Homestay::find($id);
            $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','h')
                    ->Where('homestayhotels.area','=',$data['hotels']->area)
                    ->Where('homestayhotels.city','=',$data['hotels']->city)
                    ->get(); 

              $html='';
                 if($listing->count()>0){
                 foreach($listing as $list){
                $images=$list->image;
                $oimages=explode(',',$images);
              $html.='<div class="container" id="hotels">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area .','. $list->city .','.$list->country;
              $html.='</h4><br>';
              $html.='<h4 class="display-text rating">';
              $html.=($list->rating=='1'?'<span><i class="fas fa-star"></i></span>':($list->rating=='2'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='3'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='4'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':($list->rating=='5'?'<span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>':'detarnU')))));

              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Amenitites" data-content="'.$list->description.'">Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Policy" data-content="'.$list->description.'">Policy</a>'; 
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('hotels.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';                  
              }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Hotel Not found</h3>';
                  }

         }
         public function hotelsdetail($id)
         {
          $data['hname']         =session()->get('hname');
          $data['city']         =session()->get('city');
          $data['checkin']     =session()->get('checkin');
          $data['checkout']    =session()->get('checkout');
          $data['adults']      =session()->get('adults');
          $data['childs']      =session()->get('childs');
          $data['totaldays']   =session()->get('totaldays');
          $data['roomstotal']       =session()->get('rooms');
           session()->put(['hotel_id'=>$id]);
            $data['hotels']=DB::table('roomtypes')
                             ->join('homestayhotels', 'roomtypes.hotel_id', '=', 'homestayhotels.id')
                             ->select('homestayhotels.*','roomtypes.*')
                             ->where('roomtypes.del_flag','=','0')
                             ->where('homestayhotels.del_flag','=','0')
                             ->where('homestayhotels.is_verified','=','y')
                             ->where('homestayhotels.type','=','h')
                             ->where('homestayhotels.id','=',$id)
                             ->get();
                   
                      if(sizeof($data['hotels'])>0){
                        foreach($data['hotels'] as $home)
                        {
                        $amenities=$home->amenitiesnservices;
                        }
                        $data['amenities']=explode(',',$amenities);
                      }else{
                        $data['amenities']=Null;   
                      }
                     if(sizeof($data['hotels'])>0){
                        foreach($data['hotels'] as $home)
                        {
                        $image=$home->image;
                        }
                        if (preg_match('/,/', $image))
                        {
                        $data['images']=explode(',',$image);  
                        }else{
                        $data['images']=$image;
                        }
                      }   
                            
                     $data['hotel'] =Homestay::findOrFail($id);
                     $data['rooms']=Roomtype::where('del_flag','=','0')
                                      ->where('hotel_id','=',$id)
                                      ->get();
                   $data['latitude'] =$data['hotel']->latitude;
                   $data['longitude']=$data['hotel']->longitude;
                   $area=$data['hotel']->area;                 
                Mapper::map($data['latitude'],$data['longitude'],['zoom' => 10, 'markers' => ['title' =>$area, 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]]);
                                                 
          return view('home::hotelsdetail',$data);
         }
         
         public function roomsavailibility(Request $request)
         {
          $data['hotel_id']      =session()->get('hotel_id');
          $data['checkindata']  =$request->checkin;
          $data['checkoutdata'] =$request->checkout;
          $data['adults']   =$request->adults;
          $data['childs']   =$request->childs;
          $data['rooms']    =$request->totalroom;

          $data['checkin'] =date('Y-m-d H:i:s', strtotime($data['checkindata']));
          $data['checkout']=date('Y-m-d H:i:s',strtotime($data['checkoutdata']));
          $checkin =Carbon::parse($data['checkindata']);
          $checkout=Carbon::parse($data['checkoutdata']);
          $data['totaldays']=$checkout->diffInDays($checkin);
     
          session()->put(['checkin'=>$data['checkin'],'checkout'=>$data['checkout'],'adults'=>$data['adults'],'childs'=>$data['childs'],'rooms'=>$data['rooms'],'totaldays'=>$data['totaldays']]);
          $checkin=session()->get('checkin');
          $checkout=session()->get('checkout');
          $adults=session()->get('adults');
          $childs=session()->get('childs');
          $rooms=session()->get('rooms');
          $totaldays=session()->get('totaldays');
         
          $data['availablerooms']=booking::where('checkin_date','=',$data['checkin'])
                                 ->where('checkout_date','=',$data['checkout'])
                                 ->where('is_booked','=','0')
                                 ->where('type','=','s')
                                 ->where('hotel_id','=',$data['hotel_id'])
                                 ->get();
                      
                        if(sizeof($data['availablerooms'])>0){
                          echo 'rooms not found';
                          }else{
                          $data['rooms']=Roomtype::where('del_flag','=','0')
                                      ->where('hotel_id','=',$data['hotel_id'])
                                      ->get();
                      }
                      
                      $html='';
                           
                 if(sizeof($data['rooms'])>0){
                 foreach($data['rooms'] as $list){
              $html.='<tr>';    
              $html.='<td>';
              $html.='<label>';
              $html.=($list->rtype=='s'? 'Single':($list->rtype =='d'? 'Double':($list->rtype =='t'? 'Triple':($list->rtype =='qd'?'Quad':($list->rtype =='q'?'Queen':($list->rtype=='k'?'King':($list->rtype=='tw'?'Twin':($list->rtype=='dd'?'Double Double':'Studio'))))))));
              $html.='</label>';
              $html.='<div class="">';
              $html.=' <img class="photo-container1" src="'.url('triporbitz/public/images/'.$list->rimage).'" alt="'.$list->rimage.'">';
              $html.='</div>';
              $html.='</td>';
              $html.='<td>';
              $html.='<div class="listfacility">';
              $html.='<li>';
              $html.='<i class="fa fa-wifi" style="color:green;">&nbsp;free wifi</i>';
              $html.='<i class="fa fa-coffee" style="color:green;">&nbsp;free Coffee</i>';
              $html.='</li>';
              $html.='</div>';
              $html.='</td>';
              $html.='<td>';
              $html.='<label>RS.'.$list->price.'&nbsp;(price per night)</label>'; 
              $html.='</td>';
              $html.='<td>';
              $html.='<div class="form-left-agileits-w3layouts">';
              $html.='<button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#paymentmodel" onclick="book_room();">Book Room</button>';
              $html.='</div>';
              $html.='<label>Few Rooms left</label>';
              $html.='</td>';
              $html.='</tr>';
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Room  Not found</h3>';
                  }   

         }
        
        public function bookrooms(Request $request){
        $term=$request->bookroom;
        if($term == 'Queen'){
  $data['roomtype']='q';
}elseif($term == 'Single'){
	$data['roomtype']='s';
}elseif($term == 'Double'){
	$data['roomtype']='d';
}elseif($term == 'Triple'){
	$data['roomtype']='t';
}elseif($term == 'Quard'){
	$data['roomtype']='qd';
}elseif($term == 'King'){
	$data['roomtype']='k';
}elseif($term == 'Twin'){
	$data['roomtype']='tw';
}elseif($term == 'Double Double'){
	$data['roomtype']='dd';
}else{
	$data['roomtype']='st';
}
$id  =session()->get('hotel_id');
$data['roomtypedetail']=Roomtype::where('del_flag','=','0')
                                 ->where('rtype','=',$data['roomtype'])
                                 ->where('hotel_id','=',$id)
                                 ->first();
session()->put(['roomtype'=>$data['roomtypedetail']]);
         }
        

         public function hotelreview()
         {
          $data['city']         =session()->get('city');
          $data['checkin']     =session()->get('checkin');
          $data['checkout']    =session()->get('checkout');
          $data['adults']      =session()->get('adults');
          $data['childs']      =session()->get('childs');
          $data['totaldays']   =session()->get('totaldays');
          $data['roomstotal']       =session()->get('rooms');
          $data['roomtype']=session()->get('roomtype');
          $id=session()->get('hotel_id');
          $data['hotels']=Homestay::find($id);
          
                        $image=$data['hotels']->image;
                        
                        if (preg_match('/,/', $image))
                        {
                        $data['images']=explode(',',$image);  
                        }else{
                        $data['images']=$image;
                        }
                $amenitites=$data['hotels']->amenitiesnservices;
                        
                        if (preg_match('/,/', $amenitites))
                        {
                        $data['amenitites']=explode(',',$amenitites);  
                        }else{
                        $data['amenitites']=$amenitites;
                        }
                       
         
          return view('home::reviewbooking',$data);
         }

        public function hotelpayment(Request $request)
        {
          dd($request->all());
        }
  // homestay section

      public function homestay(Request $request)
      {
      $fromhomestay=$request->get('fromhomestay');
      if(preg_match("/,/", $fromhomestay)){
      $data = explode(',',$fromhomestay);
      $data['hname']=$data[0];     
      $data['cityhomestay']=$data[1];
      $data['checkindatahomestay'] =$request->get('checkinhomestay');
      $data['checkoutdatahomestay'] =$request->get('checkouthomestay');
      $data['checkinhomestay'] =date('Y-m-d H:i:s', strtotime($data['checkindatahomestay']));
      $data['checkouthomestay']=date('Y-m-d H:i:s',strtotime($data['checkoutdatahomestay']));
      
      $checkinhomestay =Carbon::parse($data['checkinhomestay']);
      $checkouthomestay=Carbon::parse($data['checkouthomestay']);
      $data['totaldayshomestay']=$checkouthomestay->diffInDays($checkinhomestay);
      $data['totalhomestay']=$request->get('totalHomestay');
      $data['allhomestay'] =explode(' ',$data['totalhomestay']);
      $data['adultshomestay']=$data['allhomestay'][0];
      $data['childshomestay']=$data['allhomestay'][2];
      $data['roomshomestay'] =$data['allhomestay'][5];
      $data['longlat']=Homestay::where('city','=',$data['cityhomestay'])
                                ->where('type','=','s')
                                ->where('del_flag','=','0')
                                ->where('is_verified','=','y') 
                                ->first();
      $latitude=$data['longlat']->latitude;
      $longitude=$data['longlat']->longitude;   
      $data['areashomestay'] = Homestay::selectRaw('*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
    ->having('distance', '<',30)
    ->orderBy('distance')
    ->where('type','=','s')
    ->where('hname','!=',$data['hname'])
    ->get();  
      session()->put([
        'hname'      =>$data['hname'],
        'cityhomestay'        =>$data['cityhomestay'],
        'checkinhomestay'     =>$data['checkindatahomestay'],
        'checkouthomestay'    =>$data['checkoutdatahomestay'],
        'adultshomestay'      =>$data['adultshomestay'],
        'childshomestay'      =>$data['childshomestay'],
        'roomshomestay'       =>$data['roomshomestay'],
        'totaldayshomestay'   =>$data['totaldayshomestay'] 
                          ]);
      $data['roomtype']=Roomtype::where('del_flag','=','0')->get();
      $data['homestayresult']=DB::table('booking')
                           ->join('homestayhotels', 'booking.hotel_id', '=', 'homestayhotels.id')
                           ->join('roomtypes', 'booking.rtype_id', '=', 'roomtypes.id')
                           ->select('homestayhotels.*','roomtypes.*','booking.*')
                          ->Where('homestayhotels.trooms','>','booking.nbookedroom')
                          ->Where('homestayhotels.city','=',$data['cityhomestay'])
                          ->Where('homestayhotels.hname','=',$data['hname'])
                          ->Where('homestayhotels.type','=','h')
                          ->where('homestayhotels.is_verified','=','y')
                          ->where('homestayhotels.del_flag','=','0') 
                          ->whereDate('booking.checkin_date','=',$data['checkinhomestay'])
                          ->whereDate('booking.checkout_date','=',$data['checkouthomestay'])
                          ->Where('booking.is_booked','=','0')
                          ->where('roomtypes.del_flag','=','0')
                          ->orderBy('booking.id','desc')
                          ->get();
             if(sizeof($data['homestayresult'])>0){
               return '<h1>No Result Found</h1>';
             }else{
                 $data['homestay'] = DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y')
                                 ->where('homestayhotels.type','=','s')
                                 ->where('homestayhotels.city','=',$data['cityhomestay'])
                                 ->where('homestayhotels.hname','=',$data['hname'])
                                 ->get();
                  

                 $images=$data['homestay']['0']->image;
                     if (preg_match('/,/', $images))
                        {
                        $data['images']=explode(',',$images);  
                        }else{
                        $data['images']=$images;
                        }

             
             $data['homestayprice']= DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y') 
                                 ->where('homestayhotels.type','=','s')
                                 ->where('homestayhotels.city','=',$data['cityhomestay'])
                                 ->where('homestayhotels.hname','=',$data['hname'])
                                 ->orderBy('homestayhotels.baseprice','AESC')  
                                 ->get();
                       
                  $pimages=$data['homestayprice']['0']->image;
                  if (preg_match('/,/', $pimages))
                        {
                        $data['pimages']=explode(',',$pimages);  
                        }else{
                        $data['pimages']=$pimages;
                        } 
             
             $data['homestayrating']=DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y')
                                 ->where('homestayhotels.type','=','s')
                                 ->where('homestayhotels.city','=',$data['cityhomestay'])
                                 ->where('homestayhotels.hname','=',$data['hname'])
                                 ->orderBy('homestayhotels.rating','AESC')  
                                 ->get();   
                  $rimages=$data['homestayrating']['0']->image;
                  if (preg_match('/,/', $rimages))
                        {
                        $data['rimages']=explode(',',$rimages);  
                        }else{
                        $data['rimages']=$rimages;
                        }    
                                      
                        
             }
          }else{
      $data = explode('(' , rtrim($fromhomestay, ')'));    
      $data['cityhomestay']=$data[0];
      $data['checkindatahomestay'] =$request->get('checkinhomestay');
      $data['checkoutdatahomestay'] =$request->get('checkouthomestay');
      $data['checkinhomestay'] =date('Y-m-d H:i:s', strtotime($data['checkindatahomestay']));
      $data['checkouthomestay']=date('Y-m-d H:i:s',strtotime($data['checkoutdatahomestay']));
      
      $checkinhomestay =Carbon::parse($data['checkinhomestay']);
      $checkouthomestay=Carbon::parse($data['checkouthomestay']);
      $data['totaldayshomestay']=$checkouthomestay->diffInDays($checkinhomestay);
      $data['totalhomestay']=$request->get('totalHomestay');
      $data['allhomestay'] =explode(' ',$data['totalhomestay']);
      $data['adultshomestay']=$data['allhomestay'][0];
      $data['childshomestay']=$data['allhomestay'][2];
      $data['roomshomestay'] =$data['allhomestay'][5];
      $data['longlat']=Homestay::where('city','=',$data['cityhomestay'])
                                ->where('type','=','s')
                                ->where('del_flag','=','0')
                                ->where('is_verified','=','y')
                                ->first();
      $latitude=$data['longlat']->latitude;
      $longitude=$data['longlat']->longitude;   
      $data['areashomestay'] = Homestay::selectRaw('*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
    ->having('distance', '<',30)
    ->orderBy('distance')
    ->where('type','=','s')
    ->where('city','!=',$data['cityhomestay'])
    ->get();  
      session()->put([
        'cityhomestay'        =>$data['cityhomestay'],
        'checkinhomestay'     =>$data['checkindatahomestay'],
        'checkouthomestay'    =>$data['checkoutdatahomestay'],
        'adultshomestay'      =>$data['adultshomestay'],
        'childshomestay'      =>$data['childshomestay'],
        'roomshomestay'       =>$data['roomshomestay'],
        'totaldayshomestay'   =>$data['totaldayshomestay'] 
                          ]);
      $data['roomtype']=Roomtype::where('del_flag','=','0')->get();
      $data['homestayresult']=DB::table('booking')
                           ->join('homestayhotels', 'booking.hotel_id', '=', 'homestayhotels.id')
                           ->join('roomtypes', 'booking.rtype_id', '=', 'roomtypes.id')
                           ->select('homestayhotels.*','roomtypes.*','booking.*')
                          ->Where('homestayhotels.trooms','>','booking.nbookedroom')
                           ->Where('homestayhotels.city','=',$data['cityhomestay'])
                          ->Where('homestayhotels.type','=','s')
                          ->where('homestayhotels.del_flag','=','0')
                          ->where('homestayhotels.is_verified','=','y')   
                          ->whereDate('booking.checkin_date','=',$data['checkinhomestay'])
                          ->whereDate('booking.checkout_date','=',$data['checkouthomestay'])
                          ->Where('booking.is_booked','=','0')
                          ->where('roomtypes.del_flag','=','0')
                          ->orderBy('booking.id','desc')
                          ->get();
             if(sizeof($data['homestayresult'])>0){
               return '<h1>No Result Found</h1>';
             }else{
                 $data['homestay'] = DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y')
                                 ->where('homestayhotels.type','=','s')
                                 ->where('homestayhotels.city','=',$data['cityhomestay'])
                                 ->get();
                
             $data['homestayprice']= DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y')
                                 ->where('homestayhotels.type','=','s')
                                 ->where('homestayhotels.city','=',$data['cityhomestay'])
                                 ->orderBy('homestayhotels.baseprice','AESC')  
                                 ->get();
                       
               
             
             $data['homestayrating']=DB::table('homestayhotels')
                                 ->select('homestayhotels.*')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('homestayhotels.is_verified','=','y')
                                 ->where('homestayhotels.type','=','s')
                                 ->where('homestayhotels.city','=',$data['cityhomestay'])
                                 ->orderBy('homestayhotels.rating','AESC')  
                                 ->get();                                                                          
             
              }
          
      
       }
       
              return view('home::homestaysearch',$data);              
  

   }
   

     public function homestaysearch(Request $request)
       {
         $term  = $request->srcText;
         $data['hname']=session::get('hname');
         $data['cityhomestay']=session::get('cityhomestay');
          if($data['hname']===NULL){
          $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->where('homestayhotels.city','=',$data['cityhomestay'])
                    ->where(function($query) use ($term){
             $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get();
         $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->where('homestayhotels.city','=',$data['cityhomestay'])
                    ->orderBy('homestayhotels.baseprice','Desc')
                    ->where(function($query) use ($term){
             $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get(); 

                    $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->where('homestayhotels.city','=',$data['cityhomestay'])
                    ->orderBy('homestayhotels.rating','desc') 
                    ->where(function($query) use ($term){
             $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get();
                   


                     $html='';
                 if($listing->count()>0){
                 foreach($listing as $list){
                $images=$list->image;
                $oimages=explode(',',$images);
              $html.='<div class="container" id="homestay">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area.','.$list->city.','.$list->country;
              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"> <i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='Policy</a>';   
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('homestay.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';          
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Homestay Not found</h3>';
                    }
           }else{
            $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['cityhomestay'])
                    ->where(function($query) use ($term){
             $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get();
         $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y') 
                    ->where('homestayhotels.type','=','s')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.hname','=',$data['cityhomestay'])
                    ->orderBy('homestayhotels.baseprice','Desc')
                    ->where(function($query) use ($term){
             $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get(); 

                    $listing=DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['cityhomestay'])
                    ->orderBy('homestayhotels.rating','desc') 
                    ->where(function($query) use ($term){
             $query->where('hname','like','%'.$term.'%');       
                  })
                   ->get();
                   


                     $html='';
                 if($listing->count()>0){
                 foreach($listing as $list){
                $images=$list->image;
                $oimages=explode(',',$images);
              $html.='<div class="container" id="homestay">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area.','.$list->city.','.$list->country;
              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"> <i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='Policy</a>';   
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('homestay.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';          
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Homestay Not found</h3>';
                    }
        }

                       
       }

    public function homestaysort(Request $request){
             $data['hname']=session::get('hname');
             $data['cityhomestay']=session::get('cityhomestay');
              if($data['hname']===NULL){
              if($request->type =='1'){
                $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->wherebetween('homestayhotels.baseprice',['0','4000'])
                   ->get();
                     }
             if($request->type =='2'){
                $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->wherebetween('homestayhotels.baseprice',['4000','8000'])
                   ->get();
                   
                     }   

                      if($request->type =='3'){
                 $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->wherebetween('homestayhotels.baseprice',['8000','12000'])
                   ->get();
                     }   

                   if($request->type =='4'){
                $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->wherebetween('homestayhotels.baseprice',['12000','16000'])
                   ->get();                    
 }
                     if($request->type =='5'){
                 $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->wherebetween('homestayhotels.baseprice','>','16000')
                   ->get();
                     }


                     if($request->type =='All'){
               $listing =  $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->get();
                     }
                  
                     $html='';
                 if($listing->count()>0){
                foreach($listing as $list){
                $images=$list->image;
                $oimages=explode(',',$images); 
              $html.='<div class="container" id="homestay">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area.','.$list->city.','.$list->country;
              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"> <i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='Policy</a>';   
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('homestay.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';         
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Homestay Not found</h3>';
                  }
            }else{
           
            if($request->type =='1'){
                $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->wherebetween('homestayhotels.baseprice',['0','4000'])
                   ->get();
                     }
             if($request->type =='2'){
                $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')  
                    ->where('homestayhotels.type','=','s')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->wherebetween('homestayhotels.baseprice',['4000','8000'])
                   ->get();
                   
                     }   

                      if($request->type =='3'){
                 $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->wherebetween('homestayhotels.baseprice',['8000','12000'])
                   ->get();
                     }   

                   if($request->type =='4'){
                $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y') 
                    ->where('homestayhotels.type','=','s')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->wherebetween('homestayhotels.baseprice',['12000','16000'])
                   ->get();                    
 }
                     if($request->type =='5'){
                 $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->wherebetween('homestayhotels.baseprice','>','16000')
                   ->get();
                     }


                     if($request->type =='All'){
               $listing =  $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->Where('homestayhotels.hname','=',$data['hname'])
                    ->where('homestayhotels.city','=',$data['cityhomestay'])                   
                    ->get();
                     }
                  
                     $html='';
                 if($listing->count()>0){
                foreach($listing as $list){
                $images=$list->image;
                $oimages=explode(',',$images); 
              $html.='<div class="container" id="homestay">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area.','.$list->city.','.$list->country;
              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"> <i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='Policy</a>';   
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('homestay.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';         
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Homestay Not found</h3>';
                  }
        
         
       }
                        

         }

        public function nearbylocationhomestay(Request $request)
         {
           $id=$request->typehomestay;
           $data['homestay']=Homestay::find($id);
             $listing =DB::table('homestayhotels')
                    ->select('homestayhotels.*')
                    ->where('homestayhotels.del_flag','=','0')
                    ->where('homestayhotels.is_verified','=','y')
                    ->where('homestayhotels.type','=','s')
                    ->Where('homestayhotels.area','=',$data['homestay']->area)
                    ->where('homestayhotels.city','=',$data['homestay']->city)                   
                    ->get();
                 
              $html='';
                 if($listing->count()>0){
                 foreach($listing as $list){
               $images=$list->image; 
              $oimages=explode(',',$images); 
              $html.='<div class="container" id="homestay">';    
              $html.='<div class="row polaroid-box zoom">';
              $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
              $html.='<div id="image-container">';
              $html.='<img src="'.url('triporbitz/public/images/'.$oimages['0']).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
              $html.='<div class="container">';
              $html.='<div id="detail-container">';
              $html.='<h3>';
              $html.=$list->hname;
              $html.='</h3>';
              $html.='</div>';
              $html.='<div class="list-container">';
              $html.='<h4 class="display-text">';
              $html.=$list->area.','.$list->city.','.$list->country;
              $html.='</h4>';
              $html.='<h4 class="display-price">';
              $html.='RS.&nbsp';
              $html.=$list->baseprice;
              $html.='</h4>';
              $html.='</div>'; 
              $html.='<div class="list-container">';
              $html.='<a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a>';
              $html.='<a href="#"><i class="fa fa-glass" aria-hidden="true"></i></a>';
              $html.='<a href="#"> <i class="fa fa-shower" aria-hidden="true"></i></a>';
              $html.='</div>';
              $html.='<div class="list-container">'; 
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='OverView</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='Amenitites</a>&nbsp;&nbsp;&nbsp;';
              $html.='<a href="#" data-toggle="popover" title="Hotel Overview" data-content="'.$list->description.'">';
              $html.='Policy</a>';   
              $html.='</div>';
              $html.='</div>';
              $html.='<div class="container">'; 
              $html.='<a href="'.route('homestay.detail',$list->id).'" type="button" class="btn btn-primary pull-right">';
              $html.='Book now';
              $html.='</a>';
              $html.='<br>';
              $html.='<br>'; 
              $html.='<small class="pull-right">';
              $html.='few Rooms left';
              $html.='</small>';  
              $html.='</div>';
              $html.='</div>';
              $html.='</div>';                                      
              $html.='</div>';                   
              }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Hotel Not found</h3>';
                  }

         }
      
        public function homestaydetail($id)
         {
          $data['hname']        =session()->get('hname');
          $data['cityhomestay'         ]=session::get('cityhomestay');
          $data['checkinhomestay']     =session()->get('checkinhomestay');
          $data['checkouthomestay']    =session()->get('checkouthomestay');
          $data['adultshomestay']      =session()->get('adultshomestay');
          $data['childshomestay']      =session()->get('childshomestay');
          $data['totaldayshomestay']   =session()->get('totaldayshomestay');
          $data['roomshomestay']       =session()->get('roomshomestay');
           session()->put(['homestay_id'=>$id]);
         
            $data['homestay']=DB::table('roomtypes')
                             ->join('homestayhotels', 'roomtypes.hotel_id', '=', 'homestayhotels.id')
                             ->select('homestayhotels.*','roomtypes.*')
                             ->where('roomtypes.del_flag','=','0')
                             ->where('homestayhotels.type','=','s')
                             ->where('homestayhotels.del_flag','=','0')
                             ->where('homestayhotels.is_verified','=','y') 
                             ->where('homestayhotels.id','=',$id)
                             ->get();
                      
                      if(sizeof($data['homestay'])>0){
                        foreach($data['homestay'] as $home)
                        {
                        $amenities=$home->amenitiesnservices;
                        }
                        $data['amenities']=explode(',',$amenities);
                      }else{
                        $data['amenities']=Null;   
                      }
                    
                     if(sizeof($data['homestay'])>0){
                        foreach($data['homestay'] as $home)
                        {
                        $image=$home->image;
                        }
                        if (preg_match('/,/', $image))
                        {
                        $data['images']=explode(',',$image);  
                        }else{
                        $data['images']=$image;
                        }
                      } 
                    
                            
                     $data['homestay'] =Homestay::findOrFail($id);
                     $data['rooms']=Roomtype::where('del_flag','=','0')
                                      ->where('hotel_id','=',$id)
                                      ->get();
                   $data['latitude'] =$data['homestay']->latitude;
                   $data['longitude']=$data['homestay']->longitude;
                   $area=$data['homestay']->area;                 
                Mapper::map($data['latitude'],$data['longitude'],['zoom' => 10, 'markers' => ['title' =>$area, 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]]);
                                                                                  
                      return view('home::homestaydetail',$data);
                     }

         
         public function homestayareasearch(Request $request)
         {
        $term  =$request->srhText;
        $cities =DB::table('homestayhotels')
                                    ->select('id','area','city','type','hname')
                                    ->where('del_flag','=','0')
                                    ->where('type','=','s')
                                    ->where('is_verified','=','y')
                                    ->orderBy('id','desc')
                                    ->where(function($query) use ($term){
                             $query->where('city','like','%'.$term.'%');
                             })
                             ->groupBy('city')
                             ->get();
         $citiescount =DB::table('homestayhotels')
                                    ->select('id','area','city','type','hname')
                                    ->where('del_flag','=','0')
                                    ->where('is_verified','=','y')
                                    ->where('type','=','s')
                                    ->orderBy('id','desc')
                                    ->where(function($query) use ($term){
                             $query->where('city','like','%'.$term.'%')
                                    ->orWhere('hname','like','%'.$term.'%')
                                    ->orWhere('area','like','%'.$term.'%');
 
                             })
                             ->get();
         $hotels =DB::table('homestayhotels')
                                    ->select('id','area','city','type','hname')
                                    ->where('del_flag','=','0')
                                    ->where('is_verified','=','y') 
                                    ->where('type','=','s')
                                    ->orderBy('id','desc')
                                    ->where(function($query) use ($term){
                             $query->where('hname','like','%'.$term.'%');
                                   
                             })
                             ->groupBy('hname')
                             ->get();
                

     
                      
                     if($cities->count()>0){
                      $html='';   
                      $html.='<div class="areatitle" id="areatitle" style=" border-bottom:1px solid #cacaca!important;
                padding: 10px 12px 10px 8px!important;line-height:16px;font-size: 12px;letter-spacing: 1px;text-align:right;"><h4><span><i class="fa fa-map"></i>&nbsp;Cities</span></h4></div>';
                     foreach($cities as $city){
                      if($city->city){
                      $html.='<ul>';
                      $html.='<li class="link-class-homestay" style="margin: 0;display: block;font-size: 12px;line-height: 16px;
                overflow: hidden;border-bottom:1px solid #cacaca!important;padding: 10px 12px 10px 8px!important;
                cursor: pointer;letter-spacing: 1px;text-align:left;">';
                      $html.=$city->city.'('.count($citiescount).' '.'homestay'.')';
                      $html.='</li>';
                      $html.='</ul>';  
                      }
                    }
                   echo $html;
                   }
                  if($hotels->count()>0){
                      $html='';
                      $html.='<div class="areatitle" id="areatitle" style=" border-bottom:1px solid #cacaca!important;
                padding: 10px 12px 10px 8px!important;line-height:16px;font-size: 12px;letter-spacing: 1px;text-align:right;"><h4><span><i class="fa fa-hotel"></i></i>&nbsp;Hotels</span></h4></div>';
                     foreach($hotels as $hotel){
                      if($hotel->hname){
                      $html.='<ul>';
                      $html.='<li class="link-class-homestay" style="margin: 0;display: block;font-size: 12px;line-height: 16px;
                overflow: hidden;border-bottom:1px solid #cacaca!important;padding: 10px 12px 10px 8px!important;
                cursor: pointer;letter-spacing: 1px;text-align:left;">';
                      $html.=$hotel->hname.','.$hotel->city;
                      $html.='</li>';
                      $html.='</ul>';  
                      }
                    }
                    echo $html;
                   }
                if(!sizeof($hotels)>0 && !sizeof($cities)>0){
                    echo '<h3 class="text-center">No Match found</h3>';
              }    
               
    }


    public function homestaymodifyareasearch(Request $request)
         {
           $term  =$request->srhText;
           print_r($term);
           die();
           $homestays =DB::table('homestayhotels')
                                    ->select('id','hname','type')
                                    ->where('is_verified','=','y') 
                                    ->where('del_flag','=','0')
                                    ->where('type','=','s')
                                    ->orderBy('id','desc')
                                    ->where(function($query) use ($term){
                             $query->where('hname','like','%'.$term.'%');
                             })
                             ->get();
          $cities =DB::table('homestayhotels')
                                    ->select('id','city','type')
                                    ->where('is_verified','=','y')
                                    ->where('del_flag','=','0')
                                    ->where('type','=','s')
                                    ->orderBy('id','desc')
                                    ->where(function($query) use ($term){
                             $query->where('city','like','%'.$term.'%');
                             })
                             ->get();
          $areas =DB::table('homestayhotels')
                                    ->select('id','area','type')
                                    ->where('del_flag','=','0')
                                    ->where('is_verified','=','y')
                                    ->where('type','=','s')
                                    ->orderBy('id','desc')
                                    ->where(function($query) use ($term){
                             $query->where('area','like','%'.$term.'%');
                             })
                             ->get();

     
                      $html='';
                     if($areas->count()>0){
                      $html.='<div class="areatitle" id="areatitle" style=" border-bottom:1px solid #cacaca!important;
                padding: 10px 12px 10px 8px!important;line-height:16px;font-size: 12px;letter-spacing: 1px;text-align:right;"><h4><span><i class="fa fa-map"></i>&nbsp;Areas</span></h4></div>';
                     foreach($areas as $area){
                      if($area->area){
                      $html.='<ul>';
                      $html.='<li class="link-class-homestay" style="margin: 0;display: block;font-size: 12px;line-height: 16px;
                overflow: hidden;border-bottom:1px solid #cacaca!important;padding: 10px 12px 10px 8px!important;
                cursor: pointer;letter-spacing: 1px;text-align:left;">';
                      $html.=$area->area;
                      $html.='</li>';
                      $html.='</ul>';  
                      }
                    }
                  }     
                    if($cities->count()>0){
                      $html.='<div class="ciitestitles" id="ciitestitles" style=" border-bottom:1px solid #cacaca!important;
                padding: 10px 12px 10px 8px!important;line-height:16px;font-size: 12px;letter-spacing: 1px;text-align:right;"><h4><span><i class="fa fa-fa fa-map-marker"></i>&nbsp;Cities</span></h4></div>';
                    foreach($cities as $c){
                      if($c->city){
                      $html.='<ul>';
                      $html.='<li class="link-class-homestay" style="margin: 0;display: block;font-size: 12px;line-height: 16px;
                overflow: hidden;border-bottom:1px solid #cacaca!important;padding: 10px 12px 10px 8px!important;
                cursor: pointer;letter-spacing: 1px;text-align:left;">';
                      $html.=$c->city;
                      $html.='</li>';
                      $html.='</ul>';   
                      }
                  }
                }
               
       
                  if($homestays->count()>0){
                    $html.='<div class="homestaytitle" id="homestaytitle" style=" border-bottom:1px solid #cacaca!important;
              padding: 10px 12px 10px 8px!important;line-height:16px;font-size: 12px;letter-spacing: 1px;text-align:right;"><h4><span><i class="fa fa-home"></i>&nbsp;Homestays</span></h4></div>';
                  foreach($homestays as $h){ 
                   if($h->hname){
                    $html.='<ul>';
                    $html.='<li class="link-class-homestay" style="margin: 0;display: block;font-size: 12px;line-height: 16px;
              overflow: hidden;border-bottom:1px solid #cacaca!important;padding: 10px 12px 10px 8px!important;
              cursor: pointer;letter-spacing: 1px;text-align:left;">';
                    $html.=$h->hname;
                    $html.='</li>';
                    $html.='</ul>';
                   }  
                 }
              }
               
           echo $html;
           if($homestays->count()<0 && $cities->count()<0 && $areas->count()<0)
            {
                 echo '<h3 class="text-center">No Match found</h3>';
            }
            

    }
    
     public function homestayroomsavailability(Request $request)
     {
          $data['homestay_id']      =session()->get('homestay_id');
          $data['checkinhomestaydata']  =$request->checkinhomestay;
          $data['checkouthomestaydata'] =$request->checkouthomestay;
          $data['adultshomestay']   =$request->adultshomestay;
          $data['childshomestay']   =$request->childshomestay;
          $data['roomshomestay']    =$request->roomshomestay;
          $data['checkinhomestay'] =date('Y-m-d H:i:s', strtotime($data['checkinhomestaydata']));
          $data['checkouthomestay']=date('Y-m-d H:i:s',strtotime($data['checkouthomestaydata']));
          $checkinhomestay =Carbon::parse($data['checkinhomestaydata']);
          $checkouthomestay=Carbon::parse($data['checkouthomestaydata']);
          $data['totaldayshomestay']=$checkouthomestay->diffInDays($checkinhomestay);
          session()->put(['checkinhomestay'=>$data['checkinhomestay'],'checkouthomestay'=>$data['checkouthomestay'],'adultshomestay'=>$data['adultshomestay'],'childshomestay'=>$data['childshomestay'],'roomshomestay'=>$data['roomshomestay'],'totaldays'=>$data['totaldayshomestay']]);
          $checkinhomestay=session()->get('checkinhomestay');
          $checkouthomestay=session()->get('checkouthomestay');
          $adultshomestay=session()->get('adultshomestay');
          $childshomestay=session()->get('childshomestay');
          $roomshomestay=session()->get('roomshomestay');
          $totaldayshomestay=session()->get('totaldayshomestay');
          $data['availableroomshomestay']=booking::where('checkin_date','=',$data['checkinhomestay'])
                                 ->where('checkout_date','=',$data['checkouthomestay'])
                                 ->where('is_booked','=','0')
                                 ->where('type','=','s')
                                 ->where('hotel_id','=',$data['homestay_id'])
                                 ->get(); 
                        if(sizeof($data['availableroomshomestay'])>0){
                          echo 'rooms not found';
                          }else{
                          $data['rooms']=Roomtype::where('del_flag','=','0')
                                      ->where('hotel_id','=',$data['homestay_id'])
                                      ->get();
                      }
                      
                      $html='';    
                 if(sizeof($data['rooms'])>0){
                 foreach($data['rooms'] as $list){
              $html.='<tr>';    
              $html.='<td>';
              $html.='<label>';
              $html.=($list->rtype=='s'? 'Single':($list->rtype =='d'? 'Double':($list->rtype =='t'? 'Triple':($list->rtype =='qd'?'Quad':($list->rtype =='q'?'Queen':($list->rtype=='k'?'King':($list->rtype=='tw'?'Twin':($list->rtype=='dd'?'Double Double':'Studio'))))))));
              $html.='</label>';
              $html.='<div class="">';
              $html.=' <img class="photo-container1" src="'.url('triportbitz/public/images/'.$list->rimage).'" alt="'.$list->image.'">';
              $html.='</div>';
              $html.='</td>';
              $html.='<td>';
              $html.='<div class="listfacility">';
              $html.='<li>';
              $html.='<i class="fa fa-wifi" style="color:green;">&nbsp;free wifi</i>';
              $html.='<i class="fa fa-coffee" style="color:green;">&nbsp;free Coffee</i>';
              $html.='</li>';
              $html.='</div>';
              $html.='</td>';
              $html.='<td>';
              $html.='<label>RS.'.$list->price.'&nbsp;(price per night)</label>'; 
              $html.='</td>';
              $html.='<td>';
              $html.='<div class="form-left-agileits-w3layouts">';
              $html.='<button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#paymentmodel">Book Room</button>';
              $html.='</div>';
              $html.='<label>Few Rooms left</label>';
              $html.='</td>';
              $html.='</tr>';
                  }
                 echo $html;
                  }else{
                        echo '<h3 class="text-center">Room  Not found</h3>';
                  }   

     }
     
      public function bookroomshomestay(Request $request){
        $term=$request->bookroomhomestay;
        if($term == 'Queen'){
  $data['roomtype']='q';
}elseif($term == 'Single'){
	$data['roomtype']='s';
}elseif($term == 'Double'){
	$data['roomtype']='d';
}elseif($term == 'Triple'){
	$data['roomtype']='t';
}elseif($term == 'Quard'){
	$data['roomtype']='qd';
}elseif($term == 'King'){
	$data['roomtype']='k';
}elseif($term == 'Twin'){
	$data['roomtype']='tw';
}elseif($term == 'Double Double'){
	$data['roomtype']='dd';
}else{
	$data['roomtype']='st';
}
$id  =session()->get('homestay_id');
$data['roomtypedetail']=Roomtype::where('del_flag','=','0')
                                 ->where('rtype','=',$data['roomtype'])
                                 ->where('hotel_id','=',$id)
                                 ->first();
session()->put(['roomtypehomestay'=>$data['roomtypedetail']]);
         }
        
    
       public function homestayreview()
         {

           $data['cityhomestay']         =session()->get('cityhomestay');
          $data['checkinhomestay']     =session()->get('checkinhomestay');
          $data['checkouthomestay']    =session()->get('checkouthomestay');
          $data['adultshomestay']      =session()->get('adultshomestay');
          $data['childshomestay']      =session()->get('childshomestay');
          $data['totaldayshomestay']   =session()->get('totaldayshomestay');
          $data['roomstotal']       =session()->get('roomshomestay');
          $data['roomtype']=session()->get('roomtypehomestay');
          $id=session()->get('homestay_id');
          $data['homestay']=Homestay::find($id);
          
          
                        $image=$data['homestay']->image;
                        
                        if (preg_match('/,/', $image))
                        {
                        $data['images']=explode(',',$image);  
                        }else{
                        $data['images']=$image;
                        }
                $amenitites=$data['homestay']->amenitiesnservices;
                        
                        if (preg_match('/,/', $amenitites))
                        {
                        $data['amenitites']=explode(',',$amenitites);  
                        }else{
                        $data['amenitites']=$amenitites;
                        }
                       
         


          return view('home::homestayreviewbooking',$data);
          }
            public function homestaypayment(Request $request)
        {
          dd($request->all());
        }


     public function busfromsearch(Request $request)
     {
      $term  =$request->srhText;
      $listing =DB::table('buses')
                                ->select('id','seats','from_loc','to_loc')
                                ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($term){
                         $query->where('from_loc','like','%'.$term.'%')
                                ->orWhere('to_loc','like','%'.$term.'%');
                                     
                         })
                          ->groupBy('from_loc')
                          ->get();
                 
                    $html='';
                   if($listing->count()>0){
                   foreach($listing as $list){
                    $html.='<ul>';
                    $html.='<li class="link-class-buses-from">';
                    $html.=$list->from_loc;
                    $html.='</li>';
                    $html.='</ul>';
                    }
                   echo $html;
                    }else{
                         echo '<h3 class="text-center">Area Not found</h3>';
                    }


               }

              public function bustosearch(Request $request)
              {
              $term  =$request->srhText;
              $listing =DB::table('buses')
                                ->select('id','seats','from_loc','to_loc')
                                ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($term){
                         $query->where('from_loc','like','%'.$term.'%')
                               ->orWhere('to_loc','like','%'.$term.'%');       
                         })
                          ->groupBy('to_loc')
                          ->get();
     
                    $html='';
                   if($listing->count()>0){
                   foreach($listing as $list){
                    $html.='<ul>';
                    $html.='<li class="link-class-buses-to">';
                    $html.=$list->to_loc;
                    $html.='</li>';
                    $html.='</ul>';
                    }
                   echo $html;
                    }else{
                         echo '<h3 class="text-center">Area Not found</h3>';
                    }

               }

        public function busresult(Request $request)
        {
          $data['frombus']=$request->get('frombus');
          $data['tobus']  =$request->get('tobus');
          $data['departurebus']=$request->get('departure');
          $data['seatsbus']=$request->get('seats');
          $data['nseats']=explode(' ',$data['seatsbus']);
          $data['numseats']=$data['nseats'][0];
          $data['seats']=Bus::all();
          foreach($data['seats'] as $seats)
          {
            $data['seatsbuses']=$seats->seats;
          }
          $data['seatscount']=count(explode(',',$data['seatsbuses']));
          session()->put([
             'frombus'      =>$data['frombus'],
             'tobus'        =>$data['tobus'],
             'departurebus' =>$data['departurebus'],
             'seatsbus'     =>$data['seatsbus'],
             'numseats'     =>$data['numseats'],
             'seatscount'   =>$data['seatscount']
          ]);
              $frombus=session::get('frombus');
              $tobus  =session::get('tobus');
              $seatscount=session::get('seatscount');             
          $data['resultbus']  = DB::table('buses')
                               ->select('id','oname','bnumber','image','type','seats','shift','price','atime','dtime','from_loc','to_loc')
                               ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($frombus,$tobus,$seatscount){
                         $query->where('from_loc','like','%'.$frombus.'%')
                               ->orWhere('to_loc','like','%'.$tobus.'%')
                               ->orWhere('seats','>',$seatscount);      
                         })
                          
                          ->get();
           foreach($data['resultbus'] as $bus){
           $atime=strtotime($bus->atime);
           $dtime=strtotime($bus->dtime);
           $actualtime=abs($dtime-$atime);
           $tsecs=$actualtime;
           $tmins = floor($tsecs/60);
           $hours = floor($tmins/3600);
           $minutes = $tmins%60; 
           $seconds=$tsecs%3600;
           $data['hour'] = $hours;
           $data['minute']=$minutes;
           $data['second']=$seconds; 
           
           }
              
         
        return view('home::busresult',$data);   
        }
        public function busessearch(Request $request)
        {

              $term  =$request->srcText;
              $frombus=session::get('frombus');
              $tobus  =session::get('tobus');
              $seatscount=session::get('seatscount');
              $listing= DB::table('buses')
                               ->select('id','oname','bnumber','image','type','seats','shift','price','atime','dtime','from_loc','to_loc')
                               ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($frombus,$tobus,$seatscount,$term){
                         $query->orWhere('from_loc','like','%'.$frombus.'%')  
                               ->orWhere('to_loc','like','%'.$tobus.'%')
                               ->orWhere('seats','>',$seatscount);      
                              })
                           ->where(function($query) use ($term){
                         $query->where('oname','like','%'.$term.'%');      
                           })      
                          ->get();
                          

                   
                       $html='';
                   if($listing->count()>0){
                   foreach($listing as $list){
                     $html.='<div class="row polaroid-box zoom1">';
                    $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
                    $html.='<h4 class="display-text">';
                    $html.=$list->oname;
                    $html.='</h4>';
                    $html.='<div id="image-container1">';
                    $html.='<img src="'.url('triporbitz/public/images/'.$list->image).'" alt="'.$list->image.'">';  
                    $html.='</div>';
                    $html.='</div>';
                    $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
                    $html.='<div class="container">';
                    $html.='<div class="list-container">';
                    $html.='<h4 class="display-price">Rs&nbsp;';
                    $html.=$list->price;
                    $html.='</div>';
                    $html.='<div class="timeduration">
                   <label>3:00 p.m</label>
                   <label>2hour</label>
                   <label>5:00 p.m</label>
                   <label>place1</label>
                   <label> </label>
                   <label>place2</label>
                   </div>';
                    $html.='<div class="list-container list-con">';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Photo</a>';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Facilities</a>';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Policy</a>';
                    $html.='</div>';
                    $html.='</div>';
                    $html.='<div class="container select-set">';
                    $html.='<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#Seatselectionmodal" id="selectbutton">Select Seat 
                         </button>';
                    $html.='<br><br>';
                    $html.='<small class="pull-right">few seat left</small>';
                    $html.=' </div>';
                    $html.='</div>';
                    $html.='</div>';
                   
                    }
                   echo $html;
                    }else{
                         echo '<h3 class="text-center">Bus Not found</h3>';
                    }


        }

        public function busestimesort(Request $request)
        {
              
              $frombus=session::get('frombus');
              $tobus  =session::get('tobus');
              $seatscount=session::get('seatscount');
              if($request->type=='timeall'){
              $listing=  DB::table('buses')
                               ->select('id','oname','bnumber','image','type','seats','shift','price','atime','dtime','from_loc','to_loc')
                               ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($frombus,$tobus,$seatscount){
                         $query->where('from_loc','like','%'.$frombus.'%')  
                               ->orWhere('to_loc','like','%'.$tobus.'%')
                               ->orWhere('seats','>',$seatscount);      
                              })
                              ->get();
                     }
              
              if($request->type=='day'){
                $listing=DB::table('buses')
                               ->select('id','oname','bnumber','image','type','seats','shift','price','atime','dtime','from_loc','to_loc')
                               ->where('del_flag','=','0')
                                ->where('shift','=','d')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($frombus,$tobus,$seatscount){
                         $query->orWhere('from_loc','like','%'.$frombus.'%')  
                               ->orWhere('to_loc','like','%'.$tobus.'%')
                               ->orWhere('seats','>',$seatscount);      
                              })
                              ->get();
              }

              if($request->type=='night'){
                $listing=DB::table('buses')
                               ->select('id','oname','bnumber','image','type','seats','shift','price','atime','dtime','from_loc','to_loc')
                               ->where('del_flag','=','0')
                                ->where('shift','=','n')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($frombus,$tobus,$seatscount){
                         $query->orWhere('from_loc','like','%'.$frombus.'%')  
                               ->orWhere('to_loc','like','%'.$tobus.'%')
                               ->orWhere('seats','>',$seatscount);      
                              })
                              ->get();
              }



                     
                       $html='';
                   if($listing->count()>0){
                   foreach($listing as $list){
                    $html.='<div class="row polaroid-box zoom1">';
                    $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
                    $html.='<h4 class="display-text">';
                    $html.=$list->oname;
                    $html.='</h4>';
                    $html.='<div id="image-container1">';
                    $html.='<img src="'.url('triporbitz/public/images/'.$list->image).'" alt="'.$list->image.'">';  
                    $html.='</div>';
                    $html.='</div>';
                    $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
                    $html.='<div class="container">';
                    $html.='<div class="list-container">';
                    $html.='<h4 class="display-price">Rs&nbsp;';
                    $html.=$list->price;
                    $html.='</div>';
                    $html.='<div class="timeduration">
                   <label>3:00 p.m</label>
                   <label>2hour</label>
                   <label>5:00 p.m</label>
                   <label>place1</label>
                   <label> </label>
                   <label>place2</label>
                   </div>';
                    $html.='<div class="list-container list-con">';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Photo</a>';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Facilities</a>';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Policy</a>';
                    $html.='</div>';
                    $html.='</div>';
                    $html.='<div class="container select-set">';
                    $html.='<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#Seatselectionmodal" id="selectbutton">Select Seat 
                         </button>';
                    $html.='<br><br>';
                    $html.='<small class="pull-right">few seat left</small>';
                    $html.=' </div>';
                    $html.='</div>';
                    $html.='</div>';
                   
                    }
                   echo $html;
                    }else{
                         echo '<h3 class="text-center">Bus Not found</h3>';
                    } 

           }

          public function busespricesort(Request $request)
        {
              
              $frombus=session::get('frombus');
              $tobus  =session::get('tobus');
              $seatscount=session::get('seatscount');
              if($request->type=='aesc'){
              $listing=  DB::table('buses')
                               ->select('id','oname','bnumber','image','type','seats','shift','price','atime','dtime','from_loc','to_loc')
                               ->where('del_flag','=','0')
                                ->orderBy('price','aesc')
                                ->where(function($query) use ($frombus,$tobus,$seatscount){
                         $query->where('from_loc','like','%'.$frombus.'%')  
                               ->orWhere('to_loc','like','%'.$tobus.'%')
                               ->orWhere('seats','>',$seatscount);      
                              })
                              ->get();
                     }
              
             

                       $html='';
                   if($listing->count()>0){
                   foreach($listing as $list){
                    $html.='<div class="row polaroid-box zoom">';
                    $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
                    $html.='<h4 class="display-text">';
                    $html.=$list->oname;
                    $html.='</h4>';
                    $html.='<div id="image-container1">';
                    $html.='<img src="'.url('triporbitz/public/images/'.$list->image).'" alt="'.$list->image.'">';  
                    $html.='</div>';
                    $html.='</div>';
                    $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
                    $html.='<div class="container">';
                    $html.='<div class="list-container">';
                    $html.='<h4 class="display-price">Rs&nbsp;';
                    $html.=$list->price;
                    $html.='</div>';
                    $html.='<div class="timeduration">
                   <label>3:00 p.m</label>
                   <label>2hur</label>
                   <label>5:00 p.m</label>
                   <label>place1</label>
                   <label> </label>
                   <label>place2</label>
                   </div>';
                    $html.='<div class="list-container list-con">';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Photo</a>';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Facilities</a>';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Policy</a>';
                    $html.='</div>';
                    $html.='</div>';
                    $html.='<div class="container">';
                    $html.='<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#Seatselectionmodal" id="selectbutton">Select Seat 
                         </button>';
                    $html.='<br><br>';
                    $html.='<small class="pull-right">few seat left</small>';
                    $html.=' </div>';
                    $html.='</div>';
                    $html.='</div>';
                   
                    }
                   echo $html;
                    }else{
                         echo '<h3 class="text-center">Bus Not found</h3>';
                    } 

           }

          





           public function busestypesort(Request $request)
           {
              $frombus=session::get('frombus');
              $tobus  =session::get('tobus');
              $seatscount=session::get('seatscount');
              if($request->bustype=='Allbustype'){
              $listing=  DB::table('buses')
                               ->select('id','oname','bnumber','image','type','seats','shift','price','atime','dtime','from_loc','to_loc')
                               ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($frombus,$tobus,$seatscount){
                         $query->where('from_loc','like','%'.$frombus.'%')  
                               ->orWhere('to_loc','like','%'.$tobus.'%')
                               ->orWhere('seats','>',$seatscount);      
                              })
                              ->get();
                     }
              
              if($request->bustype=='a'){
                $listing=DB::table('buses')
                               ->select('id','oname','bnumber','image','type','seats','shift','price','atime','dtime','from_loc','to_loc')
                               ->where('del_flag','=','0')
                                ->where('type','=','a')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($frombus,$tobus,$seatscount){
                         $query->orWhere('from_loc','like','%'.$frombus.'%')  
                               ->orWhere('to_loc','like','%'.$tobus.'%')
                               ->orWhere('seats','>',$seatscount);      
                              })
                              ->get();
              }

              if($request->bustype=='n'){
                $listing=DB::table('buses')
                               ->select('id','oname','bnumber','image','type','seats','shift','price','atime','dtime','from_loc','to_loc')
                               ->where('del_flag','=','0')
                               ->where('type','=','n')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($frombus,$tobus,$seatscount){
                         $query->orWhere('from_loc','like','%'.$frombus.'%')  
                               ->orWhere('to_loc','like','%'.$tobus.'%')
                               ->orWhere('seats','>',$seatscount);      
                              })
                              ->get();
              }

              if($request->bustype=='m'){
                $listing=DB::table('buses')
                               ->select('id','oname','bnumber','image','type','seats','shift','price','atime','dtime','from_loc','to_loc')
                               ->where('del_flag','=','0')
                               ->where('type','=','m')
                               ->orderBy('id','desc')
                                ->where(function($query) use ($frombus,$tobus,$seatscount){
                         $query->orWhere('from_loc','like','%'.$frombus.'%')  
                               ->orWhere('to_loc','like','%'.$tobus.'%')
                               ->orWhere('seats','>',$seatscount);      
                              })
                              ->get();
                       }


                     
                       $html='';
                   if($listing->count()>0){
                   foreach($listing as $list){
                     $html.='<div class="row polaroid-box zoom1">';
                    $html.='<div class="col-md-3 col-sm-6 col-xs-12">';
                    $html.='<h4 class="display-text">';
                    $html.=$list->oname;
                    $html.='</h4>';
                    $html.='<div id="image-container1">';
                    $html.='<img src="'.url('triporbitz/public/images/'.$list->image).'" alt="'.$list->image.'">';  
                    $html.='</div>';
                    $html.='</div>';
                    $html.='<div class="col-md-9 col-sm-12 col-xs-12">';
                    $html.='<div class="container">';
                    $html.='<div class="list-container">';
                    $html.='<h4 class="display-price">Rs&nbsp;';
                    $html.=$list->price;
                    $html.='</div>';
                    $html.='<div class="timeduration">
                   <label>3:00 p.m</label>
                   <label>2hour</label>
                   <label>5:00 p.m</label>
                   <label>place1</label>
                   <label> </label>
                   <label>place2</label>
                   </div>';
                    $html.='<div class="list-container list-con">';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Photo</a>';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Facilities</a>';
                    $html.='<a href="#" data-toggle="popover" title="  bus Overview" data-content="">Policy</a>';
                    $html.='</div>';
                    $html.='</div>';
                    $html.='<div class="container select-set">';
                    $html.='<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#Seatselectionmodal" id="selectbutton">Select Seat 
                         </button>';
                    $html.='<br><br>';
                    $html.='<small class="pull-right">few seat left</small>';
                    $html.=' </div>';
                    $html.='</div>';
                    $html.='</div>';                  
                    }
                   echo $html;
                    }else{
                         echo '<h3 class="text-center">Bus Not found</h3>';
                    } 


           }
             
             public function busesdetail($id)
             {
                $data['frombus']=session::get('frombus');
                $data['tobus']  =session::get('tobus');
                $data['numseats']=session::get('numseats');
                $data['departurebus']=session::get('departurebus');
                $data['busdetail']=Bus::find($id);
                session()->put(['bus_id'=>$id]);
 
               return view('home::busesdetail',$data);
             }

             public function busesavailability(Request $request)
             {
                // $request->session()->forget('departurebus');
                $data['bus_id']=session()->get('bus_id');
                $data['departuredate']=$request->departuredate;
                $data['nseats']=$request->nseats;
                $data['bustype']=$request->bustype;
                $frombus=session::get('frombus');
                $tobus  =session::get('tobus');
                session()->put(['departuredate'=>$data['departuredate'],'nseats'=>$data['nseats'],'bustype'=>$data['bustype']]);
                $departurebus=session()->get('departuredate');
                $numseats  =session()->get('nseats');
                $bustype =session()->get('bustype');
                $data['availablebus']=Bus::where('del_flag','=','0')
                              ->where('buses.type','=',$data['bustype'])
                              ->where('buses.id','=',$data['bus_id'])
                              ->get();

                              if(sizeof($data['availablebus'])>0){
                                 foreach($data['availablebus'] as $availablebus){
                                $data['seats']=$availablebus->seats;                
                              }
                              $data['countsheets']=count(explode(',',$data['seats']));
                              }else{
                                $data['sheets']=0;
                                $data['countsheets']=0;
                              }   
                             
                $data['reservedsheet']=Seat::where('bus_id',$data['bus_id'])->get();
                  if(sizeof($data['reservedsheet'])>0){
                    foreach($data['reservedsheet'] as $reservedsheet){
                      $data['rsheets']=$reservedsheet->rsheets;
                    }
                    $data['countrsheets']=count(explode(',',$data['rsheets']));

                  }else{
                    $data['rsheets']=0;
                    $data['countrsheets']=0;
                  }
                  $availablesheets=$data['countsheets']-$data['countrsheets'];
                

                  if($availablesheets>0){
                    $listing=Bus::where('del_flag','=','0')
                              ->where('buses.type','=',$data['bustype'])
                              ->where('buses.id','=',$data['bus_id'])
                              ->get();
                      }else{
                        $listing=Bus::where('del_flag','=','0')
                              ->where('buses.type','=',$data['bustype'])
                              ->where('buses.id','=',$data['bus_id'])
                              ->get();
                      }

                     $html='';
                   if($listing->count()>0){
                   foreach($listing as $list){
                    $html.='<div class="row w3-example zoom" id="availablebus">';
                    $html.='<div class="col-md-3">';
                    $html.='<div>';
                    $html.='<img class="photo-container" src="'.url('triportbitz/public/images/'.$list->image).'" alt="'.$list->image.'">';  
                    $html.='<br>';
                    $html.='<small>';
                    $html.=$list->oname;
                    $html.='</small>';
                    $html.='</div>';
                    $html.='</div>';
                    $html.='</p>';
                    $html.='<div class="col-md-3">';
                    $html.='<h5>From</h5>';
                    $html.='<i class="fa fa-bus"></i>';
                    $html.='<small>';
                    $html.=$frombus;
                    $html.='</small>';
                    $html.='<hr>';
                    $html.='<li style="text-decoration: underline;">Highlights
                          <i class="glyphicon glyphicon-ok"> Free Meal </i></li>';
                    $html.='</div>';
                    $html.='<div class="col-md-3">';
                    $html.='<h5>To </h5>';
                    $html.='<i class= "fa fa-bus"></i>';
                    $html.='<small>';
                    $html.=$tobus;
                    $html.='</small>';
                    $html.=' <hr>';
                    $html.='</div>';
                    $html.='<div class="col-md-3">';
                    $html.='<label class="editContent"><span class="" aria-hidden="true"></span></label>';
                    $html.='<p class="pull-right" style="text-decoration:underline;">Rs &nbsp;';
                    $html.=$list->price;
                    $html.='</p>';
                    $html.='<button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#completeBooking" style="margin-top: 35px;">Book Seat</button>';
                    $html.='<br>';
                    $html.='<small class="pull-right">4 Seats left</small>';
                    $html.='</div></div>';
                   
                    }
                   echo $html;
                    }else{
                         echo '<h3 class="text-center">Bus Not found</h3>';
                    } 


                 }

                  public function busreview()
                  {
                    return view('home::busreview');                  
                  }

             public function buspayment()
             {
              // proceed to payment
             }

          public function add_your_property()
          {
            return view('home::addproperty');
           
          }
         
         public function add_your_property_post(Request $request)
         {
          $rules=[
             'name'           =>'required|nullable ', 
             'phone'          => 'required|numeric|digits:10',
             'email'          =>'required|email'
              ];
         $messages =[
             'name.required' =>'Name is required', 
             'phone.required' =>'Phone is required',
             'email.required' =>'Email is required'
                     ];
          $validator = Validator::make($request->all(),$rules,$messages);
           if ($validator->fails()) {
             return redirect('/addproperty/signup')
                         ->withErrors($validator)
                         ->withInput();               
         }
          $hotels['name']        =$request->get('name');
          $hotels['phone']       =$request->get('phone');
          $hotels['email']       =$request->get('email');
          $hotels['status']='2';
         
         if(Hotel::create($hotels)){
            $hotels['id']=Hotel::create($hotels)->id;
             session::put(['id'=>$hotels['id']]);

               Signupjob::dispatch($hotels);
              return redirect('/addproperty/signup')->with('success_msg','You have Register Successfully.Please,Check and verfiy your email.');
         }else{
         return redirect('/addproperty/signup')->with('error_msg','Something is wrong in Your input...');
      }
      }
      
      public function signuppassword()
      {
        $data['id']=session::get('id');
       return view('home::signuppassword',$data);
      }
      
      public function signuppasswordpost(Request $request)
      {

       $id=$request->get('property_id');
        $rules=[
             'password' => 'nullable|required_with:password_confirmation|min:6|string|confirmed', 
              ];
         
          $validator = Validator::make($request->all(),$rules);
           if ($validator->fails()) {
             return redirect('/addproperty/signup/password/'.$id)
                         ->withErrors($validator)
                         ->withInput();               
         }
        $hotels['password']=bcrypt($request->get('password'));
        $hotels['status']='1';
        if(Hotel::find($id)->update($hotels)){
               return redirect('/hotels/admin')->with('success_msg',' Password Created  Successfully!!.Please Login with Your Credenitals');
              
     }else{
     return back()->with('error_msg','Something is wrong!!');
     }
         
        


      }
     
   

        







}



 