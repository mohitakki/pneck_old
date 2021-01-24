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
use App\Booking;
use App\Track;
use App\AvailableEmployees; 
use App\Employee_location;
use App\Employee; // Employee , User
use App\Booking_otp;
use App\Booking_item;
use App\Booking_reject;
use App\Booking_rating;
use App\Vendor_rating;
use App\Vendor;
use App\vendor_service_images;
use App\vendor_services;
use App\Vendor_skils;
use App\Employee_profile;
use Edujugon\PushNotification\PushNotification;
use App\VehicleType;

use Illuminate\Support\Facades\DB;



class BookingController extends BaseController
{
    
        // Notification 
//               public function checkNoti($msg){
           
//         $fcmUrl = 'https://fcm.googleapis.com/fcm/send';


//         // $Customer = Employee::where('id',$id)->first();
//         $Customer = $Customer = Employee::where('id',$id)->first();

//         foreach($Customer as $data){
            
//             $notification = [
//                 'title' => $msg,
//                 'sound' => true,
//             ];
            
//             $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

        
//             $fcmNotification = [
//                 'to'        => $data['device_token'],
//                 'notification' => $notification,
//                 'data' => $extraNotificationData
//             ];
        
//         $headers = [
//             'Authorization: key=AAAAKo8Njs4:APA91bG_FY-OcEXsbHjNhcu2HvyGwoTYDumPz8ZJ5kREC7Zp_6cHMmnn3NqWqKYfXvPulk5f-v5p_Hq1vDsk9CA1DHiIWex-HbX_YxMb0q6BDhS45zBytg5eC6kOZWe-CuA2HHO-myE9',
//             'Content-Type: application/json'
//         ];
        
        
//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL,$fcmUrl);
//             curl_setopt($ch, CURLOPT_POST, true);
//             curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//             curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
//             curl_exec($ch);
//             curl_close($ch);

//         }

//     }
    
    //
    public function __construct(){
       //echo 'Site Basisc Setings get';  die; 
        $GetAPIKey='';
    }

//////////////

      protected function _sendDeliveryOtp($otp,$mobile='7291919640'){
       $response='notsent';
       $sendDone=2; //2==not
       // $msg=urlencode($msgInfo);

      //$msg = urlencode("Your one time otp code is $otp");
       $msg = urlencode("Delivery OTP- $otp");
      //$mob='7291919640'; //testing
       $mob=$mobile;

     ///////////////
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


    /////////


       protected function _sendBookingOtp($otp,$mobile='7291919640'){
       $response='notsent';
       $sendDone=2; //2==not
       if($sendDone==1){
        $response='sent';
       }
       ///////Sent////////
        $page='https://pneck.in/upload-document.php';
     $msgInfo='Mobile verfied, Upload document-'.$page;
       $msg=urlencode($msgInfo);

      //$msg = urlencode("Your one time otp code is $otp");
       $msg = urlencode("Booking OTP- $otp");
      //$mob='7291919640'; //testing
       $mob=$mobile;

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

/////////////////////////

public function bookingRatingAdd(Request $request){

        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'ses_booking_id' => 'required',
             'user_type' => 'required', // user|employee
              'rating' => 'required',
               //'message' => 'required',
          
        ]);
        $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        //////Valida BOoking///
         $Booking=Booking::find($input['ses_booking_id']);
          if(!isset($Booking)){
          $app_warnings[]='Wrong booking id! ';
         }

        
        if($Booking->delivery_confirm_at==NULL){
          $app_warnings[]='delivery otp not confirmed! ';
        }
        ////Feed back only if booking completed ///
         // if($Booking->order_status1='order_request_payment'){
         //  $app_warnings[]='Please Complete Booking! ';
         //    }
       

   /////////////////SystemError///////////////////////
        //  $app_warnings[]='Testing mode on!!!!';
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemMessage-'.$msg_str);
          }

          /////////////////////
          $Rating=new Booking_rating;
          $Rating->booking_id=$Booking->id;
          $Rating->user_type=$input['user_type'];

          if(isset($input['user_type'])){
            if($input['user_type']=='user')
            $Rating->user_id=$Booking->user_id;
            elseif($input['user_type']=='employee')
              $Rating->user_id=$Booking->employee_id;

              // employee_id
          }

          $Rating->rating_number=($input['rating']<=5)?$input['rating']:5;

          // mesage
          if(isset($input['message'])&& !empty($input['message'])){
            $Rating->message=$input['message'];
          }
          // create_time
          
          $Rating->create_time=$current_time;
          $Rating->save();
          $success_msg='information sent successfully! ';

      ///Response///////
      if(isset($success_msg)){
            $res['booking_order_number']=$Booking->order_number;
            //$res['booking_msg']=$success_msg;
            return $this->sendResponse($res, ''.$success_msg);      
       }

      }

      public function VendorRatingAdd(Request $request){

        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
             'ep_token' => 'required', 
             'vendor_id' => 'required', 
              'rating' => 'required',
               'message' => 'required',          
        ]);

        $current_time= \Carbon\Carbon::now()->toDateTimeString();

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

        ////Feed back only if booking completed ///
         // if($Booking->order_status1='order_request_payment'){
         //  $app_warnings[]='Please Complete Booking! ';
         //    }
       

   /////////////////SystemError///////////////////////
        //  $app_warnings[]='Testing mode on!!!!';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemMessage-'.$msg_str);
          }

          $Vendor=Vendor::find($input['vendor_id']);
          if(!isset($Vendor)){
          $res['rating_id']='Wrong Vendor id!';
          $msg='Rating Not Save! ';
          }
          else{
          /////////////////////
          $Rating = new Vendor_rating;
          $Rating->user_id=$input['user_id'];
          $Rating->vendor_id=$input['vendor_id'];         

          $Rating->rating=($input['rating']<=5)?$input['rating']:5;

          // mesage
          if(isset($input['message'])&& !empty($input['message'])){
            $Rating->message=$input['message'];
          }
          
          $Rating->save();
          $res['rating_id']=$Rating->id;
          $msg='Rating sent successfully! ';
        }

      ///Response///////
      if(isset($msg)){
            return $this->sendResponse($res, ''.$msg);      
       }

      }

/*
@ empBookingPaymentStatus 
==================
@Employee waiting for
+userPayment process 
@call in every 30-40 sec.

**/

 public function empBookingPaymentStatus(Request $request){

     $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
             'ep_token' => 'required',
             'ses_booking_id' => 'required',
          

        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      
         $Booking=Booking::find($input['ses_booking_id']);
         if(!isset($Booking)){
          $app_warnings[]='Wrong booking id! ';

         }

         $Employee=Employee::find($input['employee_id']);
         if(!isset($Employee)){
           $app_warnings[]='Wrong Employee id! ';
         }


   /////////////////SystemError///////////////////////
     // $app_warnings[]='empBookingPaymentStatus, Testing mode on!!!!';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }

          //////////////////////API////////////////
        
            if($Booking->id>0){
              $success_msg='OK';
             
             $send_arr=array();
             $send_arr['your_booking_status']=$Booking->order_status; 
             // order_status , status
              # awaited, rejected, accepted

             $get_msg=$Booking->order_status;
             switch ($get_msg) {
               case 'rejected':
               $send_booking_msg='Your Booking Rejected!';
                 # code...
                 break;
                case 'accepted':
               $send_booking_msg='Your Booking accepted!';
                 # code...
                 break;
                 case 'order_request_payment':
               $send_booking_msg='Your Booking order_request_payment to user!';
                 # code...
                 break;


               
               default:
                $send_booking_msg='Waiting for acceptance! ';
                 # code...
                 break;
             }

             $send_arr['your_booking_status_msg']=$send_booking_msg;
             $send_arr['your_booking_id']=$Booking->id;
             $send_arr['your_booking_number']=$Booking->order_number;

             return $this->sendResponse($send_arr, 'Info-'.$success_msg);
           }

              

    }





/**
@userPaymentProcess
**/

public function userPaymentProcess(Request $request){
   
        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
             'ses_booking_id' => 'required',
              // 'booking_amount' => 'required',
              'payment_mode' => 'required',
          
        ]);

       

        $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }


        //////Valida BOoking///
         $Booking=Booking::find($input['ses_booking_id']);
          if(!isset($Booking)){
          $app_warnings[]='Wrong booking id! ';
         }

        
        if($Booking->delivery_confirm_at==NULL){
          $app_warnings[]='delivery otp not confirmed! ';
        }
       

   /////////////////SystemError///////////////////////
       //$app_warnings[]='Mark Booking Complete, Testing mode on!!!!';
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemMessage-'.$msg_str);
          }

          $Employee=Employee::find($Booking->employee_id);

          //echo 'Empstatus='.$Employee->mobile; die; 

          ///////If employee:RequestPayment:   if($Booking->order_status=='delivery_otp_confirmed'){ ////////////

            if($Booking->order_status=='order_request_payment'){

              $success_msg='Thank you, Booking Completed! Booking number-'.$Booking->order_number;
              ///payment_status , payment_mode 
             
              $Booking->payment_status='paid'; // paid| unpaid
        $Booking->payment_mode=(isset($input['payment_mode']))?$input['payment_mode']:'cash';
               //  payment_mode :: cash , online, wallet
              $Booking->booking_complete_at=$current_time;
              $Booking->order_status='order_completed';
              $Booking->updated_at=$current_time;
              $Booking->save();
              ///Free Employee:New job can accept ///
                $Employee->is_online='yes';
                $Employee->duty_status_id='0';#ready for job
                $Employee->save();


            }elseif($Booking->order_status=='order_completed'){      

             $success_msg='Thank you, Booking Completed already!, ';
          // [Update for next Screen after deliver OTP Confirm By Screen Employee]
              }



                 if(isset($success_msg)){
                  $Customer=Customer::find($Booking->user_id);

          
           $res['booking_order_number']=$Booking->order_number; //'ORD152_1567799084';
           $res['ses_booking_id']=$Booking->id;
            if(!empty($Customer->first_name))
        $res['customer_name']=$Customer->first_name.' '.$Customer->last_name;
        
        
        if($Customer)
          {
          $token = $Customer->device_token;

        $message = 'Booking Completed';

        $booking_order_number = $Booking->order_number;
        $ses_booking_id = $Booking->id;

        if($Customer->profile_image != 'null' || empty($Customer->profile_image))
               {
                  $image = $Customer->profile_image;
               }
               else{
                  $image =  'https://pneck.in/employee-img/default.jpg';
               }                   

        $message_status = $this->sendBookingCompletedNotification($token,$message,$booking_order_number,$ses_booking_id,$image);
        }
        if($Employee)
        {
          $token = $Employee->device_token;

        $message = 'Booking Completed';

        $booking_order_number = $Booking->order_number;
        $ses_booking_id = $Booking->id;

        $EmployeeProfile=Employee_profile::where('emp_id', $Booking->employee_id)->first();

        if($EmployeeProfile)
        {

        if($EmployeeProfile->profile_image != 'null' || empty($EmployeeProfile->profile_image))
               {
                  $image = $EmployeeProfile->profile_image;
               }
               else{
                  $image =  'https://pneck.in/employee-img/default.jpg';
               }
        }
        else{
          $image =  'https://pneck.in/employee-img/default.jpg';
        } 
          
            $res['curr_booking_status']=$Booking->order_status;
             return $this->sendResponse($res, 'Info-'.$success_msg);
            
                 }




            return $this->appError('Sorry, Please try later! ');

          ###################################
            die; 

      }
}



/*****
@UserCompleted Orders

**/

public function userMyOrders(Request $request){
   
        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
             'ep_token' => 'required',
              //'booking_amount' => 'required',
          
        ]);

        ///////////////////////////
          $current_time= \Carbon\Carbon::now()->toDateTimeString();

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        //////Valida BOoking///////////////
      


         $User=Customer::where('id',$input['user_id'])->first();
         
         if(!isset($User)){
          $app_warnings[]='Wrong User id! ';
         }
        
   /////////////////SystemError///////////////////////
      // $app_warnings[]='empMyRides, Testing mode on!!!!';
        
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemMessage-'.$msg_str);
          }
          /**
          @ accepted booking
          @ cancelled and
          @ not show awaited|expired in 2min booking. 
          @ awaited
          @->where('order_status','!=','order_completed')


          **/
         $my_orders=Booking::select('id','order_number',
          'order_status',
          'accept_otp_confirm_at',
          'delivery_confirm_at',
           'order_subtotal',
           'booking_charge',
           'grand_total',
           'booking_complete_at'
          )->where('order_status','!=','awaited')
         ->where('user_id',$input['user_id'])
         //->whereNotNull('booking_complete_at')
         ->orderBy('updated_at','desc')->get()->toArray();

           //print_r($my_orders); die; 

          if(count($my_orders)>=1){
            $success_msg='Data received!';
               $res['my_orders']=$my_orders;
             return $this->sendResponse($res, 'Info-'.$success_msg);
           }else{
             $success_msg='No data! ';
             return $this->sendResponse($res=[], 'Info-'.$success_msg);
           }

        //////////////////////
      return $this->appError('Sorry, Please try later! ');        
      }


/**
@ Employee myRides

@For-Booking Paid

***/

public function empMyRides(Request $request){
   
        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
             'ep_token' => 'required',
              //'booking_amount' => 'required',
          
        ]);

        ///////////////////////////
          $current_time= \Carbon\Carbon::now()->toDateTimeString();

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        //////Valida BOoking///////////////
         $Employee=Employee:: where('id',$input['employee_id'])->first();
         
         if(!isset($Employee)){
          $app_warnings[]='Wrong employee id! ';
         }
        
   /////////////////SystemError///////////////////////
      // $app_warnings[]='empMyRides, Testing mode on!!!!';
        
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemMessage-'.$msg_str);
          }
         $Rides=Booking::select('id','order_number',
          'accept_otp_confirm_at',
          'delivery_confirm_at',
           'order_status',
           'order_subtotal',
           'booking_charge',
           'grand_total',
           'booking_complete_at'
          )->where('order_status','order_completed')
         ->where('employee_id',$input['employee_id'])
         ->whereNotNull('booking_complete_at')
         ->orderBy('updated_at','desc')->get()->toArray();

          // print_r($Rides); die; 

          if(count($Rides)>=1){
            $success_msg='Data received! ';
               $res['Rides']=$Rides;
             return $this->sendResponse($res, 'Info-'.$success_msg);
           }else{
             $success_msg='No data! ';
             return $this->sendResponse($res=[], 'Info-'.$success_msg);
           }
          


        //////////////////////
      return $this->appError('Sorry, Please try later! ');        
      }





