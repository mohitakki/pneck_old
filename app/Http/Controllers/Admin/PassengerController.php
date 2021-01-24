<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\Passenger;
use App\Customer_otp;
use App\Admin;
use App\PopUp;
use App\Role;
use Auth;
use Redirect;
use Hash;
use Session;
use App\Traits\AlertMessage;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Hash;

class PassengerController extends Controller
{
      use AlertMessage;

      protected function _otpsend_mobile_verify($otp,$mobile){
        $response='notsent';
        $sendDone=2; //2==not
        if($sendDone==1){
         $response='sent';
        }
        ///////Sent////////
        //  $page='https://pneck.in/upload-document.php';
      $msgInfo='Mobile Verification for Passenger ';
        $msg=urlencode($msgInfo);
 
       $msg = urlencode("Your one time otp code is $otp");
       //$mob='7291919640'; //testing
        $mob=$mobile;
 
      ///////////////
       $url = "http://5.189.187.82/sendsms/bulk.php?username=EPKamitkumar&password=amit87495&type=TEXT&sender=CPNECK&mobile=".$mob."&message=".$msg;
        // echo $url; die;
 
                          $ch = curl_init();
                         curl_setopt($ch, CURLOPT_URL, $url);
                         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                         curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                         $data = curl_exec($ch);
 
                         if(curl_errno($ch))
                         {   // echo 'ERRRR';
                             $msg1='SMS Not sent';
                             $Error = curl_error($ch);
                             return 'notsent';
                         
                         }else{   //echo 'OTP sent';
                         
                       $msg1='SMS sent';
                        return 'sent';
 
                         }
 
        ///////////////////
        return $response;
       
     }

        public function view()
    {
        $passenger = Passenger::orderby('updated_at','desc')->get();
        // $popups = PopUp::where('popup_for','4')->get();
        // Session::forget('sidebarid');
        // Session::put('sidebarid','4');
        return view('admin.passenger-list',compact("passenger"));
    }

