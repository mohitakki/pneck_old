<?php

// namespace App\Http\Controllers\API;
// Vendor_feedback
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Vendor;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Vendor_otp;
use App\Vendor_feedback;
///
use App\Vendor_service;
use App\Vendor_subcat;

use App\Banner;

use App\Vendor_catalogue;
use App\Catalogue;
use App\Vendor_skils;
use App\vendor_current_loc_log;
use App\vendor_service_images;

use Illuminate\Support\Facades\DB;

use Edujugon\PushNotification\PushNotification;


class VendorController extends BaseController
{
    //
    public function __construct(){
    	//echo 'Global funtioon';
        $demo='';
    }

/**
@General All sms to vendor 

**/

 protected function __SMS_to($mobile,$get_msg=NULL){
      if(!empty($get_msg)){
         $msg=urlencode($get_msg);

      }else{

     $page='https://bhimbook.org/pneck/upload-kyc-document.php';
     $msgInfo='Mobile verfied, Upload KYC document-'.$page;
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
        $page='https://bhimbook.org/pneck/upload-document.php';
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

    $page='https://bhimbook.org/pneck/upload-document.php';
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
      $emp_ob=Vendor::find($eid);
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
@ ServiceProfile Save

**/
public function servicesUpdate(Request $request)
    {   
         $input=$request->all();
        try{
         $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'ep_token' => 'required',
            'shop_title' => 'required',
            'primary_profession' => 'required',// out of 3
            'profession_sub_category' => 'required',
            'catalogue' => 'required', // 2nd level 
            'vendor_latitude' => 'required',
            'vendor_longitude' => 'required',
            'days' => 'required',//JSON, list
            'opening_time' => 'required',
            'closing_time' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'vendor_type' => 'required', 
			'description'=>'required'
           // 'van_address' => 'required', // ep_token
       
            
        ]);


        ////////////


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

          $get_vid=$input['vendor_id'];
          $Vendor=Vendor::find($get_vid);
        /////////////Systme Validation:: match UID, TOKEN////////////
           if(!isset($Vendor)){
            $app_warnings[]='Wrong Vendor ID! ';  
           }

            if(isset($Vendor)&&!empty($Vendor->ep_token)&&$input['ep_token']!=$Vendor->ep_token){
              $app_warnings[]='Token not matched!';
            }
            $current_time= \Carbon\Carbon::now()->toDateTimeString();

            /////Display message ////////////////////////////

            if(!empty($app_warnings)){
             $msg_str=implode(', ', $app_warnings);
            return $this->appError('ApplicationMessage-'.$msg_str);
            }

            //////@API::///////
         //////////////// // valid user id///////
          if(isset($Vendor)&&$input['ep_token']==$Vendor->ep_token){
            //Update Service det
            //$vendorDays = explode(',',$request->days); 

            $Vendor_skils=Vendor_skils::where('vendor_id', $get_vid)->first();
            
            if($Vendor_skils=='')
            {
              
              $Skill= new Vendor_skils;
              $Skill->vendor_id=$Vendor->id;
              $Skill->shop_title=$input['shop_title'];
              $Skill->service_id=$input['primary_profession'];
              $Skill->subcat_id=$input['profession_sub_category'];
              $Skill->catalogue_id=$input['catalogue'];
              $Skill->vendor_latitude=$input['vendor_latitude'];
              $Skill->vendor_longitude=$input['vendor_longitude'];

               // days_of_timing
               $Skill->state_id=$input['state'];
               $Skill->city_id=$input['city'];
               $Skill->address1=$input['address'];

               $Skill->vendor_data=$request->days;
               $Skill->opening_time=$input['opening_time'];
               $Skill->closing_time=$input['closing_time'];
               $Skill->vendor_type=$input['vendor_type'];
			   $Skill->description = $input['description'];
			   $Skill->website = isset($input['website'])?$input['website']:'';
               $Skill->save();
                
              if($request->hasFile('image')){

                    $images[] = $request->file('image'); 
                    
                    foreach ($images[0] as $image)
                    {
                      $file = $image;
                      $filename = $file->getClientOriginalName(); 
                      $extention = $file->getClientOriginalExtension(); 
                      $imgname = uniqid().$filename; 
                      $destinationPath = storage_path('/vendor_service_img/');
                      $file->move($destinationPath, $imgname);

                      $vendorServiceImage = new vendor_service_images;
                      $vendorServiceImage->vendor_id = $get_vid;
                      $vendorServiceImage->service_image = url('/').'/storage/vendor_service_img/'.$imgname;
                      $vendorServiceImage->save();
                    }
                }

                $ImageVendor = vendor_service_images::where('vendor_id', $get_vid)->get();

                foreach ($ImageVendor as $value) {
                    $ImageData[] = $value->service_image;
                }
                $Skill['image'] = $ImageData; 
                $Skill['days'] = $Skill->vendor_data; 

          return response()->json(['data'=>$Skill,'message'=>'Service Created Successfully', 'success'=>true]);
            }
            else{
              $updateService = Vendor_skils::where('vendor_id', $get_vid)->update([
                    'shop_title' => $input['shop_title'],
                    'service_id' => $input['primary_profession'],
                    'subcat_id' => $input['profession_sub_category'],
                    'catalogue_id' => $input['catalogue'],
                    'vendor_latitude' => $input['vendor_latitude'],
                    'vendor_longitude' => $input['vendor_longitude'],
                    'state_id' => $input['state'],
                    'city_id' => $input['city'],
                    'address1' => $input['address'],
                    'vendor_data' => $input['days'],
                    'opening_time' => $input['opening_time'],
                    'closing_time' => $input['closing_time'],
                    'vendor_type' => $input['vendor_type'],
					'description' => $input['description'], 
					'website' => isset($input['website'])?$input['website']:''
              ]);

              $latestUpdate = Vendor_skils::where('vendor_id',$get_vid)->first();
              $vendorImage = vendor_service_images::where('vendor_id', $get_vid)->get();
              
              /*if(count($vendorImage)>0){
                foreach ($vendorImage as $vendorGetImage) 
                {                           
                  $imagePath = $vendorGetImage->service_image;
                  $s = explode("/",$imagePath);
                  \Storage::disk('vendor_service_img')->delete($s[5]);     
                        
                }
              }*/

              /*for ($j=0; $j < count($vendorImage); $j++) { 
              vendor_service_images::where('id', $vendorImage[$j]->id)->delete();
            }*/

              if($request->hasFile('image')){

                  $images[] = $request->file('image'); 
                   
                    foreach ($images[0] as $imageval)
                    {
                      $file = $imageval; 
                      $filename = $file->getClientOriginalName(); 
                      $extention = $file->getClientOriginalExtension(); 
                      $imgname = uniqid().$filename; 
                      $destinationPath = storage_path('/vendor_service_img/');
                      $file->move($destinationPath, $imgname);

                      $vendorServiceImage = new vendor_service_images;
                      $vendorServiceImage->vendor_id = $get_vid;
                      $vendorServiceImage->service_image = url('/').'/storage/vendor_service_img/'.$imgname;
                      $vendorServiceImage->save();
                    }
                }

                $ImageVendor = vendor_service_images::where('vendor_id', $get_vid)->get();

                if($ImageVendor!='')
                {
                  foreach ($ImageVendor as $value) {
                            $ImageData[] = $value->service_image;
                  }
                  $latestUpdate['image'] = $ImageData; 
                }else{

                    $latestUpdate['image'] = $ImageData;  
                }
                
                $latestUpdate['days'] = $latestUpdate->vendor_data;

            return response()->json(['data'=>$latestUpdate,'message'=>'Service Updated Successfully', 'success'=>true]);

              }

            }
          }
          
            //return response()->json(['data'=>(object)[], 'message'=>'Vendor Not Found.', 'success'=>false]);
          

          catch (Exception $e) {
            return response()->json(['data'=>(object)[], 'message'=>'Something went wrong', 'success'=>false]);
          }
           

          // return $this->sendResponse($results, 'Data Saved! ');           
          
    }


