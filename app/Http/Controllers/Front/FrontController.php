<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact_us;
use App\EmpApplication;
use DB;
use App\Vendor;
use App\Employee;
use App\Customer;
use App\City;
use App\State;
use App\Vendor_skils;
use App\Vendor_subcat;
use Illuminate\Support\Collection;

class FrontController extends Controller
{
    
    public function index()
    {
        date_default_timezone_set('Asia/Kolkata');      
        $date=date("Y/m/d h:i:s");
        
        
        $state = State::where('country_id','10')->orderBy('name','asc')->get();
        $citiesCount = City::distinct('city_name')->where('country_id','10')->orderBy('city_name','asc')->count("city_name");
        $vendorsCount = Vendor::orderBy('name','asc')->count('id');
        $employeeCount = Employee::orderBy('name','asc')->count('id');
        $customerCount = Customer::orderBy('name','asc')->count('id');
        
//          $id = [1, 2, 3, 17, 22, 43];
//         $VendorCategoryList = Vendor_subcat::whereIn('id',$id)->withCount('countVendors')->get();
         $id = [1, 2, 3,4,5,6];
        $VendorCategoryList_small = Vendor_subcat::whereIn('id',$id)->withCount('countVendors')->get();
        $VendorCategoryList = Vendor_subcat::all();
        
        return view('front/index',compact('state','citiesCount','vendorsCount','employeeCount','customerCount','VendorCategoryList','VendorCategoryList_small'));
    }
    
    public function terms(Request $request)
    {
        return view('front/terms');
    }
    
    public function category(Request $request)
    {
        $state = State::where('country_id','10')->orderBy('name','asc')->get();
        $citiesCount = City::distinct('city_name')->where('country_id','10')->orderBy('city_name','asc')->count("city_name");
        $vendorsCount = Vendor::orderBy('name','asc')->count('id');
        $employeeCount = Employee::orderBy('name','asc')->count('id');
        $customerCount = Customer::orderBy('name','asc')->count('id');

        $VendorsList = DB::table("vendor_service_x_profile")

        ->select("tbl_vendors.*",'vendor_service_x_profile.shop_title')
        
        ->join("tbl_vendors","vendor_service_x_profile.vendor_id","=","tbl_vendors.id")

        //->join("vendor_service_subcat","vendor_service_x_profile.subcat_id","=","vendor_service_subcat.id")        
        
        ->where("vendor_service_x_profile.subcat_id",$request->segment(2))

        //->groupBy("vendor_service_x_profile.subcat_id")

        ->get();

        //echo "<pre/>";
        //print_r($VendorsList);
        //exit;

        return view('front/category',compact('state','citiesCount','vendorsCount','employeeCount','customerCount','VendorsList'));
    }

     //For fetching states
     public function getStates($id)
     {
         $states = State::where("country_id",$id)->orderBy('name','asc')
                     ->pluck("state_name","id");
         return response()->json($states);
     }
 
     //For fetching cities
     public function cities($id)
     {
       
         $cityinfo = City::where("state_id",$id)->get();
           $cities = $cityinfo->pluck("city_name","id");         
         return response()->json($cities);
     }
     
