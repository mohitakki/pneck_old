<?php

// namespace App\Http\Controllers\API;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Customer_otp;
use App\User_feedback;
use Illuminate\Support\Facades\DB;
use Edujugon\PushNotification\PushNotification;
use Illuminate\Support\Str;


class CustomerController extends BaseController
{
    //
    public function __construct(){
    	//echo 'Global funtioon';
        $demo='';
    }


/*****
    @ _otpsend_mobile_verify($otp,$mob){
       $response='notsent';
       @ Mobile& OTP requirerd

    **/

    protected function _otpsend_mobile_verify($otp,$mobile){
       $response='notsent';
       $sendDone=2; //2==not
       if($sendDone==1){
        $response='sent';
       }
       ///////Sent////////
        $page='https://pneck.in/upload-document.php';
     $msgInfo='Mobile verfied, Upload document-'.$page;
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



/*
   @ Doc:uploa SMS
   **/
  protected function _SmsToMobile($mobile,$get_msg=NULL){
      if(!empty($get_msg)){

       // rawurldecode
         $msg=urlencode($get_msg);

      }else{

    $page='https://pneck.in/upload-document.php';
     $msgInfo='Mobile verfied, Upload document-'.$page;
     $msg=urlencode($msgInfo);

      }
    
    //echo 'mesg:'.$msg;  die; 

     ///////////////////////////////////

   $mob=$mobile;
     ///////////////
     $url = "http://5.189.187.82/sendsms/bulk.php?username=EPKamitkumar&password=amit87495&type=TEXT&sender=CPNECK&mobile=".$mob."&message=".$msg;
        //echo $url; die;

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

                        //cho $msg1; die;


   }
   //////


    /**
    @ Just messag to User

    **/
    protected function _SmsOnMobile($mobile){

     
     $msgInfo='Mobile verfied';
     $msg=urlencode($msgInfo);

   $mob=$mobile;
     ///////////////
      $url = "http://5.189.187.82/sendsms/bulk.php?username=EPKamitkumar&password=amit87495&type=TEXT&sender=CPNECK&mobile=".$mob."&message=".$msg;
        //echo $url; die;

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

                        //cho $msg1; die;


   }

    protected function _valid_token($eid,$input_token){
      $emp_ob=Customer::find($eid);
      // $getDbToken='123456'; //default
      if(isset($emp_ob)&&!empty($emp_ob)){

         $getDbToken=$emp_ob->ep_token;
     if($input_token==$getDbToken){
        return true; // Req. token matched :OK 

     }else return false;  // Token not match
     
     //print_r($emp_ob->ep_token);  die;


        
      }else{
         return false;  //Invalid User
      }

    
    #############################
    
   }

/***
@Feedback option


**/

 public function userAddFeedback(Request $request)
    {   $input=$request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'ep_token' => 'required',
            'name' => 'required',
            'subj' => 'required',
            'message' => 'required',

            
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

        //////////////////////////////////////////////////
         //$app_warnings[]='Request JSON pending! ';
         if(!empty($app_warnings)){

          $msg_str=implode(', ', $app_warnings);
           return $this->appError('System error--'.$msg_str);
         }

      ////////////////////SystemError///////////////////// 
        $get_uid=$input['user_id'];
        $User=Customer::find($get_uid);
           if(!isset($User)){
            return $this->appError('Wrong User ID! ');
           }


            if(isset($User)&&$this->_valid_token($get_uid,$input['ep_token'])==false){
             return $this->appError('User Token not matched! ');
            }

        ////////////Update in db//////////////
             $Feedback=new User_feedback;
             $Feedback->user_id=$User->id;
             $Feedback->user_type='user';
             $Feedback->user_name=($input['name'])?$input['name']:'';
             $Feedback->subject_name=($input['subj'])?$input['subj']:'';
             $Feedback->message=$input['message'];
            // $Feedback->save();
            $resp_arr=[]; 
            if($Feedback->save()){
              return $this->sendResponse($resp_arr, 'Data Sent! ');

            }

             ###################
             return $this->appError('Error in update!,Try later! ');

      }




  /****
  @ Forgot Password match OTP.
  @ OTP required and user should be Active by  regsiter
  @mobile number should be verfied
  @ then -only can request for Forogt pass

  **/
   public function forgot_pass_verify_mobile(Request $request){    



        /////////Check use updaate///////////
         $validator = Validator::make($request->all(), [
            'mobile_number' => 'required',
            'otp' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        ############Testing Case :Developer########################

       // return $this->appError('Mobile not registerd with us!!!! ');


        #################################################


        // emplyee Register
        $input=$request->all();
          $mobNum=$input['mobile_number']; // tbl_employees ,tbl_employees_otp
        // print_r($input); die;
        $current_time = \Carbon\Carbon::now()->toDateTimeString();
        ////////////Main record///////////
         // $Customer=Customer::where('mobile',$mobNum)->first();
        
         $Customer=Customer::where('mobile',$mobNum)->first();
          //////////////////////////////////

         if(!isset($Customer)){
            return $this->appError('Mobile not registerd with us! ');
         }

         #############################################


         //////////TestPass///////////////
        //  $Textmsg='Pneck Password is User123';
        // echo  $sendsms=$this->_docSms($mobNum,$Textmsg);

        //  die;        




         /**
         @  $otpRow = Emp_otp::where('mobile','7291919640')->orderBy('expire_time','desc')->get();
          // is_mobile_verified  , mobile_verified_at

         **/

        $row= DB::table('tbl_customer_otp')
                ->where('otp_purpose', 'forgot_pass_verify_mobile_otp')
                ->where('mobile',$mobNum)
                ->where('expire_time', '>',$current_time)
                ->orderBy('expire_time', 'desc')
                ->first();

               // echo  'xx==';

               // // print_r($row); 
               //   var_dump($row);
               

               //   die; 


                 // if($row==NULL){
                 //   return $this->appError('OTP Incorrect or Expired! ');
                 // }

                 



                // if(isset($row)&&$row->is_used==0){
                if(isset($row)&&!empty($row)&&$row->is_used==0){

                     $app_warnings[]='Mobile ok,';

                      //return $this->appError('Mobile ok! ');
                      ############################



                     if($input['otp']==$row->otp){ 
                      # updatet otp status
                 $getid=$row->id;
                 $otp_obj=Customer_otp::find($getid);
                 $otp_obj->is_used=1; $otp_obj->save();

          /////Update status ////////
           if(isset($Customer)){  // Mobile Verfied date savedd

            $req_pass="User".rand(100000,999999);

              $changePass= bcrypt($req_pass);

            
          $Customer->password=$changePass;
          // $Customer->first_name= 'TestpasChanged';
          $Customer->updated_at=$current_time;
          $Customer->save();  

          /// Send on phone ///
           //$Textmsg='Pneck Password is User123';
          $Textmsg="Pneck Password is $req_pass";
          $sendASms=$this->_SmsToMobile($mobNum,$Textmsg);

           //return $this->sendResponse($send_arr[], $sendASms.' Password sent to Mobile!!! ');

           // die; 

           }

          
          $send_arr['mobile']=$Customer->mobile;
          return $this->sendResponse($send_arr, 'Password sent to Mobile! ');
      

             }else{ // OPT not correct';
              return $this->appError('OTP Incorrect! '); }

                  
                         
                    

                }else{ // if(isset($row)&&!empty($row)&&$row->is_used==0){
                   
                    $app_warnings[]='Mobile not registerd in system';
                    return $this->appError('OTP Incorrect or Expired! ');
                }



                /////Send Response//



    }

    /****
    @Resend OTP 


    **/

    public function userRegisterResendOtp(Request $request){

        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required',
            //'ep_token' => 'required',
        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
   ////////////////////////////////////////
      ######Testin in usere Accouny#

         // return $this->sendResponse($success=[], 'Sent successfully!!!  ');


        ########################################



      ///////////////Test SMS///////////////  
         
          $Customer=Customer::where('mobile',$input['mobile_number'])->first();




         if(!isset($Customer))return $this->appError('mobile not registerd with us! ');
         //////////////////////
        // $app_warnings[]='OTP sent successfully! ';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemMessage-'.$msg_str);
          }


        if(!empty($Customer)&&$Customer->mobile==$input['mobile_number']){

          $app_warnings[]='Create forgot_pass otp ';
      

            $create_otp=$otp =rand(100000,999999);
                    $mobile_number=$input['mobile_number'];  //  By email:($otp,$mob){

                  $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);


                  //echo $send_new_otp ,':'.$send_new_otp ; die; 


                   $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                  // Insert new otp////////////
                  
                  
                   $Otp_ob=new Customer_otp;
                   $Otp_ob->otp_type='for_mobile_verified';
                   $Otp_ob->otp_purpose='';

                   $Otp_ob->mobile=$input['mobile_number'];//RegisteredMobile
                   $Otp_ob->otp=$create_otp;
                   $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
                    $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
                    $Otp_ob->save();

                ///////Response to Screen /////////////
                    $success['mobile'] = $input['mobile_number'];
                    $success['msg'] ='OTP match pending! ';
                    return $this->sendResponse($success, 'Otp Re-Send successfully!  ');

                     

          //////////////////

        }else{
          return $this->appError('Error in sending otp! ');

        }


        //////////////////////////////
         //print_r($app_warnings); die; 

      }





 /**
 @Forgot by Mobile 
 @ mobile Number required 
 @OTP purpoase:forgot_pass_verify_mobile_otp

 **/


public function forgot_pass_mobile(Request $request){

        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            //'ep_token' => 'required',
        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
   ////////////////////////////////////////
      ######Testin in usere Accouny#

         // return $this->sendResponse($success=[], 'Sent successfully!!!  ');


        ########################################



      ///////////////Test SMS///////////////  
         
          $Customer=Customer::where('mobile',$input['mobile'])->first();

         if(!isset($Customer))return $this->appError('mobile not registerd with us! ');

         if(!empty($Customer)&&$Customer->mobile_verified_at==NULL)
          return $this->appError('Inactive profile,not allowed! ! ');


         
         //echo 'Customer';  var_export($Customer->mobile_verified_at);

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }

         ///////////////////////////////////



        if(!empty($Customer)&&$Customer->mobile==$input['mobile']){

          $app_warnings[]='Create forgot_pass otp ';
          //return $this->appError('Create forgot_pass otp!  ');
          # Send otp 

            $create_otp=$otp =rand(100000,999999);
                    $mobile_number=$input['mobile'];  //  By email:($otp,$mob){

                  $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);


                 // echo $send_new_otp ,':'.$send_new_otp ; die; 


                   $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                  // Insert new otp////////////
                  
                  
                   $Otp_ob=new Customer_otp;
                   $Otp_ob->otp_type='for_mobiler';
                   $Otp_ob->otp_purpose='forgot_pass_verify_mobile_otp';

                   $Otp_ob->mobile=$input['mobile'];//RegisteredMobile
                   $Otp_ob->otp=$create_otp;
                   $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
                    $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
                    $Otp_ob->save();

                ///////Response to Screen /////////////
                    $success['mobile'] = $input['mobile'];
                    $success['msg'] ='OTP match pending! ';
                    return $this->sendResponse($success, 'Otp Sent successfully!  ');

                     

          //////////////////

        }else{
          return $this->appError('Error in sending otp! ');

        }


