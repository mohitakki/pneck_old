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
use App\Rent;
use Session;
use App\Traits\AlertMessage;

class RentalController extends Controller
{
      use AlertMessage;

        public function view()
    {
        $data = Rent::all();
        $popups = PopUp::where('popup_for','4')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','4');
        return view('admin.rental-list' , compact('data','popups'));
    }

    public function addview()
    {
        // $data = GeneralSetting::orderby('updated_at','desc')->get();
        // $popups = PopUp::where('popup_for','4')->get();
        // Session::forget('sidebarid');
        // Session::put('sidebarid','4');
        return view('admin.rental-add');
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
      
        $insert = new Rent($request->all());
        $insert->updated_by=Auth::guard('admin')->user()->id;
        $insert->total_req= '0';
        $insert->status="Approved";
        $inserted=$insert->save();
        $alert_message=$this->alerts('4');
        if($inserted)
        {
          return redirect::route('admin.rental')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['5']);
        } 
      
      
    }

    public function edit($id)
    {
        $data=Rent::find($id);
        return view('admin.rental-add',compact('data'));
    }


    public function update(Request $request)
    {
      $exist=Rent::find($request->id);
      $exist->updated_by=Auth::guard('admin')->user()->id;
      $exist->number_hours = $request->number_hours;
      $exist->price = $request->price;
      $exist->distance = $request->distance;
      $exist->vehicle_type = $request->vehicle_type;
      $exist->total_req= '0';
      $exist->status="Approved";
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          return redirect::route('admin.rental')->with('success',$alert_message['2']);
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
      $delete=Rent::find($id)->delete();
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
