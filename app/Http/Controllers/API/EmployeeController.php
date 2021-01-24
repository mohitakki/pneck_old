<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Employee; // Employee , User
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Emp_otp;
use App\Emp_login_info;
use App\Employee_feedback;
use App\Employee_profile;
use Edujugon\PushNotification\PushNotification;


class EmployeeController extends BaseController
{// BaseController  Controller
    protected  $current_date='';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
    $eid : Employee ID

    **/

   protected function _valid_token($eid,$input_token){

     $emp_ob=Employee::find($eid);
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
   /*
   @ Doc:uploa SMS
   **/
  protected function _docSms($mobile,$get_msg=NULL){
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
     //$url = "http://5.189.187.82/sendsms/bulk.php?username=BYOPeneck1&password=Peneck123&type=TEXT&sender=peneck&mobile=".$mob."&message=".$msg;
     
      $url = "http://5.189.187.82/sendsms/bulk.php?username=EPKamitkumar&password=amit87495&type=TEXT&sender=CPNECK&mobile=".$mob."&message=".$msg;
        

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

/***
@Emp:app feedback 
@empAddFeedback

***/
 public function empAddFeedback(Request $request)
    {   
          $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'ep_token' => 'required',
            'name' => 'required',
            'subj' => 'required',
            'message' => 'required',    
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }


       //return $this->appError('testing,WrTloyee ID! ');
      ////////////////////SystemError///////////////////// 
        $get_emp_id=$input['employee_id'];
          $Employee=Employee::find($get_emp_id);
           if(!isset($Employee)){
            return $this->appError('Wrong Employee ID! ');
           }

            if(isset($Employee)&&$this->_valid_token($get_emp_id,$input['ep_token'])==false){
             return $this->appError('Employee Token not matched! ');
            }


        ////////////Update in db//////////////
            
            // Add feedback //
             $Feedback=new Employee_feedback;
             $Feedback->user_id=$Employee->id;
             $Feedback->user_type='Employee';
             $Feedback->user_name=($input['name'])?$input['name']:'';
             $Feedback->subject_name=($input['subj'])?$input['subj']:'';
             $Feedback->message=$input['message'];
             //$Feedback->save();
             if($Feedback->save()){
              $success=[];

              return $this->sendResponse($success, 'Data Sent successfully!  ');

             }





      

             

            /////////////////////
             return $this->appError('Error in update!,Try later! ');



      }



   //////

      public function forgot_pass_verify_mobile(Request $request){    



        /////////Check use updaate///////////
         $validator = Validator::make($request->all(), [
            'mobile_number' => 'required',
            'otp' => 'required',
            'password' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }


        // emplyee Register
        $input=$request->all();
          $mobNum=$input['mobile_number']; // tbl_employees ,tbl_employees_otp
        // print_r($input); die;
        $current_time = \Carbon\Carbon::now()->toDateTimeString();
        ////////////Main record///////////
         // $Customer=Customer::where('mobile',$mobNum)->first();
         $Employee=Employee:: where('mobile',$mobNum)->first();

           // echo 'REs-'; var_export($Employee) 
           
           //  die; 
         //////////TestPass///////////////
        //  $Textmsg='Pneck Password is User123';
        // echo  $sendsms=$this->_docSms($mobNum,$Textmsg);

        //  die; 



          //////////////////////////////////

         if(!isset($Employee)){
            return $this->appError('Mobile not registerd with us! ');
         }

         /**
         @  $otpRow = Emp_otp::where('mobile','7291919640')->orderBy('expire_time','desc')->get();
          // is_mobile_verified  , mobile_verified_at

         **/

        $row= DB::table('tbl_employees_otp')
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



                     if($input['otp']==$row->otp){ 
                      # updatet otp status
                 $getid=$row->id;
                 $otp_obj=Emp_otp::find($getid);
                 $otp_obj->is_used=1; $otp_obj->save();

          /////Update status ////////
           if(isset($Employee)){  // Mobile Verfied date savedd

            $req_pass= $input['password'];  //"User".rand(100000,999999);

              $changePass= bcrypt($req_pass);

            
          $Employee->password=$changePass;
          // $Employee->first_name= 'TestpasChanged';
          $Employee->updated_at=$current_time;
          $Employee->save();  

          /// Send on phone ///
           //$Textmsg='Pneck Password is User123';
          $Textmsg="Pneck Password is $req_pass";
          $sendsms=$this->_docSms($mobNum,$Textmsg);

           //die; 

           }

          
          $send_arr['mobile'] =  $Employee->mobile;
 
          return $this->sendResponse($send_arr, 'Password sent to Mobile! ');
          
         // return $this->sendResponse($send_arr=[], $sendsms.'-Password sent to Mobile! ');



             }else{ // OPT not correct';
              return $this->appError('OTP Incorrect! '); }

                  
                         
                    

                }else{ // if(isset($row)&&!empty($row)&&$row->is_used==0){
                   
                    $app_warnings[]='Mobile not registerd in system';
                    return $this->appError('OTP Incorrect or Expired! ');
                }



                /////Send Response//



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
     //$url = "http://5.189.187.82/sendsms/bulk.php?username=BYOPeneck1&password=Peneck123&type=TEXT&sender=peneck&mobile=".$mob."&message=".$msg;
       
       $url = "http://5.189.187.82/sendsms/bulk.php?username=EPKamitkumar&password=amit87495&type=TEXT&sender=CPNECK&mobile=".$mob."&message=".$msg;

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




    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // emplyee Register
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
      ///////////////Test SMS///////////////  
          $Employee=Employee::where('mobile',$input['mobile'])->first();

         if(!isset($Employee))return $this->appError('mobile not registerd with us! ');

         if($Employee->profile_active=='no')$app_warnings[]='Inactive profile,not allowed! ';

         ////////////////////////

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);

            return $this->appError('System Warnings-'.$msg_str);
          }