        //////////////////////////////
         //print_r($app_warnings); die; 

      }





   /**
  @UserChangePassword
 @ Required : user_id,ep_token
   @Validation Error Comine
   @ old_pass,  password ,  c_password


**/



  public function change_pass(Request $request){

     $input=$request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'ep_token' => 'required',
            'old_pass' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
            //'device_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      ////////TokenValid//////
        $getuid=$input['user_id'];          

          $Customer=Customer::find($getuid);
          #############################################
           if(!isset($Customer)){
           // return $this->appError('Wrong user-id! ');
             $app_warnings[]='Wrong Employee ID! ';  //Return 
           }

            if(isset($Customer)&&$this->_valid_token($getuid,$input['ep_token'])==false){
              // return $this->appError('User Token not matched! ');
               $app_warnings[]='User Token not matched! '; 
            }

             if(!empty($input['old_pass'])&&$input['old_pass']==$input['password']){

               //return $this->appError('Old and New password Same not allowed! ');
                $app_warnings[]='Old and New password Same not allowed! ';
             }
             //////////System-PneckAppError////////////
             if(!empty($app_warnings)&&count($app_warnings)>0){
              $msg_str=implode(', ', $app_warnings);

              return $this->appError('SystemError-'.$msg_str);

             }
        
            /////////UpdatePass/////////////
            # Match Old Password.
            $enteredPassword=$input['old_pass'];

             if(Hash::check($enteredPassword ,$Customer->password)){//OK

               //return $this->sendResponse($resp_arr=[], 'Ok, Updated!XXXX! ');

              ##################

              $form_pass=$input['password'];
              unset($input['password']); unset($input['c_password']);
              $Customer->password=bcrypt($form_pass);

                if($Customer->save()){ //Saved
                  //return $this->appError('OK,Updated! ');
                   $resp_arr=[];
                   $resp_arr['msg']='Password Changed successfully! ';
                  return $this->sendResponse($resp_arr, 'Ok, Updated! ');

                }else{
                   return $this->appError('Error in update!,Try later! ');
                }

              
                //Update to Db///
             

             }else{
               return $this->appError('Old password not matched! ');
             }

        ///////////////
   }

   /**
   @ Edit UserProfile


   **/

    public function edit_profile(Request $request)
    {     
      //echo '====';   die ;


          $input=$request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'ep_token' => 'required',
//             'first_name' => 'required',
//             'last_name' => 'required',
            'name' => 'required',
            'usr_gender' => 'required',
            'usr_address' => 'required',
            
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

        //////////////////////////////////////////////////
        // $app_warnings[]='Request JSON pending! ';
         if(!empty($app_warnings)){

          $msg_str=implode(', ', $app_warnings);
           return $this->appError('System error--'.$msg_str);
         }





      ////////////////////SystemError///////////////////// 
       try {  
        $get_uid=$input['user_id'];
         
          $User=Customer::find($get_uid);

           if(!isset($User)){
            return $this->appError('Wrong User!');
             //$app_warnings[]='Wrong Employee ID! ';  //Return 
           }

            if(isset($User)&&$this->_valid_token($get_uid,$input['ep_token'])==false){
             return $this->appError('User Token not matched! ');
            }


        ////////////Update in db//////////////
            if($User ?? 'qwer'==$get_uid){
//               $User->first_name = $request->first_name;
//               $User->last_name = $request->last_name;
              $User->name = $request->name;
              $User->usr_gender = $request->usr_gender;
              $User->usr_address = $request->usr_address;
              $User->save();
              
              $mStatus=(!empty($User->mobile_verified_at))?'yes':'no';
              
              $resp_arr=[
//                 'first_name' => $User->first_name,
//                 'last_name' => $User->last_name,
                'name' => $User->name,
                'mobile' => $User->mobile,
                'email' => $User->email,
                'mobile_verified' => $mStatus,
                'usr_gender' => $User->usr_gender,
                'usr_address' => $User->usr_address
              ]; 

              return response()->json(['data'=>$resp_arr,'message'=>'Profile Successfully Updated', 'success'=>true]);
            }
              return response()->json(['data'=>(object)[], 'message'=>'This User is not exist.', 'success'=>false]);
        
              } catch (Exception $e) {
                  return response()->json(['data'=>(object)[], 'message'=>'Something went wrong', 'success'=>false]);
            }

      }



   /**
   @ Show User Profile
   @ep_token **

   **/
    public function show_profile(Request $request)
    {   
          $input=$request->all();
        ///////////Check reqiest token//////////////////////////
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'ep_token' => 'required',
            
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        
        /////////////Systme Validation:: match UID, TOKEN////////////
        $getUserId=$input['user_id'];
        $Customer=Customer::find($getUserId);

          if(!isset($Customer)){
            return $this->appError('Wrong user!');
          }


        if(isset($Customer)&&$this->_valid_token($getUserId,$input['ep_token'])==false){
             return $this->appError('Token not matched! ');
        }
         //////////////// // valid user id///////


          if(isset($Customer)&&!empty($Customer)&&$this->_valid_token($getUserId,$input['ep_token'])==true){

            //return $this->appError('Token  matched!, getProfile OK! ');

              $resp_arr=[]; // EveryReturnArr
              //$resp_arr['profile_active'] ='yes'; //Default
//               $resp_arr['first_name'] =$Customer->first_name;
//               $resp_arr['last_name'] =$Customer->last_name;
              $resp_arr['name'] =$Customer->name;
              $resp_arr['email'] =$Customer->email;
              $resp_arr['mobile'] =$Customer->mobile;
              $mStatus=($Customer->mobile_verified_at!=NULL)?'yes':'no';
              $resp_arr['mobile_verified'] =$mStatus;
              $resp_arr['email_verified'] ='no';
           $resp_arr['usr_address'] =(!empty($Customer->usr_address))?$Customer->usr_address:'';
           $resp_arr['usr_gender'] =(!empty($Customer->usr_gender))?$Customer->usr_gender:'';
      return $this->sendResponse($resp_arr, 'Data Received! ');
            
          }
          ////////////////////    

    }

    //UserImageUpload
    public function userUploadImage(Request $request)
    {
      $input=$request->all();
      try {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'ep_token' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        
        $err = array();
        foreach ($validator->errors()->toArray() as $error)  {
            foreach($error as $sub_error){
                array_push($err, $sub_error);
            }
        }
        
        if ($validator->fails()) { 
            return response()->json(['message'=>$err, 'error'=>true]);            
        }
        
        $Employee=Customer::find($request->user_id);

        if($Employee->profile_image!='')
        {            
              $imagePath = $Employee->profile_image;
              $s = explode("/",$imagePath);
              \Storage::disk('user')->delete($s[5]);        
        }

        if($Employee->id ?? 'qwer'==$request->user_id){  
          $imgname = '';
          if($request->hasFile('image'))
          { 
              $file = $request->file('image');
              $filename = $file->getClientOriginalName(); 
              $extention = $file->getClientOriginalExtension(); 
              $imgname = uniqid().$filename; 
              $destinationPath = storage_path('/user_img/'); //print_r($destinationPath); exit();
              $file->move($destinationPath, $imgname);
          }
          //echo $imgname; die('im');
          $Employee->profile_image = url('/').'/storage/user_img/'.$imgname;
          $Employee->save();
          $data = ['profile_image' => $Employee->profile_image];
          return response()->json(['data'=>$data,'message'=>'Profile Successfully Updated', 'success'=>true]);
        }
       // echo "<pre>"; print_r($Employee->toArray()); exit();
        return response()->json(['data'=>(object)[], 'message'=>'This User is not exist.', 'success'=>false]);
        
      } catch (Exception $e) {
          return response()->json(['data'=>(object)[], 'message'=>'Something went wrong'.$e, 'success'=>false]);
      }
    }


 public function sendToUserNotification($token , $message)
 { 
     
    $push = new PushNotification('fcm');
    
    $push->setUrl('https://fcm.googleapis.com/fcm/send');                
                       
                                $response =  $push->setMessage([

                                   'notification' => [
                                                                'title'=> 'Welcome Pneck User',
                                                                'body' => $message,
                                                                'sound'=> 'default',
                                                        ],
                                                        'content_available'=>true,
                                                        'mutable_content'  =>true,
                                        'data' => [
                                                'title'     => 'Welcome Pneck User',
                                                'name'      => 'Pneck',
                                                'message'   => $message,
                                                'image'     => 'http://osswebexam.com/logo_header.png',
                                                'notification_type' => 'UserLogin',
                                                ]
                                        ])
                                ->setDevicesToken($token)
                                ->send()
                                ->getFeedback();
    
 }

 public function userDevicetoken(Request $request)
    {    

      $input=$request->all();
         $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'device_token' => 'required',            
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

    $update =  Customer::where('id',$input['user_id'])->update(['device_token'=>$request->device_token]);

            $send_arr['status'] =  true;
            return $this->sendResponse($send_arr, 'User device token update successfully.');
    }    

  /***
  @ Login OTP 
  **/

   public function login(Request $request)
    {   
       $input=$request->all();
         $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'device_token' => 'required',
        ]);
        if($validator->fails()){
          return $this->sendError('Validation Error-', $validator->errors());       
        }
        ////////////////////////////////////
        $Customer=Customer::where('mobile',$input['mobile'])->first();
        
        
        if(!isset($Customer)){
          $app_warnings[]='Invalid Mobile! ';
        }
        ////System Error /////////////
        ////Display app Warning////
        if(!empty($app_warnings)){
          $msg_str=implode(', ', $app_warnings);
          return $this->appError('System Warning-'.$msg_str);
        }
        ////////////////////////////////////////////////////////////////
        if(!empty($Customer)&&$Customer->mobile_verified_at==NULL){
          $msg_str='mobile verification pending! ';
          return $this->appError('System Warning-'.$msg_str);
        }
        
        ###///////////////////////////
        if(!empty($Customer)&&$Customer->mobile_verified_at!=NULL){
          
             if($request->mobile == $Customer->mobile){
               $logintoken = Str::random(32);
               $update =  Customer::where('id',$Customer->id)->update(['status'=>1,'device_token'=>$request->device_token,'ep_token'=>$logintoken]);
               
              
              $CustomerInfo=Customer::find($Customer->id);
              $send_arr['user_id'] =$Customer->id;
              $send_arr['ep_token'] =  $logintoken;
              $send_arr['first_name'] =  $Customer->first_name;
              $send_arr['last_name'] =  $Customer->last_name;
              $send_arr['name'] =  $Customer->name;
              $send_arr['email'] =  $Customer->email;
              $send_arr['mobile'] =  $Customer->mobile;
              $send_arr['status'] =  $CustomerInfo->status; 
              $send_arr['is_active'] = $CustomerInfo->is_active;            
               if($CustomerInfo->profile_image != 'null' || empty($CustomerInfo->profile_image))
               {
                  $send_arr['image'] =  $CustomerInfo->profile_image;
               }
               else{
                  $send_arr['image'] =  'https://pneck.in/employee-img/default.jpg';
               }

               $token = $request->device_token;
               $message = 'Welcome Pneck User';
              $message_status = $this->sendToUserNotification($token, $message);

              $send_arr['message_status'] =  $message_status;

              $success['data']=$send_arr;
              return $this->sendResponse($send_arr, 'Login success! ');
              // dd($success);

             }else{ return $this->appError('Wrong mobile! '); }

    
          // $send_arr['mobile'] =  $emp_row->mobile;

            /////Return token and  UID
        }
        // dd('stop2');
       /////////////Error if any////////// 
        if(!empty($app_warnings)&&count($app_warnings)>0){
            $msg_str=implode(',', $app_warnings);
        return $this->appError('System Warning-'.$msg_str);

        }else{
         return $this->appError('Sorry, Error in handling Request!');   

        }

