<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Menu;
use App\Admin;
use App\VehicleType;
use App\PopUp;
use App\Role;
use App\Vehicle;
use Auth;
use Redirect;
use Hash;
use Session;
use App\Traits\AlertMessage;

class VehicleController extends Controller
{
      use AlertMessage;

        public function view()
    {
        $data = VehicleType::all();
        $popups = PopUp::where('popup_for','4')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','4');
        return view('admin.vehicle-list', compact('data'));
    }

    public function addview()
    {
        return view('admin.vehicle-add');
    }
	
	public function addVehicleType(){
		
		return view('admin.vehicle-add');
	}
	
	//function to view the vehicle type
	public function viewVehicleType()
    {
		$vehicleType = VehicleType::select('*')->orderBy('id','desc')->get()->toArray();
        return view('admin.vehicle-type-list', ['vehicleType'=>$vehicleType]);
    }

	
	//function to edit the vehicle type
	public function editVehicleType($id){
		
		$data=VehicleType::find($id);
        return view('admin.vehicle-add', compact('data'));
	}	
	

    public function create()
    {
        return view('admin.driver_create');
    }
    
    public function submitVehicleType(Request $request)
    {
      
        $insert = new VehicleType($request->all());
        if($request->vehicle_image != '')
        {
          $rand = rand('100000','999999');
          $destinationPath = public_path('/admin_logos');
          $image_name=$request->vehicle_image->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->vehicle_image->move($destinationPath, $image_name);
          $insert->vehicle_image = $request->root()."/admin_logos/".$image_name;
        }
        $inserted = $insert->save();
        $alert_message = $this->alerts('4');
        if($inserted)
        {
          return redirect::route('admin.vehicle')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['5']);
        } 
      
    }


    public function updateVehicleType(Request $request)
    {
      $exist = VehicleType::find($request->id);
      $exist->vehicle_type = $request->vehicle_type; 

      if($request->vehicle_image != '')
      {
        $rand = rand('100000','999999');
        $destinationPath = public_path('/admin_logos');
        $image_name=$request->vehicle_image->getClientOriginalName();
        $image_name = $rand.str_replace(' ','',$image_name);
        $request->vehicle_image->move($destinationPath, $image_name);
        $exist->vehicle_image = $request->root()."/admin_logos/".$image_name;
      }
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          return redirect::route('admin.vehicle')->with('success',$alert_message['2']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['6']);
        } 
    }


    public function deleteVehicleType($id)
    {
      $delete=VehicleType::find($id)->delete();
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
