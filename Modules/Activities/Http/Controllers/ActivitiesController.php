<?php
namespace Modules\Activities\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Activities;
use App\Admin;
use File;
use Session;
use Auth;
use DB;
class ActivitiesController extends Controller
{
public function create(Request $request)
{
     if(Auth::guard('admin')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('activities.create').'">Activities Create</a></li>';
           $data['menu_active']='activities';
        $data['submenu_active']='activitiesadd';
          return view('activities::index',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'aname'          => 'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:1024',
            'type'           =>'required',
            'description'    =>'required',
            'add_info'       =>'required',
            'price'          =>'required',
            'area'           =>'required',
            'city'           =>'required',
            'country'        =>'required',
            'nadults'        =>'required',
            'nchilds'        =>'required',
            'ispopular'      =>'required',
            'pickuptime'     =>'required',  
             ];
        $messages =[
            'aname.required'       =>'Activities Name is required',
            'images.*.mimes'       => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'          =>'Image size not exceed to be 200kb', 
            'type.required'        => 'Hotel type is required',
            'description.required' => 'Description is required',
            'add_info.required'    => 'Additional Information is required',
            'area.required'        => 'Area Name is required',
            'city.required'        => 'City Name is required',
            'country.required'     =>'Country Name is required', 
            'nadults.required'     => ' Number of Adults is required',
            'nchilds.required'     => ' Number of Childs is required',
            'ispopular.required'   =>'Is Popular is required',
            'pickuptime'           =>'Pickup Time is required', 
           ];
          
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('activities/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         
         $activities['aname']       =$request->get('aname');
         $activities['type']        =$request->get('type');
         $activities['description'] =$request->get('description');
         $activities['add_info']    =$request->get('add_info');
         $activities['price']       =$request->get('price');
         $activities['area']        =$request->get('area');
         $activities['city']        =$request->get('city');
         $activities['country']     =$request->get('country');
         $activities['nadults']     =$request->get('nadults');
         $activities['nchilds']     =$request->get('nchilds');
         $activities['hour']        =$request->get('hour');
         $activities['minute']      =$request->get('minute');
         $activities['is_popular']  =$request->get('ispopular');
         $activities['pickup_time'] =$request->get('pickuptime'); 
      
         if($request->hasFile('images')){
            $images=$request->file('images');
            if(is_array($images)){
              foreach($images as $image){
            $image_upload_path=public_path('/images/');
            $image_file_extension=$image->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
            $image->move($image_upload_path,$image_filename);
            $aimages[]=$image_filename;
            }
            $fimage= implode("," ,$aimages);
            $activities['image']=$fimage;
          }else{
             $activities['image']=$image_filename;
          }

        }
         $activities['created_by']=Auth::guard('admin')->user()->id;
        if(Activities::create($activities)){
              if($request->input('submit&create')){
               return redirect('activities/create')->with('success_msg','Activities Created Successfully!!');
        }   
     }else{
        return redirect('activities/create')->with('error_msg','Activities Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('activities.list').'">Activities List</a></li>';
          $data['activities']=Activities::where('del_flag', '0')->paginate(20);
          $data['menu_active']='activities';
          $data['submenu_active']='activitieslist';
          return view('activities::activitieslist',$data);
     
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
          $data['breadcrumbs'].='<li><a href="'.route('activities.list').'">Activities list</a></li>';
          $data['activities']=Activities::find($id);
          $data['images']=explode(',',$data['activities']->image);
          $data['menu_active']='activities';
          $data['submenu_active']='activitiesedit';
          return view('activities::activitiesedit',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'aname'          => 'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:1024',
            'type'           =>'required',
            'description'    =>'required',
            'add_info'       =>'required',
            'price'          =>'required',
            'area'           =>'required',
            'city'           =>'required',
            'country'        =>'required',
            'nadults'        =>'required',
            'nchilds'        =>'required',
            'ispopular'      =>'required',
            'pickuptime'     =>'required',
            
             ];
        $messages =[
            'aname.required'    =>'Activities Name is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'       =>'Image size not exceed to be 200kb', 
            'type.required'     => 'Hotel type is required',
            'description.required' => 'Description is required',
            'add_info.required' => 'Additional Information is required',
            'area.required'     => 'Area Name is required',
            'city.required'     => 'City Name is required',
            'country.required'  =>'Country Name is required',
            'nadults.required'  => ' Number of Adults is required',
            'nchilds.required'  => ' Number of Childs is required',
            'ispopular.required'   =>'Is Popular is required',
            'pickuptime'           =>'Pickup Time is required', 
           ];
          
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('activities/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         $activities['aname']       =$request->get('aname');
         $activities['type']        =$request->get('type');
         $activities['description'] =$request->get('description');
         $activities['add_info']    =$request->get('add_info');
         $activities['price']       =$request->get('price');
         $activities['area']        =$request->get('area');
         $activities['city']        =$request->get('city');
         $activities['country']     =$request->get('country');
         $activities['nadults']     =$request->get('nadults');
         $activities['nchilds']     =$request->get('nchilds');
         $activities['hour']        =$request->get('hour');
         $activities['minute']      =$request->get('minute');
         $activities['is_popular']  =$request->get('ispopular');
         $activities['pickup_time'] =$request->get('pickuptime'); 

         if($request->hasFile('images')){
            File::delete(public_path('/images/'.$request->input('old_activities_image')));
            $images=$request->file('images');
            if(is_array($images)){
              foreach($images as $image){
            $image_upload_path=public_path('/images/');
            $image_file_extension=$image->getClientOriginalExtension();
            $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
            $image->move($image_upload_path,$image_filename);
            $aimages[]=$image_filename;
            }
            $fimage= implode("," ,$aimages);
            $activities['image']=$fimage;
          }else{
             $activities['image']=$image_filename;
          }

        }
         $activities['updated_by']=Auth::guard('admin')->user()->id;
         if(Activities::find($request->get('activities_id'))->update($activities)){
              if($request->input('submit&edit')){
               return redirect('activities/list')->with('success_msg',' Edited Successfully!!');
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
        if(Activities::find($id)->update($data)){
            return redirect('activities/list')->with('success_msg','Deleted Successfully!!');
        }
      }else{
        return redirect('admin');
        
  }
}


 public function searchlist(Request $request){
    $name  =$request->srcText;
    $listing =DB::table('activities')
                                ->select('id','aname','type','price','area','city','nadults','nchilds')
                                ->where('del_flag','=','0')
                                ->orderBy('id','desc')
                                ->where(function($query) use ($name){
                         $query->where('aname','like','%'.$name.'%')
                               ->Where('area','like','%'.$name.'%');
                               
                         })
                          ->paginate(20);
                 
                           $html='';
                           $sn=1;
                               if($listing->count()>0){
                               foreach($listing as $list){
                                $html.='<tr>';
                                $html.='<td class="sorting_1">'.$sn++.'</td>';
                                $html.='<td>'.$list->aname.'</td>';
                                $html.='<td>'.($list->type=='p'? 'Paragliding':($list->type =='t'? 'Trekking':($list->type =='r'? 'Rafting':($list->type =='re'?'Religious Visit':($list->type =='h'?'Historical Visit':($list->type=='s'?'Scuba Diving':($list->type=='b'?'Bungy':($list->type=='j'?'Jungle Safary':'Popular Cities')))))))).'</td>';
                                $html.='<td>'.$list->price.'</td>';
                                $html.='<td>'.$list->area.'</td>';
                                $html.='<td>'.$list->city.'</td>';
                                $html.='<td>'.$list->nadults.'</td>';
                                $html.='<td>'.$list->nchilds.'</td>';
                                $html.='<td><a href="'.route('activities.edit',[$list->id]).'" style="color:#069180;font-size:20px" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="jquery-postback"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';     
                                $html.='                             
                                      <a href="'.route('activities.remove',[$list->id]).'" style="color:#a83521;font-size:20px" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="jquery-postback" ><i class="fa fa-trash" aria-hidden="true" onclick="if(!confirm(\'Are you sure to delete this Journal?\')){ return false; }"></i>
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