    public function contactus(Request $request)
    {
        
        $contact = Contact_us::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);
        return back()->with('success','Thanks! for connecting with us. Our team will be connect shortly with you.');
    }
    
    public function application(Request $request)
    {
        $state = State::where('country_id','10')->orderBy('name','asc')->get();       
    	return view('front.application',compact('state'));        
    }

    public function empApplication(Request $request)
    {
        $empApplication = EmpApplication::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,           
            'father_name' => $request->father_name,
            'postal_address' => $request->postal_address,
            'permanent_address' => $request->permanent_address,
            'office_no' => $request->office_no,
            'landline_no' => $request->landline_no,
            'dob' => $request->dob,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'qualification' => $request->qualification,
            'present_employer' => $request->present_employer,
            'current_position' => $request->current_position,
            'applyied_for' => $request->applyied_for,
            'company_experience' => $request->company_experience,
            'total_experience' => $request->total_experience,
            'notice_period' => $request->notice_period,
            'present_salary' => $request->present_salary,
            'expected_salary' => $request->expected_salary           
        ]);

        if($request->image != '')
          {
            $rand=rand('100000','999999');
            $destinationPath = public_path('/applicatoion_image');
            $image_name=$request->image->getClientOriginalName();
            $image_name = $rand.str_replace(' ','',$image_name);
            $request->image->move($destinationPath, $image_name);
            $empApplication->image=$image_name;
          }

          $updated=$empApplication->save();

        return back()->with('success','Thanks! Our team will be connect shortly with you.');
    }

    public function address($latitude, $longitude)
    {
        try {
            $address = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBSsn8yLLAYhjVbWe11EJ-GlvuavinGEFY&latlng=".urlencode($latitude).",".urlencode($longitude)."&sensor=false");
            $output = json_decode($address);
            echo "<pre/>";
            print_r($output);
            exit;
            return $output->results[0]->formatted_address;
        } catch(Exception $e) {
            return NULL;
        }
    }
    
    public function vendor_search(Request $request)
    {
       
        $VendorsList= Vendor_skils::leftJoin('tbl_vendors','vendor_service_x_profile.vendor_id','=','tbl_vendors.id')
        ->leftJoin('vendor_services','vendor_services.id','=','vendor_service_x_profile.service_id')
        ->leftJoin('vendor_service_subcat','vendor_service_subcat.id','=','vendor_service_x_profile.subcat_id')
        ->leftJoin('vendor_catalogues','vendor_catalogues.id','=','vendor_service_x_profile.catalogue_id')
        ->where('tbl_vendors.id',$_GET['id'])        
        ->select('tbl_vendors.*','vendor_service_x_profile.shop_title','vendor_service_x_profile.address1 as address','vendor_service_x_profile.vendor_latitude','vendor_service_x_profile.vendor_longitude','vendor_service_x_profile.vendor_type','vendor_service_x_profile.opening_time','vendor_service_x_profile.service_id','vendor_service_x_profile.closing_time','vendor_services.title as professional_service','vendor_service_subcat.title as subcat_title','vendor_catalogues.title as catalogue_title','vendor_service_x_profile.vendor_data as days')
        ->orderBy('first_name', 'ASC')
        ->get();

        

        $Vendor_arr=[];

         foreach ($VendorsList as $item) {

    $totalRating = DB::table('vendor_ratings')->where('vendor_id',$item['id'])->sum('rating') ?? 0;

      $count = DB::table('vendor_ratings')->where('vendor_id',$item['id'])->count();
      
      $rating_info = DB::table('vendor_ratings')->select('vendor_ratings.message','vendor_ratings.created_at','vendor_ratings.rating','tbl_customers.first_name','tbl_customers.last_name')
      ->leftJoin('tbl_customers','tbl_customers.id','=','vendor_ratings.user_id')
      ->where('vendor_ratings.vendor_id',$item['id'])->get();

      if($count>0)
      {
        $vendor_avarage =  number_format((float)($totalRating/$count), 1, '.', '');
      }
      else{
            $vendor_avarage =  $item['rating'];        
      }
           
          $Vendor_arr[]=array(  
                                'vendor_id'=>$item['id'],
                                'first_name'=>$item['first_name'] ,
                                'type'=>$item['vendor_type'] ,
                                'opening_time'=>$item['opening_time'] ,
                                'closing_time'=>$item['closing_time'] ,
                                'phone'=>$item['mobile'] ,
                                'image'=>$item['profile_image'] , 
                                'professional_service'=>$item['professional_service'] , 
                                'category'=>$item['subcat_title'] , 
                                'catalogues'=>$item['catalogue_title'] , 
                                'days'=>$item['days'] , 
                                'rating'=>$vendor_avarage , 
                                'address'=>$item['address'] ,
                                'shop_title'=>$item['shop_title'] ? : 'Shop Name',
                                //'is_online'=>$item->is_online , 
                               // 'duty_status'=>$item->duty_status_id , 
                                //'distance_km'=>number_format((float)$item->distancekm, 2, '.', ''), 
                                'curr_latitude'=>$item['vendor_latitude'] , 
                                'curr_longitude'=>$item['vendor_longitude'] , 
                                'curr_loc_address'=>$item['curr_loc_address'] , 
                             );

         }         
        
        $VendorsList = (new Collection($Vendor_arr));
        
        
        
         return view('front/details',compact('VendorsList','rating_info'));

       // return response()->json($VendorList[0]); 
    }
    
    public function vendor(Request $request)
    {
        if(isset($_COOKIE['user_latitude']) && !empty($_COOKIE['user_latitude'])){
			$lat =  $_COOKIE['user_latitude'];
			$long = $_COOKIE['user_longitude'];
			
			$Vendor_skils = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(vendor_latitude) ) * cos( radians(vendor_longitude) - radians($long)) + sin(radians($lat)) *sin(radians(vendor_latitude)) )) as distance FROM vendor_service_x_profile HAVING distance < 50 ORDER BY distance ASC "); //Employee::where('type_user',1)->first();
	    
		}
		else{
			$Vendor_skils = Vendor_skils::all();
		}
		
        return view('front/vendor_us', compact('Vendor_skils'));
    }
    
    public function vendorCategory($id)
    {
        if(isset($_COOKIE['user_latitude']) && !empty($_COOKIE['user_latitude'])){
			$lat =  $_COOKIE['user_latitude'];
			$long = $_COOKIE['user_longitude'];
			
			$Vendor_skils = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(vendor_latitude) ) * cos( radians(vendor_longitude) - radians($long)) + sin(radians($lat)) *sin(radians(vendor_latitude)) )) as distance FROM vendor_service_x_profile where `subcat_id`= '$id' HAVING distance < 50 ORDER BY distance ASC "); //Employee::where('type_user',1)->first();
	    
		}
		else{
			$Vendor_skils = Vendor_skils::where('subcat_id',$id)->get();
		}
		
        return view('front/vendor_us', compact('Vendor_skils'));
    }
    
    public function vendorCate(Request $request){
        $data = $request->all();
        $id = $data['id'];

        if(isset($_COOKIE['user_latitude']) && !empty($_COOKIE['user_latitude'])){
			$lat =  $_COOKIE['user_latitude'];
			$long = $_COOKIE['user_longitude'];
			
			$Vendor_skils = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(vendor_latitude) ) * cos( radians(vendor_longitude) - radians($long)) + sin(radians($lat)) *sin(radians(vendor_latitude)) )) as distance FROM vendor_service_x_profile where `subcat_id`= '$id' HAVING distance < 50 ORDER BY distance ASC "); //Employee::where('type_user',1)->first();
	    
		}
		else{
			$Vendor_skils = Vendor_skils::where('subcat_id',$id)->get();
		}
		
        return view('front/vendor_us', compact('Vendor_skils'));
    }

    public function vendors_detail($id)
    {
        $Vendor_skils = Vendor_skils::where('vendor_id',$id)->first();
        return view('front/details', compact('Vendor_skils'));
    }

   
}