    public function AddOnlineVendorCurrLocation(Request $request){

        $input=$request->all();

         $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'ep_token' => 'required',
            'vendor_lat' => 'required',
            'vendor_long' => 'required',
           
        ]);

       // $app_warnings[]='Dev Testing On!!!';

        if($validator->fails()){

            return $this->sendError('Validation Error-', $validator->errors());       
          }
          $Vendor=Vendor::find($input['vendor_id']);
        
           if(!isset($Vendor))$app_warnings[]='Wrong employee id! ';
          
   //////////////////Displye SystemError//////////////////////
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }
          ############################
           ////////Add Employee lat to :: main Employee table //////////

          $Vendor->vendor_latitude=$input['vendor_lat'];
           $Vendor->vendor_longitude=$input['vendor_long'];

            if(isset($input['vendor_currentAddress'])&&! empty($input['vendor_currentAddress'])){
                $Vendor->curr_loc_address=$input['vendor_currentAddress'];

            }
         
            ///if employee offline:make them live // 
            if($Vendor->is_online!='yes'){
              //$Vendor->is_online='yes';
              //$Vendor->duty_status_id='1';  // make emp: ready for job
            }
            
              $Vendor->save();
              //////SendLocationToLogTrackingEmployee/////////
        //  $Location=Employee_location::find(1);
          $Location=new vendor_current_loc_log;
          $Location->user_id=$input['vendor_id'];
          $Location->user_type='vendor';
          $Location->latitude=$input['vendor_lat'];
          $Location->longitude=$input['vendor_long'];
          $Location->curr_status=1;// DedULT

          // usr_address
          if(isset($input['vendor_currentAddress'])&&! empty($input['vendor_currentAddress']))
          $Location->curr_address=(isset($input['vendor_currentAddress']))?$input['vendor_currentAddress']:'';

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


/**
@SubcatOptionChange
@ service_id 
**/

 public function subcat_load(Request $request)
    {   
         $input=$request->all();
         $validator = Validator::make($request->all(), [
            'service_id' => 'required',
            
        ]);
         
        ////////////
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

         
        /////////////Systme Validation:: match UID, TOKEN////////////
       
      
     /////Display message ////////////////////////////
            if(!empty($app_warnings)){
             $msg_str=implode(', ', $app_warnings);
            return $this->appError('ApplicationMessage-'.$msg_str);
            }

            // $Subcat=Vendor_subcat::find(2);
            // print_r($Subcat); die; 
            // subcat_load

              $service_id=$input['service_id'];
            $Vendor_subcat=Vendor_subcat::select('id','title as name')
            ->where('service_id',$service_id)->get()->toArray();
           
         //////////////// // valid user id///////
           
          if(isset($Vendor_subcat)){
              $resp_arr=[]; // 
              $resp_arr['subcategory_list'] =$Vendor_subcat;
          return $this->sendResponse($resp_arr, 'Data found! ');
           
          }else{
            $msg_str='Sorry, Please try later';
            return $this->appError('ApplicationMessage-'.$msg_str);
          }

    }

    public function vendorHome(Request $request)
    {          

        $Vendor_subcat=Vendor_subcat::select('id','title','category_images','cate_type')->get()->toArray();
        $Vendor_banner_images=Banner::select('id','title','banner as image')->get()->toArray();
           
        //  //////////////// // valid user id///////
           
          if(isset($Vendor_subcat)){
              $resp_arr=[]; // 
              $resp_arr['subcategory_list'] =$Vendor_subcat;
              $resp_arr['banner_slider_images'] =$Vendor_banner_images;
          return $this->sendResponse($resp_arr, 'Data found! ');
           
          }else{
            $msg_str='Sorry, Please try later';
            return $this->appError('ApplicationMessage-'.$msg_str);
          }


// Just the root (protocol and domain) part of the URL)


    }


    //Load State

    public function state_load(Request $request)
    {   
        
       $input=$request->all();
         $validator = Validator::make($request->all(), [
           // 'vendor_id' => 'required',
          //  'ep_token' => 'required',
            
        ]);
         
        ////////////
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
       
     //   $Vendor=Vendor::where('ep_token',$input['ep_token'])->first();

       // if($Vendor){        
        $state_arr = DB::table('states')->where('country_id', 10)->orderBy('name', 'asc')->get();
        

      // $i=1;
        foreach ($state_arr as $key) {
          # code...
          $StateArrList[]=array('state_id'=>$key->id,'state'=>$key->name);
          //$i++;
        }
     // }
      
     /////Display message ////////////////////////////

            if(!empty($app_warnings)){
             $msg_str=implode(', ', $app_warnings);
            return $this->appError('ApplicationMessage-'.$msg_str);
            }

          
         //////////////// // valid user id///////
           
          if(isset($StateArrList)){
              $resp_arr=[]; // 
              $resp_arr['state'] =$StateArrList;
          return $this->sendResponse($resp_arr, 'Data found! ');
           
          }else{
            $msg_str='Sorry, Please try later';
            return $this->appError('ApplicationMessage-'.$msg_str);
          }

    }


