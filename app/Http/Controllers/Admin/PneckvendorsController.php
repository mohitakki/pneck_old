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


class PneckvendorsController extends Controller
{
    
    use AlertMessage;

    public function pneckVendors(Request $request)
    {
        //$vendors = Vendor::orderby('updated_at','desc')->get();

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
        return view('admin.pneckvendorlists',compact('vendors','popups'));
     }

    public function search()
    {
        LogActivity::addToLog('Search Vendor Mobile Page.');
        return view('admin.vendor_kyc');
    }
     
        public function vendorkyc(Request $request)
     {
        //  return "ok";
         
        $user= DB::table('tbl_vendors')
        ->select('tbl_vendors.*')
        ->orderBy('updated_at', 'desc')->where('tbl_vendors.id',$request->segment(4))->first();
         $popups = PopUp::where('popup_for','15')->where('status','1')->get();
         $roles = Role::all();
         LogActivity::addToLog('Upload the Pneck Vendor KYC.');
         return view('admin.vendoraadharkyc',compact('roles','user','popups'));
 //commented by riz   
        //end commented
        // if($request->segment(3)=="dl")
        // {
         
        //   $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        //   $roles = Role::all();
        //   LogActivity::addToLog('Upload the Pneck Vendor KYC.');
        //   return view('admin.vendorkyc',compact('roles','user','popups'));
        // }
        // elseif($request->segment(3)=="aadhar")
        // {
         
        //   $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        //   $roles = Role::all();
        //   LogActivity::addToLog('Upload the Pneck Vendor KYC.');
        //   return view('admin.vendoraadharkyc',compact('roles','user','popups'));
        // }
     }

     public function uploadkyc(Request $request)
     {
         
     
      if($request->hasFile('pan_img')) {       
        
        $filenamewithextension = $request->file('pan_img')->getClientOriginalName();
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        //get file extension
        $extension = $request->file('pan_img')->getClientOriginalExtension();
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
        //Upload File
        
        $file = $request->file('pan_img');
              $destinationPath = public_path('/pan_file/'); 
              $file->move($destinationPath, $filenametostore);
        
        // crop image
        
        $img = Image::make(public_path('/pan_file/'.$filenametostore));
        
        //$croppath = public_path('/storage/pan_file/crop/'.$filenametostore);
        $croppath = storage_path('/pan_file/crop/'.$filenametostore);
        
          try {
            
            $img->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'));
            $img->save($croppath); 
            } catch (\Exception $e) {
                $img->save($croppath); 
               // return $e->getMessage();
            }
       
        
        // you can save crop image path below in database
        $path = asset('storage/pan_file/crop/'.$filenametostore);

        $orignalimagepath = public_path('/pan_file/'.$filenametostore);
        
              $s = explode("/",$orignalimagepath);
             
            $url =  \Storage::disk('empdlkyc')->delete($s[6]);
            
            $payment_mode = $request->input('payment_mode');

            if(isset($path))
                {
                    $EmployeeUpdate =  Vendor::where('id',$request->id)->update(['payment_mode'=>$payment_mode,'branch_id'=>Auth::user()->branch_id,'pan_img'=>$path,'kyc_approved_at'=>date('Y-m-d H:i:s'),'kyc_approval'=>'accepted']);
                  
                }
            
        }

          if($request->hasFile('aadhar_img')) {            
        
            $filenamewithextension = $request->file('aadhar_img')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('aadhar_img')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //Upload File
            
            $file = $request->file('aadhar_img');
                  $destinationPath = public_path('/aadhar_file/'); 
                  $file->move($destinationPath, $filenametostore);
            
            // crop image
            $img = Image::make(public_path('/aadhar_file/'.$filenametostore));
            
            $croppath = storage_path('/aadhar_file/crop/'.$filenametostore);
            //$croppath = storage_path('aadhar_file/crop/'.$filenametostore);
            
            //new code added by riz
            try {
            
           
            $img->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'));
            $img->save($croppath); 
           
            } catch (\Exception $e) {
                $img->save($croppath); 
               // return $e->getMessage();
            }
            //end new code added by riz
     
            // you can save crop image path below in database
            $path = asset('storage/aadhar_file/crop/'.$filenametostore);
    
            $orignalimagepath = public_path('/aadhar_file/'.$filenametostore);
            
                $s = explode("/",$orignalimagepath);
                 
                $url =  \Storage::disk('empaadharkyc')->delete($s[6]);
                
                $payment_mode = $request->input('payment_mode');
    
                if(isset($path))
                {
                  $EmployeeUpdate =  Vendor::where('id',$request->id)->update(['payment_mode'=>$payment_mode,'branch_id'=>Auth::user()->branch_id,'aadhar_img'=>$path,'kyc_approved_at'=>date('Y-m-d H:i:s'),'kyc_approval'=>'accepted']);
                  
                }
                
            }

        $alert_message=$this->alerts('15');
        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        $roles = Role::all();

        LogActivity::addToLog('View the Pneck Vendor KYC.');
        return redirect::back()->with('success',$alert_message['2']);
     
    }

