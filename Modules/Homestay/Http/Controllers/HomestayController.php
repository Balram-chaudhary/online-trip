<?php
namespace Modules\Homestay\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Homestay;
use App\Admin;
use File;
use Session;
use Auth;
use DB;
class HomestayController extends Controller
{
    public function create(Request $request)
    {
     if(Auth::guard('admin')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('homestay.create').'">Homestay Create</a></li>';
          $data['menu_active']='homestay';
          $data['submenu_active']='homestayadd';
          return view('homestay::index',$data);
     }
     if($request->isMethod('post')){
           
          $rules=[
            'hname'          => 'required',
            'is_verified'    =>'required', 
            'bname'          =>'required',
            'anumber'        =>'required',
            'email'          =>'required|unique:homestayhotels',        
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'rating'         =>'required',
            'type'           =>'required',
            'trooms'         =>'required|integer',
            'description'    =>'required',
            'area'           =>'required',
            'city'           =>'required',
            'country'        =>'required',
            'cperson'        =>'required',
            'phone'          =>'required',
            'mobile'         =>'required',
            'checkin'        =>'required',
            'checkout'       =>'required',
            'latitude'       =>'required',
            'longitude'      =>'required',
            'basecurrency'   =>'required',
             'special'       =>'required',
             'baseprice'     =>'required',
          
             ];
        $messages =[
            'hname.required'     =>'Hotel Name is required',
            'is_verified'        =>'Is Verified is required',
            'bname.required'     =>'Bank Name is required',
            'anumber.required'   =>'Account Number is required',
            'email.required'     =>'Email is required',
            'email.unique'       =>'Email Already Exists',
            'images.*.mimes'     => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'        =>'Image size not exceed to be 200kb', 
            'rating.required'    =>'Rating is required',
            'type.required'      => 'Hotel type is required',
            'trooms'             =>'Total Number of Rooms Required',
            'trooms.integer'     =>'Number of rooms should be integer',
            'description.required'=> 'Description is required',
            'area.required'      => 'Area Name is required',
            'city.required'      => 'City Name is required',
            'country.required'   =>'Country Name is required',
            'cperson.required'   => 'Contact Person Name is required',
            'phone.required'     => 'Phone is required',
            'phone.digits'       =>'Invalid Phone Digit.It should be 9 Digit',
            'mobile.required'    => 'Mobile is required',
            'mobile.digits'      =>'Invalid Mobile Digit.It Should be 10 Digit',
            'checkin.required'   =>'Checkin Time is Required',
            'checkout.required'  =>'Checkout Time is Required',
            'latitude.required'  =>'Latitude is Required',
            'longitude.required' =>'Longitude is required',
            'basecurrency.required'       =>'Basecurrency is required',
            'special.required'       =>'Special type is required',
            'baseprice.required'     =>'Base Price is Required',
           
        ];
     
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('homestay/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
          
         $homestay['hname']       =$request->get('hname');
         $homestay['is_verified'] =$request->get('is_verified');
         $homestay['bname']       =$request->get('bname');
         $homestay['anumber']     =$request->get('anumber');
         $homestay['email']       =$request->get('email');
         $homestay['rating']      =$request->get('rating');
         $homestay['type']        =$request->get('type');
         $homestay['trooms']      =$request->get('trooms');
         $homestay['description'] =$request->get('description');
         $homestay['area']        =$request->get('area');
         $homestay['city']        =$request->get('city');
         $homestay['country']     =$request->get('country');
         $homestay['cperson']     =$request->get('cperson');
         $homestay['phone']       =$request->get('phone');
         $homestay['mobile']      =$request->get('mobile');
         $homestay['checkin']     =$request->get('checkin');
         $homestay['checkout']    =$request->get('checkout');
         $homestay['latitude']    =$request->get('latitude');
         $homestay['longitude']   =$request->get('longitude');
         $homestay['basecurrency']=$request->get('basecurrency');
         $homestay['special_type']=$request->get('special');
         $homestay['baseprice']   =$request->get('baseprice'); 
        if($request->hasFile('images')){
            $images=$request->file('images');
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
            if($request->get('services')==null)
            {
               $homestay['amenitiesnservices']=Null;
              }
              else
              {
               $services= implode(",", $request->get('services'));
               $homestay['amenitiesnservices']=$services;
             }
        
         $homestay['created_by']=Auth::guard('admin')->user()->id;
        if(Homestay::create($homestay)){
              if($request->input('submit&create')){
               return redirect('homestay/create')->with('success_msg','Homestay Created Successfully!!');
        }   
     }else{
        return redirect('homestay/create')->with('error_msg','Homestay Not Created');
     }
   }
 }else{
        return redirect('admin');
     }   
     
  }

  public function list(){
    if(Auth::guard('admin')->check()){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('homestay.list').'">Homestay List</a></li>';
          $data['homestays']=Homestay::where('del_flag', '0')->paginate(20);
          $data['menu_active']='homestay';
          $data['submenu_active']='homestaylist';
          return view('homestay::homestaylist',$data);
     
   }else{
    return redirect('admin');
   }
 }
 
 public function edit(Request $request ,$id){
    if(Auth::guard('admin')->check()){
    if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('homestay.create').'">Homestay Create</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('homestay.list').'">Homestay List</a></li>';
          $data['homestay']=Homestay::find($id);
          $data['services']=explode(',',$data['homestay']->amenitiesnservices);
          $data['images']=explode(',',$data['homestay']->image);
          $data['menu_active']='homestay';
          $data['submenu_active']='homestayedit';
          return view('homestay::homestayedit',$data);
     }
     if($request->isMethod('post')){
     $rules=[
            'hname'          => 'required',
            'is_verified'   =>'required', 
            'bname'          =>'required',
            'anumber'        =>'required',
            'email'          =>'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:1024',
            'rating'         =>'required',
            'type'           =>'required',
            'trooms'         =>'required',
            'description'    =>'required',
            'area'           =>'required',
            'city'           =>'required',
            'state'          =>'required',
            'country'        =>'required',
            'cperson'        =>'required',
            'phone'          =>'required',
            'checkin'        =>'required',
            'checkout'       =>'required',
            'latitude'       =>'required',
            'longitude'      =>'required',
            'basecurrency'   =>'required',
            'special'        =>'required',
            'baseprice'      =>'required',  
             ];
        $messages =[
            'hname.required' =>'Hotel Name is required',
            'is_verified.required'=>'Please Select Verified', 
            'bname.required' =>'Bank Name is required',
             'anumber.required' =>'Account Number is required',
            'email.required' =>'Email is required',
            'email.unique'   =>'Email should be unique',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'rating.required' =>'Rating is required',
            'type.required' => 'Hotel type is required',
            'trooms.required'=>'Total Number of Rooms Required',
            'description.required' => 'Description is required',
            'area.required' => 'Area Name is required',
            'city.required' => 'City Name is required',
            'state.required'=>'State is required',
            'country.required'  =>'Country Name is required',
            'cperson.required' => 'Contact Person Name is required',
            'phone.required' => 'Phone is required',
            'mobile.required'=>'Mobile is Required',
            'checkin.required'   =>'Checkin Time is Required',
            'checkout.required'  =>'Checkout Time is Required',
            'latitude.required'  =>'Latitude is Required',
            'longitude.required' =>'Longitude is required',
            'basecurrency.required'       =>'Basecurrency is required',
            'specialtype.required'        =>'Special type is required',
            'baseprice.required' =>'Baseprice is required',

        ];
        
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('homestay/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
        
         $homestay['hname']       =$request->get('hname');
         $homestay['is_verified'] =$request->get('is_verified');
         $homestay['bname']       =$request->get('bname');
         $homestay['anumber']     =$request->get('anumber');
         $homestay['email']       =$request->get('email');
         $homestay['rating']      =$request->get('rating');
         $homestay['type']        =$request->get('type');
         $homestay['trooms']      =$request->get('trooms');
         $homestay['description'] =$request->get('description');
         $homestay['area']        =$request->get('area');
         $homestay['city']        =$request->get('city');
         $homestay['state']       =$request->get('state');
         $homestay['country']     =$request->get('country');
         $homestay['cperson']     =$request->get('cperson');
         $homestay['phone'] =$request->get('phone');
         $homestay['mobile'] =$request->get('mobile');
         $homestay['checkin']     =$request->get('checkin');
         $homestay['checkout']    =$request->get('checkout');
         $homestay['latitude']    =$request->get('latitude');
         $homestay['longitude']   =$request->get('longitude');
         $homestay['basecurrency']=$request->get('basecurrency');
         $homestay['special_type'] =$request->get('special');
         $homestay['baseprice']    =$request->get('baseprice');  
        if($request->hasFile('images')){
            File::delete('triporbitz/public/images/'.$request->input('old_homestay_image'));
            $images=$request->file('images');
            foreach($images as $image){
            $image_upload_path=public_path('/images/');
            $image_file_extension=$image->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
            $image->move($image_upload_path,$image_filename);
            $pimages[]=$image_filename; 
            }
          }else{
            $pimages[]=$request->input('old_homestay_image');
          }
         $fimage= implode("," ,$pimages);
         $homestay['image']=$fimage;
         $services= implode(",", $request->get('services'));
         $homestay['amenitiesnservices']=$services;
         $homestay['updated_by']=Auth::guard('admin')->user()->id;
        if(Homestay::find($request->get('homestay_id'))->update($homestay)){
              if($request->input('submit&edit')){
               return redirect('homestay/list')->with('success_msg',' Edited Successfully!!');
              }
     }
     return back()->with('error_msg','Something is wrong!!');

   }
 }else{
        return redirect('admin');
     }   
     
  }

  public function remove($id){
      if(Auth::guard('admin')->check()){
        $data=[];
        $data['deleted_by']=Auth::guard('admin')->user()->id;
        $data['deleted_at']=date('Y-m-d h:i:s');
        $data['del_flag']='1';
               if(Homestay::find($id)->update($data)){
            return redirect('homestay/list')->with('success_msg','Deleted Successfully!!');
        }
      }else{
        return redirect('admin');
        
  }
}

 public function search(Request $request){
    $name  =$request->srcText;
    $listing =DB::table('homestayhotels')
                                ->select('id','hname','bname','anumber','area','city','cperson','email','phone','rating','type','is_verified')
                                ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($name){
                         $query->where('hname','like','%'.$name.'%')
                               ->orWhere('area','like','%'.$name.'%')
                               ->orWhere('city','like','%'.$name.'%')
                               ->orWhere('cperson','like','%'.$name.'%');
                               
                         })
                          ->paginate(20);
        
                           $html='';
                           $sn=1;
                               if($listing->count()>0){
                               foreach($listing as $list){
                                $html.='<tr>';
                                $html.='<td class="sorting_1">'.$sn++.'</td>';
                                $html.='<td>'.$list->hname.'</td>';
                                $html.='<td>'.($list->is_verified=='y'?'Yes':'No').'</td>';
                                $html.='<td>'.$list->bname.'</td>';
                                $html.='<td>'.$list->anumber.'</td>';
                                $html.='<td>'.$list->city.'</td>';
                                $html.='<td>'.$list->cperson.'</td>';
                                $html.='<td>'.$list->email.'</td>';
                                $html.='<td>'.$list->phone.'</td>';
                                $html.='<td>'.($list->type=='h'?'Hotel':'Homestay').'</td>';
                                $html.='<td><a href="'.route('homestay.edit',[$list->id]).'" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';     
                                $html.='                             
                                      <a href="'.route('homestay.remove',[$list->id]).'" style="color:#a83521;font-size:20px" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="jquery-postback" ><i class="fa fa-trash" aria-hidden="true" onclick="if(!confirm(\'Are you sure to delete this Journal?\')){ return false; }"></i>
                                      </a>
                                    </td>';
                                  $html.='</tr>';              
                              }
                               echo $html;
                            }else{
                              echo '<tr><td colspan="10"><h3 class="text-center" style="color:red">Data Not found</h3></td></tr>';
                            }
                           
                     }
           