/*
@loadCity 

**/
 public function city_load(Request $request)
    {   
         $input=$request->all();
         $validator = Validator::make($request->all(), [
            'state_id' => 'required',
            
        ]);
         
        ////////////
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

         
        /////////////Systme Validation:: match UID, TOKEN////////////

        $city_arr = DB::table('cities')
                ->where('state_id',$input['state_id'])
                ->get()->toArray();

        /*$city_arr= array(
        'Central Delhi', 
        'Noida', 
        'Ghaziabad',
        'East Delhi', 
        'New Delhi', 'North Delhi', 'North East Delhi',
         'North West Delhi', 'South Delhi',
         'South West Delhi', 'West Delhi'
      );*/  
       $i=1;
        foreach ($city_arr as $key) {
          # code...
          $cityArrList[]=array('id'=>$key->id,'city'=>$key->city_name);
          $i++;
        }
      
     /////Display message ////////////////////////////
            if(!empty($app_warnings)){
             $msg_str=implode(', ', $app_warnings);
            return $this->appError('ApplicationMessage-'.$msg_str);
            }

            // $Catalogue=Catalogue::select('id','title as name')->where('subcat_id',$subcat_id)->get()->toArray();


         //////////////// // valid user id///////
           
          if(isset($cityArrList)){
              $resp_arr=[]; // 
              $resp_arr['city'] =$cityArrList;
          return $this->sendResponse($resp_arr, 'Data found! ');
           
          }else{
            $msg_str='Sorry, Please try later';
            return $this->appError('ApplicationMessage-'.$msg_str);
          }

    }



/***
CatalogouList

**/
   public function catalogue_load(Request $request)
    {   
         $input=$request->all();
         $validator = Validator::make($request->all(), [
            'subcat_id' => 'required',
        ]);
         
        ////////////
        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
         
        /////////////Systme Validation:: match UID, TOKEN////////////
      
     /////Display message ////////////////////////////
            // $app_warnings[]='Sorry,API in Testing mode! ';
            if(!empty($app_warnings)){
             $msg_str=implode(', ', $app_warnings);
            return $this->appError('ApplicationMessage-'.$msg_str);
            }

            $subcat_id=$input['subcat_id'];
            $Catalogue=Catalogue::select('id','title as name')->where('subcat_id',$subcat_id)->get()->toArray();

         //////////////// // valid user id///////
           
          if(isset($Catalogue)){
              $resp_arr=[]; // 
              $resp_arr['catalogue'] =$Catalogue;
          return $this->sendResponse($resp_arr, 'Data found! ');
           
          }else{
            $msg_str='Sorry, Please try later';
            return $this->appError('ApplicationMessage-'.$msg_str);
          }

    }



/**
@CoreSerrvice
**/

 public function coreServices()
    {   
      $core_services=Vendor_service::select('id','title')->orderBy('updated_at','asc')->get()->toArray();

       
     //  print_r($core_services);  die; 

      

       //echo  '======Get data';  die; 
      $resp_arr['list'] =$core_services;
     // $resp_arr['mobile_verified'] =$mStatus;
          return $this->sendResponse($resp_arr, 'Data found! ');      


          

    }


/****
@VendorServiceOption
@ show data on page 
**/

    public function servicesOptions(Request $request)
    {   
          $input=$request->all();
         $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'ep_token' => 'required',
            'service_id' => 'required',

           // 'van_address' => 'required', // ep_token
            
        ]);

        ////////////

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

          $get_vid=$input['vendor_id'];
          $Vendor=Vendor::find($get_vid);
        /////////////Systme Validation:: match UID, TOKEN////////////
           if(!isset($Vendor)){
            $app_warnings[]='Wrong Vendor ID! ';  
           }

            if(isset($Vendor)&&!empty($Vendor->ep_token)&&$input['ep_token']!=$Vendor->ep_token){
              $app_warnings[]='Token not matched!';
            }

            /////Display message ////////////////////////////
             //$app_warnings[]='===Sorry,API in Testing mode!!! ';

            if(!empty($app_warnings)){
             $msg_str=implode(', ', $app_warnings);
            return $this->appError('ApplicationMessage-'.$msg_str);
            }

            //////@API:://///////////////////////

         //////////////// // valid user id///////
          if(isset($Vendor)&&$input['ep_token']==$Vendor->ep_token){

             $service_id=$input['service_id'];
            $Vendor_subcat=Vendor_subcat::select('id','title as name')
            ->where('service_id',$service_id)->get()->toArray();

            $states = DB::table('states')
                //->where('options->language', 'en')
                ->get()->toArray();

          //////////////// // valid user id///////
                 $resp_arr=[]; // 
           
          if(isset($Vendor_subcat)){
              $resp_arr['subcategory_list'] =$Vendor_subcat;
              $resp_arr['state_list'] =$states;
           
          }else{
            $resp_arr['subcategory_list'] =[];
            $resp_arr['state_list'] =$states;
          
          }


          return $this->sendResponse($resp_arr, 'Data found! ');


          //End ofservice API//
          }

          ////////////

    }




/**
SendFeedback
***/

 public function addFeedback(Request $request)
    {   
          $input=$request->all();
         $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'ep_token' => 'required',
            'name' => 'required',
            'subj' => 'required',
            'message' => 'required',
            
        ]);


        ////////////


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

          $get_vid=$input['vendor_id'];
          $Vendor=Vendor::find($get_vid);
        /////////////Systme Validation:: match UID, TOKEN////////////
           if(!isset($Vendor)){
            $app_warnings[]='Wrong Vendor ID! ';  
           }

            if(isset($Vendor)&&!empty($Vendor->ep_token)&&$input['ep_token']!=$Vendor->ep_token){
              $app_warnings[]='Token not matched!';
            }
            //$app_warnings[]='API in testing!!! ';

            /////Display message ////////////////////////////

            if(!empty($app_warnings)){
             $msg_str=implode(', ', $app_warnings);
            return $this->appError('ApplicationMessage-'.$msg_str);
            }

            //////@API::///////
         //////////////// // valid user id///////
          if(isset($Vendor)&&$input['ep_token']==$Vendor->ep_token){

            //Profile status :
            // $Vendor->first_name=$input['first_name'];
            // Add feedback to Feedback table //
             $Feedback=new Vendor_feedback;
             $Feedback->user_id=$Vendor->id;
             $Feedback->user_type='vendor';
             $Feedback->user_name=($input['name'])?$input['name']:'';
             $Feedback->subject_name=($input['subj'])?$input['subj']:'';
             $Feedback->subject_info=$input['message'];
             $Feedback->save();


           


            ////////////////////////////////////////// 

              $resp_arr=[]; // 
      
            
             // $resp_arr['mobile_verified'] =$mStatus;
          return $this->sendResponse($resp_arr, 'Data Sent! ');
           
          }

    }

