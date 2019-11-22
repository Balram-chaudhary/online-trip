<?php
namespace Modules\Seats\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Bus;
use App\User;
use App\Seat;
use File;
use Session;
use Auth;
use DB;
use Redirect;
use Carbon\Carbon;
class SeatsController extends Controller
{
   
   public function create(Request $request)
    {
     if(Auth::guard('admin')->user()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('buses.list').'">Buses List</a></li>';
          $data['buses']     = Bus::where('del_flag','=','0')->pluck('oname','id')->toArray();
          $data['menu_active']='buses';
          $data['submenu_active']='seatsadd';
          return view('seats::index',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'buses'          =>'required',
             ];
        $messages =[
            'buses.required' =>'Bus  is required',
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('seats/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         $bid  =$request->get('buses');
         $details =Bus::find($bid);

           if($request->input('submit&create')){
            return Redirect::route( 'seats.edit',['id'=>$bid]);
            
     }else{
        return redirect('seats/create')->with('error_msg','Something is wrong');
     }


  }

 }else{
        return redirect('admin');
     }   
     
  }


public function seatupdate(Request $request ,$id){

 if(Auth::guard('admin')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('buses.list').'">Buses List</a></li>';
          $data['menu_active']='buses';
          $data['submenu_active']='seatsedit';
          $data['buses']=Bus::find($id);
          $data['seats']=explode(',',$data['buses']->seats);
         
          $data['seatdetail']=Seat::where('bus_id',$id)
                              ->whereDate('adate', '=', '2018-03-19')->first();
          
          $data['rseats']=explode(',',$data['seatdetail']->rseats);
          if(count($data['rseats'])>0){
            $data['aseats']=array_diff($data['seats'],$data['rseats']);
           }else{
            $data['aseats']=$data['seats']; 
           }
        
          return view('seats::seatsedit',$data);
     }
     
     if($request->isMethod('post')){
            $rules=[
            'sheets'          => 'required',
             ];
        $messages =[
            'sheets.required'   =>'Seats  is required',
           ];
         
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('seats/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         $data['rseats']     =$request->get('sheets');
         $data['seatdetail']  =Seat::where('bus_id',$id) ->whereDate('adate', '=', '2018-03-19')->first();
         $data['rseats']     =explode(',',$data['seatdetail']->rseats);
         $data['orsheets']    =implode(',',$data['rseats']);
         $data['buses']       =Bus::find($id);
         $data['seats']       =explode(',',$data['buses']->seats);
         $data['rseats']      =$request->get('sheets');
         array_push($data['rseats'], $data['orsheets']);
         $seats['rseats']    =implode(',',$data['rseats']);
         $seats['updated_by'] =Auth::guard('admin')->user()->id;
         $seats['adate']      ='2018-03-19';
         $hell=Seat::where('bus_id',$request->get('buses_id'))->first();
         $bus_id=$hell->bus_id;
             if(Seat::where('bus_id',$bus_id)->update($seats)){
              if($request->input('submit&edit')){
               return redirect('seats/seatupdate/'.$id)->with('success_msg',' Edited Successfully!!');
              }
     }
     return back()->with('error_msg','Something is wrong!!');

   }
 }else{
        return redirect('admin');
     }   
     
  }


}