// dd('stop');

        // emplyee Register
        
       // print_r($input); die;
    }

    public function logout(Request $request)
    {    

        $input=$request->all();
         $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'ep_token' => 'required',
            //'mobile' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        ////////////////////////////////////
        $emp_row= Customer::where('id',$input['user_id'])->where('ep_token',$input['ep_token'])->first();

        if(!isset($emp_row)){
           $msg= $app_warnings[]='Not Currently Logout!';// mobile
            return $this->appError('System Warning-'.$msg);
        }

            if(isset($emp_row)){                      
            $emp_row->status=0;            
            $emp_row->save();

            $send_arr['success'] =  true;
            $send_arr['status'] =  $emp_row->status;
            return $this->sendResponse($send_arr, 'User logout successfully.');
           }

       /////////////Error if any////////// 
        if(!empty($app_warnings)&&count($app_warnings)>0){
            $msg_str=implode(',', $app_warnings);
        return $this->appError('System Warning-'.$msg_str);

        }else{
         return $this->appError('Sorry, Error in handling Request!');   

        }
        
    }




    /////////////

      public function mobile_verify(Request $request)
    {    
      if($request->has('user_id')){
        $validator = Validator::make($request->all(), [
           'user_id' => 'required',
           'mobile' => 'required',
           'otp' => 'required',
           'device_token' => 'required',
       ]);
        Customer::where('id',$request->user_id)->update(array('mobile'=>$request->mobile));
      }else{
        $validator = Validator::make($request->all(), [
           'mobile' => 'required',
           'otp' => 'required',
           'device_token' => 'required',
           
       ]);
      }
        /////////Check use updaate///////////
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }else{

        
        // emplyee Register
        $input=$request->all();
        $mobNum=$input['mobile']; // tbl_employees ,tbl_employees_otp
        // print_r($input); die;
        $current_time = \Carbon\Carbon::now()->toDateTimeString();
        ////////////Main record///////////
         $Customer=Customer::where('mobile',$request->mobile)->first();
         if(!isset($Customer)){
            return $this->appError('Mobile not registerd with us!');
         }

        $row= DB::table('tbl_customer_otp')
                //  ->where('otp_type', 'mobile')
                ->where('mobile',$mobNum)
                ->orderBy('expire_time', 'desc')
                ->first();
                // dd($row);
                if(isset($row)&&!empty($row)&&$row->is_used==0){
                     $app_warnings[]='Mobile ok,';

                     if($input['otp']==$row->otp){ 
                        // Mobile verfied, Upload Document
                //////Update status ////////
                        $getid=$row->id;
                        $otp_obj=Customer_otp::find($getid);
                        $otp_obj->is_used=1;
                        // $otp_obj->save();
                        /////Update status ////////
                        if(isset($Customer)){  // Mobile Verfied date savedd
                        $Customer->mobile_verified_at=$current_time;
                      if($request->has('user_id')){
                        // dd('yes');
                        if($Customer->mobile != null){
                          // dd('yes');
                          $Customer->is_active=1;
                        }else{
                          // dd('yes2');
                            $Customer->is_active=0;
                          }
                        }else{
                          if($Customer->name != null){
                            $Customer->is_active=1;
                          }else{
                            $Customer->is_active=0;
                          }
                        }
                        // dd('no');
                        $Customer->device_token=$request->device_token;
                        $Customer->save();  }
                        $app_warnings[]='Mobile verfied';
                        // $send_arr['is_mobile_verified'] ='yes';
                        // $send_arr['is_active'] =1;
                        // $send_arr['user_id'] =$Customer->id;
                        $login = $this->login($request);
                        return response($login->original);
                    
                        // return $this->sendResponse($send_arr, 'Mobile verfied! ');
                        }else{ // OPT not correct';
                          return $this->appError('OTP Incorrect'); }
                            }else{
                                // not registerd usere
                                $app_warnings[]='Mobile not registerd in system';
                                return $this->appError('Mobile not registerd in system.! ');
                            }



                /////Send Response//

              }

    }






    
    /**
    * Send Otp api
    *
    * @return \Illuminate\Http\Response
    */
    public function mobile_otp_send(Request $request){

        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'type' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }

        $current_time = \Carbon\Carbon::now()->toDateTimeString();
        $input = $request->all();
        $CustomerValid=Customer::where('mobile',$input['mobile'])->first();
        
          if(!empty($CustomerValid) && $request->type == 2 && $CustomerValid->mobile != null ){
                     $success['user_id'] = $CustomerValid->id;
                     $success['mobile'] = $input['mobile'];
                     $success['create_otp'] = null;
                     $success['is_mobile_verified'] ='no';
                     $response = [
                      'success' => false,
                      // 'data'    => $result,
                      'message' => 'mobile already  register',
                      'data'    => $success,
                  ];
          
                  /////////
                  $send_response=array('response'=>$response);
          
          
                  return response()->json($send_response, 200);
          }
        

        $create_otp=$otp =rand(100000,999999);
        $mobile_number=$input['mobile'];  //  By email:($otp,$mob){
        $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
         $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
         $Otp_ob=new Customer_otp;
         $Otp_ob->otp_type='for_mobile_verified';
         $Otp_ob->mobile=$input['mobile'];//RegisteredMobile
         $Otp_ob->otp=$create_otp;
         $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
         $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
         $Otp_ob->save();
          // Return True with User-Basic Detail - Move Toward OTP Screen. 
        if(empty($CustomerValid)){ 
                  // Insert new otp////////////
                   $customer = new Customer();
                   $customer->mobile = $input['mobile'];
                   $customer->save();
                   // $app_warnings[]='Mobile Verfiy Pending,otp sent mobile number! ';
                   // return $this->sendResponse('success', 'Please enter Otp');
                   $success['user_id'] = $customer->id;
                   $success['mobile'] = $input['mobile'];
                   $success['create_otp'] = $create_otp;
                   $success['is_mobile_verified'] ='no';
                 return $this->sendResponse($success, 'Register successfully.!!');
                  }
                 else{
                   $success['user_id'] = $CustomerValid->id;
                   $success['mobile'] = $CustomerValid->mobile;
                   $success['create_otp'] = $create_otp;
                   $success['is_mobile_verified'] ='no';
                 return $this->sendResponse($success, 'Register successfully.!!');
            
                    }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */public function register(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email',
            'user_id' => 'required',
        ]);

        


        // $mobile='7291920268';
        $current_time= \Carbon\Carbon::now()->toDateTimeString();
        //////////Send OTP//////////////
        //////////Send OTP////////////////
        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }
        $validator_error_str='';
        $app_warnings=[];
         $input = $request->all();
         // print_r($input); die; 
        /////////////System Waring////////
         $CustomerValid=Customer::where('id',$input['user_id'])->first();
        // By email or Mobile
        
        
        if(!empty($CustomerValid)){ //# $app_warnings[]='Duplicate Email,Mobile';
          // dd("stop");
          $Customer_valid=$CustomerValid->toArray();//Array

             if(!empty($Customer_valid['mobile_verified_at'])){ //MobileVerfication DONE
              // dd("stop");
                //Report Duplicate error 
                //  if($input['email']==$Customer_valid['email'])
                    //  $app_warnings[]='Duplicate Email! ';
                  // if($input['mobile']==$Customer_valid['mobile'])
                     $app_warnings[]='Duplicate mobile! ';
                      Customer::where('id', $request->user_id)->update(array('name' => $request->name,'email'=>$request->email,'is_active'=>1));
                     $alldata = Customer::where('id',$request->user_id)->first();
                     // dd($alldata);
                     // Return True with User-Basic Detail - Move Toward OTP Screen. 
                     $success['ep_token'] =  $alldata['ep_token']; // $Customer_ob->name;
                     $success['name'] =  $alldata['name']; // $Customer_ob->name;
                     $success['isActive'] =  $alldata['is_active']; // $Customer_ob->name;
                     // $success['mobile'] = $Customer_valid['mobile'];
                     // $success['is_mobile_verified'] ='no';
                      return $this->sendResponse($success, 'Register successfully.!!');


             }
             if(empty($Customer_valid['mobile_verified_at'])||$Customer_valid['mobile_verified_at']==NULL){
              //  dd("stop2");
                // Go , Mobile Verfiy Screen.
                  $create_otp=$otp =rand(100000,999999);
                  $mobile_number=$Customer_valid['mobile'];  //  By email:($otp,$mob){
                    // dd($mobile_number);
                  $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
                   // echo  'Check=',$send_new_otp; die; 
                   $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                  // Insert new otp////////////
                   $Otp_ob=new Customer_otp;
                   $Otp_ob->otp_type='for_mobile_verified';
                   $Otp_ob->mobile=$Customer_valid['mobile'];//RegisteredMobile
                   $Otp_ob->otp=$create_otp;
                   $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
                    $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
                    $Otp_ob->save();
                    Customer::where('id', $request->user_id)->update(array('name' => $request->name,'email'=>$request->email));
                    $alldata = Customer::where('id',$request->user_id)->first();
                    // dd($alldata);
                    // Return True with User-Basic Detail - Move Toward OTP Screen. 
                    $success['name'] =  $alldata['name']; // $Customer_ob->name;
                    $success['isActive'] =  $alldata['is_active']; // $Customer_ob->name;
                    $success['create_otp'] = $create_otp;
                    $success['is_mobile_verified'] ='no';
                    // $success['mobile'] = $Customer_valid['mobile'];
                    // $success['is_mobile_verified'] ='no';
                     return $this->sendResponse($success, 'Register successfully.!!');
                  // $app_warnings[]='Mobile Verfiy Pending,otp sent mobile number! ';
                 
            }
            
           

           }

        /////////////////////////////

        if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            
             return $this->appError('System Warnings-'.$msg_str);
        }


      /////////////////////////////////////////////////     
       
        // $input['password'] = bcrypt($input['password']);
        //  $input['name']='RohitK';  // ep_token
        //  $mToken=rand(100000,999999).$input['password'];
        //  $input['ep_token']=md5($mToken);
        // $Customer_ob=Customer::create($input);
        // $alldata = Customer::where('id',$request->id)->first();
        // if($alldata){
        //   $alldata['name'] = $request->name;
        //   $alldata->save();
        // }
        $alldata= Customer::where('id', $request->id)->update(array('name' => $request->name,'email'=>$request->email));
        // dd($Customer_ob,$alldata);
        // echo $Customer_ob['mobile'].'====';  
        // print_r($Customer_ob);
        // die;
        # Send OTP ///

        /*  01-09-2020
                   $create_otp=$otp =rand(100000,999999);
                  $mobile_number=$Customer_ob['mobile'];  //  By email:($otp,$mob){

                  $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
                  // echo $send_new_otp; die; 
                  $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                  // Insert new otp////////////
                  $Otp_ob=new Customer_otp;
                  $Otp_ob->otp_type='for_mobile_verified';
                  $Otp_ob->mobile=$Customer_ob['mobile'];//RegisteredMobile
                  $Otp_ob->otp=$create_otp;
                  $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
                  $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
                  $Otp_ob->save();

    */
        ////////////
        /// Generate Token ////////
        // $success['token'] =  $Customer_ob->createToken('MyApp')->accessToken;

        /////Response///////////
        $success['name'] =  $alldata->name;
        $success['isActive'] =  '1';
        // $success['mobile'] =  $Customer_ob->mobile;
        // $success['is_mobile_verified'] ='no';
        return $this->sendResponse($success, 'Register successfully.');
      
        ////////


    }



    public function registerbysocial(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'email' => 'required',
        // 'name' => 'required',
        'social_id' => 'required',
        'login_type' => 'required',
        'device_token' => 'required',
    ]);
    if($validator->fails()){
        return $this->sendError('Validation Error-', $validator->errors());       
    }else{
      // dd($request);
      // register user by checking social id if available then login
      $Customer = Customer::where('email',$request->email)->first();
      $user = [];
      // dd($Customer);
      if(empty($Customer)){
        // dd('ok1');
        $adduser = new Customer();
        $adduser->email = $request->email; 
        $adduser->name = $request->name;
        $adduser->first_name = $request->first_name;
        $adduser->last_name = $request->last_name;
        $adduser->social_id = $request->social_id; 
        $adduser->login_type = $request->login_type; 
        $adduser->ep_token = null; 
        $adduser->status = 0; 
        $adduser->is_active = 0; 
        $adduser->device_token = $request->device_token; 
        $adduser->save();
        // dd($adduser);
        $adduser['user_id'] = $adduser->id;
        $adduser['login'] = 0;
        $adduser['mobile'] = null;
        unset($adduser['id']);

        return $this->sendResponse($adduser,'Registration successfull');
      }else{
        // dd('ok');
        $updateuser;
        if($Customer->name == null && $request->has('name')){
          $updateuser = Customer::where('email',$request->email)->update(array(
            'social_id'=>$request->social_id,
            'login_type'=>$request->login_type,
            'device_token'=>$request->device_token,
            'name'=>$request->name,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
          ));
        }else{
          $updateuser = Customer::where('email',$request->email)->update(array(
            'social_id'=>$request->social_id,
            'login_type'=>$request->login_type,
            'device_token'=>$request->device_token,
          ));
        }
          // dd($updateuser);
          $Customer = Customer::where('email',$request->email)->first();
          $user['user_id'] = $Customer->id; 
          $user['email'] = $Customer->email; 
          $user['name'] = $Customer->name; 
          $user['first_name'] = $Customer->first_name; 
          $user['last_name'] = $Customer->last_name; 
          $user['social_id'] = $Customer->social_id; 
          $user['login_type'] = $Customer->login_type; 
          $user['ep_token'] = $Customer->ep_token; 
          $user['status'] = 0; 
          $user['device_token'] = $Customer->device_token; 
          $user['is_active'] = $Customer->is_active;
          $user['login'] = 0;
          $user['mobile'] = $Customer->mobile;
            return $this->sendResponse($user,'Registration already done');
          // }else{

            // $user['user_id'] = $Customer->id; 
            // $user['email'] = $Customer->email; 
            // $user['name'] = $Customer->name; 
            // $user['social_id'] = $Customer->social_id; 
            // $user['login_type'] = $Customer->login_type; 
            // $user['ep_token'] = $Customer->ep_token; 
            // $user['status'] = 0; 
            // $user['device_token'] = $Customer->device_token; 
            // $user['is_active'] = $Customer->is_active;
            // $user['login'] = 0;
            // $user['mobile'] = $Customer->mobile;
            // return $this->sendResponse($Customer,'Registration already done');
        // }
      }


    }

    }

  //   public function savemobileonly(Request $request)
  //   {
  //     {
  //       $validator = Validator::make($request->all(), [
  //         'social_id' => 'required',
  //         'mobile' => 'required',
  //     ]);
  //     if($validator->fails()){
  //         return $this->sendError('Validation Error-', $validator->errors());       
  //     }else{
  //       $Customer = Customer::where('social_id',$request->social_id)->where('mobile','==',null)->first();
  //       if(!empty($Customer)){
  //         $addmobile = new Customer();
  //         $addmobile->mobile = $request->mobile;
  //         $addmobile->status = 0;
  //         $addmobile->save();
  //         $addmobile['mobile'] = $request->mobile;
  //         $addmobile['isactive'] = 1;
  //         $addmobile['login'] = 0;
  //           return $this->sendResponse($addmobile,'Registration successfull');
  //       }
  //       return $this->sendResponse($addmobile,'Registration successfull');
  //     }

  //   }
  // }

    /////
    
    // 01-09-2020
    // public function register(Request $request)
