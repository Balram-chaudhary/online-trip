<?php
namespace Modules\Buses\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Bus;
use App\Admin;
use File;
use Session;
use Auth;
use DB;
class BusesController extends Controller
{
 
 public function create(Request $request)
{
     if(Auth::guard('admin')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('buses.create').'">Buses Create</a></li>';
          $data['menu_active']='buses';
          $data['submenu_active']='busesadd';
          return view('buses::index',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'oname'          => 'required',
            'bnumber'        =>'required',
            'seats.*'        =>'required',
            'images'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:1024',
            'type'           =>'required',
            'shift'          =>'required',
            'price'          =>'required',
            'simages.*'        =>'required',
            'tseat'          =>'required',
            'bpoints'        =>'required',
            'from'           =>'required',
            'to'             =>'required',
            'atime'          =>'required',
            'dtime'          =>'required',
             ];
        $messages =[
            'oname.required'   =>'Operator Name is required',
            'bnumber.required' =>'Bus Number is required',
            'seats.*.required' =>'Selection of Sheets is required',
            'images.mimes'   => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'      =>'Image size not exceed to be 200kb', 
            'type.required'    => 'Bus type is required',
            'shift.required'   =>'Shift Selection Required',
            'price.required'   => 'Price is required',
            'simages.*.required' =>'Seat Image is required',
             'tseat'            =>'Total Seat is required',
             'bpoints.*'         =>'Bording Points is required', 
            'from.required'    => 'Origin Location is required',
            'to.required'      =>'Destination Location is required',
            'atime.required' => ' Arrival Time is required',
            'dtime.required' => ' Departure Time is required',
           ];
            
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('buses/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         if($request->get('sheets')==null){
           $buses['seats']=NULL;
         }else{
           $buses['seats'] =implode(",", $request->get('sheets'));
         }
         $buses['oname']       =$request->get('oname');
         $buses['bnumber']     =$request->get('bnumber');
         $buses['type']        =$request->get('type');
         $buses['shift']       =$request->get('shift');
         $buses['price']       =$request->get('price');
         $buses['from_loc']    =$request->get('from');
         $buses['to_loc']      =$request->get('to');
         $buses['atime']        =$request->get('atime');
         $buses['dtime']        =$request->get('dtime');
         if($request->hasFile('images')){
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
           }
           
         $buses['image']=$image_filename;
         
          if($request->hasFile('simages')){
            $images=$request->file('simages');
            if(is_array($images)){
              foreach($images as $simage){
            $simage_upload_path=public_path('/images/');
            $image_file_extension=$simage->getClientOriginalExtension();
            $simage_filename  = time() . '-' .rand(111111,999999).'.'.$simage->getClientOriginalExtension();
            $simage->move($simage_upload_path,$simage_filename);
            $pimages[]=$simage_filename;
            }
            $fimage= implode("," ,$pimages);
            $buses['s_images']=$fimage;
          }else{
             $buses['s_images']=$simage_filename;
          }

        }
        $buses['t_seats']=$request->get('tseat');
        $bpoints=implode(',',$request->get('bpoints'));
        $buses['b_points']=$bpoints;
        $buses['created_by']=Auth::guard('admin')->user()->id;
        if(Bus::create($buses)){
              if($request->input('submit&create')){
               return redirect('buses/create')->with('success_msg','Buses Created Successfully!!');
        }   
     }else{
        return redirect('Buses/create')->with('error_msg','Buses Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('buses.list').'">Bus List</a></li>';
          $data['buses']=Bus::where('del_flag', '0')->paginate(20);
          $data['menu_active']='buses';
          $data['submenu_active']='buseslist';
          return view('buses::buseslist',$data);
     
   }else{
    return redirect('admin');
   }
 }
 

 public function edit(Request $request ,$id)
{
     if(Auth::guard('admin')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('buses.list').'">Buses List</a></li>';
          $data['buses']=Bus::find($id);
          $data['sheets']=explode(',',$data['buses']->seats);
          $data['simages']=explode(',',$data['buses']->s_images);
          $data['bpoints']=explode(',',$data['buses']->b_points);
          $data['menu_active']='buses';
          $data['submenu_active']='busesedit';
          return view('buses::busesedit',$data);
     }
     if($request->isMethod('post')){
            $rules=[
             'oname'          => 'required',
            'bnumber'        =>'required',
            'seats.*'        =>'required',
            'type'           =>'required',
            'shift'          =>'required',
            'price'          =>'required',
            'tseat'          =>'required',
            'bpoints'        =>'required',
            'from'           =>'required',
            'to'             =>'required',
            'atime'          =>'required',
            'dtime'          =>'required',
             ];
        $messages =[
             'oname.required'   =>'Operator Name is required',
            'bnumber.required' =>'Bus Number is required',
            'seats.*.required' =>'Selection of Sheets is required', 
            'type.required'    => 'Bus type is required',
            'shift.required'   =>'Shift Selection Required',
            'price.required'   => 'Price is required',
             'tseat'            =>'Total Seat is required',
             'bpoints.*'         =>'Bording Points is required', 
            'from.required'    => 'Origin Location is required',
            'to.required'      =>'Destination Location is required',
            'atime.required' => ' Arrival Time is required',
            'dtime.required' => ' Departure Time is required',
           ];
         
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('buses/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
        
     
         if($request->get('sheets')==null){
           $buses['seats']=NULL;
         }else{
           $buses['seats'] =implode(",", $request->get('sheets'));
         }

         $buses['oname']       =$request->get('oname');
         $buses['bnumber']     =$request->get('bnumber');
         $buses['type']        =$request->get('type');
         $buses['shift']       =$request->get('shift');
         $buses['price']       =$request->get('price');
         $buses['from_loc']    =$request->get('from');
         $buses['to_loc']      =$request->get('to');
         $buses['atime']        =$request->get('atime');
         $buses['dtime']        =$request->get('dtime');
         if($request->hasFile('images')){
            File::delete('triporbitz/public/images/'.$request->input('old_buses_image'));
            $images=$request->file('images');
            $image_upload_path=public_path('/images/');
            $image_file_extension=$images->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$images->getClientOriginalExtension();
            $images->move($image_upload_path,$image_filename);
            $buses['image']=$image_filename;
           }else{
            $buses['image']=$request->input('old_buses_image');

           }
          if($request->hasFile('simages')){
            File::delete('triporbitz/public/images/'.$request->input('old_buses_simage'));
            $images=$request->file('simages');
            foreach($images as $simage){
            $simage_upload_path=public_path('/images/');
            $simage_file_extension=$simage->getClientOriginalExtension();
            $simage_filename  = time() . '-' .rand(111111,999999).'.'.$simage->getClientOriginalExtension();
            $simage->move($simage_upload_path,$simage_filename);
            $pimages[]=$simage_filename; 
            }
          }else{
            $pimages[]=$request->input('old_buses_simage');
          }
            $fimage= implode("," ,$pimages);
         $buses['s_images']=$fimage;

 
         if(is_array($request->get('bpoints'))){
         $buses['b_points']=implode(',',$request->get('bpoints'));
          }else{
          $buses['b_points']=$request->get('bpoints');  
           }
          $buses['t_seats']=$request->get('tseat');
         $buses['updated_by']=Auth::guard('admin')->user()->id;

         if(Bus::find($request->get('buses_id'))->update($buses)){
              if($request->input('submit&edit')){
               return redirect('buses/list')->with('success_msg',' Edited Successfully!!');
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
        if(Bus::find($id)->update($data)){
            return redirect('buses/list')->with('success_msg','Deleted Successfully!!');
        }
      }else{
        return redirect('admin');
        
  }
}

 public function search(Request $request){
    $name  =$request->srcText;
    $listing =DB::table('buses')
                                ->select('id','oname','type','shift','seats','bnumber','price','atime','dtime','from_loc','to_loc')
                                ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($name){
                         $query->where('oname','like','%'.$name.'%')
                               ->orWhere('type','like','%'.$name.'%')
                               ->orWhere('shift','like','%'.$name.'%')
                               ->orWhere('from_loc','like','%'.$name.'%')
                               ->orWhere('to_loc','like','%'.$name.'%');

                               
                         })
                          ->paginate(20);
                           $html='';
                           $sn=1;
                               if($listing->count()>0){
                               foreach($listing as $list){
                                 $t_seats=array();
                                 $t_seats= explode(',',$list->seats);
                                $html.='<tr>';
                                $html.='<td class="sorting_1">'.$sn++.'</td>';
                                $html.='<td>'.$list->oname.'</td>';
                                $html.='<td>'.($list->type=='a'? 'AC':'Non AC').'</td>';
                                $html.='<td>'.($list->shift=='d'?'Day':($list->shift=='n'?'Night':'Both')).'</td>';
                                $html.='<td>'.$list->bnumber.'</td>';
                                $html.='<td>'.count($t_seats).'</td>';
                                $html.='<td>'.$list->price.'</td>';
                                $html.='<td>'.$list->atime.'</td>';
                                $html.='<td>'.$list->dtime.'</td>';
                                $html.='<td>'.$list->from_loc.'</td>';
                                 $html.='<td>'.$list->to_loc.'</td>';
                                $html.='<td><a href="'.route('buses.edit',[$list->id]).'" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';     
                                $html.='                             
                                      <a href="'.route('buses.remove',[$list->id]).'" style="color:#a83521;font-size:20px" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="jquery-postback" ><i class="fa fa-trash" aria-hidden="true" onclick="if(!confirm(\'Are you sure to delete this Journal?\')){ return false; }"></i>
                                      </a>
                                    </td>';
                                  $html.='</tr>';              
                              }
                               echo $html;
                            }else{
                              echo '<tr><td colspan="12"><h3 class="text-center" style="color:red">Data Not found</h3></td></tr>';
                            }
                           
                     }
           
    

}
