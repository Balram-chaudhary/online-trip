<?php
namespace Modules\Price\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use Validator;
use File;
use Session;
use App\Homestay;
use App\Roomtype;
use App\Price;
use DB;
class PriceController extends Controller
{
    public function create(Request $request)
    {
     if(Auth::guard('admin')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('price.create').'">Price Create</a></li>';
          $data['hotels']       = Homestay::where('del_flag','=','0')->pluck('hname','id')->all();
          $data['menu_active']='homestay';
          $data['submenu_active']='priceadd';
          return view('price::index',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'hotels'        =>'required', 
            'rtype'         =>'required',
            'price'         =>'required',
            'vat'           =>'required',
            'servicetax'    =>'required',
            'hotelcharge'   =>'required',
            'discount'      =>'required',
            'traveltax'     =>'required'
             ];
        $messages =[
            'hotels.required' =>'Hotel is required',
            'rtype.required' =>'Room Type is required',
            'price.required' =>'Price is required',
            'vat.required'=>'Vat required',
            'servicetax.required'=>'ServiceTax is required',
            'hotelcharge'        =>'Hotel Charge is required',
            'traveltax'          =>'Travel Tax is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('price/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
      
        

         $price['rtype_id']      =$request->get('rtype');
         $price['hotel_id']      = $request->get('hotels');
         $price['price']         = $request->get('price');
         $price['vat']           = $request->get('vat');
         $price['service_tax']   = $request->get('servicetax');
         $price['hotelcharge']   =$request->get('hotelcharge');
         $price['discount']      =$request->get('discount');
         $price['traveltax']      =$request->get('traveltax');
         $price['created_by']     =Auth::guard('admin')->user()->id;
        if(Price::create($price)){
              if($request->input('submit&create')){
               return redirect('price/create')->with('success_msg','Price Created Successfully!!');
        }   
     }else{
        return redirect('price/create')->with('error_msg','Price Not Created');
     }
   }
 }else{
        return redirect('admin');
     }   
     
  }

  public function dynamicsort(Request $request)
    {
      if(Auth::guard('admin')->check()){
        $roomtypes = DB::table('roomtypes')->where('del_flag','=','0')->where('hotel_id','=',$request->type)->pluck("rtype","id")->all();
        $data = view('price::ajax',compact('roomtypes'))->render();
        return response()->json(['options'=>$data]);
      }
}

 public function list(){
    if(Auth::guard('admin')->check()){
          $data=[];
          $data['breadcrumbs'] ='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('price.list').'">Price List</a></li>';
          $data['price']  =DB::table('price')
                                 ->join('homestayhotels', 'price.hotel_id', '=', 'homestayhotels.id')
                                 ->join('roomtypes', 'price.rtype_id', '=', 'roomtypes.id')
                                 ->select('price.*','homestayhotels.hname','roomtypes.rtype')
                                 ->where('price.del_flag','=','0')
                                 ->orderBy('id','desc')
                                 ->paginate(20);
         
          $data['menu_active']='homestay';
          $data['submenu_active']='pricelist';                      
          return view('price::pricelist',$data);
     
      }else{
        return redirect('admin');
      }
    }

   public function edit(Request $request,$id){
   if(Auth::guard('admin')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('price/edit/'.$id).'">Price Edit</a></li>';
          $data['price'] =Price::find($id);
          $data['hotels'] = Homestay::pluck('hname','id')->toArray();
          $data['roomtype'] = Roomtype::pluck('rtype','id')->toArray();
          $data['menu_active']='homestay';
          $data['submenu_active']='priceedit';
          return view('price::priceedit',$data);
     }
     if($request->isMethod('post')){
      $rules=[
            'hotels'        =>'required', 
            'rtype'         =>'required',
            'price'         =>'required',
            'vat'           =>'required',
            'servicetax'    =>'required',
            'hotelcharge'   =>'required',
            'discount'      =>'required',
            'traveltax'     =>'required'
             ];
        $messages =[
            'hotels.required' =>'Hotel is required',
            'rtype.required' =>'Room Type is required',
            'price.required' =>'Price is required',
            'vat.required'=>'Vat required',
            'servicetax.required'=>'ServiceTax is required',
            'hotelcharge'        =>'Hotel Charge is required',
            'traveltax'          =>'Travel Tax is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('price/create')
                        ->withErrors($validator)
                        ->withInput();               
        }

         $price['rtype_id']      =$request->get('rtype');
         $price['hotel_id']      =$request->get('hotels');
         $price['price']         =$request->get('price');
         $price['vat']           =$request->get('vat');
         $price['service_tax']   =$request->get('servicetax');
         $price['hotelcharge']   =$request->get('hotelcharge');
         $price['discount']      =$request->get('discount');
         $price['traveltax']     =$request->get('traveltax');
         $price['created_by']    =Auth::guard('admin')->user()->id;
       if(Price::find($request->get('price_id'))->update($price)){
              if($request->input('submit&update')){
               return redirect('price/list')->with('success_msg','Price Updated Successfully!!');
        }   
     }else{
        return redirect('price/list')->with('error_msg','Price Not Updated');
     }
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
        if(Price::find($id)->update($data)){
            return redirect('price/list')->with('success_msg','Deleted Successfully!!');
        }
        
       }
       
  }
  public function search(Request $request){

   $name  =$request->srcText;
      $listing =DB::table('price')
                                 ->join('homestayhotels', 'price.hotel_id', '=', 'homestayhotels.id')
                                 ->join('roomtypes', 'price.rtype_id', '=', 'roomtypes.id')
                                 ->select('price.*','homestayhotels.hname','roomtypes.rtype')
                                 ->where('price.del_flag','=','0')
                                 ->orderBy('id','desc')
              
                ->where(function($query) use ($name){
                         $query->where('hname','like','%'.$name.'%')
                               ->orWhere('rtype','like','%'.$name.'%')
                               ->orWhere('price','like','%'.$name.'%');     
                        })
                          ->paginate(20);
                           $html='';
                           $sn=1;
                               if($listing->count()>0){
                               foreach($listing as $list){
                                $html.='<tr>';
                                $html.='<td class="sorting_1">'.$sn++.'</td>';
                                $html.='<td>'.$list->hname.'</td>';
                                $html.='<td>'.($list->rtype=='s'? 'Single':($list->rtype =='d'? 'Double':($list->rtype =='t'? 'Triple':($list->rtype =='qd'?'Quad':($list->rtype =='q'?'Queen':($list->rtype=='k'?'King':($list->rtype=='tw'?'Twin':($list->rtype=='dd'?'Double Double':'Studio')))))))).'</td>';
                                $html.='<td>'.$list->price.'</td>';
                                $html.='<td>'.$list->traveltax.'</td>';
                              
                                $html.='<td><a href="'.route('price.edit',[$list->id]).'" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';     
                                $html.='                             
                                      <a href="'.route('price.remove',[$list->id]).'" style="color:#a83521;font-size:20px" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="jquery-postback" ><i class="fa fa-trash" aria-hidden="true" onclick="if(!confirm(\'Are you sure to delete this Journal?\')){ return false; }"></i>
                                      </a>
                                    </td>';
                                  $html.='</tr>';              
                              }
                               echo $html;
                            }else{
                              echo '<tr><td colspan="6"><h3 class="text-center" style="color:red">Data Not found</h3></td></tr>';
                            }
                           
                     }
  
}