         ///////////////////////////////////

        if(!empty($Employee)&&$Employee->mobile==$input['mobile']){
          $app_warnings[]='Create forgot_pass otp ';
          # Send otp 

            $create_otp=$otp =rand(100000,999999);
                    $mobile_number=$input['mobile'];  //  By email:($otp,$mob){

                  $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);


                  //echo $send_new_otp ,':'.$send_new_otp ; die; 


                   $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                  // Insert new otp////////////
                  
                   $Otp_ob=new Emp_otp;
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
                    return $this->sendResponse($success, 'Sent successfully!  ');

                     

          //////////////////

        }else{
          return $this->appError('Erro in sending otp! ');

        }


        //////////////////////////////
         //print_r($app_warnings); die; 

      }


/**
@Resend OTP for r
@ Register MobilleVerfiy -
 @mobile verfiy_satus=0

**/







public function mobile_otp_resend(Request $request){

     $input=$request->all();
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required',
            //'ep_token' => 'required',
            //'device_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      ///////////////Test SMS///////////////  
     
        
    ///////////System Error : check MobileRegisterWithStatus==0 Only///////////////////
        //  $Employee=Employee::find($get_emp_id);
        $Employee=Employee::where('mobile',$input['mobile_no'])->first();

        if(!isset($Employee)){
           return $this->appError('mobile not registerd with us! ');
        }elseif(!empty($Employee)&&$Employee->mobile==$input['mobile_no']){
            //var_export($Employee->is_mobile_verified);
             // print_r($Employee->is_mobile_verified); 
            if($Employee->is_mobile_verified=='1'||$Employee->is_mobile_verified==1){
              // Not allowed to reSend OTP 

              return $this->appError('Active profile,Not allowed to Re-Send OTP! ');
            }else{ // Send OTP :: if is_mobile_verified=0 , >>>

               $otp = rand(100000,999999);
        // $mob = $phone_number;
         //$mob='7291919640';
         $mob=$Employee->mobile;

        // $msg = urlencode("Your one time password OTPis $otp");
         $msg = urlencode("Your one time otp code is $otp");
                            
                            
        //$url = "http://5.189.187.82/sendsms/bulk.php?username=BYOPeneck1&password=Peneck123&type=TEXT&sender=peneck&mobile=".$mob."&message=".$msg;
        
        $url = "http://5.189.187.82/sendsms/bulk.php?username=EPKamitkumar&password=amit87495&type=TEXT&sender=CPNECK&mobile=".$mob."&message=".$msg;

          // echo $url; die;
        ////////////Save oTP//////////
        $otp_input=[];
        // $dat=$this->current_date;
        $otp_input['mobile']=$Employee->mobile;
        $otp_input['otp_type']='mobile';

         $otp_input['otp']=$otp;
          $current_time = \Carbon\Carbon::now()->toDateTimeString();
          //echo $current_time ; die ;
         $otp_input['create_time']=$curDate=$current_time; //date("Y-m-d H:i:s");

         $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));

         $otp_input['expire_time']=$expTime;
          //print_r($otp_input); die ;  




           DB::table('tbl_employees_otp')->insert($otp_input);
         unset($otp_input);

          //return $this->sendResponse($send_arr, 'OTP saved,'); #Test


        /////////////Send OTP///////////////////////
        // $sdsd= file_get_contents($url);

            $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                        $data = curl_exec($ch);

                        if(curl_errno($ch))
                        {   // echo 'ERRRR';
                            $msg1='OTP Not sent';
                            $Error = curl_error($ch);
                           // header('Content-Type: application/json');
                            //print_r(json_encode(array('status' => "204", 'messaeg' => $Error)));
                        }
                        else
                        {   //echo 'OTP sent';
                         // store in Emp S
                      $msg1='OK, OTP Re-send! ';

                        }
                        $resp_arr=[];
                        return $this->sendResponse($resp_arr,$msg1);

                        //return $this->appError('OK, '.$msg1);



           //   return $this->appError('OK,OTP Re-send! ');

            }

          

        }



      //////////Enf///////////
        return $this->appError('Error in sendig!,Try later! ');
      
      /////////////////  

   }


