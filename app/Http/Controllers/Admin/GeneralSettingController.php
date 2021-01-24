<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use App\PopUp;
use App\GeneralSetting;
use App\VehicleType;

use App\Banner;

use App\Role;
use Auth;
use Redirect;
use Hash;
use Session;
use App\Traits\AlertMessage;

class GeneralSettingController extends Controller
{
      use AlertMessage;

        public function view()
    {
        $data = GeneralSetting::orderby('updated_at','desc')->get();
        $popups = PopUp::where('popup_for','4')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','4');
        return view('admin.backend_datalists',compact('data','popups'));
    }

    public function create()
    {
        return view('admin.backenddata_create');
    }
    

    public function submit(Request $request)
    {
      
        $insert=new GeneralSetting($request->all());
        $insert->updated_by=Auth::guard('admin')->user()->id;
        if($request->logo != '')
        {
          $rand=rand('100000','999999');
          $destinationPath = public_path('/admin_logos');
          $image_name=$request->logo->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->logo->move($destinationPath, $image_name);
          $insert->logo=$image_name;
        }
        $inserted=$insert->save();
        $alert_message=$this->alerts('4');
        if($inserted)
        {
          return redirect::route('admin.backend-data')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['5']);
        } 
      
    }

   //function to submit vehicle details
    public function submitVehicleType(Request $request)
    {
      
        if(!empty($request->all()))
        {   
	        $name = $_FILES['file']['name'];
			$target_dir = public_path('/uploads/vehicle_type');
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.'/'.$name);
			
			if(isset($_SERVER['HTTPS'])){
				$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
			}
			else{
				$protocol = 'http';
			}
			
			$url = $protocol . "://" . $_SERVER['HTTP_HOST'].'/' . $target_dir.'/'.$name;
			//var_dump($url); die; 
			
	        $insertData = new VehicleType();
            $insertData->vehicle_type = $request->vehicle_type;
			$insertData->vehicle_image = $url;		
			
			$inserted = $insertData->save();
			
			if(!empty($inserted)){
			  return redirect::back()->with('success','Vehicle Type Added Successfully.');
			}
			else{
			  return redirect::back()->with('error','Sorry Something went wrong');
			} 
        }
    }
    public function edit($id)
    {
        $data=GeneralSetting::find($id);
        return view('admin.edit_backenddata',compact('data'));
    }


    public function update(Request $request)
    {
      $exist=GeneralSetting::find($request->id);
      $exist->updated_by=Auth::guard('admin')->user()->id;
      $exist->header=$request->header;
      $exist->footer=$request->footer;
      $exist->site_title=$request->site_title;
      $exist->copyright=$request->copyright;
      if($request->logo != '')
        {
          $rand=rand('100000','999999');
          $destinationPath = public_path('/admin_logos');
          $image_name=$request->logo->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->logo->move($destinationPath, $image_name);
          $exist->logo=$image_name;
        }
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          return redirect::route('admin.backend-data')->with('success',$alert_message['2']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['6']);
        } 
    }

    public function uncheck($id)
    {
      $exist=GeneralSetting::find($id);
      $exist->status='0';
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          Session::flash('success', $alert_message['4']);
        }
        else
        {
          Session::flash('error', $alert_message['8']);
        }

    }
    public function check($id)
    {
      $data_exist=GeneralSetting::where('status','1')->first();
      if(!empty($data_exist))
      {
          $data_exist->status='0';
          $data_exist->save();
      }
      $exist=GeneralSetting::find($id);
      $exist->status='1';
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          Session::flash('success', $alert_message['3']);
        }
        else
        {
          Session::flash('error', $alert_message['7']);
        }

    }

    public function delete($id)
    {
      $delete=GeneralSetting::find($id)->delete();
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


    public function bannerview(){
        $data = Banner::orderby('updated_at','desc')->get();
        $popups = PopUp::where('popup_for','4')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','2');
        return view('admin.banner',compact('data','popups'));
    }

    public function bannercreate(){
      return view('admin.banner_create');
    }

    public function bannersubmit(Request $request)
    {
      
        $insert=new Banner($request->all());
        $insert->updated_by=Auth::guard('admin')->user()->id;
        if($request->banner != '')
        {
          $rand=rand('100000','999999');
//           $destinationPath = public_path('/admin_logos');
          $destinationPath = public_path(). '/admin_logos/';
          $image_name= $request->banner->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->banner->move($destinationPath, $image_name);


//           $insert->banner=$image_name;
            $insert->banner= $request->root()."/admin_logos/".$image_name;

            
            
        }
        // $insert->header = $request->header;
        $inserted=$insert->save();
        $alert_message=$this->alerts('4');
        if($inserted)
        {
          return redirect::route('admin.banner')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['5']);
        } 
      
      
    }

    public function banneruncheck($id)
    {
      $exist=Banner::find($id);
      $exist->status='0';
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          Session::flash('success', $alert_message['4']);
        }
        else
        {
          Session::flash('error', $alert_message['8']);
        }

    }

    public function bannercheck($id)
    {
      $data_exist=Banner::where('status','1')->first();
      if(!empty($data_exist))
      {
          $data_exist->status='0';
          $data_exist->save();
      }
      $exist=Banner::find($id);
      $exist->status='1';
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          Session::flash('success', $alert_message['3']);
        }
        else
        {
          Session::flash('error', $alert_message['7']);
        }

    }

    public function bannerdelete($id)
    {
      $delete=Banner::find($id)->delete();
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

    public function banneredit($id)
    {
        $data=Banner::find($id);
        return view('admin.edit_banner',compact('data'));
    }

    public function bannerupdate(Request $request)
    {
      $exist=Banner::find($request->id);
      $exist->updated_by=Auth::guard('admin')->user()->id;
      $exist->title=$request->title;
      if($request->banner != '')
        {
          $rand=rand('100000','999999');
          $destinationPath = public_path('/admin_logos');
          $image_name=$request->banner->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->banner->move($destinationPath, $image_name);
          $exist->banner=$image_name;
        }
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          return redirect::route('admin.banner')->with('success',$alert_message['2']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['6']);
        } 
    }


}