/****
@ TestRject and freez account

**/

public function empBookingReject(Request $request){  

  $app_warnings=[];
  $current_time= \Carbon\Carbon::now()->toDateTimeString();
   $input=$request->all();

         $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'ep_token' => 'required',
            'booking_id' => 'required',
             'status' => 'required',
           
        ]);
         //$app_warnings[]='Request JSON pending! ';        

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
          }

           $Employee=Employee::find($input['employee_id']);
           //echo '===';print_r($Employee); die;

           if(!isset($Employee))$app_warnings[]='Wrong employee id!';

           #######App warnings#######
           //$app_warnings[]='API in testing!  ';
             if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }
          //////////////////////2019-09-01 12:16:46
          
        $your_date= date('Y-m-d'); 
        $Booking=Booking::find($input['booking_id']); //Accept booking
        $expTime_2min= date("Y-m-d H:i:s",strtotime("+2 minutes", strtotime($current_time)));
        $expTime_24hr= date("Y-m-d H:i:s",strtotime("+1 day", strtotime($current_time)));
        
        /////Add Booking reject login//////////////
        # is_used booking_id created_at
        $Reject=new Booking_reject;
        $Reject->emp_id=$input['employee_id'];
        $Reject->rejected_on=$expTime_2min;
        $Reject->is_used=0;
        $Reject->booking_id=$Booking->id;
        $Reject->created_at=$current_time;
        $Reject->save();
        //////////////////

        $Booking->employee_id=$input['employee_id']; 
        $Booking->order_status='rejected'; 
        $Booking->status='rejected'; 
        $Booking->emp_reject_at=$current_time;   //'accepted' ; 
        $Booking->save();

        ### is_online , duty_status_id :: 2== on_duty
        ///>> if employee click online then-only receive BookingNextTime
        //$Employee->duty_status_id=0;  ##  off_duty --forNextDownTimeCycle###
        //$Employee->is_online='no';
        ############ISAccountNeed to Freez#########################
        //<5 same day 5 booking is Rejected freez account
         $Freez_msg='New Booking Accept suspended for 2 min! ';

         $EmpId=$input['employee_id'] ; //=9;
         $Reject_rows=Booking_reject::where('emp_id','=',$EmpId)->whereDate('created_at', '=', $your_date)->get()->count();
         #[account_freeze_till,  is_freeze_24hr]
          if(!empty($Reject_rows)&&$Reject_rows>=5){ // Next24hrFreezeAccount
            // Can't Reject More job after 5 in a day!
             $Employee->is_freeze_24hr='yes';
             $Employee->account_freeze_till=$expTime_24hr;
             $Freez_msg='You Rejected 5 Booking in a today, account freez for next 24Hr.! '; 

          }

           //echo 'Reject_rows==';
          // print_r($Reject_rows); die;

        ########################

        $Employee->block_exp_at=$expTime_2min;
        $Employee->save();
        ////////////////////////AddLogToRject Table ////////
        //////////////////////////

           $Info=(isset($Booking))?'yes':'no' ; // yes|no

           if($Info=='yes'){

           $res['booking_order_number']=$Booking->order_number; //'ORD152_1567799084';
           $res['booking_id']=$Booking->id;  // Kepp save in APP
          // $res['remaining_attempts']=4; 
           $res['remaining_attempts_msg']=(isset($Freez_msg))?$Freez_msg:'';       

           }

          return $this->sendResponse($resp_arr=$res, $Booking->order_number.'-Booking rejected! ');

   }




/***
@ Mark: mcomplete Booking by Emp
@Free User and EMP 
@temp api
***/

public function empBookingMarkCompleted(Request $request){
   
        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
             'ses_booking_id' => 'required',
              'booking_amount' => 'required',
          
        ]);

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        //////Valida BOoking///
         $Booking=Booking::find($input['ses_booking_id']);
          if(!isset($Booking)){
          $app_warnings[]='Wrong booking id! ';

         }
        
        if($Booking->delivery_confirm_at==NULL){
          $app_warnings[]='delivery otp not confirmed! ';

        }
       

   /////////////////SystemError///////////////////////
       // $app_warnings[]='Mark Booking Complete, Testing mode on!!!!';
        
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemMessage-'.$msg_str);
          }

          

         /////////API////////////////////////// accept_otp ,  accept_otp_confirm_at
          // # Check for Delivery OTP data confirmed or not
          // echo 'delivery_confirm_at';
          // var_export($Booking->delivery_confirm_at);
          //  die;

         
         

         
          //////////////////////////////////////////

            if($Booking->order_status=='delivery_otp_confirmed'){
              // Update Bookinn Charge
              // $success_msg='Delivery OTP matched already! ';
              $success_msg='Booking Completed!, Booking number-'.$Booking->order_number;

              $Booking->booking_complete_at=$current_time;
              $Booking->order_status='order_request_payment';
              /////////////
              $Booking->order_subtotal=$input['booking_amount'];
              $Booking->booking_charge=50;
              $Booking->grand_total=50+($Booking->order_subtotal);

              $Booking->pay_amount=$Booking->grand_total;

              /////////////
              $Booking->updated_at=$current_time;
              $Booking->save();


             


            }elseif($Booking->order_status=='order_request_payment'){      

            $success_msg='Booking order_request_payment sent to user! ';
          // [Update for next Screen after deliver OTP Confirm By Screen Employee]
              }



                 if(isset($success_msg)){
                  $Customer=Customer::find($Booking->user_id);
                  
        if($Customer)
          {
            $token = $Customer->device_token;

            $message = 'Request for payment';

        $booking_order_number = $Booking->order_number;
        $ses_booking_id = $Booking->id;
        $billing_amount = $input['booking_amount'];

        if($Customer->profile_image != 'null' || empty($Customer->profile_image))
               {
                  $image = $Customer->profile_image;
               }
               else{
                  $image =  'https://pneck.in/employee-img/default.jpg';
               }                   

        $message_status = $this->sendRequestPaymentNotification($token,$message,$booking_order_number,$ses_booking_id,$billing_amount,$image);
        }

          $res['message_status'] = true;

          
           $res['booking_order_number']=$Booking->order_number; //'ORD152_1567799084';
           $res['ses_booking_id']=$Booking->id;
            if(!empty($Customer->first_name))
            $res['customer_name']=$Customer->first_name.' '.$Customer->last_name;
          
            $res['curr_booking_status']=$Booking->order_status;
             return $this->sendResponse($res, 'Info-'.$success_msg);
            
                 }




            return $this->appError('Sorry, Please try later! ');

          ###################################
            die; 

      }




/***
DeliveryOTPMatch

**/

public function empBookingDeliveryOtpMatch(Request $request){
   
        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
             'ses_booking_id' => 'required',
              'otp' => 'required',
              // 'mobile_number' => 'required',
        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        //////Valida BOoking///
         $Booking=Booking::find($input['ses_booking_id']);
          if(!isset($Booking)){
          $app_warnings[]='Wrong booking id! ';

         }
      
       

   /////////////////SystemError///////////////////////
          // $app_warnings[]='empBookingDeliveryOtpMatch, Testing mode on!!!!';
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }


         
          ////////////////////

            if($Booking->order_status=='delivery_otp_confirmed'){
              $success_msg='Delivery OTP matched already! ';

            }elseif($input['otp']==$Booking->delivery_otp&&$Booking->order_status!='delivery_otp_confirmed'){
            
              // [Update for next Screen after deliver OTP Confirm By Screen Employee]

              $Booking->delivery_confirm_at=$current_time;
              $Booking->order_status='delivery_otp_confirmed';
              $Booking->updated_at=$current_time;$Booking->save();
              $success_msg='Delivery_otp OTP matched! ';

              }elseif($input['otp']!=$Booking->delivery_otp){
                return $this->appError('Delivery OTP not matched! ');
              }

                 if(isset($success_msg)){

          $Customer=Customer::find($Booking->user_id);
           $res['booking_order_number']=$Booking->order_number; //'ORD152_1567799084';
           $res['ses_booking_id']=$Booking->id;
            if(!empty($Customer->first_name))
            $res['customer_name']=$Customer->first_name.' '.$Customer->last_name;
          
            $res['curr_booking_status']=$Booking->order_status;
             return $this->sendResponse($res, 'Info-'.$success_msg);
            
                 }
                 //////


      }



/***
   Route::post('empBookingDeliveryOtpResend', 'API\BookingController@empBookingDeliveryOtpResend');
   @only after :employee mark: out for delivery
   @ out_for_delivery


   **/
   public function empBookingDeliveryOtpResend(Request $request){

        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
             'ep_token' => 'required',
             'ses_booking_id' => 'required',
          

        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      
         $Booking=Booking::find($input['ses_booking_id']);

        if($Booking->order_status=='rejected')
        {

         $EmployeeUpdate = Employee::where('id', $input['employee_id'])         
          ->update(['duty_status_id' => '0']);
          
            $response = ['success' => false,        
                'message' => 'Order Cancelled',                
              ];
              $send_response=array('response'=>$response);
               return response()->json($send_response, 200);            
        }

        else{


         if(!isset($Booking)){
          $app_warnings[]='Wrong booking id! ';

         }

         $Employee=Employee::find($input['employee_id']);
         if(!isset($Employee))$app_warnings[]='Wrong employee id! ';
         


   /////////////////SystemError///////////////////////
     // $app_warnings[]='Waiting for accpetance API,Testing mode on!!!!';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }

          ##########Resend otp ###################
          //>> empty delivery_otp [Create OTP and save to Booking then-resend to mobile]
           if(empty($Booking->delivery_otp)){
          $Booking->delivery_otp=$otp =rand(100000,999999);
          $Booking->save();  }

          

          //////////////////////////////
           
            
            $create_otp=$Booking->delivery_otp;
            $Customer=Customer::find($Booking->user_id);
            $mobile_number=(isset($Customer))?$Customer->mobile:'8826844273';   
           ## echo 'mobile_number'.$mobile_number, 'create_otp',$create_otp; die;
            //$mobile_number='7291919640';#TestingForDelieryOTP

           

            ///////////////////////
             $send_new_otp=$this->_sendDeliveryOtp($create_otp,$mobile_number);
            //echo $send_new_otp ,':'.$send_new_otp ; die;
             if($send_new_otp=='sent'){
             $send_arr['msg']='OTP Resend to User registerd Mobile with us! ';
             $status_msg='Request Sent!';
           
              return $this->sendResponse($send_arr, 'Info-'.$status_msg);
              }
          }
            ##########


            return $this->appError('SystemError-'.$msg='Error in sending! ');




   }





