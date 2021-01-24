<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Employee;
use App\Employee_profile;
use Image;
use App\PopUp;
use App\Alert;
use App\AlertType;
use App\Role;
use Auth;
use Redirect;
use Hash;
use Session;
use DB;
use App\Traits\AlertMessage;
use App\Helpers\LogActivity;


class PneckemployeeController extends Controller
{
    
    use AlertMessage;

    public function pneckEmployee(Request $request)
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
        
        return view('admin.pneckemployeelists',compact('users','popups'));
     }
     
     public function employeelogininfo(Request $request)
     {
         if(Auth::user()->id == '1')
          {
            
        $users= DB::table('tbl_employees')
        ->leftJoin('employee_logins','employee_logins.emp_id','=','tbl_employees.id')
        ->leftJoin('tbl_employee_profile','tbl_employee_profile.emp_id','=','tbl_employees.id')
        ->where('employee_logins.emp_id',$request->segment(3))             
        ->select('tbl_employees.*','employee_logins.login_at','employee_logins.status as login','tbl_employee_profile.emp_id','tbl_employee_profile.profile_image','tbl_employee_profile.dl_file','tbl_employee_profile.vehicle_file','tbl_employee_profile.aadhar_image')
        ->orderBy('updated_at', 'desc')->get();
          }
          else{
            $users= DB::table('tbl_employees')
        ->leftJoin('employee_logins','employee_logins.emp_id','=','tbl_employees.id')
        ->leftJoin('tbl_employee_profile','tbl_employee_profile.emp_id','=','tbl_employees.id')
        ->where('employee_logins.emp_id',$request->segment(3))
        ->where('tbl_employees.branch_id','!=','') 
        ->select('tbl_employees.*','employee_logins.login_at','employee_logins.status as login','tbl_employee_profile.emp_id','tbl_employee_profile.profile_image','tbl_employee_profile.dl_file','tbl_employee_profile.vehicle_file','tbl_employee_profile.aadhar_image')
        ->orderBy('updated_at', 'desc')->get();              
          }

        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','15');
        LogActivity::addToLog('View the Pneck Employee Login info.');
        
        return view('admin.pneckemployeelogininfo',compact('users','popups'));
     }

    public function search()
    {
        LogActivity::addToLog('Search Employee Mobile Page.');
        return view('admin.employee_kyc');
    }

    public function ordersemployee()
    {

      $users= DB::table('tbl_bookings')
      ->leftJoin('tbl_employees','tbl_bookings.employee_id','=','tbl_employees.id')
      ->leftJoin('tbl_employee_profile','tbl_employee_profile.emp_id','=','tbl_employees.id')
      ->leftJoin('tbl_customers','tbl_customers.id','=','tbl_bookings.user_id')
      ->where('tbl_employees.id','!=','0')      
      ->select('tbl_employees.*','tbl_bookings.order_number','tbl_bookings.order_status','tbl_bookings.emp_reject_at','tbl_bookings.cancel_byuser_at','tbl_customers.profile_image as cus_image','tbl_bookings.updated_at as booking_date','tbl_bookings.created_at as booking_create_at','tbl_customers.first_name as cust_firstName','tbl_customers.last_name as cust_lastName','tbl_employee_profile.emp_id','tbl_employee_profile.profile_image as emp_image','tbl_employee_profile.dl_file','tbl_employee_profile.vehicle_file','tbl_employee_profile.aadhar_image')
      ->orderBy('tbl_bookings.updated_at', 'desc')->get();
     
        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','15');
        LogActivity::addToLog('View the Pneck Employee Booking  Order list.');
        return view('admin.employeeorderlists',compact('users','popups'));
     }

     public function invoice(Request $request)
     {
      $users= DB::table('tbl_bookings')
      ->leftJoin('tbl_employees','tbl_bookings.employee_id','=','tbl_employees.id')
      ->leftJoin('tbl_employee_profile','tbl_employee_profile.emp_id','=','tbl_employees.id')
      ->leftJoin('tbl_customers','tbl_customers.id','=','tbl_bookings.user_id')
      ->leftJoin('booking_x_items','booking_x_items.booking_id','=','tbl_bookings.id')
      ->where('tbl_employees.id','!=','0')
      ->where('tbl_bookings.order_number',$request->segment(3))      
      ->select('tbl_employees.*','booking_x_items.order_info','tbl_bookings.user_drop_address','tbl_bookings.booking_complete_at','tbl_bookings.pay_amount','tbl_bookings.order_number','tbl_bookings.order_status','tbl_bookings.emp_reject_at','tbl_bookings.cancel_byuser_at','tbl_customers.profile_image as cus_image','tbl_bookings.updated_at as booking_date','tbl_bookings.created_at as booking_create_at','tbl_customers.first_name as cust_firstName','tbl_customers.last_name as cust_lastName','tbl_employee_profile.emp_id','tbl_employee_profile.profile_image as emp_image','tbl_employee_profile.dl_file','tbl_employee_profile.vehicle_file','tbl_employee_profile.aadhar_image')
      ->orderBy('tbl_bookings.updated_at', 'desc')->first();

      $GSTamount = ($users->pay_amount)*18/100;      
      $grandTotal = $users->pay_amount+$GSTamount; 
      
      $str     = $users->user_drop_address;
      $res_str = array_chunk(explode(",",$str),2);
      foreach( $res_str as &$val){
        $val  = implode(",",$val);
      }
      $customeraddress = implode("<br/>",$res_str);

     // echo $customeraddress."<br/>";

     // $res_str_final = array_chunk(explode(",",$customeraddress),1);
     // foreach( $res_str_final as &$value){
        //$value  = implode(",",$value);
     // }

     // $customerFinalAddress = implode("<br/>",$res_str_final);

     // echo $customerFinalAddress;
      
         LogActivity::addToLog('Open the user create page.');
         return view('admin.invoice',compact('users','customeraddress','GSTamount','grandTotal'));
      }
     
     public function employeekyc(Request $request)
     {
        $user= DB::table('tbl_employees')
        ->leftJoin('tbl_employee_profile','tbl_employee_profile.emp_id','=','tbl_employees.id')      
        ->select('tbl_employees.*','tbl_employee_profile.emp_id','tbl_employee_profile.profile_image','tbl_employee_profile.dl_file','tbl_employee_profile.vehicle_file','tbl_employee_profile.aadhar_image')
        ->orderBy('updated_at', 'desc')->where('tbl_employees.id',$request->segment(4))->first();        

        if($request->segment(3)=="dl")
        {
          $popups = PopUp::where('popup_for','15')->where('status','1')->get();
          $roles = Role::all();
          LogActivity::addToLog('View the Pneck Employee KYC.');
          return view('admin.employeekyc',compact('roles','user','popups'));
        }
        elseif($request->segment(3)=="vehicle")
        {
          $popups = PopUp::where('popup_for','15')->where('status','1')->get();
          $roles = Role::all();
          LogActivity::addToLog('View the Pneck Employee KYC.');
          return view('admin.employeevehiclekyc',compact('roles','user','popups'));
        }

        elseif($request->segment(3)=="aadhar")
        {
          $popups = PopUp::where('popup_for','15')->where('status','1')->get();
          $roles = Role::all();
          LogActivity::addToLog('View the Pneck Employee KYC.');
          return view('admin.employeeaadharkyc',compact('roles','user','popups'));
        }
     }

     public function uploadkyc(Request $request)
     {
      
      if($request->hasFile('dl_file')) {       
        
        $filenamewithextension = $request->file('dl_file')->getClientOriginalName();
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        //get file extension
        $extension = $request->file('dl_file')->getClientOriginalExtension();
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
        //Upload File
        
        $file = $request->file('dl_file');
              $destinationPath = public_path('/dl_file/'); 
              $file->move($destinationPath, $filenametostore);
        
        // crop image
        $img = Image::make(public_path('/dl_file/'.$filenametostore));
        
        //$croppath = public_path('/dl_file/crop/'.$filenametostore);
        $croppath = storage_path('/dl_file/crop/'.$filenametostore);
        
       // echo $croppath;
       // exit;
 
//         $img->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'));
//         $img->save($croppath); 
             try {
            
            $img->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'));
            $img->save($croppath); 
            } catch (\Exception $e) {
                $img->save($croppath); 
               // return $e->getMessage();
            }
          
        // you can save crop image path below in database
        $path = asset('storage/dl_file/crop/'.$filenametostore);

        $orignalimagepath = public_path('/dl_file/'.$filenametostore);
        
              $s = explode("/",$orignalimagepath);
             
            $url =  \Storage::disk('empdlkyc')->delete($s[6]);

            if(isset($path))
            {
             $result =  Employee_profile::where('emp_id',$request->id)->first();
              
              if($result['emp_id']!='')
                  {
                         $update =  Employee_profile::where('emp_id',$request->id)->update(['dl_file'=>$path]);
                  }
                  else{
                      
                      $insert=new Employee_profile($request->all());
                      $insert->emp_id=$request->id;
    		          $insert->dl_file=$path;
    	              $inserted=$insert->save();
                  }
                   
                     
             
              if(isset($update))
              {
          $EmployeeUpdate =  Employee::where('id',$request->id)->update(['branch_id'=>Auth::user()->branch_id,'profile_active'=>'yes','doc_verified'=>1]);
              }
            }
            
        }

        if($request->hasFile('vehicle_file')) {
        
          $filenamewithextension = $request->file('vehicle_file')->getClientOriginalName();
          //get filename without extension
          $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
          //get file extension
          $extension = $request->file('vehicle_file')->getClientOriginalExtension();
          //filename to store
          $filenametostore = $filename.'_'.time().'.'.$extension;
          //Upload File
          
          $file = $request->file('vehicle_file');
                $destinationPath = storage_path('/vehicle_file/'); 
                $file->move($destinationPath, $filenametostore);
          
          // crop image
          $img = Image::make(storage_path('vehicle_file/'.$filenametostore));
          
          //$croppath = public_path('/storage/vehicle_file/crop/'.$filenametostore);
          $croppath = storage_path('vehicle_file/crop/'.$filenametostore);
   
          try {
            
            $img->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'));
            $img->save($croppath); 
            } catch (\Exception $e) {
                $img->save($croppath); 
               // return $e->getMessage();
            }
          // you can save crop image path below in database
          $path = asset('storage/vehicle_file/crop/'.$filenametostore);
  
          $orignalimagepath = storage_path('vehicle_file/'.$filenametostore);
          
                $s = explode("/",$orignalimagepath);
               
              $url =  \Storage::disk('empvehiclekyc')->delete($s[6]);
  
              if(isset($path))
              {
                   $result =  Employee_profile::where('emp_id',$request->id)->first();
                   
                  if($result['emp_id']!='')
                  {
                        $update =  Employee_profile::where('emp_id',$request->id)->update(['vehicle_file'=>$path]);
                  }
                  else{
                      
                      $insert=new Employee_profile($request->all());
                      $insert->emp_id=$request->id;
    		          $insert->vehicle_file=$path;
    	              $inserted=$insert->save();
                  }
                   
               
                if(isset($update))
                {
                  $EmployeeUpdate =  Employee::where('id',$request->id)->update(['branch_id'=>Auth::user()->branch_id,'profile_active'=>'yes','doc_verified'=>1]);
                }
              }
              
          }

          if($request->hasFile('aadhar_file')) {            
        
            $filenamewithextension = $request->file('aadhar_file')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('aadhar_file')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //Upload File
            
            $file = $request->file('aadhar_file');
                  $destinationPath = storage_path('/aadhar_file/'); 
                  $file->move($destinationPath, $filenametostore);
            
            // crop image
            $img = Image::make(storage_path('aadhar_file/'.$filenametostore));
            
            //$croppath = public_path('/storage/aadhar_file/'.$filenametostore);
            $croppath = storage_path('aadhar_file/'.$filenametostore);
     
            try {
            
            $img->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'));
            $img->save($croppath); 
            } catch (\Exception $e) {
                $img->save($croppath); 
               // return $e->getMessage();
            }
            // you can save crop image path below in database
            $path = asset('storage/aadhar_file/'.$filenametostore);
    
            $orignalimagepath = storage_path('aadhar_file/'.$filenametostore);
            
                  $s = explode("/",$orignalimagepath);
                 
                $url =  \Storage::disk('empaadharkyc')->delete($s[6]);
    
                if(isset($path))
                {
                  $result =  Employee_profile::where('emp_id',$request->id)->first();
                  
                  if($result['emp_id']!='')
                  {
                       $update =  Employee_profile::where('emp_id',$request->id)->update(['aadhar_image'=>$path]);
                  }
                  else{
                      
                      $insert=new Employee_profile($request->all());
                      $insert->emp_id=$request->id;
    		          $insert->aadhar_image=$path;
    	              $inserted=$insert->save();
                  }
                  
                 
                  if(isset($update))
                  {
                    $EmployeeUpdate =  Employee::where('id',$request->id)->update(['branch_id'=>Auth::user()->branch_id,'profile_active'=>'yes','doc_verified'=>1]);
                  }
                }
                
            }

       

        $alert_message=$this->alerts('15');
        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        $roles = Role::all();

        LogActivity::addToLog('View the Pneck Employee KYC.');
        return redirect::back()->with('success',$alert_message['2']);
     
    }

   	public function create()
    {
        $roles = Role::all();
        LogActivity::addToLog('Open the Employee create page.');
    		return view('admin.employeecreate',compact('roles'));
   	}
    

    public function submit(Request $request)
    {
    	$exist=Employee::where('email',$request->email)->first();
    	$alert_message=$this->alerts('15');
    	
      if($exist =='')
    	{
    		$insert=new Employee($request->all());
    		$insert->password=Hash::make($request->password);
    		$inserted=$insert->save();
          if($inserted)
          {
            LogActivity::addToLog('Create a new employee in admin panel.');
            return redirect::route('admin.pneckemployee')->with('success',$alert_message['1']);
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
        
        $user=Employee::find($id);
        $roles = Role::all();
        LogActivity::addToLog('Open edit pneck Employee page.');
    	return view('admin.pneckeditemployee',compact('user','roles'));
   	}


   	public function update(Request $request)
   	{
   		$exist=Employee::find($request->id);
      $data_exist=Employee::where('email',$request->email)->first();
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
         /*  if(!empty($request->password))
          {
       		 $exist->password=Hash::make($request->password);
            
          } */
          if($request->image != '')
          {
            $rand=rand('100000','999999');
            $destinationPath = storage_path('/employee_img/');
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
                LogActivity::addToLog('Edit the Pneck Employee.');
    	    		   return redirect::route('admin.pneckemployee')->with('success',$alert_message['2']);
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

   		$exist=Employee::find($id);
   		$exist->pneck_emp='0';
   		$updated=$exist->save();
        
       $alert_message=$this->alerts('15');
      if($updated)
	    	{
          LogActivity::addToLog('Inactive the Pneck Employee.');
	    		Session::flash('success', $alert_message['4']); 
	    	}
	    	else
	    	{
	    		Session::flash('error', $alert_message['9']);
	    	}

   	}
   	public function check($id)
   	{

   		$exist=Employee::find($id);
   		$exist->pneck_emp='1';
   		$updated=$exist->save();  
      $alert_message=$this->alerts('15');
      if($updated)
	    	{
          LogActivity::addToLog('Active the Pneck employee.');
	    		Session::flash('success', $alert_message['3']);
	    	}
	    	else
	    	{
	    		Session::flash('error', $alert_message['8']);
	    	}

   	}

    public function delete($id)
    {

      $delete=Employee::find($id)->delete();
      $alert_message=$this->alerts('15');
      if($delete)
        {
          LogActivity::addToLog('Delete the employee.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }

    }
}
