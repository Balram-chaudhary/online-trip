<?php
namespace Modules\Roomtype\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Roomtype;
use App\User;
use App\Homestay;
use File;
use Session;
use Auth;
use DB;
class RoomtypeController extends Controller
{
 public function create(Request $request)
    {
     if(Auth::guard('admin')->user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('roomtype.create').'">Room Type  Create</a></li>';
          $data['hotels']     = Homestay::where('del_flag','=','0')->where('is_verified','=','y')->pluck('hname','id')->toArray();
          $data['menu_active']='homestay';
          $data['submenu_active']='roomtypeadd';
        
          return view('roomtype::index',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'hotels'          =>'required', 
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:500',
            'rtype'          =>'required',
            'nrooms'         =>'required',
            'nadults'        =>'required',
            'nchildrens'        =>'required',
            'price'          =>'required',  
             ];
        $messages =[
            'hotels.required' =>'Hotel is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 500kb', 
            'rtype.required' =>'Room Type is required',
            'nrooms.required' =>'Number of Rooms is required',
            'nadults.required'=>'Number of Adults is required',
            'nchildrens.required'=>'Number of Childrens is required',
            'price.required'     =>'price is required',
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('roomtype/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
          if($request->hasFile('images')){
              $images=$request->file('images');
 
              $image_upload_path=public_path('/images/');
              $image_file_extension=$images->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
              $images->move($image_upload_path,$image_filename);
            
              $roomtype['rimage']=$image_filename;
             
          }
         
         $roomtype['hotel_id']   =$request->get('hotels');
         $roomtype['rtype']      =$request->get('rtype');
         $roomtype['nrooms']     =$request->get('nrooms');
         $roomtype['nadults']    =$request->get('nadults');
         $roomtype['nchildrens'] =$request->get('nchildrens');
         $roomtype['price']      =$request->get('price'); 
         $roomtype['created_by'] =Auth::guard('admin')->user()->id;
        if(Roomtype::create($roomtype)){
              if($request->input('submit&create')){
               return redirect('roomtype/create')->with('success_msg','Room Type Created Successfully!!');
        }   
     }else{
        return redirect('roomtype/create')->with('error_msg','Room Type Not Created');
     }
   }
 }else{
        return redirect('admin');
     }   
     
  }


  public function list(){
    if(Auth::guard('admin')->user()){
          $data=[];
          $data['breadcrumbs'] ='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('roomtype.list').'">Homestay List</a></li>';
          $data['roomtype']  =DB::table('roomtypes')
                                 ->join('homestayhotels', 'roomtypes.hotel_id', '=', 'homestayhotels.id')
                                 ->select('roomtypes.*','homestayhotels.hname')
                                 ->where('homestayhotels.is_verified','=','y')
                                 ->where('homestayhotels.del_flag','=','0')
                                 ->where('roomtypes.del_flag','=','0')
                                 ->orderBy('id','desc')
                                 ->paginate(20);
         $data['menu_active']='homestay';
         $data['submenu_active']='roomtypeadd';                      
          return view('roomtype::roomtypelist',$data);
     
      }else{
        return redirect('admin');
      }
    }

    public function edit(Request $request ,$id){
        if(Auth::guard('admin')->user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.url('roomtype/edit/'.$id).'">Room Type  Create</a></li>';
          $data['roomtype'] =Roomtype::find($id);
          $data['images']=explode(',',$data['roomtype']->rimage);
          $data['hotels'] = Homestay::where('del_flag','=','0')->where('is_verified','=','y')->pluck('hname','id')->toArray();
          $data['menu_active']='homestay';
          $data['submenu_active']='roomtypeedit';
          return view('roomtype::roomtypeedit',$data);
     }
    if($request->isMethod('post')){
            $rules=[
            'hotels'          =>'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:500', 
            'rtype'          =>'required',
            'nrooms'         =>'required',
            'nadults'        =>'required',
            'nchildrens'        =>'required',
            'price'            =>'required'
             ];
        $messages =[
            'hotels.required' =>'Hotel is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 500kb', 
            'rtype.required' =>'Room Type is required',
            'nrooms.required' =>'Number of Rooms is required',
            'nadults.required'=>'Number of Adults is required',
            'nchildrens.required'=>'Number of Childrens is required',
            'price.required'     =>'Price is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('roomtype/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
          if($request->hasFile('images')){
            File::delete(public_path('/images/'.$request->input('old_roomtype_image')));
              $images=$request->file('images');
              
              $image_upload_path=public_path('/images/');
              $image_file_extension=$images->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
              $images->move($image_upload_path,$image_filename);
              
        $roomtype['rimage']     =$fimage;
}
         $roomtype['hotel_id']   =$request->get('hotels');
         $roomtype['rtype']      =$request->get('rtype');
         $roomtype['nrooms']     =$request->get('nrooms');
         $roomtype['nadults']    =$request->get('nadults');
         $roomtype['nchildrens'] =$request->get('nchildrens');
         $roomtype['price']      =$request->get('price');
         $roomtype['created_by'] =Auth::guard('admin')->user()->id;
       
        if(Roomtype::find($request->get('roomtype_id'))->update($roomtype)){
              if($request->input('submit&update')){
               return redirect('roomtype/list')->with('success_msg','Room Type Updated Successfully!!');
        }   
     }
     return back()->with('error_msg','Something is wrong!!');

   }
 }else{
        return redirect('admin');
     }  

  
}
 public function remove($id){
    if(Auth::guard('admin')->user()){
       $data=[];
        $data['deleted_by']=Auth::guard('admin')->user()->id;
        $data['deleted_at']=date('Y-m-d h:i:s');
        $data['del_flag']='1';
        if(Roomtype::find($id)->update($data)){
            return redirect('roomtype/list')->with('success_msg','Deleted Successfully!!');
        }
     }else{
      return redirect('admin');
     }    
        
  }

      public function search(Request $request){
      $name  =$request->srcText;

      $listing =DB::table('roomtypes')
                ->join('homestayhotels', 'roomtypes.hotel_id', '=', 'homestayhotels.id')
                ->select('roomtypes.id','roomtypes.nrooms','roomtypes.rtype','roomtypes.nadults','roomtypes.nchildrens','homestayhotels.hname')
                ->where('homestayhotels.is_verified','=','y')
                ->where('homestayhotels.del_flag','=','0')
                ->where('roomtypes.del_flag','=','0')
                ->orderBy('id','desc')
                ->where(function($query) use ($name){
                         $query->where('hname','like','%'.$name.'%')
                               ->orWhere('rtype','like','%'.$name.'%');   
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
                                $html.='<td>'.$list->nrooms.'</td>';
                                $html.='<td>'.$list->nadults.'</td>';
                                $html.='<td>'.$list->nchildrens.'</td>';
                                $html.='<td><a href="'.route('roomtype.edit',[$list->id]).'" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';     
                                $html.='                             
                                      <a href="'.route('roomtype.remove',[$list->id]).'" style="color:#a83521;font-size:20px" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="jquery-postback" ><i class="fa fa-trash" aria-hidden="true" onclick="if(!confirm(\'Are you sure to delete this Journal?\')){ return false; }"></i>
                                      </a>
                                    </td>';
                                  $html.='</tr>';              
                              }

                               echo $html;
                            }else{
                              echo '<tr><td colspan="7"><h3 class="text-center" style="color:red">Data Not found</h3></td></tr>';
                            }
                           
                     }


}