/***
Route::post('userNearByEmployeesList', 'API\BookingController@userNearByEmployeesList');
Schedule API -30 sec. 
@10KM range employee for userSide map
0= off_duty
1= ready_to_job
2= on_duty
3= free_from_duty
1=>> OR 0 again

**/
public function userNearByEmployeesList(Request $request){
   $input=$request->all();
        $validator = Validator::make($request->all(), [
             'user_id' => 'required',
             'ep_token' => 'required',
             'curr_lat' => 'required',
             'curr_long' => 'required',
             'curr_address' => 'required',          

        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }


         $Customer=Customer::find($input['user_id']);
         if(!isset($Customer)){
           $app_warnings[]='Wrong user id! ';
         }


   /////////////////SystemError///////////////////////
      //$app_warnings[]='userNearByEmployeesList API,Testing mode on!!!!';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }

          //////////////////////API////////////////
            $careType = 1;
            $distance =10; //10KM range employee
            $ownerLatitude=28.57818 ;$ownerLongitude=77.31573;
            $ownerLatitude=(isset($input['curr_lat']))?$input['curr_lat']:$ownerLatitude;
            $ownerLongitude=(isset($input['curr_long']))?$input['curr_long']:$ownerLongitude;


               $raw = DB::raw(' ( 6371 * acos( cos( radians(' . $ownerLatitude . ') ) * 
 cos( radians( curr_latitude ) ) * cos( radians( curr_longitude ) - radians(' . $ownerLongitude . ') ) + 
    sin( radians(' . $ownerLatitude . ') ) *
         sin( radians( curr_latitude ) ) ) )  AS distancekm');

          $EmployeeList= DB::table('tbl_employees')->select('*', $raw)
        ->addSelect($raw)
       ->where('tbl_employees.toggle',1)
       ->where('tbl_employees.type_user',2)
       ->orderBy('distancekm', 'ASC')
       ->having('distancekm', '<=', $distance)->get();
        
        
          $Employee_arr=[];
         foreach ($EmployeeList as $item) {
           # code...
          $Employee_arr[]=array('first_name'=>$item->first_name ,
                                'is_online'=>$item->is_online , 
                                'duty_status'=>$item->duty_status_id , 
                                'distance_km'=>number_format((float)$item->distancekm, 2, '.', ''), 
                                'curr_latitude'=>$item->curr_latitude , 
                                'curr_longitude'=>$item->curr_longitude , 
                                'curr_loc_address'=>$item->curr_loc_address , 
                             );

         }

         // print_r($Employee_arr); die;
            $send_booking_msg='Data Received successfully! ';
            $send_arr['employees']=$Employee_arr;
            $send_arr['your_location']=array('first_name'=>'User' ,  
                                'curr_latitude'=> $input['curr_lat'] , 
                                'curr_longitude'=>$input['curr_lat'] , 
                                'curr_loc_address'=>$input['curr_address'],
                             );

           if(is_array($Employee_arr)&&count($Employee_arr)>0){
            return $this->sendResponse($send_arr, 'Info-'.$send_booking_msg);
           }else{ // no employee
             $send_booking_msg='Data Received successfully! ';
            $send_arr['employees']=[];
            $send_arr['your_location']=array('first_name'=>'User' ,  
                                'curr_latitude'=> $input['curr_lat'] , 
                                'curr_longitude'=>$input['curr_lat'] , 
                                'curr_loc_address'=>$input['curr_address'],
                             );
            return $this->sendResponse($send_arr, 'Info-'.$send_booking_msg);

           }
         
         } 

  public function userNearByVendorList(Request $request)
  {
    
        $input=$request->all();
        $validator = Validator::make($request->all(), [
             'user_id' => 'required',
             'ep_token' => 'required',
             'curr_lat' => 'required',
             'curr_long' => 'required',
        ]);
      

          $current_time= \Carbon\Carbon::now()->toDateTimeString();

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

         $Customer=Customer::find($input['user_id']);

         if(!isset($Customer)){
           $app_warnings[]='Wrong user id! ';
         }

   /////////////////SystemError///////////////////////
      //$app_warnings[]='userNearByEmployeesList API,Testing mode on!!!!';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }

          //////////////////////API////////////////
            $careType = 1;
            $distance =10; //10KM range employee
            $ownerLatitude=28.57818 ;$ownerLongitude=77.31573;
            $ownerLatitude=(isset($input['curr_lat']))?$input['curr_lat']:$ownerLatitude;
            $ownerLongitude=(isset($input['curr_long']))?$input['curr_long']:$ownerLongitude;


               $raw = DB::raw(' ( 6371 * acos( cos( radians(' . $ownerLatitude . ') ) * 
 cos( radians( vendor_service_x_profile.vendor_latitude ) ) * cos( radians( vendor_service_x_profile.vendor_longitude ) - radians(' . $ownerLongitude . ') ) + 
    sin( radians(' . $ownerLatitude . ') ) *
         sin( radians( vendor_service_x_profile.vendor_latitude ) ) ) )  AS distancekm');

          if($request->type || $request->service_id || $request->subcat_id || $request->catalogue_id || $request->days || $request->vendor_search){

            $getTotalVendors = DB::table('vendor_service_x_profile')->select($raw, 'vendor_service_x_profile.vendor_data as days','vendor_service_x_profile.vendor_id')->addSelect($raw)
             ->orderBy('distancekm', 'ASC')
             ->having('distancekm', '<=', $distance)->get();

            

            $VendorList= DB::table('vendor_service_x_profile')->leftJoin('tbl_vendors','vendor_service_x_profile.vendor_id','=','tbl_vendors.id')->leftJoin('vendor_services','vendor_services.id','=','vendor_service_x_profile.service_id')->leftJoin('vendor_service_subcat','vendor_service_subcat.id','=','vendor_service_x_profile.subcat_id')->leftJoin('vendor_catalogues','vendor_catalogues.id','=','vendor_service_x_profile.catalogue_id')->select('tbl_vendors.*','vendor_service_x_profile.shop_title','vendor_service_x_profile.vendor_latitude','vendor_service_x_profile.vendor_longitude','vendor_service_x_profile.vendor_type','vendor_service_x_profile.opening_time','vendor_service_x_profile.service_id','vendor_service_x_profile.closing_time','vendor_services.title as professional_service','vendor_service_subcat.title as subcat_title','vendor_catalogues.title as catalogue_title','vendor_service_x_profile.vendor_data as days', $raw)
              /*->$serviceQuery
              ->$subcatQuery
              ->$catalogueQuery*/
              
              ->addSelect($raw)
             ->orderBy('distancekm', 'ASC')
             ->having('distancekm', '<=', $distance);
             //echo "<pre>"; print_r($getTotalVendors[0]->days); exit();
            if($request->days)
            {
              $requestDay = explode(',', $request->days);
              $totalDays = [];
              //$days = [];
              $i=0;
              foreach ($getTotalVendors as $rowDays) {
                $days= explode(',', $rowDays->days); // ['Monday','Tuesday']
             
              foreach ($requestDay as $value) {
                if(in_array($value,$days)){ 
                $key = array_search($value,$days); 
                if($key>=0){
                  $totalDays['days'][] = $days[$key];
                  $totalDays['vendor_id'][] = $rowDays->vendor_id;
                }
               }  
                 
              } $i++;
               
              }
                

             // echo "<pre>"; print_r($totalDays); exit();
              if($totalDays){ 
                $tday = $totalDays['days'];
                $totalDays['tdays'] = array_unique($tday);
                
                $result = implode(',', $totalDays['tdays']); 
                $VendorList = $VendorList->where('vendor_service_x_profile.vendor_data','Like','%'.$result.'%');
                //$VendorList = $VendorList->where('vendor_service_x_profile.vendor_data','Like','%'.$totalDays['tdays'].'%');
              }else{ 
                $result = $request->days;
                $VendorList = $VendorList->where('vendor_service_x_profile.vendor_data',$result);
              }
            } 
            //exit();
            if($request->vendor_search)
            {
                $VendorList = $VendorList->where(function ($query) use ($request) {
                                          return  $query->where('vendor_service_subcat.title','Like','%'.$request->vendor_search.'%')
                                                    ->orWhere('vendor_catalogues.title','Like','%'.$request->vendor_search.'%');
                                });
            }
            if($request->type)
            {
                $VendorList = $VendorList->where('vendor_service_x_profile.vendor_type',$request->type);
            }
            if($request->service_id)
            {
                $VendorList = $VendorList->where('vendor_service_x_profile.service_id', $request->service_id);
            }
            if($request->subcat_id)
            {
                $VendorList = $VendorList->where('vendor_service_x_profile.subcat_id',$request->subcat_id);
            }
            if($request->catalogue_id)
            {
              $VendorList = $VendorList->where('vendor_service_x_profile.catalogue_id',$request->catalogue_id);
            }
           //\DB::enableQueryLog();
            $VendorList = $VendorList->get();
           // print_r(\DB::getQueryLog($VendorList)); exit();
          } else{
              
         $VendorList= DB::table('vendor_service_x_profile')->leftJoin('tbl_vendors','vendor_service_x_profile.vendor_id','=','tbl_vendors.id')->leftJoin('vendor_services','vendor_services.id','=','vendor_service_x_profile.service_id')->leftJoin('vendor_service_subcat','vendor_service_subcat.id','=','vendor_service_x_profile.subcat_id')->leftJoin('vendor_catalogues','vendor_catalogues.id','=','vendor_service_x_profile.catalogue_id')->select('tbl_vendors.*','vendor_service_x_profile.shop_title','vendor_service_x_profile.vendor_latitude','vendor_service_x_profile.vendor_longitude','vendor_service_x_profile.vendor_type','vendor_service_x_profile.opening_time','vendor_service_x_profile.service_id','vendor_service_x_profile.closing_time','vendor_services.title as professional_service','vendor_service_subcat.title as subcat_title','vendor_catalogues.title as catalogue_title','vendor_service_x_profile.vendor_data as days', $raw)
              ->addSelect($raw)
            //  ->where('employee_idX',0)
             ->orderBy('distancekm', 'ASC')
             ->having('distancekm', '<=', $distance)->get();   
        }
          $Vendor_arr=[];

         // $totalRating =0;

         foreach ($VendorList as $item) {
             
        if($item->subcat_title == $input['category']){

    $totalRating = DB::table('vendor_ratings')->where('vendor_id',$item->id)->sum('rating') ?? 0;

      $count = DB::table('vendor_ratings')->where('vendor_id',$item->id)->count();

      if($count>0)
      {
        $vendor_avarage =  number_format((float)($totalRating/$count), 1, '.', '');
      }
      else{
        $vendor_avarage = 0;
      }

          
           
          $Vendor_arr[]=array(  
                                'vendor_id'=>$item->id,
                                'first_name'=>$item->first_name ,
                                'shop_title'=>$item->shop_title,
                                'type'=>$item->vendor_type ,
                                'opening_time'=>$item->opening_time ,
                                'closing_time'=>$item->closing_time ,
                                'phone'=>$item->mobile ,
                                'image'=>$item->profile_image , 
                                'professional_service'=>$item->professional_service , 
                                'category'=>$item->subcat_title , 
                                'catalogues'=>$item->catalogue_title , 
                                'days'=>$item->days , 
                                'rating'=>$vendor_avarage , 
                                //'is_online'=>$item->is_online , 
                               // 'duty_status'=>$item->duty_status_id , 
                                'distance_km'=>number_format((float)$item->distancekm, 2, '.', ''), 
                                'curr_latitude'=>$item->vendor_latitude , 
                                'curr_longitude'=>$item->vendor_longitude , 
                                'curr_loc_address'=>$item->curr_loc_address , 
                             );
        }

         }
                

         // print_r($Employee_arr); die;
            $send_booking_msg='Data Received successfully! ';
            $send_arr['vendors']=$Vendor_arr;
            $send_arr['your_location']=array('first_name'=>'User' ,  
                                'curr_latitude'=> $input['curr_lat'] , 
                                'curr_longitude'=>$input['curr_lat'] , 
                                'curr_loc_address'=>$input['curr_address'] ?? '',
                             );

           if(is_array($Vendor_arr)&&count($Vendor_arr)>0){
            return $this->sendResponse($send_arr, 'Info-'.$send_booking_msg);
           }else{ // no employee
             $send_booking_msg='Data Received successfully! ';
            $send_arr['vendors']=[];
            $send_arr['your_location']=array('first_name'=>'User' ,  
                                'curr_latitude'=> $input['curr_lat'] , 
                                'curr_longitude'=>$input['curr_lat'] , 
                                'curr_loc_address'=>$input['curr_address'] ?? '',
                             );
            return $this->sendResponse($send_arr, 'Info-'.$send_booking_msg);
      }
