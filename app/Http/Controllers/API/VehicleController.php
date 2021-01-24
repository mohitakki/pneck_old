<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VehicleType;

class VehicleController extends Controller
{
    //webservice to fetch the vehicle type
	public function fetchVehicleTyle(){
	  
	  try{
          //Query to fetch all the vehicle types
		  $vehicleType = VehicleType::select('*')->orderBy('id','asc')->get()->toArray();
          
		  if(!empty($vehicleType)){
			return response()->json(['data'=>$vehicleType,'message'=>'Vehicle Types Found', 'success'=>true]);  
	  	  }
		  else{
			return response()->json(['data'=>(object)[], 'message'=>'No Vehicle Type Found.', 'success'=>true]);  
		  }
	    }
		catch (Exception $e) {
			return response()->json(['data'=>(object)[], 'message'=>'Sorry Something Went wrong. Please try again.', 'success'=>false]);
	    }	  
		
	}
}