/****
  @ Forgot Password match OTP.
  @ OTP required and user should be Active by  regsiter
  @mobile number should be verfied
  @ then -only can request for Forogt pass

  **/


   public function forgotPassMobileVerify(Request $request){     
        /////////Check use updaate///////////
         $validator = Validator::make($request->all(), [
            'mobile_number' => 'required',
            'otp' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

        ###return $this->appError('===Testing API,forgotPassMobileVerify ======! ');


        ############Testing Case :Developer########################

          $input=$request->all();
          $mobNum=$input['mobile_number']; 
          $current_time = \Carbon\Carbon::now()->toDateTimeString();

          $Vendor=Vendor::where('mobile',$mobNum)->first();

         if(!isset($Vendor)){
            return $this->appError('Mobile not registerd with us! ');
         }

      /////////////////////////////

        $row= DB::table('tbl_vendor_otp')
                ->where('otp_purpose', 'forgot_pass_verify_mobile_otp')
                ->where('mobile',$mobNum)
                ->where('expire_time', '>',$current_time)
                ->orderBy('expire_time', 'desc')
                ->first();

                
                // if(isset($row)&&$row->is_used==0){
      if(isset($row)&&!empty($row)&&$row->is_used==0){

                 // return $this->appError('Mobile ok! ');
                     $app_warnings[]='Mobile ok,';

                     if($input['otp']==$row->otp){

                 $getid=$row->id;
                 $otp_obj=Vendor_otp::find($getid);
                 $otp_obj->is_used=1; 
                 $otp_obj->save();

          /////Update status ////////////////////////////

           if(isset($Vendor)){ 
            // Mobile Verfied date savedd

            $req_pass="User".rand(100000,999999);
            $changePass= bcrypt($req_pass);
            $Vendor->password=$changePass;  
          //$Vendor->first_name= 'TestpasChanged';

            $Vendor->updated_at=$current_time;
            $Vendor->save();

            ////////////////////////////////////////////////////////////
          $Textmsg="Pneck Password is $req_pass";
          $sendASms=$this->_SmsToMobile($mobNum,$Textmsg);
         }


          
          $send_arr['mobile']=$Vendor->mobile;
          return $this->sendResponse($send_arr, 'Password sent to Mobile! ');
      

             }else{ // OPT not correct';
              return $this->appError('OTP Incorrect! '); }

                  
                         
                    

       }else{ // if(isset($row)&&!empty($row)&&$row->is_used==0){
         $app_warnings[]='Mobile not registerd in system';
         return $this->appError('OTP Incorrect or Expired! ');
                   
                   
       }



                /////Send Response//



    }







////////////////////
public function forgotPassWithMobile(Request $request){

        $input=$request->all();
        $current_time= \Carbon\Carbon::now()->toDateTimeString();
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            //'ep_token' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }


          ## return $this->appError('Test API,profile@@===! ');

   ////////////////////////////////////////////////////////////////////
          $Vendor=Vendor::where('mobile',$input['mobile'])->first();

         if(!isset($Vendor))return $this->appError('mobile not registerd with us! ');

         if(!empty($Vendor)&&$Vendor->mobile_verified_at==NULL)
          return $this->appError('Inactive profile,not allowed! ! ');

        ///////////SystemMesage/////////////////
          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemError-'.$msg_str);
          }

         ////////API///////////////////////////

        if(!empty($Vendor)&&$Vendor->mobile==$input['mobile']){

            $app_warnings[]='Create forgot_pass otp ';
            $create_otp=$otp =rand(100000,999999);
            $mobile_number=$input['mobile'];  //  By email:($otp,$mob){
            $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
            // echo $send_new_otp ,':'.$send_new_otp ; die; 
       $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                  // Insert new otp////////////


                   $Otp_ob=new Vendor_otp;
                   $Otp_ob->otp_type='for_mobiler';
                   $Otp_ob->otp_purpose='forgot_pass_verify_mobile_otp';

                   $Otp_ob->mobile=$input['mobile'];//RegisteredMobile
                   $Otp_ob->otp=$create_otp;
                   $Otp_ob->create_time=$current_time;
                   $Otp_ob->expire_time=$expTime;
                   $Otp_ob->save();

                ///////Response to Screen /////////////
                    $success['mobile'] = $input['mobile'];
                    $success['msg'] ='OTP match pending! ';
                    return $this->sendResponse($success, 'Otp Sent successfully!  ');

        }else{
          return $this->appError('Error in sending otp! ');
        }

      }






   /***
   @Chage pass

   **/


  public function change_password(Request $request){

     $input=$request->all();
      $current_time= \Carbon\Carbon::now()->toDateTimeString();
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'ep_token' => 'required',
            'old_pass' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
            //'device_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        //////////////////

         $getuid=$input['vendor_id'];
         $Vendor=Vendor::find($getuid);
        if(!isset($Vendor)){
             $app_warnings[]='Wrong Employee ID! ';  //Return 
        }

         if(isset($Vendor)&&!empty($Vendor->ep_token)&&$input['ep_token']!=$Vendor->ep_token){
              $app_warnings[]='Token not matched!';
        }

        if(!empty($input['old_pass'])&&$input['old_pass']==$input['password']){
                $app_warnings[]='Old and New password Same not allowed! ';
        }






      ############SystemError########################
        
         // $app_warnings[]='API in testing mode! ';  //Return 


         if(!empty($app_warnings)&&count($app_warnings)>0){
              $msg_str=implode(', ', $app_warnings);

              return $this->appError('ApplicationMessage-'.$msg_str);

             }
      ////////TokenValid/////////////////////////////////


            $enteredPassword=$input['old_pass'];

             if(Hash::check($enteredPassword ,$Vendor->password)){//OK

           // return $this->sendResponse($resp_arr=[], 'Ok, Updated!XXXX! ');

              $form_pass=$input['password'];
              unset($input['password']); unset($input['c_password']);
              $Vendor->password=bcrypt($form_pass);
              $Vendor->updated_at=$current_time;

                if($Vendor->save()){     //Saved
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






/***
   @Edit-profile:Save profie 
   @ Address and gender
   */

    public function edit_profile(Request $request)
    {   
          $input=$request->all();
         $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'ep_token' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
           // 'van_address' => 'required', // ep_token
            
        ]);


        ////////////


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

          $get_vid=$input['vendor_id'];
          $Vendor=Vendor::find($get_vid);
        /////////////Systme Validation:: match UID, TOKEN////////////
           if(!isset($Vendor)){
            $app_warnings[]='Wrong Vendor ID! ';  
           }

            if(isset($Vendor)&&!empty($Vendor->ep_token)&&$input['ep_token']!=$Vendor->ep_token){
              $app_warnings[]='Token not matched!';
            }

            /////Display message ////////////////////////////

            if(!empty($app_warnings)){
             $msg_str=implode(', ', $app_warnings);
            return $this->appError('ApplicationMessage-'.$msg_str);
            }

            //////@API::///////
         //////////////// // valid user id///////
          if(isset($Vendor)&&$input['ep_token']==$Vendor->ep_token){

            //Profile status :
            $Vendor->first_name=$input['first_name'];
            $Vendor->last_name=$input['last_name']; // gender , van_address
            $Vendor->gender=$input['gender'];
       $Vendor->van_address=(isset($input['van_address']))?addslashes($input['van_address']):'demo Address';
            $Vendor->save();


            ////////////////////////////////////////// 

              $resp_arr=[]; // 
              $resp_arr['fname'] =$Vendor->first_name;
              $resp_arr['last_name'] =$Vendor->last_name;
              $resp_arr['mobile'] =$Vendor->mobile;
              $mStatus=(!empty($Vendor->mobile_verified_at))?'yes':'no';
              $resp_arr['email'] =$Vendor->email;
              
              $resp_arr['gender'] =$Vendor->gender;
              $resp_arr['mobile_verified'] =$mStatus;
          return $this->sendResponse($resp_arr, 'Data Saved! ');
           
          }

    }




   /**
   @Vendor:myProfile


   ***/

   public function myprofile(Request $request)
    {   
          $input=$request->all();
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'ep_token' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

          $get_vid=$input['vendor_id'];
          $Vendor=Vendor::find($get_vid);
        /////////////Systme Validation:: match UID, TOKEN////////////
           if(!isset($Vendor)){
            $app_warnings[]='Wrong Vendor ID! ';  
           }

            if(isset($Vendor)&&!empty($Vendor->ep_token)&&$input['ep_token']!=$Vendor->ep_token){
              $app_warnings[]='Token not matched!';
            }

            /////Display message ////////////////////////////

            if(!empty($app_warnings)){
             $msg_str=implode(', ', $app_warnings);
            return $this->appError('ApplicationMessage-'.$msg_str);
            }

            //////@API::///////
         //////////////// // valid user id///////
          if(isset($Vendor)&&$input['ep_token']==$Vendor->ep_token){

            //Profile status : 
            $profile=($Vendor->kyc_approval=='approved')?'active':'inactive';
              $resp_arr=[]; // 
              $resp_arr['profile_active'] =$profile;
              $resp_arr['fname'] =$Vendor->first_name;
              $resp_arr['last_name'] =$Vendor->last_name;
              $resp_arr['image'] =$Vendor->profile_image;
              $resp_arr['mobile'] =$Vendor->mobile;
              $resp_arr['vendor_gender'] =$Vendor->gender;
              $mStatus=(!empty($Vendor->mobile_verified_at))?'yes':'no';
              $resp_arr['email'] =$Vendor->email;
              $resp_arr['mobile_verified'] =$mStatus;
          return $this->sendResponse($resp_arr, 'Data Received! ');
           
          }

    }


   

   /***
   @ Register-Mobile-Verfied

   **/

      public function mobileVerify(Request $request){ 
          
          

        /////////Check use updaate///////////
         $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'otp' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }


      
        $input=$request->all();//Set only on JSON after testing
        $mobNum=$input['mobile']; 
        $current_time = \Carbon\Carbon::now()->toDateTimeString();
         $Vendor=Vendor::where('mobile',$input['mobile'])->first();

         if(!isset($Vendor)){
           $app_warnings[]='Invalid Mobile! ';
         }
         /////ApplicationValidate//////
         $Vendor=Vendor::where('mobile',$mobNum)->first();

           if(!isset($input['mobile'])){
            return $this->appError('Mobile required!');
           }
           if(!isset($Vendor)){
            return $this->appError('Mobile not registerd with us! ');
         }
          

           
        
             //If Moblie Verfication DONE 
              if(isset($Vendor)&&!empty($Vendor->mobile_verified_at)){
                return $this->appError('Mobile verification already done!! ');
              }
              
              
            

                if(!empty($app_warnings)){
                  $msg_str=implode(', ', $app_warnings);
                  return $this->appError('ApplicationMessage-'.$msg_str);
                }
                $row=Vendor_otp::where('mobile',$mobNum)
                  ->where('expire_time', '>',$current_time)
                ->orderBy('expire_time', 'desc')
                ->first();
                
                

              
    if(isset($row)&&!empty($row)&&$row->is_used==0){
        
        $app_warnings[]='Mobile ok,';
        
      if($input['otp']!=$row->otp){ 
      return $this->appError('OTP Incorrect');
      }
      


      if($input['otp']==$row->otp){ 
     
        
            // Mobile verfied, Upload Document/////////////
          $getid=$row->id;
          $otp_obj=Vendor_otp::find($getid);
          $otp_obj->is_used=1;
          $otp_obj->otp_type='for_mobile';
          $otp_obj->save();

          /////Update status ////////
           if(isset($Vendor)){
             $Vendor->mobile_verified_at=$current_time;
             $Vendor->save();
           }
       
         $app_warnings[]='Mobile verfied, Upload KYC Document. ';
         $send_arr['is_mobile_verified'] ='yes';
         $success['data']=$send_arr;
         $Doc_url='https://bhimbook.org/pneck/upload-kyc-document.php'; 
         
         // $test=$this->__SMS_to($input['mobile']);
          $isUsed = '1';
          return $this->sendResponse($send_arr,'user_id:'.$Vendor['id'],'is_used:'.$isUsed, 'Mobile verfied, Upload KYC Document-'.$Doc_url);

      }
     

}

 
    }

public function sendToVendorNotification($token , $message)
 { 
     
    $push = new PushNotification('fcm');
    
    $push->setUrl('https://fcm.googleapis.com/fcm/send');                
                       
                                $response =  $push->setMessage([

                                   'notification' => [
                                                                'title'=> 'Welcome Pneck Vendor',
                                                                'body' => $message,
                                                                'sound'=> 'default',
                                                        ],
                                                        'content_available'=>true,
                                                        'mutable_content'  =>true,
                                        'data' => [
                                                'title'     => 'Welcome Pneck Vendor',
                                                'name'      => 'Pneck',
                                                'message'   => $message,
                                                'image'     => 'https://osswebexam.com/logo_header.png',
                                                'notification_type' => 'VendorLogin',
                                                ]
                                        ])
                                ->setDevicesToken($token)
                                ->send()
                                ->getFeedback();
    
 }

public function vendorDeviceToken(Request $request)
    {    

      $input=$request->all();
         $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'device_token' => 'required',            
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

    $update =  Vendor::where('id',$input['vendor_id'])->update(['device_token'=>$request->device_token]);

            $send_arr['status'] =  true;
            return $this->sendResponse($send_arr, 'Vendor device token update successfully.');
    }

/****
@Login
1-Mobile verfied
2-KyC Appoved or Rejected

**/
  
 public function login(Request $request)
    {   
        
        $input=$request->all();
         $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'password' => 'required',
            'device_token' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        ////////////////////////////////////
        
        $Vendor=Vendor::where('mobile',$input['mobile'])->first();

         if(!isset($Vendor)){
           $app_warnings[]='Invalid Mobile! ';
         }


        
        ////System Error /////////////
        //$app_warnings[]='Logn API, in under work! ';

        ////Display app Warning////
        if(!empty($app_warnings)){
          $msg_str=implode(', ', $app_warnings);
          return $this->appError('ApplicationMessage-'.$msg_str);
        }





        ///////@@API-FLOW////////////////////////     
           if(!empty($Vendor)&&$Vendor->mobile_verified_at==NULL){
             $msg_str='Mobile verification pending! ';
             return $this->appError('ApplicationMessage-'.$msg_str);

           }
           // KYC not uploaded /////
            if(!empty($Vendor)&&($Vendor->kyc_approval=='awaited'||$Vendor->kyc_approved_at==NULL)){
             $msg_str='Your KYC Document upload pending! ';
             $Doc_url='https://bhimbook.org/pneck/upload-kyc-document.php'; // if match 
            // $msg_str.='Go to-! '.$Doc_url;
             $msg_str.='Please Contact Your Nearest Agent!';
             return $this->appError('ApplicationMessage-'.$msg_str);

           }elseif($Vendor->kyc_approval=='rejected'){
            $msg_str='Your KYC Document rejected, Please contact admin! ';
            return $this->appError('ApplicationMessage-'.$msg_str);

           }
           elseif($Vendor->pneck_vendor=='0'){
            $msg_str='Account Dactivate Please contact admin! ';
            return $this->appError('ApplicationMessage-'.$msg_str);

           }

           //////////////////////

          

            if(!empty($Vendor)&&$Vendor->mobile_verified_at!=NULL){


             //  check passowrd match.
            $enteredPassword=$input['password'];
             if(Hash::check($enteredPassword , $Vendor->password)){

              $update =  Vendor::where('id',$Vendor->id)->update(['status'=>1,'device_token'=>$request->device_token]);

              $token = $request->device_token;

               $message = 'Welcome Pneck Vendor';

              $message_status = $this->sendToVendorNotification($token, $message);

              $send_arr['message_status'] =  $message_status;

             //    $msg_str='OK loginPASS! ';
              $send_arr['VID'] =$Vendor->id;
              $send_arr['ep_token'] =  $Vendor->ep_token;
              $send_arr['first_name'] =  $Vendor->first_name;
              $send_arr['last_name'] =  $Vendor->last_name;
              $send_arr['email'] =  $Vendor->email;
              $send_arr['mobile'] =  $Vendor->mobile;
			  $send_arr['user_type'] =  $Vendor->user_type;
              
              if($Vendor->profile_image != 'null' || empty($Vendor->profile_image))
               {
                  $send_arr['image'] =  $Vendor->profile_image;
               }
               else{
                  $send_arr['image'] =  'https://bhimbook.org/pneck/employee-img/default.jpg';
               }

              $success['data']=$send_arr;
              return $this->sendResponse($send_arr, 'Login success. ');

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


    public function logout(Request $request)
    {    

        $input=$request->all();
         $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'ep_token' => 'required',
            //'mobile' => 'required',
            
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }
        ////////////////////////////////////
        $emp_row= Vendor::where('id',$input['vendor_id'])->where('ep_token',$input['ep_token'])->first();

        if(!isset($emp_row)){
           $msg= $app_warnings[]='Not Currently Logout!';// mobile
            return $this->appError('System Warning-'.$msg);
        }

            if(isset($emp_row)){                      
            $emp_row->status=0;            
            $emp_row->save();

            $send_arr['success'] =  true;
            $send_arr['status'] =  $emp_row->status;
            return $this->sendResponse($send_arr, 'Vendor logout successfully.');
           }

       /////////////Error if any////////// 
        if(!empty($app_warnings)&&count($app_warnings)>0){
            $msg_str=implode(',', $app_warnings);
        return $this->appError('System Warning-'.$msg_str);

        }else{
         return $this->appError('Sorry, Error in handling Request!');   

        }
        
    }









    /****
    @Resend OTP 
    @1-NOV-2019


    **/

    public function mobile_otp_resend(Request $request){

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
         
          $Vendor=Vendor::where('mobile',$input['mobile_number'])->first();




         if(!isset($Vendor))return $this->appError('mobile not registerd with us! ');
         //////////////////////
        // $app_warnings[]='OTP sent successfully! ';

          if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);
            return $this->appError('SystemMessage-'.$msg_str);
          }


        if(!empty($Vendor)&&$Vendor->mobile==$input['mobile_number']){

          $app_warnings[]='Create forgot_pass otp ';      

            $create_otp=$otp =rand(100000,999999);
                    $mobile_number=$input['mobile_number'];  //  By email:($otp,$mob){

                  $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);


                  //echo $send_new_otp ,':'.$send_new_otp ; die; 


                   $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                  // Insert new otp////////////
                  
                  
                   $Otp_ob=new Vendor_otp;
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






    /////////////

    

   
    

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    { 
       
      $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'aadhar_number' => 'required',
            'pan_number' => 'required',
            'device_id' => 'required',
        ]);


        //7291920268

        $mobile='8826844273';
        $current_time= \Carbon\Carbon::now()->toDateTimeString();
        //////////Send OTP////////////////


        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }
        $validator_error_str='';$app_warnings=[];
         $input = $request->all();

         // $app_warnings[]='Api in testing!  ';
        if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);

             return $this->appError('SystemMessage- '.$msg_str);
        }

         ///////API/////////////////////


 $ValidVendor=Vendor::where('mobile',$input['mobile'])->orWhere('email',$input['email'])->first();

     // By email or Mobile


           if(!empty($ValidVendor)){ 
               
              
           $Vendor_valid=$ValidVendor->toArray();
           
           
             if(!empty($Vendor_valid['mobile_verified_at'])){ 
                 
                  
             $success['is_mobile_verified'] ='yes';
        return $this->sendResponse($success, 'Mobile No. Already Registered');

             }
               
             
                if(empty($Vendor_valid['mobile_verified_at'])||$Vendor_valid['mobile_verified_at']==NULL){
                // Go , Mobile Verfiy Screen.
                  $create_otp=$otp =rand(100000,999999);
                  $mobile_number=$Vendor_valid['mobile']; 
                  
    // $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
                  
    $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                   
                  // Insert new otp////////////
                   $Otp_ob=new Vendor_otp;
                   $Otp_ob->otp_type='for_mobile_verified';
                   $Otp_ob->mobile=$Vendor_valid['mobile'];//RegisteredMobile
                   $Otp_ob->otp=$create_otp;
                   $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
                    $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
                    $Otp_ob->save();
                    // Return True with User-Basic Detail - Move Toward OTP Screen. 
                    $success['name'] =  $Vendor_valid['first_name']; 
                    $success['mobile'] = $Vendor_valid['mobile'];
                    $success['is_mobile_verified'] ='no';
                     return $this->sendResponse($success, 'Register successfully.!!');
                 

            }
            
      
           } 


         $input['password'] = bcrypt($input['password']);
         //print_r($input); die;

         #$input['first_name']='RohitVendor';  // ep_token
         $mToken=rand(100000,999999).$input['password'];
         $input['ep_token']=md5($mToken);
        $Customer_ob=Vendor::create($input);
        ///////////////Send Custom ResponseOfRegister//////////////////////////

        /////////////////////////////////


        $create_otp=$otp =rand(100000,999999);
        $mobile_number=$Customer_ob['mobile'];
        

    $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
    
    $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
    
                  // Insert new otp////////////
                   $Otp_ob=new Vendor_otp;
                   $Otp_ob->otp_type='for_mobile_verified';
                   $Otp_ob->mobile=$Customer_ob['mobile'];
                   $Otp_ob->otp=$create_otp;
                   $Otp_ob->create_time=$current_time;
                   $Otp_ob->expire_time=$expTime;
                   $Otp_ob->save();
                    
        $success['name'] =  $Customer_ob->first_name;
        $success['mobile'] =  $Customer_ob->mobile;
        $success['is_mobile_verified'] ='yes';

        $login = Vendor::where('mobile',$mobile_number)->update(['kyc_approval' => 'awaited','mobile_verified_at'=>'yes']);

        return $this->sendResponse($success, 'Register successfully.'); 

       
       