   	public function create()
    {
        $roles = Role::all();
        LogActivity::addToLog('Open the vendor create page.');
    		return view('admin.vendorcreate',compact('roles'));
   	}
    

    public function submit(Request $request)
    {
    	$exist=Vendor::where('email',$request->email)->first();
    	$alert_message=$this->alerts('15');
      if($exist =='')
    	{
    		$insert=new Vendor($request->all());
    		$insert->password=Hash::make($request->password);
    		$inserted=$insert->save();
          if($inserted)
          {
            LogActivity::addToLog('Create a new Vendor in admin panel.');
            return redirect::route('admin.vendoreusers')->with('success',$alert_message['1']);
          }
          else
          {
            return redirect::back()->with('error',$alert_message['6']);
          }  
    	}
    	else
    	{
    		return redirect::back()->with('warning',$alert_message['11']);
    	}
    	
    }

    public function edit($id)
    {
        
        $user=Vendor::find($id);
        $roles = Role::all();
        LogActivity::addToLog('Open edit pneck Vendor page.');
    	return view('admin.pneckeditvendor',compact('user','roles'));
   	}


   	public function update(Request $request)
   	{
   		$exist=Vendor::find($request->id);
      $data_exist=Vendor::where('email',$request->email)->first();
      $alert_message=$this->alerts('15');

      if(empty($data_exist) || ($data_exist->id == $exist->id))
      {

          if(!empty($request->role_type))
          {
            $exist->role_type=$request->role_type;
          }
          $exist->first_name=$request->first_name;
       		$exist->last_name=$request->last_name;
       		$exist->mobile=$request->mobile;
           $exist->email=$request->email;
           $exist->rating=$request->rating;
         /*  if(!empty($request->password))
          {
       		 $exist->password=Hash::make($request->password);
            
          } */
          if($request->image != '')
          {
            $rand=rand('100000','999999');
            $destinationPath = storage_path('/vendor_img/');
            $image_name=$request->image->getClientOriginalName();
            $image_name = $rand.str_replace(' ','',$image_name);
            $request->image->move($destinationPath, $image_name);
            $exist->profile_image=$image_name;
          }

       		$updated=$exist->save();
       		if($updated)
    	    	{
              if(!empty($request->url))
              {
                return redirect::back()->with('success',$alert_message['2']);
              }
              else
              {
                LogActivity::addToLog('Edit the Pneck Vendor.');
    	    		   return redirect::route('admin.pneckvendors')->with('success',$alert_message['2']);
              }
    	    	}
    	    	else
    	    	{
    	    		return redirect::back()->with('error',$alert_message['7']);
    	    	}
      }
      else
      {
        return redirect::back()->with('warning',$alert_message['12']);
      }	
   	}

   	public function uncheck($id)
   	{

   		$exist=Vendor::find($id);
   		$exist->pneck_vendor='0';
   		$updated=$exist->save();
        
       $alert_message=$this->alerts('15');
      if($updated)
	    	{
          LogActivity::addToLog('Inactive the Pneck Vendor.');
	    		Session::flash('success', $alert_message['4']); 
	    	}
	    	else
	    	{
	    		Session::flash('error', $alert_message['9']);
	    	}

   	}
   	public function check($id)
   	{

   		$exist=Vendor::find($id);
   		$exist->pneck_vendor='1';
   		$updated=$exist->save();  
      $alert_message=$this->alerts('15');
      if($updated)
	    	{
          LogActivity::addToLog('Active the Pneck Vendor.');
	    		Session::flash('success', $alert_message['3']);
	    	}
	    	else
	    	{
	    		Session::flash('error', $alert_message['8']);
	    	}

   	}

    public function delete($id)
    {

      $delete=Vendor::find($id)->delete();
      $alert_message=$this->alerts('15');
      if($delete)
        {
          LogActivity::addToLog('Delete the Vendor.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }

    }

    public function vendorsrating(Request $request)
    {
      $alert_message=$this->alerts('15');

        if($request->rating_for=='1')
        {          
          $SetRatings = Employee::where('rating',NULL)->update([ 'rating' => $request->rating ]);
        }
        if($request->rating_for=='2')
        {
          $SetRatings = Vendor::where('rating',NULL)->update([ 'rating' => $request->rating ]);
          Session::flash('success', $alert_message['2']);          
        }

        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','15');
        $roles = Role::all();
        LogActivity::addToLog('View the Pneck Vendor Rating Page.');
        return view('admin.pneckvendorsrating',compact('vendors','popups','roles'));
     }
}
