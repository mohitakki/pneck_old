<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use App\PopUp;
use App\Role;
use App\Driver;
use App\Corporate;
use App\Vehicle;
use Auth;
use Redirect;
use Hash;
use DB;
use App\Helpers\LogActivity;
use Session;
use App\Traits\AlertMessage;

class DriverController extends Controller
{
      use AlertMessage;

      public function view(Request $request)
    {
      if($request->all())
      {
        $users= DB::table('tbl_employees')
      ->leftJoin('tbl_employee_profile','tbl_employee_profile.emp_id','=','tbl_employees.id')
      ->where('tbl_employees.mobile',$request->mobile)
      ->select('tbl_employees.*','tbl_employee_profile.emp_id','tbl_employee_profile.profile_image','tbl_employee_profile.dl_file','tbl_employee_profile.vehicle_file','tbl_employee_profile.aadhar_image')
      ->orderBy('updated_at', 'desc')->get();
       
      foreach($users as $rows)
        {
          if($rows->branch_id != '')
          {
            $message = 'Employee KYC Approved';
            return view('admin.employee_kyc')->with('message',$message);
          }
        }
          
      }
      else{

          if(Auth::user()->id == '1')
          {
            
        $users= DB::table('tbl_employees')
        ->leftJoin('tbl_employee_profile','tbl_employee_profile.emp_id','=','tbl_employees.id')  
        // ->where('tbl_employees.type_user','1')            
        ->select('tbl_employees.*','tbl_employee_profile.emp_id','tbl_employee_profile.profile_image','tbl_employee_profile.dl_file','tbl_employee_profile.vehicle_file','tbl_employee_profile.aadhar_image')
        ->orderBy('updated_at', 'desc')->get();
          }
          else{
            $users= DB::table('tbl_employees')
        ->leftJoin('tbl_employee_profile','tbl_employee_profile.emp_id','=','tbl_employees.id')
        ->where('tbl_employees.branch_id',Auth::user()->branch_id)
        ->where('tbl_employees.branch_id','!=','') 
        ->select('tbl_employees.*','tbl_employee_profile.emp_id','tbl_employee_profile.profile_image','tbl_employee_profile.dl_file','tbl_employee_profile.vehicle_file','tbl_employee_profile.aadhar_image')
        ->orderBy('updated_at', 'desc')->get();
          }
      }
     
        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','15');
        LogActivity::addToLog('View the Pneck Employee list.');
        return view('admin.driver_list',compact('users','popups'));
      }

    // public function declinedview()
    // {
    //     // $data = GeneralSetting::orderby('updated_at','desc')->get();
    //     // $popups = PopUp::where('popup_for','4')->get();
    //     // Session::forget('sidebarid');
    //     // Session::put('sidebarid','4');
    //     return view('admin.declined-driver_list');
    // }

    // public function unverifiedview()
    // {
    //     // $data = GeneralSetting::orderby('updated_at','desc')->get();
    //     // $popups = PopUp::where('popup_for','4')->get();
    //     // Session::forget('sidebarid');
    //     // Session::put('sidebarid','4');
    //     return view('admin.unverifiedv-driver_list');
    // }

    public function create()
    {
        $c_data = Corporate::all();
        $v_data = Vehicle::all();
        return view('admin.driver_create' , compact('c_data','v_data'));
    }
    

    public function submit(Request $request)
    {
      
        $insert=new Driver($request->all());
        $insert->updated_by=Auth::guard('admin')->user()->id;
        if($request->image != '')
        {
          $rand=rand('100000','999999');
          $destinationPath = public_path('/admin_logos');
          $image_name=$request->image->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->image->move($destinationPath, $image_name);
          $insert->image=$image_name;
        }
        if($request->car != '')
        {
          $rand=rand('100000','999999');
          $destinationPath = public_path('/admin_logos');
          $image_name=$request->car->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->car->move($destinationPath, $image_name);
          $insert->car=$image_name;
        }
        $inserted=$insert->save();
        $alert_message=$this->alerts('4');
        if($inserted)
        {
          return redirect::route('admin.driver')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['5']);
        } 
      
      
    }

    public function edit($id)
    {
        $data = Driver::find($id);
        $c_data = Corporate::all();
        $v_data = Vehicle::all();
        return view('admin.driver_create',compact('data','c_data','v_data'));
    }


    public function update(Request $request)
    {
      $exist = Driver::find($request->id);
      $exist->updated_by=Auth::guard('admin')->user()->id;
      $exist->first_name=$request->first_name;
      $exist->last_name=$request->last_name;
      $exist->corporation=$request->corporation;
      $exist->service=$request->service;
      $exist->email=$request->email;
      $exist->contact=$request->contact;
      $exist->gender=$request->gender;
      $exist->plate_no=$request->plate_no;
      $exist->model=$request->model;
      $exist->color=$request->color;
      $exist->address=$request->address;
      $exist->password=$request->password;
      $exist->cpassword=$request->cpassword;
      $exist->description=$request->description;
      if($request->image != '')
      {
        $rand=rand('100000','999999');
        $destinationPath = public_path('/admin_logos');
        $image_name=$request->image->getClientOriginalName();
        $image_name = $rand.str_replace(' ','',$image_name);
        $request->image->move($destinationPath, $image_name);
        $exist->image=$image_name;
      }
      if($request->car != '')
      {
        $rand=rand('100000','999999');
        $destinationPath = public_path('/admin_logos');
        $image_name=$request->car->getClientOriginalName();
        $image_name = $rand.str_replace(' ','',$image_name);
        $request->car->move($destinationPath, $image_name);
        $exist->car=$image_name;
      }
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          return redirect::route('admin.driver')->with('success',$alert_message['2']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['6']);
        } 
    }

    // public function uncheck($id)
    // {
    //   $exist=GeneralSetting::find($id);
    //   $exist->status='0';
    //   $updated=$exist->save();
    //   $alert_message=$this->alerts('4');
    //   if($updated)
    //     {
    //       Session::flash('success', $alert_message['4']);
    //     }
    //     else
    //     {
    //       Session::flash('error', $alert_message['8']);
    //     }

    // }

    // public function check($id)
    // {
    //   $data_exist=GeneralSetting::where('status','1')->first();
    //   if(!empty($data_exist))
    //   {
    //       $data_exist->status='0';
    //       $data_exist->save();
    //   }
    //   $exist=GeneralSetting::find($id);
    //   $exist->status='1';
    //   $updated=$exist->save();
    //   $alert_message=$this->alerts('4');
    //   if($updated)
    //     {
    //       Session::flash('success', $alert_message['3']);
    //     }
    //     else
    //     {
    //       Session::flash('error', $alert_message['7']);
    //     }

    // }

    public function delete($id)
    {
      $delete = Driver::find($id)->delete();
      $alert_message=$this->alerts('4');
      if($delete)
        {
          Session::flash('success', $alert_message['3']);
        }
        else
        {
          Session::flash('error', $alert_message['7']);
        }

    }

}
