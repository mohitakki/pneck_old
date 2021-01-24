<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Vendor;
use App\Employee;
use Image;
use DB;
use App\PopUp;
use App\Alert;
use App\AlertType;
use App\Role;
use Auth;
use Redirect;
use Hash;
use Session;
use App\Traits\AlertMessage;
use App\Helpers\LogActivity;

class RestaurantController extends Controller
{
      use AlertMessage;

    public function list(Request $request)
    {
  
         if($request->all())
        {
          $vendors= DB::table('tbl_vendors')
        ->where('tbl_vendors.mobile',$request->mobile)
         ->select('tbl_vendors.*','states.name as stateName','admins_users.agent_id','admins_users.first_name as FirstName','admins_users.last_name as LastName','cities.city_name','vendor_service_x_profile.vendor_type','vendor_service_subcat.title as category')
          ->leftJoin('vendor_service_x_profile','vendor_service_x_profile.vendor_id','=','tbl_vendors.id')
          ->leftJoin('vendor_service_subcat','vendor_service_subcat.id','=','vendor_service_x_profile.subcat_id')
          ->leftJoin('states','vendor_service_x_profile.state_id','=','states.id')
          ->leftJoin('cities','vendor_service_x_profile.city_id','=','cities.id')
          ->leftJoin('admins_users','admins_users.branch_id','=','tbl_vendors.branch_id')
        ->orderBy('updated_at', 'desc')->get();
         
        foreach($vendors as $rows)
          {
            if($rows->branch_id != '')
            {
              $message = 'Vendor KYC Approved';
              return view('admin.vendor_kyc')->with('message',$message);
            }
          }
            
        }
        else{
  
            if(Auth::user()->id == '1')
            {
              
          $vendors= DB::table('tbl_vendors')
                   
          ->select('tbl_vendors.*','states.name as stateName','admins_users.agent_id','admins_users.first_name as FirstName','admins_users.last_name as LastName','cities.city_name','vendor_service_x_profile.vendor_type','vendor_service_subcat.title as category')
          ->leftJoin('vendor_service_x_profile','vendor_service_x_profile.vendor_id','=','tbl_vendors.id')
          ->leftJoin('vendor_service_subcat','vendor_service_subcat.id','=','vendor_service_x_profile.subcat_id')
          ->leftJoin('states','vendor_service_x_profile.state_id','=','states.id')
          ->leftJoin('cities','vendor_service_x_profile.city_id','=','cities.id')
          ->leftJoin('admins_users','admins_users.branch_id','=','tbl_vendors.branch_id')
          ->orderBy('tbl_vendors.updated_at', 'desc')->get();
                 
            }
            else{
                
              $vendors= DB::table('tbl_vendors')
          
          ->where('tbl_vendors.branch_id',Auth::user()->branch_id)
          ->where('tbl_vendors.branch_id','!=','') 
          ->select('tbl_vendors.*','states.name as stateName','admins_users.agent_id','admins_users.first_name as FirstName','admins_users.last_name as LastName','cities.city_name','vendor_service_x_profile.vendor_type','vendor_service_subcat.title as category')
          ->leftJoin('vendor_service_x_profile','vendor_service_x_profile.vendor_id','=','tbl_vendors.id')
          ->leftJoin('vendor_service_subcat','vendor_service_subcat.id','=','vendor_service_x_profile.subcat_id')
          ->leftJoin('states','vendor_service_x_profile.state_id','=','states.id')
          ->leftJoin('cities','vendor_service_x_profile.city_id','=','cities.id')
          ->leftJoin('admins_users','admins_users.branch_id','=','tbl_vendors.branch_id')
          ->orderBy('updated_at', 'desc')->get();
            }
        }
        

        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','15');
        LogActivity::addToLog('View the Pneck Vendor list.');
        return view('admin.restaurant-list',compact('vendors','popups'));
}
}