//           } else{
//             return response()->json(['message'=>'There is no data.', 'success'=>false]);
//           }
         
         }

  public function userGetVendor(Request $request)
  {

        $input=$request->all();
        $validator = Validator::make($request->all(), [
             'vendor_id' => 'required',
             'ep_token' => 'required',
             'curr_lat' => 'required',
             'curr_long' => 'required',             
        ]);

          $current_time= \Carbon\Carbon::now()->toDateTimeString();

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

         $Vendor=Vendor::find($input['vendor_id']);
         

         if(!isset($Vendor)){
           $app_warnings[]='Wrong Vendor id! ';
         }

   /////////////////SystemError///////////////////////
      //$app_warnings[]='userNearByEmployeesList API,Testing mode on!!!!';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }

          //////////////////////API////////////////
            $careType = 1;
            $distance =10; //10KM range employee
           // $ownerLatitude=28.57818 ;$ownerLongitude=77.31573;
            $ownerLatitude=(isset($input['curr_lat']))?$input['curr_lat']:$ownerLatitude;
            $ownerLongitude=(isset($input['curr_long']))?$input['curr_long']:$ownerLongitude;


               $raw = DB::raw(' ( 6371 * acos( cos( radians(' . $ownerLatitude . ') ) * 
 cos( radians( vendor_service_x_profile.vendor_latitude ) ) * cos( radians( vendor_service_x_profile.vendor_longitude ) - radians(' . $ownerLongitude . ') ) + 
    sin( radians(' . $ownerLatitude . ') ) *
         sin( radians( vendor_service_x_profile.vendor_latitude ) ) ) )  AS distancekm');

          $ImageVendor = vendor_service_images::where('vendor_id', $input['vendor_id'])->get();

                foreach ($ImageVendor as $value) {
                    $ImageData[] = $value->service_image;
                }
          
            
          $VendorList= DB::table('vendor_service_x_profile')->leftJoin('tbl_vendors','vendor_service_x_profile.vendor_id','=','tbl_vendors.id')->leftJoin('vendor_services','vendor_services.id','=','vendor_service_x_profile.service_id')->leftJoin('vendor_service_subcat','vendor_service_subcat.id','=','vendor_service_x_profile.subcat_id')->leftJoin('vendor_catalogues','vendor_catalogues.id','=','vendor_service_x_profile.catalogue_id')->select('tbl_vendors.*','vendor_service_x_profile.shop_title','vendor_service_x_profile.vendor_latitude','vendor_service_x_profile.vendor_longitude','vendor_service_x_profile.vendor_type','vendor_service_x_profile.opening_time','vendor_service_x_profile.service_id','vendor_service_x_profile.closing_time','vendor_services.title as professional_service','vendor_service_subcat.title as subcat_title','vendor_catalogues.title as catalogue_title','vendor_service_x_profile.vendor_data',$raw)->addSelect($raw)
            //  ->where('employee_idX',0)
             ->orderBy('distancekm', 'ASC')
             ->having('distancekm', '<=', $distance)->where('tbl_vendors.id',$Vendor->id)->get();        
        
          $Vendor_arr=[];
         foreach ($VendorList as $item) { 

         $totalRating = DB::table('vendor_ratings')->where('vendor_id',$item->id)->sum('rating') ?? 0;

      $count = DB::table('vendor_ratings')->where('vendor_id',$item->id)->count();

      if($count>0)
      {
        $vendor_avarage = number_format((float)($totalRating/$count), 1, '.', '');
      }
      else{
        $vendor_avarage = 0;
      }        
          
          $Vendor_arr[]=array(  
                                'vendor_id'=>$item->id,
                                'first_name'=>$item->first_name ,
                                'shop_title'=>$item->shop_title,
                                'type'=>$item->vendor_type ,
                                'opening_time'=>$item->opening_time ,
                                'closing_time'=>$item->closing_time ,
                                'phone'=>$item->mobile ,
                                'profile_image'=>$item->profile_image , 
                                'images'=> $ImageData,
                                'days'=>$item->vendor_data,
                                'professional_service'=>$item->professional_service , 
                                'category'=>$item->subcat_title , 
                                'catalogues'=>$item->catalogue_title , 
                                'rating'=>$vendor_avarage , 
                                //'is_online'=>$item->is_online , 
                               // 'duty_status'=>$item->duty_status_id , 
                                'distance_km'=>number_format((float)$item->distancekm, 2, '.', ''), 
                                'curr_latitude'=>$item->vendor_latitude , 
                                'curr_longitude'=>$item->vendor_longitude , 
                                'curr_loc_address'=>$item->curr_loc_address , 
                             );

         }

         // print_r($Employee_arr); die;
            $send_booking_msg='Data Received successfully! ';
            $send_arr['vendors']=$Vendor_arr;
            /*$send_arr['your_location']=array('first_name'=>'User' ,  
                                'curr_latitude'=> $input['curr_lat'] , 
                                'curr_longitude'=>$input['curr_lat'] , 
                                'curr_loc_address'=>$input['curr_address'],
                             );*/

           if(is_array($Vendor_arr)&&count($Vendor_arr)>0){
            return $this->sendResponse($send_arr, 'Info-'.$send_booking_msg);
           }else{ // no employee
             $send_booking_msg='Data Received successfully! ';
            $send_arr['vendors']=[];
            $send_arr['your_location']=array('first_name'=>'User' ,  
                                'curr_latitude'=> $input['curr_lat'] , 
                                'curr_longitude'=>$input['curr_lat'] , 
                                'curr_loc_address'=>$input['curr_address'],
                             );
            return $this->sendResponse($send_arr, 'Info-'.$send_booking_msg);

           }
         
         } 


   /****
   @userBookingCancel
   @user_id, ses_booking_id
   [cancel_byuser_at , cancel_by_user , order_status :rejected ]
   @ cancel reason   added 
   **/

 public function userBookingCancel(Request $request){
   $input=$request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
             'ep_token' => 'required',
             'ses_booking_id' => 'required',
             'cancel_reason' => 'required',
          

        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      
         $Booking=Booking::find($input['ses_booking_id']);
         if(!isset($Booking)){
          $app_warnings[]='Wrong booking id! ';

         }

         $Customer=Customer::find($input['user_id']);
         if(!isset($Customer)){
           $app_warnings[]='Wrong user id! ';
         }


   /////////////////SystemError///////////////////////
     // $app_warnings[]='Waiting for accpetance API,Testing mode on!!!!';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }
          
          if(!empty($input['sys_ord_cancel']))
          {
            $Booking=Booking::where('id',$input['ses_booking_id'])->where('order_status','awaited')->delete();
             $send_arr['success']=true;
             $send_booking_msg='OrderCancel by System';
             return $this->sendResponse($send_arr, 'Info-'.$send_booking_msg);
          }

          //////////////////////API//////////////// 

          if(!empty($Booking->cancel_by_user)&&$Booking->cancel_by_user=='yes'){

             $send_booking_msg='already Cancelled! ';# ACancelled
             $send_arr['your_booking_number']=$Booking->order_number;
             $send_arr['your_booking_status_msg']=$send_booking_msg;
             $send_arr['your_booking_status']=$Booking->order_status; #Cancelled

          }else{  // status
          $Booking->cancel_by_user='yes';
          $Booking->order_status='rejected';
            $Booking->status='rejected';
          $Booking->cancel_byuser_at=$current_time;
          $Booking->updated_at=$current_time;
          $Booking->save(); 
             $send_booking_msg='Cancelled successfully! ';
             $send_arr['your_booking_number']=$Booking->order_number;
             $send_arr['your_booking_status_msg']=$send_booking_msg;
             $send_arr['your_booking_status']=$Booking->order_status;#Cancelled
          }

      
        return $this->sendResponse($send_arr, 'Info-'.$send_booking_msg);


          ######

 }






   /***
   User-CurentBooking(waiting for acceptance )
   @Schedule API - user screen check :: 30 sec. 
   @it accepted by any pneck employee or not 
   [your_booking_status = accepted , rejected , awaited 
  booking_msg= 'Waiting for acceptance  ', l

]

   **/

     public function userBookingPendingStatus(Request $request){

     $input=$request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
             'ep_token' => 'required',
             'ses_booking_id' => 'required',
          

        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      
         $Booking=Booking::find($input['ses_booking_id']);
         if(!isset($Booking)){
          $app_warnings[]='Wrong booking id! ';

         }

         $Customer=Customer::find($input['user_id']);
         if(!isset($Customer)){
           $app_warnings[]='Wrong user id! ';
         }


   /////////////////SystemError///////////////////////
     // $app_warnings[]='Waiting for accpetance API,Testing mode on!!!!';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }

          //////////////////////API////////////////
        
            if($Booking->id>0){
              $success_msg='OK';
              # awaited, rejected, accepted
             $send_arr=array();
             $send_arr['your_booking_status']=$Booking->order_status; // order_status , status
           #  $send_booking_msg=($Booking->order_status=='awaited')?'Waiting for acceptance':'awaited';


             $get_msg=$Booking->order_status;
             switch ($get_msg) {
               case 'rejected':
               $send_booking_msg='Your Booking Rejected!';
                 # code...
                 break;
                  case 'accepted':
               $send_booking_msg='Your Booking accepted!';
                 # code...
                 break;
                 case 'accepted_otp_confirmed':
                $send_booking_msg='Your Booking accepted_otp confirmed!';
                 # code...
                 break;
               
               default:
                $send_booking_msg='Waiting for acceptance! ';

             
                 # code...
                 break;
             }

             $send_arr['your_booking_status_msg']=$send_booking_msg;

             $send_arr['your_booking_id']=$Booking->id;
             $send_arr['your_booking_number']=$Booking->order_number;
            
               

               ///if accepted and employee detail/////
               if($Booking->order_status=='accepted' || $Booking->order_status=='accepted_otp_confirmed'){
                $Employee=Employee::find($Booking->employee_id);
                $send_arr['emp_name']=$Employee->first_name.' '.$Employee->last_name;
                $send_arr['emp_mobile']=$Employee->mobile;

                ////Emp: veichin 
                $send_arr['vehicle_number']=$Employee->vehicle_number;
                $send_arr['emp_curr_latitude']=$Employee->curr_latitude;
                $send_arr['emp_curr_longitude']=$Employee->curr_longitude;

                // Rating ///
                $send_arr['emp_rating']='4';
                $Booking_otp=Booking_otp::where('booking_id',$Booking->id)->first();

                 //
                $send_arr['booking_otp']=($Booking_otp->otp)?$Booking_otp->otp:'';
                // Bookinig otp to Accept by employee
               }
             ///////

             return $this->sendResponse($send_arr, 'Info-'.$success_msg);
           }

              

    }


  /**
  
  @userSide: currentBookingTracking
  @emp_lat, user_lat, 
  @Response json and distanc b/w
  ***/ 

  public function userCurrBookingTracking(Request $request){

     $input=$request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
             'ep_token' => 'required',
             'ses_booking_id' => 'required',
              'curr_lat' => 'required',
               'curr_long' => 'required',
                'curr_address' => 'required',

        ]);

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
          if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
          }
      
         $Booking=Booking::find($input['ses_booking_id']);
         if(!isset($Booking)){
          $app_warnings[]='Wrong booking id! ';
         }

         $Customer=Customer::find($input['user_id']);
         if(!isset($Customer)){
           $app_warnings[]='Wrong user id! ';
         }


   /////////////////SystemError///////////////////////
     //  $app_warnings[]='user Tracking API,Testing mode on!!!!';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }

          //////////////////////API////////////////

          /*
          @ user lat&long conside from booking Table 
          @ booking_user_add, booking_user_lat, booking_user_long,

          **/
          $get_emp_id=$Booking->employee_id;
           if(!empty($get_emp_id)){
               
            $Employee=Employee::find($get_emp_id);
           
          // $Employee=Employee::where('toggle','1')->where('id',$get_emp_id)->get(); 
            ////////////
            $ownerLatitude=28.57818 ;$ownerLongitude=77.31573;
            $ownerLatitude=(isset($Employee->curr_latitude))?$Employee->curr_latitude:$ownerLatitude;
            $ownerLongitude=$Employee->curr_longitude;//EmpCurrLocLong
             $careType = 1;$distance = 10;
   

            //////////////////////////
           $BookingDet=Booking::find($input['ses_booking_id']);

           $userMyBookingLoc=array(
                                    'curr_lat'=>$BookingDet->user_lat, 
                                    'curr_long'=>$BookingDet->user_long, 
                                    'curr_address'=>$BookingDet->user_drop_address, 
                                    );
            
            ///////////
            $Employee->curr_latitude=($Employee->curr_latitude)?$Employee->curr_latitude:'';
            $Employee->curr_longitude=($Employee->curr_longitude)?$Employee->curr_longitude:'';
            $Employee->curr_loc_address=($Employee->curr_loc_address)?$Employee->curr_loc_address:'';

            //////////////////////////
            $success_msg=' OK';
            
                       $EmpLoc=array(
                                    'curr_lat'=>$Employee->curr_latitude, 
                                    'curr_long'=>$Employee->curr_longitude, 
                                    'curr_address'=>$Employee->curr_loc_address, 
                                    'vehicle_number'=>$Employee->vehicle_number,
                                    'emp_rating'=>'4',
                                    'accept_otp'=>$BookingDet->accept_otp,
                                    'delivery_otp'=>$BookingDet->delivery_otp,
                                    );
                                    
         $job_detail = Booking_item::where('booking_id', $input['ses_booking_id'])->first();

          $Employee_profile=Employee_profile::where('emp_id', $Employee->id)->first();
          
         //$profileImage = '';

          if($Employee_profile['profile_image']!= '')
          {
            $profileImage = $Employee_profile['profile_image'];
          }
          else{
            //$profileImage = 'https://pneck.in/storage/user_img/live_tracking_user.jpg';
        $profileImage = 'https://pneck.in/storage/employee_img/employee.png';
            
          }

       /* $token = $Employee->device_token;

        $message = 'Current Booking Tracking By Pneck Employee';

        $booking_order_number = $Booking->order_number;
        $ses_booking_id = $Booking->id;
        $curr_booking_status = $Booking->order_status;
        $billing_amount = $Booking->order_subtotal;
        
        $EmployeeProfile= Employee_profile::where('emp_id',$Employee->id)->first()->profile_image ?? 'null';

               if($EmployeeProfile != 'null' || empty($EmployeeProfile))
               {
                  $image = $Employee->profile_image;
               }
               else{
                  $image =  'https://pneck.in/employee-img/default.jpg';
               } 

        $message_status = $this->sendCurrBookingTrackingNotification($token, $message,$booking_order_number,$ses_booking_id,$curr_booking_status,$billing_amount,$image); */
        
        $res['message_status'] = '';

           $res['booking_order_number']=$Booking->order_number; //'ORD152_1567799084';
           $res['ses_booking_id']=$Booking->id;
           $res['distance_in_km']=number_format((float)$BookingDet->distancekm, 2, '.', '');   //
           $res['curr_booking_status']=$Booking->order_status;
           $res['booking_charge']=$Booking->booking_charge;
           $res['order_subtotal']=$Booking->order_subtotal;
           $res['job_detail'] = $job_detail['order_info'];

           // payable amount
           $res['payable_amount']=$Booking->pay_amount;//(order_subtotal+booking_charge)

           // Emplyee profile// 
           $res['employee_name']=$Employee->first_name.' '.$Employee->last_name;
           $res['employee_mobile']=$Employee->mobile;
           $res['employee_image']=$profileImage;           
           $res['employee_loc']=$EmpLoc;
           $res['customer_loc']=$userMyBookingLoc;
           return $this->sendResponse($res, 'Info-'.$success_msg);


            //1> employee current lat and long.
            return $this->appError('Employee for this booking as -'.$get_emp_id);
           }

           die;







  }

/**
 @Employee Current Booking Tracking 
 @if order information added 
 @
***/

public function empCurrBookingTracking(Request $request){
   
        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
             'ep_token' => 'required',
             'ses_booking_id' => 'required',
              'curr_lat' => 'required',
               'curr_long' => 'required',
                'curr_address' => 'required',

        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      
         $Booking=Booking::find($input['ses_booking_id']);

        if(!empty($Booking) && $Booking->order_status=='rejected')
        {

         $EmployeeUpdate = Employee::where('id', $input['employee_id'])         
          ->update(['duty_status_id' => '0']);
          
            $response = ['success' => false,        
                'message' => 'Order Cancelled',                
              ];
              $send_response=array('response'=>$response);
               return response()->json($send_response, 200);            
        }


         if(!isset($Booking)){
          $app_warnings[]='Wrong booking id! ';

         }
		 
         $Employee=Employee::find($input['employee_id']);
		 
         if(empty($Employee)){
           $app_warnings[]='Wrong Employee id! ';
         }


   /////////////////SystemError///////////////////////
      //  $app_warnings[]='Tracking API,Testing mode on!!!!';
         
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }
          //////////API////////////////
          /***
          @ Employee to user distance

          ****/
          /////////AddEmployeeLocationToLogandMain table//////////////
          $Location=new Employee_location;
          $Location->user_id=$input['employee_id'];
          $Location->user_type='employee';
          $Location->latitude=$input['curr_lat'];
          $Location->longitude=$input['curr_long'];
          $Location->curr_status=1;// Default
          $Location->booking_id=$Booking->id;
          // usr_address
          if(isset($input['curr_address'])&&! empty($input['curr_address'])){
            $Location->curr_address=(isset($input['curr_address']))?$input['curr_address']:'';
            $Employee->curr_loc_address=$input['curr_address'];

          }
          
          $Location->save();
          # Save EmployeeLocation To main table 
           $Employee->curr_latitude=$input['curr_lat'];
           $Employee->curr_longitude=$input['curr_long'];
          
            if($Employee->is_online!='yes')
              $Employee->is_online='yes';
              $Employee->save();


          //////////

             $ownerLatitude=28.57818 ;$ownerLongitude=77.31573;
            $ownerLatitude=(isset($input['curr_lat']))?$input['curr_lat']:$ownerLatitude;

           
            $ownerLongitude=(isset($input['curr_long']))?$input['curr_long']:$ownerLongitude;
           $careType = 1;
            $distance = 10;
            

  

        ##33
         $raw = DB::raw(' ( 6371 * acos( cos( radians(' . $ownerLatitude . ') ) * 
 cos( radians( user_lat ) ) * cos( radians( user_long ) - radians(' . $ownerLongitude . ') ) + 
    sin( radians(' . $ownerLatitude . ') ) *
         sin( radians( user_lat ) ) ) )  AS distancekm');
         

          $BookingDet= DB::table('tbl_bookings')->select('*', $raw)
        ->addSelect($raw)
        ->where('id',$input['ses_booking_id'] )->first();
           //print_r($BookingDet); die; 


        // echo  $Booking->user_lat.'===user_long'.$Booking->user_long;
        //    die; 

            


          ////////30 sept ///////////
               $success_msg=' Success';
                
                 if(isset($success_msg)){
                   $EmpLoc=array('id'=>$input['employee_id'], 
                                    'curr_lat'=>$input['curr_lat'], 
                                    'curr_long'=>$input['curr_long'],
                                    'curr_address'=>$input['curr_address'],
                                    );


               $userLoc=array('id'=>$Booking->user_id, 
                                    'curr_lat'=>$Booking->user_lat, 
                                    'curr_long'=>$Booking->user_long, 
                                    'curr_address'=>$Booking->user_drop_address, 
                                    );
               ####################



                  $Customer=Customer::find($Booking->user_id);

          
           $res['booking_order_number']=$Booking->order_number; //'ORD152_1567799084';
           $res['ses_booking_id']=$Booking->id;
           $res['customer_mobile']=$Customer->mobile;

            if(!empty($Customer->first_name))
            $res['customer_name']=$Customer->first_name.' '.$Customer->last_name;
            $res['curr_booking_status']=$Booking->order_status;
            $res['distance_in_km']=number_format((float)$BookingDet->distancekm, 2, '.', '');   //
            $res['booking_charge']=$BookingDet->booking_charge;

             $res['customer_loc']=$userLoc;
              $res['employee_loc']=$EmpLoc;

             return $this->sendResponse($res, 'Info-'.$success_msg);

                 }

            return $this->appError('Sorry, Server not responding! ');

          ###################################    

      }