//     {
//         // $validator = Validator::make($request->all(), [
//         //     'mobile' => 'required',
//         //     'email' => 'required|email',
//         //     'password' => 'required',
//         //     'c_password' => 'required|same:password',
//         // ]);

//        $validator = Validator::make($request->all(), [
//             'first_name' => 'required',
//             'last_name' => 'required',
//             'email' => 'required|email',
//             'mobile' => 'required',
//             'password' => 'required',
//             'c_password' => 'required|same:password',
//             'device_id' => 'required',
//         ]);




//         $mobile='7291920268';
//         $current_time= \Carbon\Carbon::now()->toDateTimeString();
//         //////////Send OTP//////////////
//          // echo '===='; die; 


        
        

//         //////////Send OTP////////////////


//         if($validator->fails()){
//             return $this->sendError('Validation Error', $validator->errors());       
//         }
//         $validator_error_str='';$app_warnings=[];
//          $input = $request->all();
//          // print_r($input); die; 
//         /////////////System Waring////////
//        $CustomerValid=Customer::where('mobile',$input['mobile'])->orWhere('email',$input['email'])->first();
//         // By email or Mobile


//            if(!empty($CustomerValid)){ //# $app_warnings[]='Duplicate Email,Mobile';

//            $Customer_valid=$CustomerValid->toArray();//Array
//            //print_r($Customer_valid); die;