    public function addview()
    {
        // $data = GeneralSetting::orderby('updated_at','desc')->get();
        // $popups = PopUp::where('popup_for','4')->get();
        // Session::forget('sidebarid');
        // Session::put('sidebarid','4');
        $countries = Country::all();
        
        return view('admin.passenger-add',compact("countries"));
    }
    public function savePassenger(Request $request)
    { 
        $validation = Validator::make($request->all(), [
            "fname" => 'required',
            "lname" => 'required',
            "email" => 'required|email',
            "country_code" => 'required',
            "contact_number" => 'required',
            "gender" => 'required',
            "password" => 'required|confirmed|min:6',
            "description" => 'required',
            "image" => 'required|image',
         ]);
        if ($validation->fails()) {

            $message = $validation->messages();
            $alert_message=$this->alerts('15');
            return Redirect::back()->withErrors($message)->with('error',$alert_message['6']);;
        } else {
            // send OTP//
            // $current_time = \Carbon\Carbon::now()->toDateTimeString();
            // $create_otp=rand(100000,999999);
            // $mobile_number=$request->contact_number;  //  By email:($otp,$mob){
            // $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
            // $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
            // $Otp_ob=new Customer_otp;
            // $Otp_ob->otp_type='for_mobile_verified';
            // $Otp_ob->mobile=$request->contact_number;//RegisteredMobile
            // $Otp_ob->otp=$create_otp;
            // $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
            // $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
            // $Otp_ob->save();
            // send OTP//
                
                
            $imagepath = "";
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename =  str_replace(' ', '', $file->getClientOriginalName());
                $finalname = date('hsi').'_'.$filename;

                $path = public_path() . '/passenger/';
                $imagepath=url('/').'/passenger/'.$finalname;
            }
           
            $savePassenger = new Passenger();
            $savePassenger->first_name = $request->fname;
            $savePassenger->last_name  = $request->lname;
            $savePassenger->email  = $request->email;
            $savePassenger->country_code  = $request->country_code;
            $savePassenger->contact_number  = $request->contact_number;
            $savePassenger->gender  = $request->gender;
            $savePassenger->Password  = Hash::make($request->password);
            $savePassenger->description  = $request->description;
            $savePassenger->image  = $imagepath;

            $savePassenger->save();
             $alert_message=$this->alerts('0');
            return Redirect::back()->with('success',$alert_message['1']);
        }
    }


    public function updatePassenger(Request $request)
    {
        // if($request->has('password')){
        //     dd('yes');
        // }
        // dd($request);
        
            $validation = Validator::make($request->all(), [
                "fname" => 'required',
                "lname" => 'required',
                "email" => 'required|email',
                "country_code" => 'required',
                "contact_number" => 'required',
                "gender" => 'required',
                "description" => 'required',
                
             ]);

            if($request->password != "" || $request->password != null ){
                $validation = Validator::make($request->all(), [
                "password" => 'required|confirmed|min:6'
                ]);
                
            }elseif ($request->hasFile('image')) {
                $validation = Validator::make($request->all(), [
                    "image" => 'required|image',
                ]);
            }
        if ($validation->fails()) {
            $message = $validation->messages();
            $alert_message=$this->alerts('15');
            return Redirect::back()->withErrors($message)->with('error',$alert_message['6']);;
        } else {
            // dd($request);
            $imagepath = "";
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename =  str_replace(' ', '', $file->getClientOriginalName());
                $finalname = date('hsi').'_'.$filename;
                $path = public_path() . '/passenger/';
                // dd($fullname);
                $file->move($path, $finalname);
                $imagepath=url('/').'/passenger/'.$finalname;
            }

            $data = [
                'first_name' =>$request->fname,
                'last_name'  => $request->lname,
                'email'  => $request->email,
                'country_code'  => $request->country_code,
                'contact_number'  => $request->contact_number,
                'gender'  => $request->gender,
            ];
            if($request->password != "" || $request->password != null ){
                $data['Password']  = Hash::make($request->password);
            }
            if($imagepath != ""){
                $data['image']  = $imagepath;
            }
            // dd($data);
            $user = Passenger::findOrFail ($request->hiddenvalue);
            $user->update($data);
            // dd($user);
            // $savePassenger = new Passenger();
            // $savePassenger->first_name = $request->fname;
            // $savePassenger->last_name  = $request->lname;
            // $savePassenger->email  = $request->email;
            // $savePassenger->country_code  = $request->country_code;
            // $savePassenger->contact_number  = $request->contact_number;
            // $savePassenger->gender  = $request->gender;
            // if($request->has('password')){
            //     $savePassenger->Password  = Hash::make($request->password);
            // }
            // $savePassenger->description  = $request->description;
            // if($request->hasFile('image')){
            // $savePassenger->image  = $imagepath;
            // }

            // $savePassenger->update();
             $alert_message=$this->alerts('0');
            return Redirect::back()->with('success',$alert_message['2']);
        }
    }

    public function deletePassenger($id)
    {
        $delete = Passenger::findorfail($id);
        // return response()->json(['data'=>$delete->id]);
        if($delete->id == $id){
            Passenger::where('id',$id)->delete();
            return response()->json(['data'=>'deleted']);
        }else{
            return response()->json(['data'=>'data not found']);
        }
    }
    public function singlepassengerview($id)
    {   
        $countries = Country::all();
        $passenger = Passenger::find($id);
        return view('admin.passenger-add',compact("passenger","countries"));
    }

    public function unverifiedview()
    {
        // $data = GeneralSetting::orderby('updated_at','desc')->get();
        // $popups = PopUp::where('popup_for','4')->get();
        // Session::forget('sidebarid');
        // Session::put('sidebarid','4');
        return view('admin.unverifiedv-driver_list');
    }

    public function create()
    {
        return view('admin.driver_create');
    }
    

    public function general(Request $request)
    {
      
        // $insert=new GeneralSetting($request->all());
        // $insert->updated_by=Auth::guard('admin')->user()->id;
        // if($request->logo != '')
        // {
        //   $rand=rand('100000','999999');
        //   $destinationPath = public_path('/admin_logos');
        //   $image_name=$request->logo->getClientOriginalName();
        //   $image_name = $rand.str_replace(' ','',$image_name);
        //   $request->logo->move($destinationPath, $image_name);
        //   $insert->logo=$image_name;
        // }
        // $inserted=$insert->save();
        // $alert_message=$this->alerts('4');
        // if($inserted)
        // {
        //   return redirect::route('admin.backend-data')->with('success',$alert_message['1']);
        // }
        // else
        // {
        //   return redirect::back()->with('error',$alert_message['5']);
        // } 
      
      
    }

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