/**
@orderInfo Add 
ep_token

***/

public function empBookingOrderAdd(Request $request){
   
        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
             'ep_token' => 'required',
             'ses_booking_id' => 'required',
              'order_info' => 'required',
              // 'mobile_number' => 'required',
        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      
         $Booking=Booking::find($input['ses_booking_id']);

        if($Booking->order_status=='rejected')
        {

         $EmployeeUpdate = Employee::where('id', $input['employee_id'])         
          ->update(['duty_status_id' => '0']);
          
            $response = ['success' => false,        
                'message' => 'Order Cancelled',                
              ];
              $send_response=array('response'=>$response);
               return response()->json($send_response, 200);            
        }
        else
        {

         if(!isset($Booking)){
          $app_warnings[]='Wrong booking id';

         }

   /////////////////SystemError///////////////////////
         // $app_warnings[]='Testing mode on!!!!';
         
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }

           if(!empty($Booking)&&$Booking->order_status=='order_info_provided' ){

            return $this->appError('Sorry, already provided, Booking order info! ');


           } 

         /////////API////////////////////////// accept_otp ,  accept_otp_confirm_at
            if(!empty($Booking)&&$input['ses_booking_id']==$Booking->id){

               $Booking_item=new Booking_item;
               $Booking_item->booking_id=$Booking->id;
               $Booking_item->order_info=addslashes($input['order_info']);
               $Booking_item->order_info2=addslashes($input['order_info']);
               $Booking_item->emp_id=$Booking->employee_id;
               $Booking_item->created_at=$current_time;
               $Booking_item->line_total=0;
               $Booking_item->save();
               
                //return $this->appError('Add booking satus for order sddedxxx! ');

              $Booking->booking_charge=50; //default booking charge
              $Booking->accept_otp_confirm_at=$current_time;
              $Booking->order_status='order_info_provided';
              $Booking->updated_at=$current_time;$Booking->save();
              $success_msg='Booking order info provided! ';
                 }

                 ////////////////

                 if(isset($success_msg)){
                  $Customer=Customer::find($Booking->user_id);
          
           $res['booking_order_number']=$Booking->order_number; //'ORD152_1567799084';
           $res['ses_booking_id']=$Booking->id;
           $res['customer_mobile']=$Customer->mobile;
           
           $token = $Customer->device_token;

        $message = 'Booking Order information';

        $booking_order_number = $Booking->order_number;
        $ses_booking_id = $Booking->id;
        $order_info = $request->order_info;

        if($Customer->profile_image != 'null' || empty($Customer->profile_image))
               {
                  $image = $Customer->profile_image;
               }
               else{
                  $image =  'https://pneck.in/employee-img/default.jpg';
               }                   

        $message_status = $this->sendBookingOrderInfoNotification($token,$message,$booking_order_number,$ses_booking_id,$order_info,$image);

        $res['message_status'] = $message_status;

            if(!empty($Customer->first_name))
            $res['customer_name']=$Customer->first_name.' '.$Customer->last_name;
            $res['curr_booking_status']=$Booking->order_status;

             return $this->sendResponse($res, 'Info-'.$success_msg);

                 }
          }

            return $this->appError('Sorry, Server not responding! ');

          ###################################
      }

/**
@AcceptBookingOTPMatch
@ empBookingOtpMatch


****/

public function empBookingOtpMatch(Request $request){
   
        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
             'ses_booking_id' => 'required',
              'otp' => 'required',
              // 'mobile_number' => 'required',
        ]);

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
      
       

   /////////////////SystemError///////////////////////
           //$app_warnings[]='Testing mode on!!!!';
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }
          

         /////////API////////////////////////// accept_otp ,  accept_otp_confirm_at
          $Booking=Booking::find($input['ses_booking_id']);

        if($Booking->order_status=='rejected')
        {
           $EmployeeUpdate = Employee::where('id', $input['employee_id'])         
          ->update(['duty_status_id' => '0']);

            $response = ['success' => false,        
                'message' => 'Order Cancelled',                
              ];
              $send_response=array('response'=>$response);
               return response()->json($send_response, 200);
            
        }
        else{

          if($input['otp']!= $Booking->accept_otp){

            $response = ['success' => true,        
                'message' => 'Booking OTP not matched!',
                'otpnotmatch' => 1                
              ];
            $send_response=array('response'=>$response);
               return response()->json($send_response, 200);

            //return $this->appError('Booking OTP not matched! ');

          }

            if($input['otp']==$Booking->accept_otp){
              // updateBookingOTPconfirmationTime
              $Booking->accept_otp_confirm_at=$current_time;
              $Booking->order_status='accepted_otp_confirmed';
              $Booking->updated_at=$current_time;$Booking->save();
              $success_msg='Booking Request OTP matched! ';
                 }

                 if(isset($success_msg)){
                  $Customer=Customer::find($Booking->user_id);

          
           $res['booking_order_number']=$Booking->order_number; //'ORD152_1567799084';
           $res['ses_booking_id']=$Booking->id;
           $res['customer_mobile']=$Customer->mobile;

            if(!empty($Customer->first_name))
            $res['customer_name']=$Customer->first_name.' '.$Customer->last_name;
            $res['curr_booking_status']=$Booking->order_status;

             return $this->sendResponse($res, 'Info-'.$success_msg);

                 }
            }

            return $this->appError('Sorry, Booking OTP not matched! ');



          ###################################
            die; 



      }


/***
OTP Test For bookig >>

**/

public function bookingOtpCheck(Request $request){

        $input=$request->all();
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            //'ep_token' => 'required',
        ]);

       

          $current_time= \Carbon\Carbon::now()->toDateTimeString();
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }


   /////////////////SystemError///////////////////////
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }
          

         /////////API//////////////////////////



        if(!empty($input['mobile'])){

          $app_warnings[]='Booking otp ';
        
            $create_otp=$otp =rand(100000,999999);
            $mobile_number=$input['mobile'];
             $send_new_otp=$this->_sendBookingOtp($create_otp,$mobile_number);
                  //echo $send_new_otp ,':'.$send_new_otp ; die;
              $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                   $OTP=new Booking_otp;
                   $OTP->otp_type='M';//IMP BookingID 
                   $OTP->booking_id=99;

                   $OTP->otp_purpose='booking_request_confirmation';
                   $OTP->mobile=$input['mobile'];//RegisteredMobile
                   $OTP->otp=$create_otp;
                   $OTP->create_time=$current_time; //'2019-08-29 02:06:09';
                    $OTP->expire_time=$expTime; //'2019-08-29 02:16:09';
                    $OTP->save();

                ///////Response to Screen /////////////
                    $success['mobile'] = $input['mobile'];
                    $success['msg'] ='Booking OTP match pending! ';
                    return $this->sendResponse($success, 'Otp Sent successfully!===  ');

                     

          //////////////////

        }else{
          return $this->appError('Error in sending otp! ');

        }


        //////////////////////////////
         //print_r($app_warnings); die; 

      }






/****
@ RejectBookingByEmp
@ Add entry in LogRjection
@17-sept
**/

public function StopempBookingReject(Request $request){
  $app_warnings=[];
  $current_time= \Carbon\Carbon::now()->toDateTimeString();
   $input=$request->all();

         $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'ep_token' => 'required',
            'booking_id' => 'required',
             'status' => 'required',
           
        ]);
         //$app_warnings[]='Request JSON pending! ';

        

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
          }

           $Employee=Employee::find($input['employee_id']);
           //echo '===';print_r($Employee); die; 


           if(!isset($Employee))$app_warnings[]='Wrong employee id! ';
           #######App warnings#######
             if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }




           


        $Booking=Booking::find($input['booking_id']); //Accept booking

        $Booking->employee_id=$input['employee_id'] ; 
        $Booking->order_status='rejected' ; 
        $Booking->status='rejected' ; 
        $Booking->employee_accept_at=$current_time;   //'accepted' ; 
        $Booking->save();
        # accepted
        ///Update Employee ::: statu For On-Duty/// duty_status_id
        ### is_online , duty_status_id :: 2== on_duty
        $Employee->duty_status_id=0;  ##  off_duty --forNextDownTimeCycle
        $Employee->is_online='no'; $Employee->save();

       // return $this->sendResponse($resp_arr=[], 'Booking Confirmed! ');


           $Info=(isset($Booking))?'yes':'no' ; // yes|no

           if($Info=='yes'){

           $res['booking_order_number']=$Booking->order_number; //'ORD152_1567799084';
           $res['booking_id']=$Booking->id;  // Kepp save in APP
          

           }
         

          return $this->sendResponse($resp_arr=$res, $Booking->order_number.'-Booking rejected! ');







}






/**
@ empBookingAccept
@ Updatet Employee statu 
@ Booking remove from normla


***/

public function empBookingAccept(Request $request){
  $app_warnings=[];
  $current_time= \Carbon\Carbon::now()->toDateTimeString();
   $input=$request->all();

         $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'ep_token' => 'required',
            'booking_id' => 'required',
           // 'emp_long' => 'required',
           
        ]);
         //$app_warnings[]='Request JSON pending! ';

        

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
          }

           $Employee=Employee::find($input['employee_id']);
           //echo '===';print_r($Employee); die; 


           if(!isset($Employee))$app_warnings[]='Wrong employee id! ';
           #######App warnings#######
             if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }


        $Booking=Booking::find($input['booking_id']); //Accept booking

        if($Booking->order_status=='rejected')
        {
           $EmployeeUpdate = Employee::where('id', $input['employee_id'])         
          ->update(['duty_status_id' => '0']);

            $response = ['success' => false,        
                'message' => 'Order Cancelled',                
              ];
              $send_response=array('response'=>$response);
               return response()->json($send_response, 200);
            
        }

        else{ 

        $Booking->employee_id=$input['employee_id'] ; 
        $Booking->order_status='accepted' ; 
        $Booking->status='accepted' ; 
        $Booking->employee_accept_at=$current_time;   //'accepted' ; 
        $Booking->save();

        /////SendOtpToCustomer//////
        $Customer=Customer::find($Booking->user_id);

          $customerMobile=$Customer->mobile;
          // $customerMobile='7291919640';//TestBookingOtp

         if(!empty($customerMobile)){
     $current_time= \Carbon\Carbon::now()->toDateTimeString();

          $app_warnings[]='Booking otp ';
        
            $create_otp=$otp =rand(100000,999999);
            //Save OTP to Booking//
              $Booking->accept_otp=$create_otp;
              $Booking->updated_at=$current_time;
              $Booking->save();


            $mobile_number=$customerMobile;
             $send_new_otp=$this->_sendBookingOtp($create_otp,$mobile_number);
                  //echo $send_new_otp ,':'.$send_new_otp ; die;
              $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                   $OTP=new Booking_otp;
                   $OTP->otp_type='M';//IMP BookingID 
                   $OTP->booking_id=$Booking->id;//RequestedBooking

                   $OTP->otp_purpose='booking_request_confirmation';

                   $OTP->mobile=$customerMobile;
                   $OTP->otp=$create_otp;
                   $OTP->create_time=$current_time; //'2019-08-29 02:06:09';
                    $OTP->expire_time=$expTime; //'2019-08-29 02:16:09';
                    $OTP->save();

                ///////Response to Screen /////////////
                    // $success['mobile'] =$customerMobile;
                    // $success['msg'] ='Booking OTP match pending! ';
                    // return $this->sendResponse($success, 'Otp Sent successfully!===  ');

                     

          //////////////////

        }

        /////SendOtpToCustomer//////



        # accepted
        ///Update Employee ::: statu For On-Duty/// duty_status_id
        ### is_online , duty_status_id :: 2== on_duty
        $Employee->duty_status_id=2;  ##  on_duty
        $Employee->is_online='yes'; $Employee->save();

       // return $this->sendResponse($resp_arr=[], 'Booking Confirmed! ');


           $res['is_accepted']=(isset($Booking))?'yes':'no' ; // yes|no

           //////SenD Customer information /////////

           if($res['is_accepted']=='yes'){

            $token = $Customer->device_token;

            $message = 'Order Accepted By Pneck Employee';

            $booking_order_number = $Booking->order_number;
            $ses_booking_id = $Booking->id;
            $customer_mobile = $Customer->mobile;
            
            if($Customer->profile_image != 'null' || empty($Customer->profile_image))
               {
                  $image =  $Customer->profile_image;
               }
               else{
                  $image =  'https://pneck.in/employee-img/default.jpg';
               }

        $this->sendToCustomerOrderAcceptedNotification($token,$message,$booking_order_number,$ses_booking_id,$customer_mobile,$image);
            
           $res['booking_order_number']=$Booking->order_number; //'ORD152_1567799084';
           $res['ses_booking_id']=$Booking->id;  // Kepp save in APP
           $res['customer_mobile']=$Customer->mobile;

            if(!empty($Customer->first_name))
            {
                $res['customer_name']=$Customer->first_name.' '.$Customer->last_name;
            }else{
                $res['customer_name']="NoName";
            }
           }

         }
         

          return $this->sendResponse($resp_arr=$res, 'Booking accepted, OTP Sent! ');

}