////////////////////////

    }
    
    public function signup(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'aadhar_number' => 'required',
            'user_type' => 'required',
            'device_id' => 'required',
        ]);


        //7291920268

        $mobile='8826844273';
        $current_time= \Carbon\Carbon::now()->toDateTimeString();
        //////////Send OTP////////////////


        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }
        $validator_error_str='';$app_warnings=[];
         $input = $request->all();

         // $app_warnings[]='Api in testing!  ';
        if(!empty($app_warnings)){
            $msg_str=implode(',', $app_warnings);

             return $this->appError('SystemMessage- '.$msg_str);
        }
        try {

        $registerVendor = Vendor::where('mobile',$request->mobile)->first();
        if($registerVendor){
            if(($registerVendor->mobile_verified_at) && ($registerVendor->mobile_verified_at != NULL)){
                $success['is_mobile_verified'] = 0;
                
                
                //new code added by riz
                $response = [
                'success' => false,
                'message' => 'Mobile No. Already Registered',
                'data'    => $success,
            ];
        /////////
        $send_response=array('response'=>$response);
        return response()->json($send_response, 200);
        //new code added by riz
               //old method 
                // return $this->sendResponse($success, 'Mobile No. Already Registered');
            }
            // else{
            //     if($registerVendor->mobile_verified_at == NULL){
            //     // Go , Mobile Verfiy Screen.
            //         $create_otp = rand(100000,999999);
            //         $mobile_number=$request->mobile; 
                  
            //         $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
                  
            //         $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
                   
            //         // Insert new otp////////////
            //         $Otp_ob=new Vendor_otp;
            //         $Otp_ob->otp_type='for_mobile_verified';
            //         $Otp_ob->mobile = $request->mobile;//RegisteredMobile
            //         $Otp_ob->otp=$create_otp;
            //         $Otp_ob->create_time=$current_time; //'2019-08-29 02:06:09';
            //         $Otp_ob->expire_time=$expTime; //'2019-08-29 02:16:09';
            //         $Otp_ob->save();
            //         // Return True with User-Basic Detail - Move Toward OTP Screen. 
            //         $success['name'] =  $request->first_name;
            //         $success['mobile'] =  $request->mobile;
            //         $success['is_mobile_verified'] ='no';
                    
            //         $login = Vendor::where('mobile',$mobile_number)->update(['kyc_approval' => 'awaited','mobile_verified_at'=>$current_time]);
                    
            //         return $this->sendResponse($success, 'Register successfully.!!');
            //     }
            // }
        }else{
            $password = bcrypt($request->password);
            //$input['password'] = bcrypt($input['password']);
         
         $mToken=rand(100000,999999).$password;
         //$input['ep_token']=md5($mToken);
        //$Customer_ob = Vendor::create($input);
        $createVendor = new Vendor;
        $createVendor->aadhar_number = $request->aadhar_number;
        // $createVendor->pan_number = $request->pan_number;
        $createVendor->first_name = $request->first_name;
        $createVendor->last_name = $request->last_name;
        $createVendor->email = $request->email;
        $createVendor->mobile = $request->mobile;
        $createVendor->password = $password;
        $createVendor->ep_token = md5($mToken);
		$createVendor->user_type = $request->user_type;
        $createVendor->kyc_approval = 'awaited';
        // $createVendor->mobile_verified_at = $current_time;
        $createVendor->save();
        ///////////////Send Custom ResponseOfRegister//////////////////////////

        /////////////////////////////////


        $create_otp = rand(100000,999999);
        $mobile_number=$request->mobile;
        

    $send_new_otp=$this->_otpsend_mobile_verify($create_otp,$mobile_number);
    
    $expTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_time)));
    
                  // Insert new otp////////////
                   $Otp_ob=new Vendor_otp;
                   $Otp_ob->otp_type='for_mobile_verified';
                   $Otp_ob->mobile=$request->mobile;
                   $Otp_ob->otp=$create_otp;
                   $Otp_ob->create_time=$current_time;
                   $Otp_ob->expire_time=$expTime;
                   $Otp_ob->save();
                    
        $success['name'] =  $request->first_name;
        $success['mobile'] =  $request->mobile;
        $success['is_mobile_verified'] =0;
		$success['user_type'] = $request->user_type;

        //$login = Vendor::where('mobile',$mobile_number)->update(['kyc_approval' => 'awaited','mobile_verified_at'=>'yes']);

            return $this->sendResponse($success, 'Register successfully.'); 
        }
          
        } catch (\Throwable $th) {
          return response()->json(['message'=> 'something went wrong'.$th], 500);
        }
        
    }

    public function show_services(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'ep_token' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

          $get_vid=$request->vendor_id;
          $Vendor=Vendor::find($get_vid);
        /////////////Systme Validation:: match UID, TOKEN////////////
           if(!isset($Vendor)){
            $app_warnings[]='Wrong Vendor ID! ';  
           }

            if(isset($Vendor)&&!empty($Vendor->ep_token)&& ($request->ep_token != $Vendor->ep_token)){
              $app_warnings[]='Token not matched!';
            }

          $VendorServicesInfo = Vendor_skils::where('vendor_id', $get_vid)->first();
          
          if($VendorServicesInfo == '')
          {
            return response()->json(['data'=>[], 'message'=>'Please create Vendor setup Services.', 'success'=>'false']);
          }

          /*$professions = \DB::table('vendor_services')->select('id', 'title')->where('id','!=',$VendorServicesInfo->service_id)->get();
          $getprofessions = \DB::table('vendor_services')->select('id', 'title')->where('id',$VendorServicesInfo->service_id)->first();
  
          $professionsData = array_merge([$professions,$getprofessions]);*/
         // print_r($professions->toArray()); exit();
           $vendorService = [

            'vendor_id' => $VendorServicesInfo->vendor_id,            
            'primary_profession' => $VendorServicesInfo->service_id,// out of 3
            'profession_sub_category' => $VendorServicesInfo->subcat_id,// out of 3            
            'catalogue' => $VendorServicesInfo->catalogue_id,// out of 3
            'state' => $VendorServicesInfo->state_id,
            'city' => $VendorServicesInfo->city_id, 
            'vendor_latitude' => $VendorServicesInfo->vendor_latitude,
            'vendor_longitude' => $VendorServicesInfo->vendor_longitude,
            'days' => $VendorServicesInfo->vendor_data,
            'opening_time' => $VendorServicesInfo->opening_time,
            'closing_time' => $VendorServicesInfo->closing_time,
            'vendor_type' => $VendorServicesInfo->vendor_type,
            'address' => $VendorServicesInfo->address1,
            'shop_title' => $VendorServicesInfo->shop_title
            
        ];

          $ImageVendor = vendor_service_images::where('vendor_id', $get_vid)->get();

                foreach ($ImageVendor as $value) {
                    $ImageData[] = $value->service_image;
                }
          $vendorService['image'] = $ImageData;
         // return response()->json(['data'=>$Skill,'message'=>'Service Created Successfully', 'success'=>true]);

          return $this->sendResponse($vendorService, 'successfully.');
    }

    public function uploadImage(Request $request)
    {
      $input=$request->all();
      try {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
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
        
        $Vendor=Vendor::where('id', $request->vendor_id)->first();

        if($Vendor->profile_image!='')
        {            
              $imagePath = $Vendor->profile_image;
              $s = explode("/",$imagePath);
              \Storage::disk('vendor')->delete($s[5]);           
        }

        if($Vendor->id ?? 'qwer'==$request->vendor_id){  
          $imgname = '';
          if($request->hasFile('image'))
          { 
              $file = $request->file('image');
              $filename = $file->getClientOriginalName(); 
              $extention = $file->getClientOriginalExtension(); 
              $imgname = uniqid().$filename; 
              $destinationPath = storage_path('/vendor_img/'); //print_r($destinationPath); exit();
              $file->move($destinationPath, $imgname);
          }
          //echo $imgname; die('im');
          $Vendor->profile_image = url('/').'/storage/vendor_img/'.$imgname;
          $Vendor->save();
          $data = ['profile_image' => $Vendor->profile_image];
          return response()->json(['data'=>$data,'message'=>'Profile Successfully Updated', 'success'=>true]);
        }
       // echo "<pre>"; print_r($Employee->toArray()); exit();
        return response()->json(['data'=>(object)[], 'message'=>'This Vendor is not exist.', 'success'=>false]);
        
      } catch (Exception $e) {
          return response()->json(['data'=>(object)[], 'message'=>'Something went wrong'.$e, 'success'=>false]);
      }
    }

    public function deleteImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'ep_token' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

          $get_vid=$request->vendor_id;
          $Vendor=Vendor::find($get_vid);
        /////////////Systme Validation:: match UID, TOKEN////////////
           if(!isset($Vendor)){
            $app_warnings[]='Wrong Vendor ID! ';  
           }

            if(isset($Vendor)&&!empty($Vendor->ep_token)&& ($request->ep_token != $Vendor->ep_token)){
              $app_warnings[]='Token not matched!';
            }

          $ImageVendor = vendor_service_images::where('vendor_id', $get_vid)->where('service_image',$request->image)->get();

                foreach ($ImageVendor as $value) {                   
                  $imagePath = $value->service_image;
                  $s = explode("/",$imagePath);
                  \Storage::disk('vendor_service_img')->delete($s[5]);
                    vendor_service_images::where('service_image', $value->service_image)->delete();
                }

         return response()->json(['success'=>true,'message'=>'Image Deleted Successfully']);

          //return $this->sendResponse($vendorService, 'successfully.');
    }
    
    
   public function searchList(Request $request)
    {
      $input=$request->all();
      $title = $input['title'];
      $Vendor_subcat_title = Vendor_subcat::select('*')
      ->where('title','LIKE', "%$title%")->get()->toArray();


      if(isset($Vendor_subcat_title)){
        $resp_arr=[]; // 
        $resp_arr['searchlist'] =$Vendor_subcat_title;
    return $this->sendResponse($resp_arr, 'Successful! ');
     
    }else{
      $msg_str='Sorry, Please try later';
      return $this->appError('ApplicationMessage-'.$msg_str);
    }
    }


       public function show_services_gallery(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error-', $validator->errors());       
        }

          $ImageVendor = vendor_service_images::where('vendor_id', $input['vendor_id'])->get();

                foreach ($ImageVendor as $value) {
                    $ImageData[] = $value->service_image;
                }
          $vendorService['image'] = $ImageData;
        
          return $this->sendResponse($vendorService, 'successfully.');
    }
    
     public function VendorDetail(Request $request){
      $input = $request->all();
      $Vendor_skils = Vendor_skils::where('vendor_id', $input['vendor_id'])->first();
      return response()->json(['data'=>$Vendor_skils,'message'=>'vendor data fetch..', 'success'=>true]); 
    }
}