               public function sort(Request $request){
                 if($request->type =='s'){
               $listing =DB::table('homestayhotels')
                         ->select('id','hname','bname','anumber','area','city','cperson','email','phone','rating','type')
                         ->where('del_flag','=','0')
                         ->where('type','=','s')
                         ->orderBy('id','desc')
                         ->paginate(20);
                     }
                      if($request->type =='h'){
               $listing =DB::table('homestayhotels')
                         ->select('id','hname','bname','anumber','area','city','cperson','email','phone','rating','type')
                         ->where('del_flag','=','0')
                         ->where('type','=','h')
                         ->orderBy('id','desc')
                         ->paginate(20);
                     }
                      if($request->type =='all'){
               $listing =DB::table('homestayhotels')
                         ->select('id','hname','bname','anumber','area','city','cperson','email','phone','rating','type')
                         ->where('del_flag','=','0')
                         ->orderBy('id','desc')
                         ->paginate(20);
                     }
                 
                                $html='';
                                $sn=1;
                               if($listing->count()>0){
                               foreach($listing as $list){
                                $html.='<tr>';
                                $html.='<td class="sorting_1">'.$sn++.'</td>';
                                $html.='<td>'.$list->hname.'</td>';
                                $html.='<td>'.$list->bname.'</td>';
                                $html.='<td>'.$list->anumber.'</td>';
                                $html.='<td>'.$list->city.'</td>';
                                $html.='<td>'.$list->cperson.'</td>';
                                $html.='<td>'.$list->email.'</td>';
                                $html.='<td>'.$list->phone.'</td>';
                                $html.='<td>'.($list->type=='h'?'Hotel':'Homestay').'</td>';
                                $html.='<td><a href="'.route('homestay.edit',[$list->id]).'" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';     
                                $html.='                             
                                      <a href="'.route('homestay.remove',[$list->id]).'" style="color:#a83521;font-size:20px" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="jquery-postback" ><i class="fa fa-trash" aria-hidden="true" onclick="if(!confirm(\'Are you sure to delete this Journal?\')){ return false; }"></i>
                                      </a>
                                    </td>';
                                  $html.='</tr>';              
                              }
                               echo $html;
                            }else{
                              echo '<tr><td colspan="10"><h3 class="text-center" style="color:red">Data Not found</h3></td></tr>';
                            }
                           

                }
     


}