//             // var_export($Customer_valid['mobile_verified_at']);

//             // print_r($Customer_valid);  
//              if(!empty($Customer_valid['mobile_verified_at'])){ //MobileVerfication DONE
//                 //Report Duplicate error 
//                  if($input['email']==$Customer_valid['email'])
//                      $app_warnings[]='Duplicate Email! ';
//                   if($input['mobile']==$Customer_valid['mobile'])
//                      $app_warnings[]='Duplicate mobile! ';


//              }if(empty($Customer_valid['mobile_verified_at'])||$Customer_valid['mobile_verified_at']==NULL){
//                 // Go , Mobile Verfiy Screen.
//                   $create_otp=$otp =rand(100000,999999);
//                   $mobile_number=$Customer_valid['mobile'];  //  By email:($otp,$mob){
//                   $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
//                    // echo  'Check=',$send_new_otp; die; 
//                    $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
//                   // Insert new otp////////////
//                    $Otp_ob=new Customer_otp;
//                    $Otp_ob->otp_type='for_mobile_verified';
//                    $Otp_ob->mobile=$Customer_valid['mobile'];//RegisteredMobile
//                    $Otp_ob->otp=$create_otp;
//                    $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
//                     $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
//                     $Otp_ob->save();
//                     // Return True with User-Basic Detail - Move Toward OTP Screen. 
//                     $success['name'] =  $Customer_valid['name']; // $Customer_ob->name;
//                     $success['mobile'] = $Customer_valid['mobile'];
//                     $success['is_mobile_verified'] ='no';
//                      return $this->sendResponse($success, 'Register successfully.!!');
//                   // $app_warnings[]='Mobile Verfiy Pending,otp sent mobile number! ';
                 