/**
@ EmployeeForgotPass 
@ by Mobile OTP 
@ Registered Mobile Required
***/
public function forgot_pass(Request $request){

     $input=$request->all();
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            //'ep_token' => 'required',
            //'device_id' => 'required',
        ]);





        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      /////////////////////
        return $this->appError('API waiting Request json! ');
      
      /////////////////  

   }





/**
@EmployeeChangePass
 @ Required : employee_id,ep_token
   @Validation Error Comine


**/



  public function change_pass(Request $request){

     $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
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
        $get_emp_id=$input['employee_id'];
          $Employee=Employee::find($get_emp_id);
           if(!isset($Employee)){
            return $this->appError('Wrong Employee ID! ');
             //$app_warnings[]='Wrong Employee ID! ';  //Return 
           }

            if(isset($Employee)&&$this->_valid_token($get_emp_id,$input['ep_token'])==false){
             return $this->appError('Employee Token not matched! ');
            }

             if(!empty($input['old_pass'])&&$input['old_pass']==$input['password']){

               return $this->appError('Old and New password Same not allowed! ');
             }
        
            /////////UpdatePass/////////////
            # Match Old Password.
            $enteredPassword=$input['old_pass'];

             if(Hash::check($enteredPassword ,$Employee->password)){//OK

              $form_pass=$input['password'];
         unset($input['password']); unset($input['c_password']);
            // $input['password'] = bcrypt($form_pass);
              $Employee->password=bcrypt($form_pass);
                if($Employee->save()){ //Saved
                  //return $this->appError('OK,Updated! ');
                  $resp_arr=[];
                   $resp_arr['msg']='Password Changed successfully! ';
                  return $this->sendResponse($resp_arr, 'Ok, Updated!');

                }else{
                   return $this->appError('Error in update!,Try later! ');
                }

              
                //Update to Db///
             

             }else{
               return $this->appError('Old password not matched! ');
             }

        ///////////////
   }




  /*
   @Edit Profile 
   @ Required : employee_id ,  ep_token
   @Validation Error Comine
   @TOken Requied **
  **/

     public function edit_profile(Request $request)
    {   
          $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'ep_token' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'emp_gender' => 'required',
           // 'emp_address' => 'required',
            
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      ////////////////////SystemError///////////////////// 
        $get_emp_id=$input['employee_id'];
          $Employee=Employee::find($get_emp_id);
           if(!isset($Employee)){
            return $this->appError('Wrong Employee ID! ');
             //$app_warnings[]='Wrong Employee ID! ';  //Return 
           }

            if(isset($Employee)&&$this->_valid_token($get_emp_id,$input['ep_token'])==false){
             return $this->appError('Employee Token not matched! ');
            }


        ////////////Update in db//////////////
            $Employee->first_name=$input['first_name'];
            $Employee->last_name=$input['last_name'];

            //  emp_gender
            $Employee->emp_gender=(!empty($input['emp_gender']))?$input['emp_gender']:'other';
            $Employee->emp_address=(isset($input['emp_address']))? addslashes($input['emp_address']):'' ;

            #Mobie Never Updated
            // $query=$Employee->save();
             if($Employee->save()){
              $resp_arr=[]; // EveryReturnArr
              $resp_arr['profile_active'] =$Employee->profile_active;
              $resp_arr['fname'] =$Employee->first_name;
              $resp_arr['last_name'] =$Employee->last_name;
               $resp_arr['mobile'] =$Employee->mobile;
         $mStatus=($Employee->is_mobile_verified=='1'||$Employee->is_mobile_verified==1)?'yes':'no';

               $resp_arr['email'] =$Employee->email;
               $resp_arr['mobile_verified'] =$mStatus;
               $resp_arr['emp_gender'] =$Employee->emp_gender;

               $resp_arr['emp_address'] =$Employee->emp_address;
               
                 //$resp_arr['email_verified'] ='no';
                return $this->sendResponse($resp_arr, 'Ok, Saved!');


              // $app_warnings[]='Saved';
             
             }else{
              return $this->appError('Error in update!,Try later! ');
             }


             

            /////////////////////
             // print_r($app_warnings); die; 



      }




  /*
  @MObile Ve:mobile verify aadhar
  @ parameter required::
  @ employee_id ,   ep_token


  **/
   public function show_profile(Request $request)
    {   
          $input=$request->all();
        ///////////Check reqiest token//////////////////////////

        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'ep_token' => 'required',
            //'mobile' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        /////////////Systme Validation:: match UID, TOKEN////////////
         $get_emp_id=$input['employee_id'];
          $Employee=Employee::find($get_emp_id);
           if(!isset($Employee)){
            return $this->appError('Wrong Employee ID! ');
             //$app_warnings[]='Wrong Employee ID! ';  //Return 
           }

            if(isset($Employee)&&$this->_valid_token($get_emp_id,$input['ep_token'])==false){
             return $this->appError('Employee Token not matched! ');
            }



         //////////////// // valid user id///////
          if(isset($Employee)&&!empty($Employee)&&$this->_valid_token($get_emp_id,$input['ep_token'])==true){


              $resp_arr=[]; // EveryReturnArr
              $resp_arr['profile_active'] =$Employee->profile_active;
              $resp_arr['fname'] =$Employee->first_name;
              $resp_arr['last_name'] =$Employee->last_name;
               $resp_arr['mobile'] =$Employee->mobile;
         $mStatus=($Employee->is_mobile_verified=='1'||$Employee->is_mobile_verified==1)?'yes':'no';

               $resp_arr['email'] =$Employee->email;
               $resp_arr['mobile_verified'] =$mStatus;
               $resp_arr['email_verified'] ='no';
           $resp_arr['emp_gender'] =(!empty($Employee->emp_gender))?$Employee->emp_gender:'';
           $resp_arr['emp_address']=(!empty($Employee->emp_address))?$Employee->emp_address:'';

          return $this->sendResponse($resp_arr, 'Data Received! ');
             //
            // $app_warnings='Show Profile'.$Employee->mobile;

            // die; 
          }


           //////End/////

        // $token=$this->_valid_token($get_emp_id,$input['ep_token']);

        


       

    }


   public function mobile_verify(Request $request)
    {    



        /////////Check use updaate///////////
         $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'otp' => 'required',
            //'mobile' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }


        // emplyee Register
        $input=$request->all();
          $mobNum=$input['mobile']; // tbl_employees ,tbl_employees_otp
        // print_r($input); die;
        $current_time = \Carbon\Carbon::now()->toDateTimeString();
        ////////////Main record///////////

         $Employee= Employee::where('mobile',$mobNum)->first();

           if(!isset($input['mobile'])){

            return $this->appError('Mobile required!');

           }

         if(!isset($Employee)){
            return $this->appError('Mobile not registerd with us!');
         }

         // print_r($Employee); die;
         
         // is_mobile_verified  , mobile_verified_at

         /**
         @  $otpRow = Emp_otp::where('mobile','7291919640')->orderBy('expire_time','desc')->get();

         **/

        $row= DB::table('tbl_employees_otp')
                //  ->where('otp_type', 'mobile')
                ->where('mobile',$mobNum)
                  ->where('expire_time', '>',$current_time)
                ->orderBy('expire_time', 'desc')
                ->first();

               // echo  'xx==';

                // print_r($row); 
                // var_dump($row);
               

                // die; 



                // if(isset($row)&&$row->is_used==0){
                if(isset($row)&&!empty($row)&&$row->is_used==0){
                     $app_warnings[]='Mobile ok,';

                     if($input['otp']==$row->otp){ 
                        // Mobile verfied, Upload Document
                //////Update status ////////
                         $getid=$row->id;
         $otp_obj=Emp_otp::find($getid);
          $otp_obj->is_used=1;
          $otp_obj->otp_type='for_mobile';
          $otp_obj->save();
          /////Update status ////////
           if(isset($Employee)){
            $Employee->duty_status_id=0;
            $Employee->is_mobile_verified=1;
          $Employee->mobile_verified_at=$current_time;
          $Employee->profile_active='no';
          $Employee->save();// Update status of Mobile verifation

           }
        //  $send_arr['mobile'] =  $Employee->mobile;
        $app_warnings[]='Mobile verfied, Upload Document';
         $send_arr['is_mobile_verified'] ='yes';
         $success['data']=$send_arr;
         $Doc_url='https://pneck.in/upload-document.php'; // if match 
         // Send SMS Link /// $input['mobile']
         
         // $test=$this->_docSms($input['mobile']);



         ////
          return $this->sendResponse($send_arr, 'Mobile verfied, Upload Document-'.$Doc_url);



             }else{ // OPT not correct';
              return $this->appError('OTP Incorrect'); }

                }elseif(isset($Employee)&&$Employee->is_mobile_verified==1){
                     //EMp mobile verfide
                    return $this->appError('Mobile verification already done!');
                }else{
                    // not registerd usere
                    $app_warnings[]='Mobile not registerd in system';
                    return $this->appError('Mobile not registerd in system');
                }

                /////Send Response//

    }


 /***
 @Login :Employee
 @login By mobile>Email
 rohit.unio@gmail.com

 */

 public function sendPushNotification($token , $message)
 { 
     
    $push = new PushNotification('fcm');
    
    $push->setUrl('https://fcm.googleapis.com/fcm/send');                
                       
                                $response =  $push->setMessage([

                                   'notification' => [
                                                                'title'=> 'Welcome Pneck Employee',
                                                                'body' => $message,
                                                                'sound'=> 'default',
                                                        ],
                                                        'content_available'=>true,
                                                        'mutable_content'  =>true,
                                        'data' => [
                                                'title'     => 'Welcome Pneck Employee',
                                                'name'      => 'Pneck',
                                                'message'   => $message,
                                                'image'     => 'http://osswebexam.com/logo_header.png',
                                                'notification_type' => 'EmployeeLogin',
                                                //'channel_id'     => $lastId,
                                                //'user_id'        => $user_id,
                                               // 'notification_id'=> $row_id,
                                                ]
                                        ])
                                ->setDevicesToken($token)
                                ->send()
                                ->getFeedback();
    
 }

 public function empDevicetoken(Request $request)
    {    

      $input=$request->all();
         $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'device_token' => 'required',            
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

    $update =  Employee::where('id',$input['employee_id'])->update(['device_token'=>$request->device_token]);

            $send_arr['status'] =  true;
            return $this->sendResponse($send_arr, 'Employee device token update successfully.');
    } 

  public function emp_login(Request $request)
    {    $input=$request->all();
         $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',          
            'device_id' => 'required',
            'device_token' => 'required',
            
        ]);
    

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        ////////////////////////////////////
        $emp_row= Employee::where('mobile',$input['email'])->first();

        // Login by MobileOREMail
       //  $emp_row= Employee::where('mobile',$input['email'])->orWhere('email',$input['email'])->first();


          //echo 'mobile==='.$input['email'];
         //var_export($emp_row);  die;
         #  doc_verified,  profile_active ==yes|no


        if(!isset($emp_row)){
           $msg= $app_warnings[]='Wrong mobile number!';// mobile
            return $this->appError('System Warning-'.$msg);
        }

        if($emp_row->is_mobile_verified==0||$emp_row->is_mobile_verified=='0')
            $app_warnings[]='mobile verification pending! ';

          // Doc pending
         if($emp_row->doc_verified==0||$emp_row->doc_verified=='0')
            $app_warnings[]='Document upload pending! ';

         elseif($emp_row->profile_active=='no')
            $app_warnings[]='profile not active by admin! ';
            
        elseif($emp_row->pneck_emp=='0')
            $app_warnings[]='Account Dactivate by admin! ';

        ###///

        if(isset($emp_row)&&$emp_row->is_mobile_verified=='1'&&$emp_row->profile_active=='yes'&&$emp_row->pneck_emp=='1'){
             // allowed Login ::  //$app_success[]='Go to login check, login success';
             //  check passowrd match.
            $enteredPassword=$input['password'];

            if(isset($emp_row)){
            $emp_row->duty_status_id=0;            
            $emp_row->save();
           }

             if(Hash::check($enteredPassword , $emp_row->password)){

            date_default_timezone_set('Asia/Kolkata');      
            $date=date("Y/m/d h:i:s");
            
        $update =  Employee::where('id',$emp_row->id)->update(['status'=>1,'device_id'=>$request->device_id,'device_token'=>$request->device_token,'created_at'=>$date]);

        $token = $request->device_token;

        /*$message = [ 'notification' => [
                                                'title'=>'Welcome Pneck',
                                                'body' =>'Pneck Employee Login',
                                                'sound'=> 'default',
                                                ],

                                                'content_available'=>true,
                                                'mutable_content'  =>true,
                                                        'data' => [
                                                                'title'=>'Welcome Pneck',
                                                                'message'=>'Pneck Employee Login',
                                                                'image'  => 'img/icon.png',
                                                                
                                                                ]
                                                        ];*/
          $message = 'Welcome Pneck Employee';

        $message_status = $this->sendPushNotification($token, $message);
        
        /*$getResult = json_decode($message_status ,true);
        
        $result = $getResult['success'];
        
        if($result==1)
        {
            $send_arr['message_status'] =  $message;
        }
        else{
            $send_arr['message_status'] =  null;
        }*/
        
        $send_arr['message_status'] =  $message_status;
        
        $current_time = \Carbon\Carbon::now()->toDateTimeString();

            $emp_login_info = new Emp_login_info;

            $emp_login_info->login_at = $current_time;
            $emp_login_info->emp_id = $emp_row->id;
            $emp_login_info->status = 1;
            $emp_login_info->save();

          $EmployeeInfo=Employee::find($emp_row->id);

                 $send_arr['EID'] =$emp_row->id;
                  $send_arr['ep_token'] =  $emp_row->ep_token;
              $send_arr['name'] =  $emp_row->first_name;
              $send_arr['last_name'] =  $emp_row->last_name;
              $send_arr['type_user'] =  $emp_row->type_user;
           
           
            //Extara parameter
              $send_arr['email'] =  $emp_row->email;
              $send_arr['mobile'] =  $emp_row->mobile;
               $send_arr['dl_number'] =  $emp_row->dl_number; // vehicle_number aadhar_number
               $send_arr['vehicle_number'] =  $emp_row->vehicle_number;
               $send_arr['aadhar_number'] =  $emp_row->aadhar_number;
               $send_arr['status'] =  $EmployeeInfo->status;
               
                $EmployeeProfile= Employee_profile::where('emp_id',$EmployeeInfo->id)->first()->profile_image ?? 'null';

              if($EmployeeProfile != 'null' || empty($EmployeeProfile))
               {
                  $send_arr['image'] =  $EmployeeProfile;
               }
               else{
                  $send_arr['image'] =  'https://pneck.in/employee-img/default.jpg';
               }


         $success['data']=$send_arr;
          //print_r($send_arr); die; 

        return $this->sendResponse($send_arr, 'Login success.');

                // return $this->appError('pass coreect!');
             }else{ return $this->appError('Wrong password!'); }

    
          // $send_arr['mobile'] =  $emp_row->mobile;
           
            

            /////Return token and  UID
        }




       /////////////Error if any////////// 
        if(!empty($app_warnings)&&count($app_warnings)>0){
            $msg_str=implode(',', $app_warnings);
        return $this->appError('System Warning-'.$msg_str);

        }else{
         return $this->appError('Sorry, Error in handling Request!');   

        }
       
    }

    public function serviceToggle(Request $request)
    {    

        $input=$request->all();
         $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'ep_token' => 'required',
            'toggle_status' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        ////////////////////////////////////

        if($input['toggle_status']==1)
        {
          $toggleStats = 1;
        }

        if($input['toggle_status']==0)
        {
          $toggleStats = 0;
        }

        $emp_row =  Employee::where('id',$input['employee_id'])->where('ep_token',$input['ep_token'])->update(['toggle'=>$toggleStats]);

        if($emp_row)
        {
            $send_arr['toggle'] =  $toggleStats;
            return $this->sendResponse($send_arr, 'Toggle Service Change.');
        }

        if(!isset($emp_row)){
           $msg= $app_warnings[]='Toggle Service Not Change!';// mobile
            return $this->appError('System Warning-'.$msg);
        }

        /////////////Error if any////////// 
        if(!empty($app_warnings)&&count($app_warnings)>0){
            $msg_str=implode(',', $app_warnings);
        return $this->appError('System Warning-'.$msg_str);

        }else{
         return $this->appError('Sorry, Error in handling Request!');
         }   

    }

    public function emp_logout(Request $request)
    {    

        $input=$request->all();
         $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'ep_token' => 'required',
            //'mobile' => 'required',
            
        ]);
        
        date_default_timezone_set('Asia/Kolkata');      
        $date=date("Y/m/d h:i:s");


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        ////////////////////////////////////
        $emp_row= Employee::where('id',$input['employee_id'])->where('ep_token',$input['ep_token'])->first();

        if(!isset($emp_row)){
           $msg= $app_warnings[]='Not Currently Logout!';// mobile
            return $this->appError('System Warning-'.$msg);
        }

          if(($emp_row->duty_status_id==2))
          {

            $send_arr['success'] =  true;
            $send_arr['status'] =  $emp_row->status;
            $send_arr['in_service'] =  1;
            return $this->sendResponse($send_arr, 'Employee Currently OnDuty.');

          }
          
            if(($emp_row->duty_status_id==0)){
            $emp_row->duty_status_id=0;
            //$emp_row->updated_at=date("Y/m/d h:i:s");
            $emp_row->status=0;            
            $emp_row->save();
            
            $current_time = \Carbon\Carbon::now()->toDateTimeString();

            $emp_login_info = new Emp_login_info;

            $emp_login_info->login_at = $current_time;
            $emp_login_info->emp_id = $emp_row->id;
            $emp_login_info->status = 2;
            $emp_login_info->save();

            $send_arr['success'] =  true;
            $send_arr['status'] =  $emp_row->status;
            $send_arr['in_service'] =  0;
            return $this->sendResponse($send_arr, 'Employee logout successfully.');
           }

       /////////////Error if any////////// 
        if(!empty($app_warnings)&&count($app_warnings)>0){
            $msg_str=implode(',', $app_warnings);
        return $this->appError('System Warning-'.$msg_str);

        }else{
         return $this->appError('Sorry, Error in handling Request!');   

        }
        
    }

    //////custom API////////
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'vehicle_image' => 'required',

            'type_user' => 'required',
            'mobile' => 'required',
            'email' => 'required|email', //EXT // dl_number vehicle_number aadhar_number
             'dl_number' => 'required',
              'vehicle_number' => 'required',
               'aadhar_number' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'device_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
         $imgname = '';
          if($request->hasFile('vehicle_image'))
          { 
              $file = $request->file('vehicle_image');
              $filename = $file->getClientOriginalName(); 
              $extention = $file->getClientOriginalExtension(); 
              $imgname = uniqid().$filename; 
              $destinationPath = storage_path('/employee_vehicle_image/'); //print_r($destinationPath); exit();
              $file->move($destinationPath, $imgname);
          }       

             $is_otp_send=1; //  At registerTime|| mobileVerfy ==0
        $input = $request->all();
        if($imgname != ''){
          $input['vehicle_image'] = url('/').'/storage/employee_vehicle_image/'.$imgname;
        }

        ////////////////////////////
        ///////Duplicate mobilee//////////////
         $isValidMobile= Employee::where('mobile',$input['mobile'])->first();
          //MobileVerfied OR NOT .

         //print_r($isValidMobile); die;
         // $st=intval($isValidMobile->is_mobile_verified)

         $isValidEmail= Employee::where('email',$input['email'])->first();
         //print_r($isValidMobile); die;
         if(!empty($isValidMobile)&&$isValidMobile->is_mobile_verified=='1'){
             return $this->appError($input['mobile'].', Mobile already registered.');
         }elseif(!empty($isValidMobile)&&$isValidMobile->is_mobile_verified=='0'){

           $send_arr['name'] =  $isValidMobile->first_name;
        $send_arr['mobile'] =  $isValidMobile->mobile;
         $send_arr['is_mobile_verified'] ='0';

           // $send_arr=[];
          return $this->sendResponse($send_arr, 'Employee register successfully,OTP sent.');

              //return $this->appError('Go, Verify screen,already registered.');
         }


         #Email ID///

          /*if(!empty($isValidEmail)&&$isValidEmail->is_mobile_verified=='1'){

             return $this->appError($input['email'].', Email already registered.');

         }else*/
         if(!empty($isValidEmail)&&$isValidEmail->is_mobile_verified=='0'){

           $send_arr['name'] =  $isValidEmail->first_name;
        $send_arr['mobile'] =  $isValidEmail->mobile;
         $send_arr['is_mobile_verified'] ='0';

          // $send_arr=[];
          return $this->sendResponse($send_arr, 'Employee register successfully,OTP sent.');

         }

        //////////////////////////
         $current_tim= \Carbon\Carbon::now()->toDateTimeString();

       $form_pass=$input['password'];
         unset($input['password']); unset($input['c_password']);
        $input['password'] = bcrypt($form_pass);

         $custom_token=$input['password'].rand(100000,999999);
        $custom_token=md5($custom_token);

        //  ep_token
        // $success['token'] =  $user->createToken('MyApp')->accessToken;  // Send token to Emp:
        //$input['ep_token'] =  $user->createToken('MyApp')->accessToken;  // Send token to Emp:
         $input['ep_token']=$custom_token; //
         $input['created_at']=$current_tim;

        $id = DB::table('tbl_employees')->insertGetId($input);

        // If primary detail save Send SMS to mobile Verify.
         $send_arr=[];
         $Employee = Employee::where('id',$id)->first();
          /////Send OTP///////
         $otp = rand(100000,999999);
        // $mob = $phone_number;
         //$mob='7291919640';
         $mob=$Employee->mobile;

        // $msg = urlencode("Your one time password OTPis $otp");
         $msg = urlencode("Your one time otp code is $otp");
                            
                            
        //$url = "http://5.189.187.82/sendsms/bulk.php?username=BYOPeneck1&password=Peneck123&type=TEXT&sender=peneck&mobile=".$mob."&message=".$msg;
        
        $url = "http://5.189.187.82/sendsms/bulk.php?username=EPKamitkumar&password=amit87495&type=TEXT&sender=CPNECK&mobile=".$mob."&message=".$msg;

         //echo $url; die;
        ////////////Save oTP//////////
        $otp_input=[];
        // $dat=$this->current_date;
        $otp_input['mobile']=$Employee->mobile;
        $otp_input['otp_type']='mobile';

         $otp_input['otp']=$otp;
         
         $otp_input['create_time']=$curDate=$current_tim; //date("Y-m-d H:i:s");

         $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_tim)));

         $otp_input['expire_time']=$expTime;
          //print_r($otp_input); die ; 

           DB::table('tbl_employees_otp')->insert($otp_input);
         unset($otp_input);

          //return $this->sendResponse($send_arr, 'OTP saved,'); #Test


        /////////////Send OTP///////////////////////
        // $sdsd= file_get_contents($url);

            $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                        $data = curl_exec($ch);

                        if(curl_errno($ch))
                        {   // echo 'ERRRR';
                            $msg1='OTP Not sent';
                            $Error = curl_error($ch);
                            header('Content-Type: application/json');
                            print_r(json_encode(array('status' => "204", 'messaeg' => $Error)));
                        }
                        else
                        {   //echo 'OTP sent';
                         // store in Emp S
                      $msg1='OTP sent';

                        }


        //////Send Result////
        $send_arr['name'] =  $Employee->first_name;
        $send_arr['mobile'] =  $Employee->mobile;
        $send_arr['vehicle_image'] = $input['vehicle_image'];

         $send_arr['is_mobile_verified'] ='0';
         $success['data']=$send_arr;

     

        return $this->sendResponse($send_arr, 'Employee register successfully,'.$msg1);
    }
    
    // $images ='';
    // if($request->hasFile('image')){

    //    foreach($request->file('image') as $file){
    //      $rand = mt_rand(000,999);
    //      $extension = $file->getClientOriginalExtension();
    //      $name = time().$rand.'-gym-fitter.'.$extension;
    //      $filePath = 'gym/'.$name;
    //      Storage::disk('s3')->put($filePath, file_get_contents($file));
    //      $fileNameToStore[] =$filePath;
    //    }
    //    $images =   implode(" ",$fileNameToStore);
    // }
    public function uploadImage(Request $request)
    {
        $input=$request->all();

      try {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
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
        
        $EmployeeProfile=Employee_profile::where('emp_id', $request->employee_id)->first();
       
        if($EmployeeProfile)
        {
            
              $imagePath = $EmployeeProfile->profile_image;
              $s = explode("/",$imagePath);
              \Storage::disk('public')->delete($s[5]);
           
        }

        if($request->employee_id){ 
           
          $imgname = '';
          if($request->hasFile('image'))
          { 
              $file = $request->file('image');
              $filename = $file->getClientOriginalName(); 
              $extention = $file->getClientOriginalExtension(); 
              $imgname = uniqid().$filename; 
              $destinationPath = storage_path('/employee_img/'); //print_r($destinationPath); exit();
              $file->move($destinationPath, $imgname);
          }
          
        if($EmployeeProfile=='')
        {
        $input['profile_image'] = url('/').'/storage/employee_img/'.$imgname;
          $input['emp_id'] = $request->employee_id;
          Employee_profile::create($input);
        }
        else{
         
          $EmployeeProfile->profile_image = url('/').'/storage/employee_img/'.$imgname;
          $EmployeeProfile->save();
        }
          $data = ['profile_image' => url('/').'/storage/employee_img/'.$imgname];
          return response()->json(['data'=>$data,'message'=>'Profile Successfully Updated', 'success'=>true]);
        }
      
        return response()->json(['data'=>(object)[], 'message'=>'This Employee is not exist.', 'success'=>false]);
        
      } catch (Exception $e) {
          return response()->json(['data'=>(object)[], 'message'=>'Something went wrong'.$e, 'success'=>false]);
      }
    }

    // public function deleteFile($fileArray,$path)
    // {
    //   foreach (explode(",",$fileArray) as $key => $value) {
    //     Storage::delete($path.'/'.$value);

   /* if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      ////////////////////SystemError///////////////////// 
        $get_emp_id=$input['employee_id'];
          $Employee=Employee::find($get_emp_id);
           if(!isset($Employee)){
            return $this->appError('Wrong Employee ID! ');
             //$app_warnings[]='Wrong Employee ID! ';  //Return 
           }

            if(isset($Employee)&&$this->_valid_token($get_emp_id,$input['ep_token'])==false){
             return $this->appError('Employee Token not matched! ');
            }


        ////////////Update in db//////////////
            $Employee->first_name=$input['first_name'];
            $Employee->last_name=$input['last_name'];

            //  emp_gender
            $Employee->emp_gender=(!empty($input['emp_gender']))?$input['emp_gender']:'other';
            $Employee->emp_address=(isset($input['emp_address']))? addslashes($input['emp_address']):'' ;

            #Mobie Never Updated
            // $query=$Employee->save();
             if($Employee->save()){
              $resp_arr=[]; // EveryReturnArr
              $resp_arr['profile_active'] =$Employee->profile_active;
              $resp_arr['fname'] =$Employee->first_name;
              $resp_arr['last_name'] =$Employee->last_name;
               $resp_arr['mobile'] =$Employee->mobile;
         $mStatus=($Employee->is_mobile_verified=='1'||$Employee->is_mobile_verified==1)?'yes':'no';

               $resp_arr['email'] =$Employee->email;
               $resp_arr['mobile_verified'] =$mStatus;
               $resp_arr['emp_gender'] =$Employee->emp_gender;

               $resp_arr['emp_address'] =$Employee->emp_address;
               
                 //$resp_arr['email_verified'] ='no';
                return $this->sendResponse($resp_arr, 'Ok, Saved!');


              // $app_warnings[]='Saved';
             
             }else{
              return $this->appError('Error in update!,Try later! ');
             }  */
    // }


  ////End/// 
}