/**
@ empNearByABooking 
@ App EmployeeCall in each 10 sec. 
@
**/
 /**
           off_duty=0
           ready_to_job=1
           on_duty=2
           free_from_duty=3

**/

        public function sendPushNotification($token, $message,$booking_order_number,$booking_order_id,$distance_km,$user_lat,$user_long,$image)
 { 
     
    $push = new PushNotification('fcm');
    
    $push->setUrl('https://fcm.googleapis.com/fcm/send');
                       
                                $response =  $push->setMessage([
                                        'data' => [
                                                'title'     => 'Pneck Employee Order Receiving',
                                                'name'      => 'Pneck',
                                                'message'   => $message,
                                                'image'     => $image,
                                                'notification_type'=> 'OrderReceiving',
                                                'booking_order_number'     => $booking_order_number,
                                                'booking_order_id'        => $booking_order_id,
                                                'distance_km'=> $distance_km,
                                                ]
                                        ])
                                ->setDevicesToken($token)
                                ->send()
                                ->getFeedback();
           
    
 }

 /*public function sendCurrBookingTrackingNotification($token, $message,$booking_order_number,$ses_booking_id,$curr_booking_status,$billing_amount,$image)
 { 
     
    $push = new PushNotification('fcm');
    
    $push->setUrl('https://fcm.googleapis.com/fcm/send');
                       
                                $response =  $push->setMessage([
                                        'data' => [
                                                'title'     => 'Pneck Employee Order Tracking',
                                                'name'      => 'Pneck',
                                                'message'   => $message,
                                                'image'     => $image,
                                                'notification_type'=> 'OrderTracking',
                                                'booking_order_number'     => $booking_order_number,
                                                'ses_booking_id'        => $ses_booking_id,
                                                'curr_booking_status'=> $curr_booking_status,
                                                'billing_amount'=> $billing_amount,
                                                ]
                                        ])
                                ->setDevicesToken($token)
                                ->send()
                                ->getFeedback();
           
    
 }*/

 public function sendToCustomerOrderAcceptedNotification($token,$message,$booking_order_number,$ses_booking_id,$customer_mobile,$image)
 { 
     
    $push = new PushNotification('fcm');
    
    $push->setUrl('https://fcm.googleapis.com/fcm/send');
                       
                                $response =  $push->setMessage([
                                        'data' => [
                                                'title'     => 'Order Accepted By Pneck Employee',
                                                'name'      => 'Pneck',
                                                'message'   => $message,
                                                'image'     => $image,
                                                'notification_type'=> 'OrderAccepted',
                                                'booking_order_number'     => $booking_order_number,
                                                'ses_booking_id'        => $ses_booking_id,
                                                'customer_mobile'=> $customer_mobile,
                                                ]
                                        ])
                                ->setDevicesToken($token)
                                ->send()
                                ->getFeedback();
           
    
 }
 
  public function sendBookingOrderInfoNotification($token,$message,$booking_order_number,$ses_booking_id,$order_info,$image)
 { 
     
    $push = new PushNotification('fcm');
    
    $push->setUrl('https://fcm.googleapis.com/fcm/send');
                       
                                $response =  $push->setMessage([
                                        'data' => [
                                                'title'     => 'Booking Order Information',
                                                'name'      => 'Pneck',
                                                'message'   => $message,
                                                'image'     => $image,
                                                'notification_type'=> 'BookingOrderInfo',
                                                'booking_order_number'     => $booking_order_number,
                                                'ses_booking_id'        => $ses_booking_id,
                                                'order_info'=> $order_info,
                                                ]
                                        ])
                                ->setDevicesToken($token)
                                ->send()
                                ->getFeedback();
           
    
 }
 
 public function sendBookingCompletedNotification($token,$message,$booking_order_number,$ses_booking_id,$image)
 { 
     
    $push = new PushNotification('fcm');
    
    $push->setUrl('https://fcm.googleapis.com/fcm/send');
                       
                                $response =  $push->setMessage([
                                        'data' => [
                                                'title'     => 'Booking Completed',
                                                'name'      => 'Pneck',
                                                'message'   => $message,
                                                'image'     => $image,
                                                'notification_type'=> 'BookingCompleted',
                                                'booking_order_number'     => $booking_order_number,
                                                'ses_booking_id'        => $ses_booking_id,
                                                ]
                                        ])
                                ->setDevicesToken($token)
                                ->send()
                                ->getFeedback();
           
    
 }
 
 public function sendRequestPaymentNotification($token,$message,$booking_order_number,$ses_booking_id,$billing_amount,$image)
 { 
     
    $push = new PushNotification('fcm');
    
    $push->setUrl('https://fcm.googleapis.com/fcm/send');
                       
                                $response =  $push->setMessage([
                                        'data' => [
                                                'title'     => 'Payment Request',
                                                'name'      => 'Pneck',
                                                'message'   => $message,
                                                'image'     => $image,
                                                'notification_type'=> 'PaymentRequest',
                                                'booking_order_number'     => $booking_order_number,
                                                'ses_booking_id'        => $ses_booking_id,
                                                'billing_amount'        => $billing_amount,
                                                ]
                                        ])
                                ->setDevicesToken($token)
                                ->send()
                                ->getFeedback();
           
    
 }
 
  public function empNearNotification($token,$message,$ses_booking_id,$booking_order_number,$image,$user_lat,$user_long,$distancekm,$cash)
 { 
     
    $push = new PushNotification('fcm');
    
    $push->setUrl('https://fcm.googleapis.com/fcm/send');
                       
                                $response =  $push->setMessage([
                                        'data' => [
                                                'title'     => 'New Booking Request',
                                                'name'      => 'Pneck',
                                                'message'   => $message,
                                                'image'     => $image,
                                                'notification_type'=> 'NewBookingRequest',
                                                'booking_order_number'     => $booking_order_number,
                                                'booking_order_id'        => $ses_booking_id,
                                                'user_lat'                => $user_lat,
                                                'user_long'                => $user_long,
                                                'distance_km'              => $distancekm,
                                                ]
                                        ])
                                ->setDevicesToken($token)
                                ->send()
                                ->getFeedback();
           
    
 }

 public function empNearByABooking(Request $request){
  $app_warnings=[];
  $current_time= \Carbon\Carbon::now()->toDateTimeString();
   $input=$request->all();

         $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'ep_token' => 'required',
            'curr_lat' => 'required',
            'curr_long' => 'required',
           
        ]);

        
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
          }

           $Employee=Employee::find($input['employee_id']);
           if(!isset($Employee))$app_warnings[]='Wrong employee id! ';

           #######App warnings#######
           //$app_warnings[]='Sorry, API in Testing mode!! ';
             if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }


          /////////////API///////////////////
            if($Employee->is_online!='yes'){
            $app_warnings[]='Your are offline! ';
            }

            if($Employee->duty_status_id=='1'){
              $app_warnings[]='Your are not ready to job! ';
            }
              if($Employee->duty_status_id=='2') {

              $app_warnings[]='Your are on_duty for a Booking!';

              $data=Booking::select('id','order_status')->where('employee_id',$input['employee_id'])->where('order_status','!=','order_completed')->where('status','!=','completed')->where('status','!=','rejected')->get();

                  if(count($data) > 0){
                    $response = ['success' => true,        
                        'message' => $app_warnings,
                        'bookingId'  => $data[0]->id
                      ];
                
                }else{
                    $response = ['success' => false,        
                        'message' => "Order is already rejected."
                      ];
                    
                }
               
              $send_response=array('response'=>$response);
               return response()->json($send_response, 200);

            }             

           
            ///////Account Lock 1-Booking 2min.Loc/////
      

            if(!empty($Employee->block_exp_at)){

              $Lock_diff=strtotime($current_time)-strtotime($Employee->block_exp_at);
              //1 Reject booking Lock time remaining >>
            if($Lock_diff<0){
                $app_warnings[]='Your are Locked for 2 min.! ';

            }

          }
          /////////////////
          # check if employee Not come from API . 
          if(!isset($input['curr_lat'])||!isset($input['curr_long'])){
            $app_warnings[]='Your live location not found! ';
          }

            //////////////////////////////////////
          if(!empty($app_warnings)){
            $msg_str1=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str1);
          }

          ###[ $ownerLatitude=28.57818 ;$ownerLongitude=77.31573;]
            // Near by Booking Call Lat,long :Current time of Employee 
            $ownerLatitude=(isset($input['curr_lat']))?$input['curr_lat']:$ownerLatitude;
            $ownerLongitude=(isset($input['curr_long']))?$input['curr_long']:$ownerLongitude;
            $careType = 1;
            $distance =5;  // 10 to 5 km
            
      #Online 
//       $raw = DB::raw(' ( 6371 * acos( cos( radians(' . $ownerLatitude . ') ) * 
//  cos( radians( user_lat ) ) * cos( radians( user_long ) - radians(' . $ownerLongitude . ') ) + 
//     sin( radians(' . $ownerLatitude . ') ) *
//          sin( radians( user_lat ) ) ) )  AS distancekm');         

        // Booking , waiting to accept by Employee.

          $BookingNear1 = DB::table('tbl_bookings')->select('*')
        // ->addSelect($raw)
        ->where('employee_id',0)
        ->where('status','!=','rejected')
        ->where('status','=','awaited')->first();

      //  print_r($BookingNear1);
      //  die;


       
         // $Booking=Booking::orderBy('created_at','desc')->first();
        // distancekm

           $res = [];

          //  $res['is_job_found']=(isset($BookingNear1))?'yes':'no' ; // yes|no

      //  print_r($res['is_job_found']);
      //  echo $BookingNear1->order_number;
      //  die;

          

          if(!empty($BookingNear1)){
               
          //  $res['booking_order_number']=$BookingNear1->order_number; //'ORD152_1567799084';
          //  $res['booking_order_id']=$BookingNear1->id; 
          // //  $res['distance_km']=number_format((float)$BookingNear1->distancekm, 2, '.', '');
          //  $res['user_lat'] = $BookingNear1->user_lat;   //round($BookingNear1->distancekm,2);
          //  $res['user_long'] = $BookingNear1->user_long;  //round($BookingNear1->distancekm,2);
       
           $res = Booking::where('id', $BookingNear1->id)->first();
           $res['distance_km']= '0';
           $res['booking_order_number']= $BookingNear1->order_number;
           $res['booking_order_id']=$BookingNear1->id; 
           $res['is_job_found']= 'yes';
           $res['user_detail'] = Customer::where('id',$res->user_id)->first();

           }else{
            $res['is_job_found']='no';
           }     

          return $this->sendResponse($resp_arr=$res, 'Data Received! ');


}

/***
@ Schedule API - to Employee Locationo 


**/
public function AddOnlineEmployeesCurrLocation(Request $request){

        $input=$request->all();

         $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'ep_token' => 'required',
            'emp_lat' => 'required',
            'emp_long' => 'required',
           
        ]);

       // $app_warnings[]='Dev Testing On!!!';

        if($validator->fails()){

            return $this->sendError('Validation Error-', $validator->errors());       
          }
          $Employee=Employee::find($input['employee_id']);

        
           if(!isset($Employee))$app_warnings[]='Wrong employee id! ';

          
          
   //////////////////Displye SystemError//////////////////////
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }
          ############################
           ////////Add Employee lat to :: main Employee table //////////
          $Employee->curr_latitude=$input['emp_lat'];
           $Employee->curr_longitude=$input['emp_long'];

            if(isset($input['emp_currentAddress'])&&! empty($input['emp_currentAddress'])){
                $Employee->curr_loc_address=$input['emp_currentAddress'];

            }
         
            ///if employee offline:make them live // 
            if($Employee->is_online!='yes'){
              $Employee->is_online='yes';
              $Employee->duty_status_id='0';  // make emp: ready for job

            }
            
              $Employee->save();
              //////SendLocationToLogTrackingEmployee/////////
        //  $Location=Employee_location::find(1);
          $Location=new Employee_location;
          $Location->user_id=$input['employee_id'];
          $Location->user_type='employee';
          $Location->latitude=$input['emp_lat'];
          $Location->longitude=$input['emp_long'];
          $Location->curr_status=1;// DedULT
          // usr_address
          if(isset($input['emp_currentAddress'])&&! empty($input['emp_currentAddress']))
          $Location->curr_address=(isset($input['emp_currentAddress']))?$input['emp_currentAddress']:'';

          if($Location->save()){
      return $this->sendResponse($resp_arr=['msg'=>'OK'], 'Requested Data sent successfully! ');
            
          }else{
            return $this->appError('Error in Booking a Request! ');
          }
          ##########################

        

         ///////////////////////////////////



        //////////////////////////////
         //print_r($app_warnings); die; 

      }






/*
@ Booking by userAPK

***/

// public function user_BookAorder(Request $request){

//         $input=$request->all();
//         $validator = Validator::make($request->all(), [
//              'user_id' => 'required', //
//              'user_lat' => 'required',
//              'user_long' => 'required',
//              'ep_token' => 'required',
//         ]);

//           $current_time= \Carbon\Carbon::now()->toDateTimeString();

//         if($validator->fails()){
//             return $this->sendError('Validation Error-', $validator->errors());       
//         }

//           $User=Customer::find($input['user_id']);
//            if(!isset($User))$app_warnings[]='Wrong user id! ';            