//             }
            
           

//            }

//         /////////////////////////////

//         if(!empty($app_warnings)){
//             $msg_str=implode(',', $app_warnings);

//              return $this->appError('System Warnings-'.$msg_str);
//         }


//       /////////////////////////////////////////////////     
       
//         $input['password'] = bcrypt($input['password']);
//          $input['name']='RohitK';  // ep_token
//          $mToken=rand(100000,999999).$input['password'];
//          $input['ep_token']=md5($mToken);
//         $Customer_ob=Customer::create($input);

//         // echo $Customer_ob['mobile'].'====';  
//         // print_r($Customer_ob);
//         // die;
//         # Send OTP ///

//                    $create_otp=$otp =rand(100000,999999);
//                   $mobile_number=$Customer_ob['mobile'];  //  By email:($otp,$mob){

//                   $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
//                  // echo $send_new_otp; die; 
//                    $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
//                   // Insert new otp////////////
//                    $Otp_ob=new Customer_otp;
//                    $Otp_ob->otp_type='for_mobile_verified';
//                    $Otp_ob->mobile=$Customer_ob['mobile'];//RegisteredMobile
//                    $Otp_ob->otp=$create_otp;
//                    $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
//                     $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
//                     $Otp_ob->save();


//         ////////////
//         /// Generate Token ////////
//         // $success['token'] =  $Customer_ob->createToken('MyApp')->accessToken;

//         /////Response///////////
//         $success['name'] =  $Customer_ob->first_name;
//         $success['mobile'] =  $Customer_ob->mobile;
//         $success['is_mobile_verified'] ='no';
//         return $this->sendResponse($success, 'Register successfully.');
      
//         ////////


//     }
}
