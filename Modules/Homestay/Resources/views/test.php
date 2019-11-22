<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employee;
use DB;
use URL;
class SearchController extends Controller
{
  public function index(){
    $users = DB::table('tbl_employee_user')
           ->get();
    return view('admin.staff_management',compact('users'));
  }
   public function search(Request $request ){ 
   $name=$request->srcText;
   $users =  DB::table('tbl_employee_user')

          ->leftjoin('tbl_designation', 'tbl_employee_user.deg_id', '=', 'tbl_designation.deg_id')
          ->select('tbl_employee_user.*', 'tbl_designation.deg_name')
         
          ->where(function($query) use ($name){
            $query->where('first_name','like','%'.$name.'%')
                  ->orWhere('last_name','like','%'.$name.'%');
          })
          //->where('first_name','LIKE','%'.$request->srcText.'%')
          // ->orwhere('last_name','LIKE','%'.$request->srcText.'%')
         
          ->paginate(30);
        
                               $html=''; 
                               if($users->count()>0){ 




                               foreach($users as $user){
                                $html.='<tr>
                                        <td class="sorting_1">
                                         '.$user->employee_id.'
                                        </td> 
                                       <td>
                                         '.$user->first_name.'
                                        </td> 
                                        <td>
                                         '.$user->last_name.'
                                        </td> 
                                         <td>
                                         '.$user->email.'
                                        </td> 
                                         <td>
                                         '.$user->deg_name.'
                                        </td> 
                                        <td>
                                       '. ($user->status=='A'?'Active':'Inactive').'
                                        </td>
                                         <td>
                                       '. ($user->user_type=='0'?'Employee':($user->user_type=='1'?'User':'Admin')).'
                                        </td>
                                        <td>
                                        <a href="'.URL::to('admin/staff/edit', array('employee_id'=>$user->employee_id)).'" role="button" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>
                                      </a>     
                                  
                                      <a href="'.URL::to('admin/staff/delete', array('employee_id'=> $user->employee_id)).'" role="button" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="btn btn-danger" onclick="if (!confirm(\'Are you sure to delete this User?\')){ return false; }" ><i class="fa fa-trash" aria-hidden="true"></i>
                                      </a>

                                    </td>
                                     </tr>'; 
                              
                              }
                               echo $html;
                              }else{
                              echo '<tr><td colspan="8"><h3 class="text-center" style="color:red">Data Not found</h3></td></tr>';
                              }
                         
                            
                            
                        }



               public function sort(Request $request){
                // dd($request->user_type_id);
                if($request->user_type_id =='0'){
                $users =  DB::table('tbl_employee_user')
   
                    ->leftjoin('tbl_designation', 'tbl_employee_user.deg_id', '=', 'tbl_designation.deg_id')
                    ->select('tbl_employee_user.*', 'tbl_designation.deg_name')
                    ->where('tbl_employee_user.user_type','0')
                    ->orderBy('tbl_employee_user.employee_id', 'desc') 
                  ->paginate(30);
                 }
                 if($request->user_type_id =='1'){
                $users =  DB::table('tbl_employee_user')
   
                    ->leftjoin('tbl_designation', 'tbl_employee_user.deg_id', '=', 'tbl_designation.deg_id')
                    ->select('tbl_employee_user.*', 'tbl_designation.deg_name')
                    ->where('tbl_employee_user.user_type','1')
                    ->orderBy('tbl_employee_user.employee_id', 'desc') 
                  ->paginate(30);
                 }
              if($request->user_type_id =='2'){
                $users =  DB::table('tbl_employee_user')
   
                    ->leftjoin('tbl_designation', 'tbl_employee_user.deg_id', '=', 'tbl_designation.deg_id')
                    ->select('tbl_employee_user.*', 'tbl_designation.deg_name')
                    ->where('tbl_employee_user.user_type','2')
                    ->orderBy('tbl_employee_user.employee_id', 'desc') 
                  ->paginate(30);
                 }
               
                if($request->user_type_id =='All'){
                $users = DB::table('tbl_employee_user')
                       ->leftjoin('tbl_designation', 'tbl_employee_user.deg_id', '=', 'tbl_designation.deg_id')
                       
                       ->orderBy('tbl_employee_user.employee_id', 'desc')
                       ->select('tbl_employee_user.*', 'tbl_designation.deg_name')
                     
                       ->paginate(20);
                 
                 }

        
                               $html=''; 
                               if($users->count()>0){ 
                               foreach($users as $user){
                                $html.='<tr>
                                        <td class="sorting_1">
                                         '.$user->employee_id.'
                                        </td> 
                                       <td>
                                         '.$user->first_name.'
                                        </td> 
                                        <td>
                                         '.$user->last_name.'
                                        </td> 
                                         <td>
                                         '.$user->email.'
                                        </td> 
                                         <td>
                                         '.$user->deg_name.'
                                        </td> 
                                        <td>
                                       '. ($user->status=='A'?'Active':'Inactive').'
                                        </td>
                                         <td>
                                       '. ($user->user_type=='0'?'Employee':($user->user_type=='1'?'User':'Admin')).'
                                        </td>
                                        <td>
                                        <a href="'.URL::to('admin/staff/edit', array('employee_id'=>$user->employee_id)).'" role="button" data-toggle="tooltip" data-placement="top" title="Edit" data-method="edit" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>
                                      </a>     
                                        <a href="'.URL::to('admin/staff/delete', array('employee_id'=> $user->employee_id)).'" role="button" data-toggle="tooltip" data-placement="top" title="Delete" data-method="delete" class="btn btn-danger" onclick="if (!confirm(\'Are you sure to delete this User?\')){ return false; }" ><i class="fa fa-trash" aria-hidden="true"></i>
                                      </a>

                                    </td>
                                     </tr>'; 
                              
                              }
                               echo $html;
                              }else{
                              echo '<tr><td colspan="8"><h3 class="text-center" style="color:red">Data Not found</h3></td></tr>';
                              }
                         
                            
                            
                    }
            

}