//             if(isset($User)&&$this->_valid_token($input['user_id'],$input['ep_token'])==false){
//              return $this->appError('User Token not matched! ');
//             }
//    ////////////////////////////////////////
//           if(!empty($app_warnings)){
//             $msg_str=implode(',', $app_warnings);
//             return $this->appError('SystemError-'.$msg_str);
//           }
//           /////////////
//           $Booking=new Booking;
//           $Booking->user_id=$input['user_id'];
//           $Booking->user_lat=$input['user_lat'];
//           $Booking->user_long=$input['user_long'];
//           $Booking->destination_latti=$input['destination_latti'];
//           $Booking->destination_longi=$input['destination_longi'];
//           $Booking->cash_offer=$input['cash_offered'];
//           $Booking->description=$input['description'];
//           $Booking->vehicle_type=$input['vehicle_type'];
//           $Booking->order_number='ORD'.rand(111,999).'_'.time();
//           // Updat sttus 
//           $Booking->order_status='awaited';
//           $Booking->created_at=$current_time;
//           $Booking->status='awaited';
//           //Add user current location///
//           if(isset($input['user_currentAddress'])&&!empty($input['user_currentAddress'])){
//              $Booking->user_drop_address=$input['user_currentAddress'];
             
//            }

//            $userPendings=Booking::where('order_status','awaited')
//            ->where('user_id',$input['user_id'])->count(); //->toArray();
          

//            if(!empty($userPendings)&&$userPendings>=1&&isset($stopThis)){  // your 1 Booking Pending
//              $OldBooking=Booking::where('order_status','awaited')
//            ->where('user_id',$input['user_id'])->first(); //->toArray();
          
//             $resp_arr=[];
//             // $resp_arr['msg']='OK';
//             // $resp_arr['ses_booking_id']=$OldBooking->id;
//             // $resp_arr['your_booking_number']=$OldBooking->order_number;
//             // $resp_arr['your_booking_status']='awaited';
//             // $resp_arr['your_booking_status_msg']='Waiting for acceptance! ';

//             return $this->sendResponse($resp_arr, 'Your Booking Request Waiting for acceptance! ');

//            }

//           if($Booking->save()){
//             $resp_arr=[];
//             // $resp_arr['msg']='OK';
//             // $resp_arr['ses_booking_id']=$Booking->id;
//             // $resp_arr['your_booking_number']=$Booking->order_number;
//             // $resp_arr['your_booking_status']='awaited';
//             // $resp_arr['your_booking_status_msg']='Waiting for acceptance! ';
//             // LocUserSideForNewBooking

//             sleep(30); 
//             $insertData = AvailableEmployees::where('booking_id',$Booking->id)->count();
//             if (!empty($insertData)) {
//                 $resp_arr['availableEmployees'] = AvailableEmployees::where('booking_id',$Booking->id)->first();
//             }else{
//             $resp_arr = [];
//             }
            
//             $ownerLatitude=(isset($input['user_lat']))?$input['user_lat']:$ownerLatitude;
//             $ownerLongitude=(isset($input['user_long']))?$input['user_long']:$ownerLongitude;
//             $careType = 1;
//             $distance =5;  // 10 to 5 km
            
            
//             \App\Customer::where('id', $request->user_id)->update(['add_latitude'=>$ownerLatitude, 'add_longitude'=>$ownerLongitude]);
            
//             return $this->sendResponse($resp_arr, 'Booking Request sent! ');
            
//           }else{
//             return $this->appError('Error in Booking a Request! ');
//           }

// }
    
    public function user_BookAorder(Request $request){

        $input=$request->all();
        $validator = Validator::make($request->all(), [
             'user_id' => 'required', //
             'user_lat' => 'required',
             'user_long' => 'required',
             'ep_token' => 'required',
        ]);

          $current_time= \Carbon\Carbon::now()->toDateTimeString();

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

          $User=Customer::find($input['user_id']);
           if(!isset($User))$app_warnings[]='Wrong user id! ';            


            if(isset($User)&&$this->_valid_token($input['user_id'],$input['ep_token'])==false){
             return $this->appError('User Token not matched! ');
            }
   ////////////////////////////////////////
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }
          /////////////
          $Booking=new Booking;
          $Booking->user_id=$input['user_id'];
          $Booking->user_lat=$input['user_lat'];
          $Booking->user_long=$input['user_long'];
          $Booking->destination_latti=$input['destination_latti'];
          $Booking->destination_longi=$input['destination_longi'];
          $Booking->cash_offer=$input['cash_offered'];
          $Booking->description=$input['description'];
          $Booking->vehicle_type=$input['vehicle_type'];
          $Booking->user_drop_address=$input['user_drop_address'];
          $Booking->order_number='ORD'.rand(111,999).'_'.time();
          // Updat sttus 
          $Booking->order_status='awaited';
          $Booking->created_at=$current_time;
          $Booking->status='awaited';
          //Add user current location///
          if(isset($input['user_currentAddress'])&&!empty($input['user_currentAddress'])){
             $Booking->user_drop_address=$input['user_currentAddress'];
             
           }

           $userPendings=Booking::where('order_status','awaited')
           ->where('user_id',$input['user_id'])->count(); //->toArray();
          
           if(!empty($userPendings)&&$userPendings>=1&&isset($stopThis)){  // your 1 Booking Pending
             $OldBooking=Booking::where('order_status','awaited')
                                 ->where('user_id',$input['user_id'])->first(); //->toArray();
          
            $resp_arr=[];
            $resp_arr['msg']='OK';
            $resp_arr['ses_booking_id']=$OldBooking->id;
            $resp_arr['your_booking_number']=$OldBooking->order_number;
            $resp_arr['your_booking_status']='awaited';
            $resp_arr['your_booking_status_msg']='Waiting for acceptance! ';

            return $this->sendResponse($resp_arr, 'Your Booking Request Waiting for acceptance! ');

           }

          if($Booking->save()){
            $resp_arr=[];
            $resp_arr['msg']='OK';
            $resp_arr['ses_booking_id']=$Booking->id;
            $resp_arr['your_booking_number']=$Booking->order_number;
            $resp_arr['your_booking_status']='awaited';
            $resp_arr['your_booking_status_msg']='Waiting for acceptance! ';
            // LocUserSideForNewBooking

//             sleep(30);
//             $insertData = AvailableEmployees::where('booking_id',$Booking->id)->count();
//             if(!empty($insertData)) {
//                  $resp_arr = AvailableEmployees::where('booking_id',$Booking->id)->first();
//             }else{
//                  $resp_arr = [];
//             }
            
            $ownerLatitude=(isset($input['user_lat']))?$input['user_lat']:$ownerLatitude;
            $ownerLongitude=(isset($input['user_long']))?$input['user_long']:$ownerLongitude;
            $careType = 1;
            $distance =5;  // 10 to 5 km
            
            \App\Customer::where('id', $request->user_id)->update(['add_latitude'=>$ownerLatitude, 'add_longitude'=>$ownerLongitude]);
 
            return $this->sendResponse($resp_arr, 'Booking Request sent! ');
            
          }else{
            return $this->appError('Error in Booking a Request! ');
          }

}




/****
@  edit_profile

***/
  


  

    public function edit_profile(Request $request)
    {     
      //echo '====';   die ;


          $input=$request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'ep_token' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
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
        $get_uid=$input['user_id'];
         
          $User=Customer::find($get_uid);

           if(!isset($User)){
            return $this->appError('Wrong User ID! ');
             //$app_warnings[]='Wrong Employee ID! ';  //Return 
           }

            if(isset($User)&&$this->_valid_token($get_uid,$input['ep_token'])==false){
             return $this->appError('User Token not matched! ');
            }


        ////////////Update in db//////////////
            $User->first_name=$input['first_name'];
            $User->last_name=$input['last_name'];

            //  emp_gender
            $User->usr_gender=(!empty($input['usr_gender']))?$input['usr_gender']:'other';
            $User->usr_address=(isset($input['usr_address']))? addslashes($input['usr_address']):'' ;

            // echo 'data to save';print_r($User); die;
            

            ########## #Mobie Never Updated###############

           
           
             if($User->save()){

              $mStatus=(!empty($User->mobile_verified_at))?'yes':'no';

              
              $resp_arr=[]; // EveryReturnArr
              $resp_arr['profile_active'] =$mStatus; // Default if mobile verfied
              $resp_arr['first_name'] =$User->first_name;
              $resp_arr['last_name'] =$User->last_name;
              $resp_arr['mobile'] =$User->mobile;
              $resp_arr['email'] =$User->email;
              $resp_arr['mobile_verified'] =$mStatus;###

              $resp_arr['usr_gender'] =$User->usr_gender;
              $resp_arr['usr_address'] =$User->usr_address;
              return $this->sendResponse($resp_arr, 'Success, Saved! ');


              // $app_warnings[]='Saved';
             
             }else{
              return $this->appError('Error in update!,Try later! ');
             }
             ###################

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
            //'mobile' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }



        /////////////Systme Validation:: match UID, TOKEN////////////
         $getUserId=$input['user_id'];
          $Customer=Customer::find($getUserId);

          if(!isset($Customer)){
            return $this->appError('Wrong user ID! ');
           }


            if(isset($Customer)&&$this->_valid_token($getUserId,$input['ep_token'])==false){
             return $this->appError('Token not matched! ');
            }

          //   echo 'Customer ===';

          // print_r($Customer);
          // die;






         //////////////// // valid user id///////
          if(isset($Customer)&&!empty($Customer)&&$this->_valid_token($getUserId,$input['ep_token'])==true){

            //return $this->appError('Token  matched!, getProfile OK! ');


              $resp_arr=[]; // EveryReturnArr
              //$resp_arr['profile_active'] ='yes'; //Default
              $resp_arr['first_name'] =$Customer->first_name;
              $resp_arr['last_name'] =$Customer->last_name;
               $resp_arr['email'] =$Customer->email;
              $resp_arr['mobile'] =$Customer->mobile;
              $mStatus=($Customer->mobile_verified_at!=NULL)?'yes':'no';
              $resp_arr['mobile_verified'] =$mStatus;
              $resp_arr['email_verified'] ='no';
              return $this->sendResponse($resp_arr, 'Data Received! ');
            
          }
          ////////////////////    

    }

    

  /***
  @ Login OTP 
  **/

   public function login(Request $request)
    {    $input=$request->all();
         $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'password' => 'required',
            //'mobile' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        ////////////////////////////////////
        $Customer=Customer::where('mobile',$input['mobile'])->first();
        // echo  '===';
        //  var_export($Customer);

         if(!isset($Customer)){
           $app_warnings[]='Invalid Mobile! ';
         }


        //print_r($Customer->email);

        // die ;
        
        ////System Error /////////////
        //$app_warnings[]='Logn in under work! ';

        ////Display app Warning////
        if(!empty($app_warnings)){
          $msg_str=implode(', ', $app_warnings);
          return $this->appError('System Warning-'.$msg_str);
        }


        ////////////////////////////////////////////////////////////////
        // if(!isset($emp_row)){
        //    $msg= $app_warnings[]='Wrong mobile number!';// mobile
        //     return $this->appError('System Warning-'.$msg);
        // }
        
           if(!empty($Customer)&&$Customer->mobile_verified_at==NULL){
             $msg_str='mobile verification pending! ';
             return $this->appError('System Warning-'.$msg_str);

           }

           //   echo 'Mobile st::';
           // var_export($Customer->mobile_verified_at);

           // die; 

        ###///////////////////////////

        // if(isset($emp_row)&&$emp_row->is_mobile_verified=='1'&&$emp_row->profile_active=='yes'){
            if(!empty($Customer)&&$Customer->mobile_verified_at!=NULL){

             

             //  check passowrd match.
            $enteredPassword=$input['password'];

             if(Hash::check($enteredPassword , $Customer->password)){
             //    $msg_str='OK loginPASS! ';
             // return $this->appError('System Warning-'.$msg_str);
              $send_arr['UID'] =$Customer->id;
              $send_arr['ep_token'] =  $Customer->ep_token;
              $send_arr['first_name'] =  $Customer->first_name;
              $send_arr['last_name'] =  $Customer->last_name;
              $send_arr['email'] =  $Customer->email;
              $send_arr['mobile'] =  $Customer->mobile;

              $success['data']=$send_arr;
              return $this->sendResponse($send_arr, 'Login success! ');

             }else{ return $this->appError('Wrong password! '); }

    
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



        // emplyee Register
        
       // print_r($input); die;
    }




    /////////////

      public function mobile_verify(Request $request)
    {    



        /////////Check use updaate///////////
         $validator = Validator::make($request->all(), [
            'mobile_number' => 'required',
            'otp' => 'required',
            //'mobile' => 'required',
            
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
         $Customer=Customer::where('mobile',$mobNum)->first();

          

         if(!isset($Customer)){
            return $this->appError('Mobile not registerd with us!');
         }

       
         
        

         /**
         @  $otpRow = Emp_otp::where('mobile','7291919640')->orderBy('expire_time','desc')->get();
          // is_mobile_verified  , mobile_verified_at

         **/

        $row= DB::table('tbl_customer_otp')
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
                 $otp_obj=Customer_otp::find($getid);
          $otp_obj->is_used=1;
          $otp_obj->save();
          /////Update status ////////
           if(isset($Customer)){  // Mobile Verfied date savedd
            
          $Customer->mobile_verified_at=$current_time;
          $Customer->save();  }


        
        $app_warnings[]='Mobile verfied';
         $send_arr['is_mobile_verified'] ='yes';
        
         // Send SMS Link /// $input['mobile']
          // $test=$this->_docSms($input['mobile']);
          $sendASms=$this->_SmsOnMobile($input['mobile_number']);
          
          return $this->sendResponse($send_arr, 'Mobile verfied! ');



             }else{ // OPT not correct';
              return $this->appError('OTP Incorrect'); }
                    

                }elseif(isset($Customer)&&!empty($Customer->mobile_verified_at)){
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
    @Booking OTP 


    ***/






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

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'mobile' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'c_password' => 'required|same:password',
        // ]);

      $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'device_id' => 'required',
        ]);




        $mobile='7291920268';
        $current_time= \Carbon\Carbon::now()->toDateTimeString();
        //////////Send OTP//////////////


        
        

        //////////Send OTP////////////////


        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }
        $validator_error_str='';$app_warnings=[];
         $input = $request->all();
         // print_r($input); die; 
        /////////////System Waring////////
 $CustomerValid=Customer::where('mobile',$input['mobile'])->orWhere('email',$input['email'])->first();
  // By email or Mobile


           if(!empty($CustomerValid)){ //# $app_warnings[]='Duplicate Email,Mobile';
           $Customer_valid=$CustomerValid->toArray();//Array
           //print_r($Customer_valid); die;

            // var_export($Customer_valid['mobile_verified_at']);

            // print_r($Customer_valid);  
             if(!empty($Customer_valid['mobile_verified_at'])){ //MobileVerfication DONE
                //Report Duplicate error 
                 if($input['email']==$Customer_valid['email'])
                     $app_warnings[]='Duplicate Email! ';
                  if($input['mobile']==$Customer_valid['mobile'])
                     $app_warnings[]='Duplicate mobile! ';


             }if(empty($Customer_valid['mobile_verified_at'])||$Customer_valid['mobile_verified_at']==NULL){
                // Go , Mobile Verfiy Screen.
                  $create_otp=$otp =rand(100000,999999);
                  $mobile_number=$Customer_valid['mobile'];  //  By email:($otp,$mob){
                  $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
                  //echo $send_new_otp; die; 
                   $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                  // Insert new otp////////////
                   $Otp_ob=new Customer_otp;
                   $Otp_ob->otp_type='for_mobile_verified';
                   $Otp_ob->mobile=$Customer_valid['mobile'];//RegisteredMobile
                   $Otp_ob->otp=$create_otp;
                   $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
                    $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
                    $Otp_ob->save();
                    // Return True with User-Basic Detail - Move Toward OTP Screen. 
                    $success['name'] =  $Customer_valid['name']; // $Customer_ob->name;
                    $success['mobile'] = $Customer_valid['mobile'];
                    $success['is_mobile_verified'] ='no';
                     return $this->sendResponse($success, 'Register successfully!!');
                  // $app_warnings[]='Mobile Verfiy Pending,otp sent mobile number! ';
                 


            }
            
           

           }

        /////////////////////////////

        if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);

             return $this->appError('System Warnings-'.$msg_str);
        }


      /////////////////////////////////////////////////     
       
        $input['password'] = bcrypt($input['password']);
         $input['name']='RohitK';  // ep_token
         $mToken=rand(100000,999999).$input['password'];
         $input['ep_token']=md5($mToken);
        $Customer_ob=Customer::create($input);

        // echo $Customer_ob['mobile'].'====';  
        // print_r($Customer_ob);
        // die;
        # Send OTP ///

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


        ////////////
        /// Generate Token ////////
        // $success['token'] =  $Customer_ob->createToken('MyApp')->accessToken;

        /////Response///////////
        $success['name'] =  $Customer_ob->first_name;
        $success['mobile'] =  $Customer_ob->mobile;
        $success['is_mobile_verified'] ='no';
        return $this->sendResponse($success, 'Register successfully.');
      
        ////////


    }
	
	//API for inserting data to employees
	public function insertAvailableEmployees(Request $request){
		
		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'booking_id' => 'required',
             'employee_id' => 'required', 
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        
        $insertData = AvailableEmployees::where('booking_id',$input['booking_id'])->where('employee_id',$input['employee_id'])->first();
        if (!$insertData) {
            $insertData = new AvailableEmployees();
        }
		
		
		$insertData->booking_id = $input['booking_id'];
		$insertData->employee_id = $input['employee_id'];
		$insertData->ep_token = $input['ep_token'];
		$insertData->employee_lat = $input['employee_lat'];
		$insertData->employee_lng = $input['employee_lng'];
		$insertData->employee_name = $input['employee_name'];
		$insertData->employee_phone = $input['employee_phone'];
		$insertData->employee_time_to_reach = $input['employee_time_to_reach'];
		$insertData->employee_cash_offer = $input['employee_cash_offer'];
		$insertData->description = $input['description'];
		$insertData->status = $input['status'];
		
		//check if inserted or not. 
		if($insertData->save() == true){
			return $this->sendResponse(array(), 'Data Inserted Successfully');
		}
		else{
			return $this->sendResponse(array(), 'Sorry, Something went wrong. Please try again.');
		}
	}
	
	
	//fetch data on the basis of booking id
	public function fetchAvailableEmployees(Request $request){

		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'booking_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
		
		$response = AvailableEmployees::where('booking_id', $input['booking_id'])->get()->toArray();
		
		if(!empty($response)){
			return $this->sendResponse($response, 'Available Employees Booking Found.');
		}
		else{
			return $this->sendResponse(array(), 'No Data Found.');
		}
		
	}
    
