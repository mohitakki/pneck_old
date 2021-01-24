<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use App\PopUp;
use App\Role;
use App\Corporate;
use Auth;
use Redirect;
use Hash;
use Session;
use App\Traits\AlertMessage;

class CorporatesController extends Controller
{
      use AlertMessage;

        public function view()
    {
        $data = Corporate::all();
        $popups = PopUp::where('popup_for','4')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','4');
        return view('admin.corporates-list', compact('data'));
    }

    public function addview()
    {
        // $data = GeneralSetting::orderby('updated_at','desc')->get();
        // $popups = PopUp::where('popup_for','4')->get();
        // Session::forget('sidebarid');
        // Session::put('sidebarid','4');
        return view('admin.corporates-add');
    }

    // public function unverifiedview()
    // {
    //     // $data = GeneralSetting::orderby('updated_at','desc')->get();
    //     // $popups = PopUp::where('popup_for','4')->get();
    //     // Session::forget('sidebarid');
    //     // Session::put('sidebarid','4');
    //     return view('admin.unverifiedv-driver_list');
    // }

    // public function create()
    // {
    //     return view('admin.driver_create');
    // }
    

    public function submit(Request $request)
    {
      
        $insert=new Corporate($request->all());
        $insert->updated_by=Auth::guard('admin')->user()->id;
        if($request->pictureimage != '')
        {
          $rand=rand('100000','999999');
          $destinationPath = public_path('/admin_logos');
          $image_name = $request->pictureimage->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->pictureimage->move($destinationPath, $image_name);
          $insert->pictureimage = $image_name;
          $insert->total_request = '0';
          $insert->status = "Approved";
        }
        $inserted=$insert->save();
        $alert_message=$this->alerts('4');
        if($inserted)
        {
          return redirect::route('admin.corporates')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['5']);
        } 
      
      
    }

    public function edit($id)
    {
        $data = Corporate::find($id);
        return view('admin.corporates-add',compact('data'));
    }


    public function viewdetail($id){
       $show = Corporate::find($id);
        return view('admin.corporates-list', compact('show'));
    }


    public function update(Request $request)
    {

      $exist = Corporate::find($request->id);
      $exist->updated_by=Auth::guard('admin')->user()->id;

      $exist->business_name = $request->business_name; 
      $exist->email = $request->email;  
      $exist->mobile_no = $request->mobile_no;
      $exist->description = $request->description;
      $exist->gender = $request->gender;
      $exist->address = $request->address; 
      $exist->password = $request->password;
      $exist->confirmpassword = $request->confirmpassword;  
      $exist->paypalemail = $request->paypalemail;  
      $exist->pictureimage = $request->id;
      $exist->total_request = '10';
      $exist->status =  "Approved";

      if($request->pictureimage != '')
        {
          $rand=rand('100000','999999');
          $destinationPath = public_path('/admin_logos');
          $image_name=$request->pictureimage->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->pictureimage->move($destinationPath, $image_name);
          $exist->pictureimage=$image_name;
        }
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          return redirect::route('admin.corporates')->with('success',$alert_message['2']);
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
      $delete = Corporate::find($id)->delete();
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
