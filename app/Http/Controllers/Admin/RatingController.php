<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use App\PopUp;
use App\Role;
use Auth;
use Redirect;
use Hash;
use Session;
use App\Traits\AlertMessage;

class RatingController extends Controller
{
      use AlertMessage;

        public function pview()
    {
        // $data = GeneralSetting::orderby('updated_at','desc')->get();
        // $popups = PopUp::where('popup_for','4')->get();
        // Session::forget('sidebarid');
        // Session::put('sidebarid','4');
        return view('admin.rating-p');
    }

    public function dview()
    {
        // $data = GeneralSetting::orderby('updated_at','desc')->get();
        // $popups = PopUp::where('popup_for','4')->get();
        // Session::forget('sidebarid');
        // Session::put('sidebarid','4');
        return view('admin.rating-d');
    }

    public function pviewbyid($id)
    {
        // $data = GeneralSetting::orderby('updated_at','desc')->get();
        // $popups = PopUp::where('popup_for','4')->get();
        // Session::forget('sidebarid');
        // Session::put('sidebarid','4');
        return view('admin.rating-p-view');
    }

    public function dviewbyid()
    {
        // $data = GeneralSetting::orderby('updated_at','desc')->get();
        // $popups = PopUp::where('popup_for','4')->get();
        // Session::forget('sidebarid');
        // Session::put('sidebarid','4');
        return view('admin.rating-d-view');
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
    

    // public function submit(Request $request)
    // {
      
    //     $insert=new GeneralSetting($request->all());
    //     $insert->updated_by=Auth::guard('admin')->user()->id;
    //     if($request->logo != '')
    //     {
    //       $rand=rand('100000','999999');
    //       $destinationPath = public_path('/admin_logos');
    //       $image_name=$request->logo->getClientOriginalName();
    //       $image_name = $rand.str_replace(' ','',$image_name);
    //       $request->logo->move($destinationPath, $image_name);
    //       $insert->logo=$image_name;
    //     }
    //     $inserted=$insert->save();
    //     $alert_message=$this->alerts('4');
    //     if($inserted)
    //     {
    //       return redirect::route('admin.backend-data')->with('success',$alert_message['1']);
    //     }
    //     else
    //     {
    //       return redirect::back()->with('error',$alert_message['5']);
    //     } 
      
      
    // }

    // public function edit($id)
    // {
    //     $data=GeneralSetting::find($id);
    //     return view('admin.edit_backenddata',compact('data'));
    // }


    // public function update(Request $request)
    // {
    //   $exist=GeneralSetting::find($request->id);
    //   $exist->updated_by=Auth::guard('admin')->user()->id;
    //   $exist->header=$request->header;
    //   $exist->footer=$request->footer;
    //   $exist->site_title=$request->site_title;
    //   $exist->copyright=$request->copyright;
    //   if($request->logo != '')
    //     {
    //       $rand=rand('100000','999999');
    //       $destinationPath = public_path('/admin_logos');
    //       $image_name=$request->logo->getClientOriginalName();
    //       $image_name = $rand.str_replace(' ','',$image_name);
    //       $request->logo->move($destinationPath, $image_name);
    //       $exist->logo=$image_name;
    //     }
    //   $updated=$exist->save();
    //   $alert_message=$this->alerts('4');
    //   if($updated)
    //     {
    //       return redirect::route('admin.backend-data')->with('success',$alert_message['2']);
    //     }
    //     else
    //     {
    //       return redirect::back()->with('error',$alert_message['6']);
    //     } 
    // }

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

    // public function delete($id)
    // {
    //   $delete=GeneralSetting::find($id)->delete();
    //   $alert_message=$this->alerts('4');
    //   if($delete)
    //     {
    //       Session::flash('success', $alert_message['3']);
    //     }
    //     else
    //     {
    //       Session::flash('error', $alert_message['7']);
    //     }

    // }

}