//fetch data on the basis of booking id
	public function fetchAvailableEmployeesWithEmpId(Request $request){

		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'booking_id' => 'required',
              'employee_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
		
		$response = AvailableEmployees::where('booking_id', $input['booking_id'])->where('employee_id', $input['employee_id'])->first();
		
		if(!empty($response)){
			return $this->sendResponse($response, 'Data retrieved.');
		}
		else{
			return $this->sendResponse(array(), 'No Data Found.');
		}
		
      }
    
    
    //fetch data on the basis of booking id
// 	public function changrAvailableEmployeesWithEmpIdStatus(Request $request){

// 		$input = $request->all();
//         $validator = Validator::make($request->all(), [
//              'booking_id' => 'required',
//              'employee_id' => 'required',
//             'status'=>'required'
//         ]);

//         if($validator->fails()){
//             return $this->sendError('Validation Error-', $validator->errors());       
//         }
		
// 		$response = AvailableEmployees::where('booking_id', $input['booking_id'])->where('employee_id', $input['employee_id'])->first();
		
// 		if(!empty($response)){
            
//             $response->status=$input['status'];
//             $q=$response->update();
            
// 			if($q){
                
//                 return $this->sendResponse($response, 'Data retrieved.');
//             }else{
//                 return $this->sendResponse(array(), 'No Data Found.');
//             }
// 		}
// 		else{
// 			return $this->sendResponse(array(), 'No Data Found.');
// 		}
//     }
    
    	public function changrAvailableEmployeesWithEmpIdStatus(Request $request){

		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'booking_id' => 'required',
             'employee_id' => 'required',
             'status'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
		
    $response = AvailableEmployees::where('booking_id', $input['booking_id'])
                                    ->where('employee_id',$input['employee_id'])->first();
		
		if(!empty($response)){
            
            $response->status=$input['status'];
            $q=$response->update();
            
			if($q){
                
                return $this->sendResponse($response, 'Data retrieved.');
            }else{
                return $this->sendResponse(array(), 'No Data Found.');
            }
		}
		else{
			return $this->sendResponse(array(), 'No Data Found.');
		}
    }
    
    
    
//update cash offered value
	public function updateCashOfferedValue(Request $request){

        $input = $request->all();
        $validator = Validator::make($request->all(), [
             'booking_id' => 'required',
            'cash_offer' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        
		$response = Booking::where('id', $input['booking_id'])->first();
		$response->cash_offer=$input['cash_offer'];
        $response->update();
		if(!empty($response)){
			return $this->sendResponse($response, "found");
		}else{
			return $this->sendResponse(array(), 'No Data Found.');
		}
		
		
	}
    
      //fetch cash offered value
// 	public function fetchCashOfferedValue(Request $request){

// 		$input = $request->all();
       
// 		$response = Booking::where('id', $input['booking_id'])->get()->toArray();
		
// 		if(!empty($response)){
// 			return $this->sendResponse($response, 'Value recieved.');
// 		}else{
// 			return $this->sendResponse(array(), 'No Data Found.');
// 		}
		
		
// 	}
    
   public function fetchCashOfferedValue(Request $request){

    $input = $request->all();
    
    $response = [];
       
    $response = Booking::where('id', $input['booking_id'])->first();
    
    $response['user_detail'] = Customer::where('id',$response->user_id)->first();
		
		if(!empty($response)){
			return $this->sendResponse($response, 'Value recieved.');
		}else{
			return $this->sendResponse(array(), 'No Data Found.');
		}
	}
    
    //real time tracking api
    
    public function currentLocationTrack(Request $request){

		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'booking_id' => 'required',
             'emp_id' => 'required', 
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        
        $insertData = Track::where('booking_id',$input['booking_id'])->where('emp_id',$input['emp_id'])->first();
        
		
		
		//check if inserted or not. 
		if($insertData){
			return $this->sendResponse(array(), 'Data Retrieved Successfully');
		}
		else{
			return $this->sendResponse(array(), 'Sorry, Something went wrong. Please try again.');
		}
		
	}
    
    
  public function currentLocationTrackUpdate(Request $request){

		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'booking_id' => 'required',
             'emp_id' => 'required', 
            'current_lat' => 'required', 
            'current_long' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        
        $insertData = Track::where('booking_id',$input['booking_id'])->where('emp_id',$input['emp_id'])->first();
        if (!$insertData) {
            $insertData = new Track();
        }
		$insertData->emp_id = $input['emp_id'];
		$insertData->current_lat = $input['current_lat'];
        $insertData->current_long = $input['current_long'];
        $insertData->booking_id = $input['employee_lng'];
     
		
		
		//check if inserted or not. 
		if($insertData->save() == true){
			return $this->sendResponse(array(), 'Data Inserted Successfully');
		}
		else{
			return $this->sendResponse(array(), 'Sorry, Something went wrong. Please try again.');
		}
		
	}
    
    //userdata
    
    public function getUserData(Request $request){

		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'booking_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        
        $getData=Booking::find($input['booking_id']);
        
        $Customer=Customer::find($getData->user_id);

		if($getData){
            
            $getData->username=$Customer->name;
            $getData->mobile=$Customer->mobile;
         
			return $this->sendResponse($getData->toArray(), 'Data Retrieved Successfully');
		}
		else{
			return $this->sendResponse(array(), 'Sorry, Something went wrong. Please try again.');
		}
		
	}
    
    
    public function getDriverData(Request $request){

		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'booking_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        
        $getData=Booking::find($input['booking_id']);
       
        $Employee=Employee:: where('id',$getData->employee_id)->first();

		if($getData){
         
            $Employee->otp=$getData->accept_otp;
            
			return $this->sendResponse($Employee->toArray(), 'Data Retrieved Successfully');
		}
		else{
			return $this->sendResponse(array(), 'Sorry, Something went wrong. Please try again.');
		}
		
	}

     public function getDriverLocation(Request $request){

		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'employee_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        $Employee=Employee:: where('id',$input['employee_id'])->first();

		if($Employee){
         
           
            
			return $this->sendResponse($Employee->toArray(), 'Data Retrieved Successfully');
		}
		else{
			return $this->sendResponse(array(), 'Sorry, Something went wrong. Please try again.');
		}
		
	}
	
	
	//function to fetch the near by drivers and which are online
    public function getNearByDrivers(Request $request){

		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'longitude' => 'required',
			 'latitude' => 'required'
        ]);
	
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
		
		$ownerLatitude = $input['latitude'];
		$ownerLongitude = $input['longitude'];
		 
		$nearByData = DB::Select("SELECT id,curr_latitude,curr_longitude  , 
					( 6371 * 
						ACOS( 
							COS( RADIANS( curr_latitude ) ) * 
							COS( RADIANS( $ownerLatitude ) ) * 
							COS( RADIANS( $ownerLongitude ) - 
							RADIANS( curr_longitude ) ) + 
							SIN( RADIANS( curr_latitude ) ) * 
							SIN( RADIANS( $ownerLatitude) ) 
						) 
					) 
					AS distance FROM tbl_employees where is_online = 'yes' and type_user = '2' HAVING distance <= 3 ORDER BY distance ASC");
		
		if(!empty($nearByData)){                
			return $this->sendResponse($nearByData, 'Data Retrieved Successfully');
		}
		else{
			return $this->sendResponse(array(), 'Sorry, No data Found.');
		}
		
	}

	public function fetchDriversOnDemand(Request $request){
		
		$input = $request->all();
        $validator = Validator::make($request->all(), [
             'vehicle_type' => 'required'
        ]);
	
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
		
		$employee = Employee::where('vehicle_type_id',$input['vehicle_type'])
		          ->where('is_online','yes')
				  ->where('type_user','2')
				  ->get();
		
		if(!empty($employee)){                
			return $this->sendResponse($employee, 'Data Retrieved Successfully');
		}
		else{
			return $this->sendResponse(array(), 'Sorry, No data Found.');
		}
		
	}
    
   public function getVehicleType(Request $request){

    $input = $request->all();
    $Employee = Employee::where('id',$input['employee_id'])->count();
    if(!empty($Employee)){
      $vehicle = Employee::where('id',$input['employee_id'])->first();
        return response()->json(['data'=>$vehicle->vehicle_type_id, 'message'=>'Vehicle Type Show', 'success'=>true]);  
    }else{
      return response()->json(['message'=>'No Vehicle Type Show', 'success'=>false]);  
    }
  }

  public function setVehicleType(Request $request){

    $input = $request->all();
    $Employee = Employee::where('id',$input['employee_id'])->count();
    if(!empty($Employee)){
      $vehicle = Employee::where('id',$input['employee_id'])->first();
        Employee::where('id',$input['employee_id'])->update([
          'vehicle_type_id' => $input['vehicle_type_id']
          ]);
          return response()->json(['message'=>'Vehicle Type Update..', 'success'=>true]);  
    }else{
      return response()->json(['message'=>'No User', 'success'=>false]);  
    }
  }
    
  public function VehicleShow(Request $request){

    $VehicleType = VehicleType::select('id','vehicle_type','vehicle_image')->get();
    if(!empty($VehicleType)){
          return response()->json(['data'=>$VehicleType,'message'=>'Vehicle Type Update..', 'success'=>true]);  
    }else{
      return response()->json(['message'=>'No Vehicle', 'success'=>true]);  
    }
  }
  
   
}
