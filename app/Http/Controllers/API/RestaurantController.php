<?php

// API CREATE BY BILAL

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Restaurant_cate;
use App\Restaurant_dish;
use App\Restaurant_order;
use App\Restaurant;
use App\Customer;
use App\Restaurant_order_item;
use App\UserAddress;
use App\UserAddressWork;
use App\Wallet;
use App\WalletTranscation;
use App\Booking;
use App\Employee;
use App\ShopModel;
use App\ShopModel_Item;
use App\BookingRequestModel;
use App\ContactModel;
use App\Vendor;
use App\OrderCancel;
use App\RatingModel;
use DB;
use Validator;

class RestaurantController extends BaseController
{
    
    // SMS FUNCTION For All
        public function smsSendAllFunction($mobile,$msg){
                $url = "http://5.189.187.82/sendsms/bulk.php?username=EPKamitkumar&password=amit87495&type=TEXT&sender=CPNECK&mobile=".$mobile."&message=".$msg;
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
    }
    
    //webservice to fetch the vehicle type
	public function list(){
	  
	  try{
          //Query to fetch all the vehicle types
		  $Restaurant_cate = Restaurant_cate::select('*')->orderBy('id','asc')->get()->toArray();
          
		  if(!empty($Restaurant_cate)){
			return response()->json(['data'=>$Restaurant_cate,'message'=>'Restaurant_cate Types Found', 'success'=>true]);  
	  	  }
		  else{
			return response()->json(['data'=>(object)[], 'message'=>'No Restaurant_cate Type Found.', 'success'=>true]);  
		  }
	    }
		catch (Exception $e) {
			return response()->json(['data'=>(object)[], 'message'=>'Sorry Something Went wrong. Please try again.', 'success'=>false]);
	    }	  
		
    }
    
    public function list_dish(Request $request){
	  
        try{

          $input = $request->all();
          $get_vid=$input['user_id'];
          //Query to fetch all the vehicle types
          $Restaurant_dish =  Restaurant_dish::where('user_id', $get_vid)->get()->toArray();
            
            if(!empty($Restaurant_dish)){
              return response()->json(['data'=>$Restaurant_dish,'message'=>'Restaurant_Dish Types Found', 'success'=>true]);  
              }
            else{
              return response()->json(['data'=>(object)[], 'message'=>'No Restaurant_Dish Type Found.', 'success'=>true]);  
            }
          }
          catch (Exception $e) {
              return response()->json(['data'=>(object)[], 'message'=>'Sorry Something Went wrong. Please try again.', 'success'=>false]);
          }	  
          
    }
    
  public function list_dish_add(Request $request){

    $input = $request->all();

    $validator = Validator::make($input, [
        'user_id' => 'required',
        'res_id' => 'required',
        'name' => 'required',
        'image' => 'required',
        'category' => 'required',
        'price' => 'required',
        'discount' => 'required',
        'description' => 'required',
        'ingredients' => 'required',
    ]);

    
    if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
    }

      $Restaurant_dish= new Restaurant_dish;
      $Restaurant_dish->user_id=$input['user_id'];
      $Restaurant_dish->res_id=$input['res_id'];
      $Restaurant_dish->name=$input['name'];
      $Restaurant_dish->image=$input['image'];
      $Restaurant_dish->category=$input['category'];
      $Restaurant_dish->price=$input['price'];
      $Restaurant_dish->discount=$input['discount'];
      $Restaurant_dish->description=$input['description'];
      $Restaurant_dish->discount_available=$input['discount_available'];
      $Restaurant_dish->ingredients=$input['ingredients'];
      $Restaurant_dish->save();

    $imgname = '';
    if($request->hasFile('image'))
    { 
        $file = $request->file('image');
        $filename = $file->getClientOriginalName(); 
        $extention = $file->getClientOriginalExtension(); 
        $imgname = uniqid().$filename; 
        $destinationPath = public_path(). '/admin_logos/'; //print_r($destinationPath); exit();
        $file->move($destinationPath, $imgname);

        // $Restaurant_dish->user_id = $get_vid;
        $Restaurant_dish->image = url('/').'/admin_logos/'.$imgname;
        $Restaurant_dish->save();
    }       

    return response()->json(['data'=>$Restaurant_dish,'message'=>'Service Created Successfully', 'success'=>true]);

}

 public function list_dish_add_edit(Request $request){

    $input = $request->all();
    $id = $input['id'];

    $updateRestaurant_dish = Restaurant_dish::where('id', $id)->update([
      'user_id' => $input['user_id'],
      'res_id' => $input['res_id'],
      'name' => $input['name'],
      'category' => $input['category'],
      'price' => $input['price'],
      'discount' => $input['discount'],
      'description' => $input['description'],
      'discount_available' => $input['discount_available'],
      'ingredients' => $input['ingredients'],
      ]);
  
      $imgname = '';
      if($request->hasFile('image'))
      { 
          $file = $request->file('image');
          $filename = $file->getClientOriginalName(); 
          $extention = $file->getClientOriginalExtension(); 
          $imgname = uniqid().$filename; 
          $destinationPath = public_path(). '/admin_logos/'; //print_r($destinationPath); exit();
          $file->move($destinationPath, $imgname);
  
          $updateRestaurant = Restaurant_dish::where('id', $id)->update([
            'image' => $imgname = url('/').'/admin_logos/'.$imgname
            ]);
      }
  
      return response()->json(['message'=>'Service Updated Successfully', 'success'=>true]);
 }
    
  public function list_dish_edit_without_img(Request $request){

    $input = $request->all();
    $id = $input['id'];

    $updateRestaurant_dish = Restaurant_dish::where('id', $id)->update([
      'user_id' => $input['user_id'],
      'res_id' => $input['res_id'],
      'name' => $input['name'],
      'image' => $input['image'],
      'category' => $input['category'],
      'price' => $input['price'],
      'discount' => $input['discount'],
      'description' => $input['description'],
      'discount_available' => $input['discount_available'],
      'ingredients' => $input['ingredients'],
      ]);
  
      return response()->json(['message'=>'Service Updated Successfully', 'success'=>true]);
 }

 public function list_dish_add_delete(Request $request){

  $input = $request->all();
  $id = $input['id'];

    $updateRestaurant_dish = Restaurant_dish::where('id', $id)->delete();

    return response()->json(['message'=>'Service Delete Successfully', 'success'=>true]);
}

    
  public function restaurant_detail(Request $request)
  {
      $input = $request->all();

      $validator = Validator::make($input, [
          'user_id' => 'required',
          'name' => 'required',
          'address' => 'required',
          'phone' => 'required',
          'mobile' => 'required',
          'lati' => 'required',
          'longi' => 'required',
          'description' => 'required',
          'image' => 'required',
          'min_order' => 'required',
          'delivery_time' => 'required',
          'discount' => 'required',
          'discount_min' => 'required',
          'discount_available' => 'required'
          
      ]);

      
      if($validator->fails()){
          return $this->sendError('Validation Error.', $validator->errors());       
      }

      $get_vid=$input['user_id'];

      $Restaurant = Restaurant::where('user_id', $get_vid)->first();

      if($Restaurant==''){

        $Restaurant= new Restaurant;
        // $Restaurant->user_id=$input['user_id'];
        $Restaurant->name=$input['name'];
        $Restaurant->address=$input['address'];
        $Restaurant->phone=$input['phone'];
        $Restaurant->mobile=$input['mobile'];
        $Restaurant->lati=$input['lati'];
        $Restaurant->longi=$input['longi'];
        $Restaurant->description=$input['description'];
        $Restaurant->min_order=$input['min_order'];
        $Restaurant->delivery_time=$input['delivery_time'];
        $Restaurant->discount=$input['discount'];
        $Restaurant->discount_min=$input['discount_min'];
        $Restaurant->discount_available=$input['discount_available'];
        $Restaurant->save();

      $imgname = '';
      if($request->hasFile('image'))
      { 
          $file = $request->file('image');
          $filename = $file->getClientOriginalName(); 
          $extention = $file->getClientOriginalExtension(); 
          $imgname = uniqid().$filename; 
          $destinationPath = public_path(). '/admin_logos/'; //print_r($destinationPath); exit();
          $file->move($destinationPath, $imgname);

          $Restaurant->user_id = $get_vid;
          $Restaurant->image = url('/').'/admin_logos/'.$imgname;
          $Restaurant->save();
      }       

      // $res = Restaurant::create($input);

      return response()->json(['data'=>$Restaurant,'message'=>'Service Created Successfully', 'success'=>true]);

  }
  else{

      $updateRestaurant = Restaurant::where('user_id', $get_vid)->update([
      'name' => $input['name'],
      'address' => $input['address'],
      'phone' => $input['phone'],
      'mobile' => $input['mobile'],
      'lati' => $input['lati'],
      'longi' => $input['longi'],
      'description' => $input['description'],
      'min_order' => $input['min_order'],
      'delivery_time' => $input['delivery_time'],
      'discount' => $input['discount'],
      'discount_min' => $input['discount_min'],
      'discount_available' => $input['discount_available']
      ]);

      $imgname = '';
      if($request->hasFile('image'))
      { 
          $file = $request->file('image');
          $filename = $file->getClientOriginalName(); 
          $extention = $file->getClientOriginalExtension();
          $imgname = uniqid().$filename; 
          $destinationPath = public_path(). '/admin_logos/'; //print_r($destinationPath); exit();
          $file->move($destinationPath, $imgname);

          $updateRestaurant = Restaurant::where('user_id', $get_vid)->update([
            'image' => $imgname = url('/').'/admin_logos/'.$imgname
            ]);
      }

      return response()->json(['message'=>'Service Updated Successfully', 'success'=>true]);
  }

  }

  public function restaurant_shop(Request $request){
    try{

      $input = $request->all();
      $get_vid=$input['user_id'];
      //Query to fetch all the vehicle types
      $Restaurant = Restaurant::where('user_id', $get_vid)->first();  //Restaurant::select('*')->where('user_id',$get_vid)->get()->toArray();  //DB::table('restaurant_dishs')->get()->toArray();
      
      if(!empty($Restaurant)){
        return response()->json(['data'=>$Restaurant,'message'=>'Restaurant Types Found', 'success'=>true]);  
        }
      else{
        return response()->json(['data'=>(object)[], 'message'=>'No Restaurant Type Found.', 'success'=>false]);  
      }
    }
    catch (Exception $e) {
        return response()->json(['data'=>(object)[], 'message'=>'Sorry Something Went wrong. Please try again.', 'success'=>false]);
    }	  
  }
    
    // User Restaurant List
  public function getcategory()
  {
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];
      $result = Restaurant_cate::all();
      if(!$result)
      {
          $error_code = 3;
          $error_string = "Problem with server.";
      }
      else
      {
          $count = count($result);
          if($count == 0)
          {
              $error_code = 4;
              $error_string = 'No data found.';
          }
          else
          {

              $i='ajk';

              for($i=0;count($result)>$i; $i++)
              {
                  $data[] = $result[$i];
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }


  public function getproducts(Request $request)
  {
	    $requestData = $request->all();

		$validator = Validator::make($requestData, [
		  'latitude' => 'required',
		  'longitude' => 'required'
		]);
		
      if($validator->fails()){
          return $this->sendError('Validation Error.', $validator->errors());       
      }
	  
	  $lat = $request->latitude; 
	  $long = $request->longitude;
	  
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];

    //$result = Restaurant::all();
	 $result = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(lati) ) * cos( radians(longi) - radians($long)) + sin(radians($lat)) *sin(radians(lati)) )) as distance FROM restaurants HAVING distance < 10");
	 
      if(!$result)
      {
          $error_code = 3;
          $error_string = "Problem with server.";
      }
      else
      {
          $count = count($result);
		  
          if($count == 0)
          {
              $error_code = 4;
              $error_string = 'No data found.';
          }
          else
          {
              foreach ($result as $res)
              {
				  
                  $row1 = (array)$res;
				  
                  $result1 = Restaurant_cate::where('id',$res->cat_id)->get();
                //  var_dump($result1); die;
                  if(!$result1)
                  {
                      $error_code = 3;
                      $error_string = "Problem with server.";
                  }
                  else
                  {
                      //$count2 = count($result1);
                      if(empty($result1)){
                          $row1['category'] = "";
                      }else{
						  
                          foreach ($result1 as $res1)
                          {
							   
                              $row1['category'] = $res1->name;
                          }
                      }

                  }
                  $data[] = $row1;
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }

  public function getclosedproducts()
  {
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];
      $result = Restaurant::where('isopen',1)->get();
      if(!$result)
      {
          $error_code = 3;
          $error_string = "Problem with server.";
      }
      else
      {
          $count = count($result);
          if($count == 0)
          {
              $error_code = 4;
              $error_string = 'No data found.';
          }
          else
          {
              foreach ($result as $res)
              {
                  $row1=$res;

                  $result1 = $result = Restaurant_cate::where('id',$res->cat_id)->get();

                  if(!$result1)
                  {
                      $error_code = 3;
                      $error_string = "Problem with server.";
                  }
                  else
                  {
                      $count2 = count($result1);
                      if($count2 == 0){
                          $row1['cat_id'] = "";
                      }else{
                          foreach ($result1 as $res1)
                          {
                              $row1['category_name'] = $res1->name;

                          }
                      }

                  }
                  $data[] = $row1;
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }

  public function getopenproductsbycosthightolow(Request $request)
  {
      
      $requestData = $request->all();

		$validator = Validator::make($requestData, [
		  'latitude' => 'required',
		  'longitude' => 'required'
		]);
		
      if($validator->fails()){
          return $this->sendError('Validation Error.', $validator->errors());       
      }
	  
	  $lat = $request->latitude; 
	  $long = $request->longitude;
      
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];
      
       $result = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(lati) ) * cos( radians(longi) - radians($long)) + sin(radians($lat)) *sin(radians(lati)) )) as distance FROM restaurants where `isopen`= '1' HAVING distance < 10 ORDER BY min_order desc");
      
//       $result = Restaurant::where('isopen',1)->orderBy('min_order','desc')->get();
       
      if(!$result)
      {
          $error_code = 3;
          $error_string = "Problem with server.";
      }
      else
      {
          $count = count($result);
		  
          if($count == 0)
          {
              $error_code = 4;
              $error_string = 'No data found.';
          }
          else
          {
              foreach ($result as $res)
              {
				  
                  $row1 = (array)$res;
				  
                  $result1 = Restaurant_cate::where('id',$res->cat_id)->get();
                //  var_dump($result1); die;
                  if(!$result1)
                  {
                      $error_code = 3;
                      $error_string = "Problem with server.";
                  }
                  else
                  {
                      //$count2 = count($result1);
                      if(empty($result1)){
                          $row1['category'] = "";
                      }else{
						  
                          foreach ($result1 as $res1)
                          {
							   
                              $row1['category'] = $res1->name;
                          }
                      }

                  }
                  $data[] = $row1;
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }

  public function getopenproductsbycostlowtohigh(Request $request)
  {
        $requestData = $request->all();

		$validator = Validator::make($requestData, [
		  'latitude' => 'required',
		  'longitude' => 'required'
		]);
		
      if($validator->fails()){
          return $this->sendError('Validation Error.', $validator->errors());       
      }
	  
	  $lat = $request->latitude; 
	  $long = $request->longitude;
      
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];
      
       $result = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(lati) ) * cos( radians(longi) - radians($long)) + sin(radians($lat)) *sin(radians(lati)) )) as distance FROM restaurants where `isopen`= '1' HAVING distance < 10 ORDER BY min_order asc");
      
//       $result = Restaurant::where('isopen',1)->orderBy('min_order','asc')->get();
      
      if(!$result)
      {
          $error_code = 3;
          $error_string = "Problem with server.";
      }
      else
      {
          $count = count($result);
		  
          if($count == 0)
          {
              $error_code = 4;
              $error_string = 'No data found.';
          }
          else
          {
              foreach ($result as $res)
              {
				  
                  $row1 = (array)$res;
				  
                  $result1 = Restaurant_cate::where('id',$res->cat_id)->get();
                //  var_dump($result1); die;
                  if(!$result1)
                  {
                      $error_code = 3;
                      $error_string = "Problem with server.";
                  }
                  else
                  {
                      //$count2 = count($result1);
                      if(empty($result1)){
                          $row1['category'] = "";
                      }else{
						  
                          foreach ($result1 as $res1)
                          {
							   
                              $row1['category'] = $res1->name;
                          }
                      }

                  }
                  $data[] = $row1;
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }

  public function getopenproductsbydeliverytime(Request $request)
  {
        $requestData = $request->all();

		$validator = Validator::make($requestData, [
		  'latitude' => 'required',
		  'longitude' => 'required'
		]);
		
      if($validator->fails()){
          return $this->sendError('Validation Error.', $validator->errors());       
      }
	  
	  $lat = $request->latitude; 
	  $long = $request->longitude;
      
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];
      
       $result = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(lati) ) * cos( radians(longi) - radians($long)) + sin(radians($lat)) *sin(radians(lati)) )) as distance FROM restaurants where `isopen`= '1' HAVING distance < 10 ORDER BY delivery_time asc");
      
//       $result = Restaurant::where('isopen',1)->orderBy('delivery_time','asc')->get();
      if(!$result)
      {
          $error_code = 3;
          $error_string = "Problem with server.";
      }
      else
      {
          $count = count($result);
		  
          if($count == 0)
          {
              $error_code = 4;
              $error_string = 'No data found.';
          }
          else
          {
              foreach ($result as $res)
              {
				  
                  $row1 = (array)$res;
				  
                  $result1 = Restaurant_cate::where('id',$res->cat_id)->get();
                //  var_dump($result1); die;
                  if(!$result1)
                  {
                      $error_code = 3;
                      $error_string = "Problem with server.";
                  }
                  else
                  {
                      //$count2 = count($result1);
                      if(empty($result1)){
                          $row1['category'] = "";
                      }else{
						  
                          foreach ($result1 as $res1)
                          {
							   
                              $row1['category'] = $res1->name;
                          }
                      }

                  }
                  $data[] = $row1;
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }

  public function getopenproductsbyoffer(Request $request)
  {
         $requestData = $request->all();

		$validator = Validator::make($requestData, [
		  'latitude' => 'required',
		  'longitude' => 'required'
		]);
		
      if($validator->fails()){
          return $this->sendError('Validation Error.', $validator->errors());       
      }
	  
	  $lat = $request->latitude; 
	  $long = $request->longitude;
      
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];
      
       $result = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(lati) ) * cos( radians(longi) - radians($long)) + sin(radians($lat)) *sin(radians(lati)) )) as distance FROM restaurants where `isopen`= '1' HAVING distance < 10 ORDER BY discount asc");
      
//       $result = Restaurant::where('isopen',1)->orderBy('discount','asc')->get();
      if(!$result)
      {
          $error_code = 3;
          $error_string = "Problem with server.";
      }
      else
      {
          $count = count($result);
		  
          if($count == 0)
          {
              $error_code = 4;
              $error_string = 'No data found.';
          }
          else
          {
              foreach ($result as $res)
              {
				  
                  $row1 = (array)$res;
				  
                  $result1 = Restaurant_cate::where('id',$res->cat_id)->get();
                //  var_dump($result1); die;
                  if(!$result1)
                  {
                      $error_code = 3;
                      $error_string = "Problem with server.";
                  }
                  else
                  {
                      //$count2 = count($result1);
                      if(empty($result1)){
                          $row1['category'] = "";
                      }else{
						  
                          foreach ($result1 as $res1)
                          {
							   
                              $row1['category'] = $res1->name;
                          }
                      }

                  }
                  $data[] = $row1;
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }

  public function getopenproductsbyrating(Request $request)
  {
        $requestData = $request->all();

		$validator = Validator::make($requestData, [
		  'latitude' => 'required',
		  'longitude' => 'required'
		]);
		
      if($validator->fails()){
          return $this->sendError('Validation Error.', $validator->errors());       
      }
	  
	  $lat = $request->latitude; 
	  $long = $request->longitude;
      
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];
      
       $result = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(lati) ) * cos( radians(longi) - radians($long)) + sin(radians($lat)) *sin(radians(lati)) )) as distance FROM restaurants where `isopen`= '1' HAVING distance < 10 ORDER BY rating desc");
      
//       $result = Restaurant::where('isopen',1)->orderBy('rating','desc')->get();
      if(!$result)
      {
          $error_code = 3;
          $error_string = "Problem with server.";
      }
      else
      {
          $count = count($result);
		  
          if($count == 0)
          {
              $error_code = 4;
              $error_string = 'No data found.';
          }
          else
          {
              foreach ($result as $res)
              {
				  
                  $row1 = (array)$res;
				  
                  $result1 = Restaurant_cate::where('id',$res->cat_id)->get();
                //  var_dump($result1); die;
                  if(!$result1)
                  {
                      $error_code = 3;
                      $error_string = "Problem with server.";
                  }
                  else
                  {
                      //$count2 = count($result1);
                      if(empty($result1)){
                          $row1['category'] = "";
                      }else{
						  
                          foreach ($result1 as $res1)
                          {
							   
                              $row1['category'] = $res1->name;
                          }
                      }

                  }
                  $data[] = $row1;
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }

  public function getopenproductsbyrelevance(Request $request)
  {
        $requestData = $request->all();

		$validator = Validator::make($requestData, [
		  'latitude' => 'required',
		  'longitude' => 'required'
		]);
		
      if($validator->fails()){
          return $this->sendError('Validation Error.', $validator->errors());       
      }
	  
	  $lat = $request->latitude; 
	  $long = $request->longitude;
      
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];
      
       $result = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(lati) ) * cos( radians(longi) - radians($long)) + sin(radians($lat)) *sin(radians(lati)) )) as distance FROM restaurants where `isopen`= '1' HAVING distance < 10 ");
      
//       $result = Restaurant::where('isopen',1)->get();
      if(!$result)
      {
          $error_code = 3;
          $error_string = "Problem with server.";
      }
      else
      {
          $count = count($result);
		  
          if($count == 0)
          {
              $error_code = 4;
              $error_string = 'No data found.';
          }
          else
          {
              foreach ($result as $res)
              {
				  
                  $row1 = (array)$res;
				  
                  $result1 = Restaurant_cate::where('id',$res->cat_id)->get();
                //  var_dump($result1); die;
                  if(!$result1)
                  {
                      $error_code = 3;
                      $error_string = "Problem with server.";
                  }
                  else
                  {
                      //$count2 = count($result1);
                      if(empty($result1)){
                          $row1['category'] = "";
                      }else{
						  
                          foreach ($result1 as $res1)
                          {
							   
                              $row1['category'] = $res1->name;
                          }
                      }

                  }
                  $data[] = $row1;
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }

  public function getopenproductsbycategory(Request $request)
  {
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];
      if(!isset($request->id))
      {
          $error_code = 1;
          $error_string = 'Variables not set';
      }
      else {
          $result = Restaurant::where('isopen', 1)->where('cat_id', $request->id)->get();
          if (!$result) {
              $error_code = 3;
              $error_string = "Problem with server.";
          } else {
              $count = count($result);
              if ($count == 0) {
                  $error_code = 4;
                  $error_string = 'No data found.';
              } else {
                  foreach ($result as $res) {
                      $row1 = $res;

                      $result1 = $result = Restaurant_cate::where('id', $res->cat_id)->get();

                      if (!$result1) {
                          $error_code = 3;
                          $error_string = "Problem with server.";
                      } else {
                          $count2 = count($result1);
                          if ($count2 == 0) {
                              $row1['category_name'] = "";
                          } else {
                              foreach ($result1 as $res1) {
                                  $row1['category_name'] = $res1->name;

                              }

                          }

                      }
                      $data[] = $row1;
                  }
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }

  public function getclosedproductsbycategory(Request $request)
  {
      $error_code 	= 0;
      $error_string 	= "";
      $data 			= [];
      if(!isset($request->id))
      {
          $error_code = 1;
          $error_string = 'Variables not set';
      }
      else {
          $result = Restaurant::where('isopen', 0)->where('cat_id', $request->id)->get();
          if (!$result) {
              $error_code = 3;
              $error_string = "Problem with server.";
          } else {
              $count = count($result);
              if ($count == 0) {
                  $error_code = 4;
                  $error_string = 'No data found.';
              } else {
                  foreach ($result as $res) {
                      $row1 = $res;

                      $result1 = $result = Restaurant_cate::where('id', $res->cat_id)->get();

                      if (!$result1) {
                          $error_code = 3;
                          $error_string = "Problem with server.";
                      } else {
                          $count2 = count($result1);
                          if ($count2 == 0) {
                              $row1['category_name'] = "";
                          } else {
                              foreach ($result1 as $res1) {
                                  $row1['category_name'] = $res1->name;

                              }

                          }

                      }
                      $data[] = $row1;
                  }
              }
          }
      }
      return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }
    
      public function getdishlist(Request $request)
  {
	  
        try{

          $input = $request->all();
          $res_id = $input['res_id'];
          //Query to fetch all the vehicle types
          $Restaurant_dish =  Restaurant_dish::where('res_id', $res_id)->get()->toArray();
            
            if(!empty($Restaurant_dish)){
              return response()->json(['data'=>$Restaurant_dish,'message'=>'Restaurant_Dish Types Found', 'success'=>true]);  
              }
            else{
              return response()->json(['data'=>(object)[], 'message'=>'No Restaurant_Dish Type Found.', 'success'=>true]);  
            }
          }
          catch (Exception $e) {
              return response()->json(['data'=>(object)[], 'message'=>'Sorry Something Went wrong. Please try again.', 'success'=>false]);
          }	  
          
  }
    
    public function getproductssearch(Request $request){
    $error_code 	= 0;
    $error_string 	= "";
    $data 			= [];

    $result = Restaurant::where('name','like',$request->name.'%')
                          ->orWhere('address','like',$request->name.'%')->get();
    if(!$result)
    {
        $error_code = 3;
        $error_string = "Problem with server.";
    }
    else
    {
        $count = count($result);
        if($count == 0)
        {
            $error_code = 4;
            $error_string = 'No data found.';
        }
        else
        {
            foreach ($result as $res)
            {
                $row1=$res;

                $result1 = $result = Restaurant_cate::where('id',$res->cat_id)->get();

                if(!$result1)
                {
                    $error_code = 3;
                    $error_string = "Problem with server.";
                }
                else
                {
                    $count2 = count($result1);
                    if($count2 == 0){
                        $row1['category'] = "";
                    }else{
                        foreach ($result1 as $res1)
                        {
                            $row1['category'] = $res1->name;

                        }
                    }

                }
                $data[] = $row1;
            }
        }
    }
    return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }
    
  public function getorder(Request $request){

        $input = $request->all();
      
        if($input['success']=='Success'){
      
        date_default_timezone_set('Asia/Kolkata');

        $Restaurant_order = new Restaurant_order;
        $Restaurant_order->order_number = rand(9999999999,1000000000);
        $Restaurant_order->res_id = $input['res_id'];
        $Restaurant_order->user_id = $input['user_id'];
        $Restaurant_order->lati = $input['lati'];
        $Restaurant_order->longi = $input['longi'];
        $Restaurant_order->item_count = $input['item_count'];
        $Restaurant_order->total_amount = $input['total_amount'];
        $Restaurant_order->datas = $input['datas'];
        $Restaurant_order->dates = date('d-m-Y h:i:s A', time ());
        $Restaurant_order->status = "Processing";
        $Restaurant_order->name = $input['name'];
        $Restaurant_order->mobile = $input['mobile'];
        $Restaurant_order->usr_address = $input['usr_address'];
        $Restaurant_order->email = $input['email'];
        $Restaurant_order->payment_method = $input['payment_method'];
        $Restaurant_order->razorPayId = $input['razorPayId'];
        $Restaurant_order->delivery_boy = "Pending";
        $Restaurant_order->save();

        $order_list =  Restaurant_order::select('*')->orderBy('id','desc')->get()->toArray();

        // echo("<pre>");
        // print_r($order_list[0]['datas']);
        // die;
        
        $datas = $order_list[0]['datas'];

        $book = json_decode($datas);
        
        foreach($book->items as $order_add){
            $datass =  json_encode($order_add);
            $show = json_decode($datass);

            $orderItem = new Restaurant_order_item;
            $orderItem->order_id = $order_list[0]['id'];
            $orderItem->name = $show->name;
            $orderItem->image = $show->image;
            $orderItem->price = $show->price;
            $orderItem->cost = $show->cost;
            $orderItem->quantity = $show->quantity;
            $orderItem->save();
        } 
 
        return response()->json(['item'=>$Restaurant_order ,'message'=>'Order Created Successfully', 'success'=>true]);
        }else{
         return response()->json(['message'=>'Order Failed..', 'success'=>false]);
        }
        
  }
    
    
      public function getorder_cod(Request $request){

        $input = $request->all();
      
        date_default_timezone_set('Asia/Kolkata');

        $Restaurant_order = new Restaurant_order;
        $Restaurant_order->order_number = rand(9999999999,1000000000);
        $Restaurant_order->res_id = $input['res_id'];
        $Restaurant_order->user_id = $input['user_id'];
        $Restaurant_order->lati = $input['lati'];
        $Restaurant_order->longi = $input['longi'];
        $Restaurant_order->item_count = $input['item_count'];
        $Restaurant_order->total_amount = $input['total_amount'];
        $Restaurant_order->datas = $input['datas'];
        $Restaurant_order->dates = date('d-m-Y h:i:s A', time ());
        $Restaurant_order->status = "Processing";
        $Restaurant_order->name = $input['name'];
        $Restaurant_order->mobile = $input['mobile'];
        $Restaurant_order->usr_address = $input['usr_address'];
        $Restaurant_order->email = $input['email'];
        $Restaurant_order->payment_method = "cod";
        $Restaurant_order->delivery_boy = "Pending";
        $Restaurant_order->save();

        $order_list =  Restaurant_order::select('*')->orderBy('id','desc')->get()->toArray();

        // echo("<pre>");
        // print_r($order_list[0]['datas']);
        // die;
        
        $datas = $order_list[0]['datas'];

        $book = json_decode($datas);
        
        foreach($book->items as $order_add){
            $datass =  json_encode($order_add);
            $show = json_decode($datass);

            $orderItem = new Restaurant_order_item;
            $orderItem->order_id = $order_list[0]['id'];
            $orderItem->name = $show->name;
            $orderItem->image = $show->image;
            $orderItem->price = $show->price;
            $orderItem->cost = $show->cost;
            $orderItem->quantity = $show->quantity;
            $orderItem->save();
        } 
 
        return response()->json(['item'=>$Restaurant_order ,'message'=>'Order Created Successfully', 'success'=>true]);
        
  }
    
  public function resturant_open(Request $request){

    $input = $request->all();

    $user = $input['user_id'];
    $isopen = $input['isopen'];
    if($isopen=="1"){
    $updateRestaurant = Restaurant::where('user_id', $input['user_id'])->update([
        'isopen' => $input['isopen']
    ]);

    return response()->json(['message'=>'Restaurant open..', 'success'=>true]);
   }else{

    $updateRestaurant = Restaurant::where('user_id', $input['user_id'])->update([
        'isopen' => $input['isopen']
    ]);
    return response()->json(['message'=>'Restaurant close..', 'success'=>true]);
}
}
    
      public function restaurant_detail_without_img(Request $request)
  {
      $input = $request->all();

      $validator = Validator::make($input, [
          'user_id' => 'required',
          'name' => 'required',
          'address' => 'required',
          'phone' => 'required',
          'mobile' => 'required',
          'lati' => 'required',
          'longi' => 'required',
          'description' => 'required',
          'image' => 'required',
          'min_order' => 'required',
          'delivery_time' => 'required',
          'discount' => 'required',
          'discount_min' => 'required',
          'discount_available' => 'required'
          
      ]);

      
      if($validator->fails()){
          return $this->sendError('Validation Error.', $validator->errors());       
      }

      $get_vid=$input['user_id'];

      $Restaurant = Restaurant::where('user_id', $get_vid)->first();

      if($Restaurant==''){

        $Restaurant= new Restaurant;
        // $Restaurant->user_id=$input['user_id'];
        $Restaurant->name=$input['name'];
        $Restaurant->address=$input['address'];
        $Restaurant->phone=$input['phone'];
        $Restaurant->mobile=$input['mobile'];
        $Restaurant->lati=$input['lati'];
        $Restaurant->longi=$input['longi'];
        $Restaurant->description=$input['description'];
        $Restaurant->image=$input['image'];
        $Restaurant->min_order=$input['min_order'];
        $Restaurant->delivery_time=$input['delivery_time'];
        $Restaurant->discount=$input['discount'];
        $Restaurant->discount_min=$input['discount_min'];
        $Restaurant->discount_available=$input['discount_available'];
        $Restaurant->save();    

      // $res = Restaurant::create($input);

      return response()->json(['data'=>$Restaurant,'message'=>'Service Created Successfully', 'success'=>true]);

  }
  else{

      $updateRestaurant = Restaurant::where('user_id', $get_vid)->update([
      'name' => $input['name'],
      'address' => $input['address'],
      'phone' => $input['phone'],
      'mobile' => $input['mobile'],
      'lati' => $input['lati'],
      'longi' => $input['longi'],
      'description' => $input['description'],
      'image' => $input['image'],
      'min_order' => $input['min_order'],
      'delivery_time' => $input['delivery_time'],
      'discount' => $input['discount'],
      'discount_min' => $input['discount_min'],
      'discount_available' => $input['discount_available']
      ]);

      return response()->json(['message'=>'Service Updated Successfully', 'success'=>true]);
  }

  }
    
   public function restaurant_available(Request $request){

    $input = $request->all();

    $result = Restaurant::where('user_id',$input['user_id'])->count();

    if($result == 1){
        return response()->json(['message'=>'Restaurant Available..', 'success'=>true, 'status' => '1']);
    }
    else{
    return response()->json(['message'=>'Restaurant not Available..', 'success'=>false,'status' => '0']);
}
}
    
    public function restaurant_available_login(Request $request){

    $input = $request->all();

    $result = Restaurant::where('user_id',$input['user_id'])->count();

    if($result == 1){
        $data = DB::select('select id from restaurants where user_id = :user_id', ['user_id' =>$input['user_id']]); //('user_id',$input['user_id'])->get();
        return response()->json(['message'=>'Restaurant Available..', 'success'=>true, 'res_id'=>$data[0]->id, 'status' => '1']);
    }
    else{
    return response()->json(['message'=>'Restaurant not Available..', 'success'=>false,'status' => '0']);
}
}
    
 public function order_list(Request $request){

    $input = $request->all();

    //Query to fetch all the vehicle types
    $order_list =  Restaurant_order::where('res_id',$input['res_id'])->orderBy('id','desc')->get()->toArray();
        
    if(!empty($order_list)){

//           $user_id = $order_list[0]['user_id'];
//           $order_id = $order_list[0]['id'];

//           $user_list =  Customer::where('id',$user_id)->get()->toArray();

//           $item_list =  Restaurant_order_item::where('order_id',$order_id)->get()->toArray();
          
          return response()->json(['order_list'=>$order_list,'message'=>'Order list', 'success'=>true]);  
          }
    else{
          return response()->json(['data'=>(object)[], 'message'=>'No order list Found.', 'success'=>false]);  
        
        }

}
    
    // Show function Start
    
 public function shopOrderList(Request $request){

    $input = $request->all();

    //Query to fetch all the vehicle types
    $order_list =  ShopModel::where('res_id',$input['vendor_id'])->orderBy('id','desc')->get()->toArray();
        
    if(!empty($order_list)){

//           $user_id = $order_list[0]['user_id'];
//           $order_id = $order_list[0]['id'];

//           $user_list =  Customer::where('id',$user_id)->get()->toArray();

//           $item_list =  Restaurant_order_item::where('order_id',$order_id)->get()->toArray();
          
          return response()->json(['order_list'=>$order_list,'message'=>'Order list', 'success'=>true]);  
          }
    else{
          return response()->json(['data'=>(object)[], 'message'=>'No order list Found.', 'success'=>false]);  
        
        }

}
    
  public function ShopOrderStatus(Request $request){

    $input = $request->all();

    $updateRestaurant_dish = ShopModel::where('id', $input['order_id'])->update([
            'status' => $input['status'],
    ]);
     
     // Booking
    $check_status = ShopModel::where('id', $input['order_id'])->first();

    if($check_status->status == "Received"){

        // BookingRequestModel
        $BookingRequestModel = new BookingRequestModel;
        $BookingRequestModel->res_id = $check_status->res_id;
        $BookingRequestModel->user_id = $check_status->user_id;
        $BookingRequestModel->order_id = $check_status->id;
        $BookingRequestModel->delivery_id = 0;
        $BookingRequestModel->user_latitude = $check_status->lati;
        $BookingRequestModel->user_longitude = $check_status->longi;
        $BookingRequestModel->delivery_latitude = 0;
        $BookingRequestModel->delivery_longitude = 0;
        $BookingRequestModel->status = "Pending";
        $BookingRequestModel->dates = date("d-M-Y (D)");
        $BookingRequestModel->type = "Shop";
        $BookingRequestModel->save();
        return response()->json(['message'=>'Order request send..', 'success'=>true]); 
    }

        $OrderCancel = new OrderCancel;
        $OrderCancel->order_id = $input['order_id'];
        $OrderCancel->status = $input['status'];
        $OrderCancel->dates = date('Y-m-d H:i:s');
        $OrderCancel->save();
        
    return response()->json(['message'=>'Order status change..', 'success'=>true]);  
         
}
    
 public function order_item_list(Request $request){

    $input = $request->all();

    //Query to fetch all the vehicle types
    $order_item_list =  Restaurant_order_item::where('order_id',$input['id'])->get()->toArray();
        
    if(!empty($order_item_list)){
          
          return response()->json(['order_item_list'=>$order_item_list,'message'=>'Order list', 'success'=>true]);  
          }
    else{
          return response()->json(['data'=>(object)[], 'message'=>'No order list Found.', 'success'=>false]);  
        
        }
}
    
 public function order_status(Request $request){

    $input = $request->all();

    $updateRestaurant_dish = Restaurant_order::where('id', $input['order_id'])->update([
            'status' => $input['status'],
    ]);
     
     // Booking
    $check_status = Restaurant_order::where('id', $input['order_id'])->first();

    if($check_status->status == "Received"){

        // BookingRequestModel
        $BookingRequestModel = new BookingRequestModel;
        $BookingRequestModel->res_id = $check_status->res_id;
        $BookingRequestModel->user_id = $check_status->user_id;
        $BookingRequestModel->order_id = $check_status->id;
        $BookingRequestModel->delivery_id = 0;
        $BookingRequestModel->user_latitude = $check_status->lati;
        $BookingRequestModel->user_longitude = $check_status->longi;
        $BookingRequestModel->delivery_latitude = 0;
        $BookingRequestModel->delivery_longitude = 0;
        $BookingRequestModel->status = "Pending";
        $BookingRequestModel->dates = date("d-M-Y (D)");
        $BookingRequestModel->type = "Res";
        $BookingRequestModel->save();
        return response()->json(['message'=>'Order request send..', 'success'=>true]);  
    }

        $OrderCancel = new OrderCancel;
        $OrderCancel->order_id = $input['order_id'];
        $OrderCancel->status = $input['status'];
        $OrderCancel->dates = date('Y-m-d H:i:s');
        $OrderCancel->save();
        
    return response()->json(['message'=>'Order status change..', 'success'=>true]);  
         

}
    
 // Delivery request comming
public function deliveryBoyRequestAction(Request $request){
    $input = $request->all();
    
    $checkRequest = BookingRequestModel::where('order_id',$input['order_id'])->first();

    if($checkRequest->status == 'Accept'){
        return response()->json(['message'=>'Order request already '.$input['status'], 'status' => false]);
    }
    else{
    $requestOrder = BookingRequestModel::where('order_id',$input['order_id'])->update([
        'delivery_id' => $input['delivery_id'],
        'delivery_latitude' => $input['delivery_latitude'],
        'delivery_longitude' => $input['delivery_longitude'],
        'status' => $input['status']
    ]);
    if($checkRequest->type == "Res"){
    Restaurant_order::where('id',$checkRequest->order_id)->update([
        'delivery_boy' => 'Accept'
    ]);
    }
    elseif($checkRequest->type == "Shop"){
         ShopModel::where('id',$checkRequest->order_id)->update([
        'delivery_boy' => 'Accept'
    ]);
    }
    else{
         return response()->json(['message'=>'Wrong Type ', 'status' => false]);
    }
    return response()->json(['message'=>'Order request '.$input['status'], 'status' => true]);
    }
}

public function deliveryBoyRequestShow(Request $request){
    $input = $request->all();
    $res = [];

    $lat = $request->latitude; 
    $long = $request->longitude;
    

    $requestShowEmp = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(curr_latitude) ) * cos( radians(curr_longitude) - radians($long)) + sin(radians($lat)) *sin(radians(curr_latitude)) )) as distance FROM tbl_employees where `type_user`= '1' HAVING distance < 10 "); //Employee::where('type_user',1)->first();

    if(!empty($requestShowEmp)){
        
        $BookingCheck = BookingRequestModel::where('status','Pending')->count();

        if(!empty($BookingCheck)){

        $BookingData = BookingRequestModel::where('status','Pending')->first();
            
        if($BookingData->type=="Res"){
        $CustomerData = Customer::where('id',$BookingData->user_id)->first();
        $RestaurantOrderData = Restaurant_order::where('id', $BookingData->order_id)->first();
        $RestaurantData = Restaurant::where('id',$BookingData->res_id)->first();

        $res['id'] = strval($BookingData->id);
        $res['order_id'] = strval($BookingData->order_id);
        $res['user_latitude'] = $BookingData->user_latitude;
        $res['user_longitude'] = $BookingData->user_longitude;
        $res['status'] = $BookingData->status;
        $res['user_name']  = $CustomerData->name;
        $res['user_mobile']  = $CustomerData->mobile;
        $res['user_profile_image']  = $CustomerData->profile_image;
        $res['res_name']  = $RestaurantData->name;
        $res['res_address']  = $RestaurantData->address;
        $res['res_mobile']  = $RestaurantData->mobile;
        $res['order_number'] = $RestaurantOrderData->order_number;
        $res['total_item']  = $RestaurantOrderData->item_count;
        $res['total_amount']  = $RestaurantOrderData->total_amount;
        $res['user_address']  = $RestaurantOrderData->usr_address;
        $res['order_item']  = $RestaurantOrderData->datas;
        return $this->sendResponse($res, 'Show order list');
        }
        elseif($BookingData->type=="Shop"){
        $CustomerData = Customer::where('id',$BookingData->user_id)->first();
        $RestaurantOrderData = ShopModel::where('id', $BookingData->order_id)->first();
        $VendorData = Vendor::where('id',$BookingData->res_id)->first();

        $res['id'] = strval($BookingData->id);
        $res['order_id'] = strval($BookingData->order_id);
        $res['user_latitude'] = $BookingData->user_latitude;
        $res['user_longitude'] = $BookingData->user_longitude;
        $res['status'] = $BookingData->status;
        $res['user_name']  = $CustomerData->name;
        $res['user_mobile']  = $CustomerData->mobile;
        $res['user_profile_image']  = $CustomerData->profile_image;
        $res['res_name']  = $VendorData->first_name." ".$VendorData->last_name;
        $res['res_address']  = $VendorData->van_address;
        $res['res_mobile']  = $VendorData->mobile;
        $res['order_number'] = $RestaurantOrderData->order_number;
        $res['total_item']  = $RestaurantOrderData->item_count;
        $res['total_amount']  = $RestaurantOrderData->total_amount;
        $res['user_address']  = $RestaurantOrderData->usr_address;
        $res['order_item']  = $RestaurantOrderData->datas;
        return $this->sendResponse($res, 'Show order list');
        }
        else{
            return response()->json(['message'=>'Type wrong', 'status' => false]);
        }
         
        }else{
            return response()->json(['message'=>'There is no order', 'status' => false]);
        }
    }else{
        return response()->json(['message'=>'Driver not Show', 'status' => false]);
    }
}
    
 public function deliveryBoyShowOrder(Request $request){
    $input = $request->all();
    $res = [];

       $delivery_id = $request->delivery_id;

       $BookingCheck = BookingRequestModel::where('delivery_id',$delivery_id)->count();

        if(!empty($BookingCheck)){

        $BookingData = BookingRequestModel::where('status','Accept')->first();
        $CustomerData = Customer::where('id',$BookingData->user_id)->first();
        $RestaurantOrderData = Restaurant_order::where('id', $BookingData->order_id)->first();
        $RestaurantData = Restaurant::where('id',$BookingData->res_id)->first();

        $res['id'] = $BookingData->id;
        $res['order_id'] = strval($BookingData->order_id);
        $res['user_latitude'] = $BookingData->user_latitude;
        $res['user_longitude'] = $BookingData->user_longitude;
        $res['status'] = $BookingData->status;
        $res['user_name']  = $CustomerData->name;
        $res['user_mobile']  = $CustomerData->mobile;
        $res['user_profile_image']  = $CustomerData->profile_image;
        $res['res_name']  = $RestaurantData->name;
        $res['res_address']  = $RestaurantData->address;
        $res['res_mobile']  = $RestaurantData->mobile;
        $res['order_number'] = $RestaurantOrderData->order_number;
        $res['total_item']  = $RestaurantOrderData->item_count;
        $res['total_amount']  = $RestaurantOrderData->total_amount;
        $res['user_address']  = $RestaurantOrderData->usr_address;
        $res['order_item']  = $RestaurantOrderData->datas;

        return response()->json(['data'=>$res,'message'=>'Show order list', 'status' => true]);
        }else{
            return response()->json(['message'=>'There is no order', 'status' => false]);
        }
}
    
    
public function DeliveryToUser(Request $request){
    $input = $request->all();
    $res = [];
    $BookingData = BookingRequestModel::where('status','Accept')
                                       ->where('delivery_id',$input['delivery_id'])
                                       ->where('order_id',$input['order_id'])->first();
    if(!empty($BookingData)){
        
        if($BookingData->type == "Res"){        
        $UserData = Customer::where('id',$BookingData->user_id)->first();
        $RestaurantOrderData = Restaurant_order::where('id', $BookingData->order_id)->first();
        $Employee =  Employee::where('id',$BookingData->delivery_id)->first();

        $res['delivery_name'] = $Employee->first_name." ".$Employee->last_name;
        $res['delivery_mobile'] = $Employee->mobile;
        $res['delivery_address'] = $Employee->emp_address;
        $res['delivery_latitude'] = $BookingData->delivery_latitude;
        $res['delivery_longitude'] = $BookingData->delivery_longitude;
        $res['user_latitude'] = $UserData->add_latitude;
        $res['user_longitude'] = $UserData->add_longitude;
        $res['user_name']  = $UserData->name;
        $res['user_address']  = $RestaurantOrderData->usr_address;
        $res['user_mobile']  = $UserData->mobile;
        $res['order_id'] = strval($RestaurantOrderData->id);
        $res['payment_method'] = $RestaurantOrderData->payment_method;
        $res['order_number'] = $RestaurantOrderData->order_number;
        $res['total_item']  = $RestaurantOrderData->item_count;
        $res['total_amount']  = $RestaurantOrderData->total_amount;
        $res['dates']  = $RestaurantOrderData->dates;
        $res['item_list'] = Restaurant_order_item::where('order_id',$RestaurantOrderData->id)->get()->toArray();
        return response()->json(['data'=>$res,'message'=>'Show order list', 'status' => true]);
        }
        elseif($BookingData->type == "Shop"){
        $UserData = Customer::where('id',$BookingData->user_id)->first();
        $RestaurantOrderData = ShopModel::where('id', $BookingData->order_id)->first();
        $Employee =  Employee::where('id',$BookingData->delivery_id)->first();

        $res['delivery_name'] = $Employee->first_name." ".$Employee->last_name;
        $res['delivery_mobile'] = $Employee->mobile;
        $res['delivery_address'] = $Employee->emp_address;
        $res['delivery_latitude'] = $BookingData->delivery_latitude;
        $res['delivery_longitude'] = $BookingData->delivery_longitude;
        $res['user_latitude'] = $UserData->add_latitude;
        $res['user_longitude'] = $UserData->add_longitude;
        $res['user_name']  = $UserData->name;
        $res['user_address']  = $RestaurantOrderData->usr_address;
        $res['user_mobile']  = $UserData->mobile;
        $res['order_id'] = strval($RestaurantOrderData->id);
        $res['payment_method'] = $RestaurantOrderData->payment_method;
        $res['order_number'] = $RestaurantOrderData->order_number;
        $res['total_item']  = $RestaurantOrderData->item_count;
        $res['total_amount']  = $RestaurantOrderData->total_amount;
        $res['dates']  = $RestaurantOrderData->dates;
        $res['item_list'] = ShopModel_Item::where('order_id',$RestaurantOrderData->id)->get()->toArray();
        return response()->json(['data'=>$res,'message'=>'Show order list', 'status' => true]);
        }
        else{
        return response()->json(['message'=>'Type is wrong..', 'status' => false]);
        }
    }else{
        return response()->json(['message'=>'There is no order', 'status' => false]);
    }
}
    
public function DeliveryBoyOrderList(Request $request){
    $input = $request->all();
    $res = [];
    $BookingData = BookingRequestModel::where('order_id',$input['order_id'])
                                        ->where('status','Delivered')->first();
    if(!empty($BookingData)){
        
        if($BookingData->type == "Res"){
        $UserData = Customer::where('id',$BookingData->user_id)->first();
        $RestaurantOrderData = Restaurant_order::where('id', $BookingData->order_id)->first();
        $Employee =  Employee::where('id',$BookingData->delivery_id)->first();

        $res['user_name']  = $UserData->name;
        $res['user_address']  = $RestaurantOrderData->usr_address;
        $res['user_mobile']  = $UserData->mobile;
        $res['status'] = $BookingData->status;
        $res['signature'] = $BookingData->signature;
        $res['order_id'] = strval($RestaurantOrderData->id);
        $res['payment_method'] = $RestaurantOrderData->payment_method;
        $res['order_number'] = $RestaurantOrderData->order_number;
        $res['total_item']  = $RestaurantOrderData->item_count;
        $res['total_amount']  = $RestaurantOrderData->total_amount;
        $res['dates']  = $RestaurantOrderData->dates;
        $res['item_list'] = Restaurant_order_item::where('order_id',$RestaurantOrderData->id)->get()->toArray();
        return response()->json(['data'=>$res,'message'=>'Show order list', 'status' => true]);
        }
        elseif($BookingData->type == "Shop"){
        $UserData = Customer::where('id',$BookingData->user_id)->first();
        $RestaurantOrderData = ShopModel::where('id', $BookingData->order_id)->first();
        $Employee =  Employee::where('id',$BookingData->delivery_id)->first();

        $res['user_name']  = $UserData->name;
        $res['user_address']  = $RestaurantOrderData->usr_address;
        $res['user_mobile']  = $UserData->mobile;
        $res['status'] = $BookingData->status;
        $res['signature'] = $BookingData->signature;
        $res['order_id'] = strval($RestaurantOrderData->id);
        $res['payment_method'] = $RestaurantOrderData->payment_method;
        $res['order_number'] = $RestaurantOrderData->order_number;
        $res['total_item']  = $RestaurantOrderData->item_count;
        $res['total_amount']  = $RestaurantOrderData->total_amount;
        $res['dates']  = $RestaurantOrderData->dates;
        $res['item_list'] = ShopModel_Item::where('order_id',$RestaurantOrderData->id)->get()->toArray();
        return response()->json(['data'=>$res,'message'=>'Show order list', 'status' => true]);
        }
        else{
        return response()->json(['message'=>'Type is wrong', 'status' => false]);
        }
    }else{
        return response()->json(['message'=>'There is no order', 'status' => false]);
    }
}
    
public function DeliveryBoyOrderListShow(Request $request){
    $input = $request->all();
    $data 			= [];

    $result = BookingRequestModel::where('status','Delivered')
                                  ->where('delivery_id',$input['delivery_id'])->orderBy('id','asc')->get()->toArray();
    if(!empty($result)){
     foreach ($result as $res)
            {
                $row1 = $res;

                $result1 = Restaurant_order::where('id',$res['order_id'])->get();
                $result2 = ShopModel::where('id',$res['order_id'])->get();
         
                  foreach ($result2 as $res1)
                    {
                            $row1['order_number'] = $res1->order_number;
                            $row1['total_amount'] = $res1->total_amount;
                            $row1['dates'] = $res1->dates;
                            $row1['payment_method'] = $res1->payment_method;

                    }

                    foreach ($result1 as $res1)
                    {
                            $row1['order_number'] = $res1->order_number;
                            $row1['total_amount'] = $res1->total_amount;
                            $row1['dates'] = $res1->dates;
                            $row1['payment_method'] = $res1->payment_method;

                    }
                $data[] = $row1;
    }
    return response()->json(['message'=>'Show order list', 'status' => true, "data" => $data]);
}else{
    return response()->json(['message'=>'There is order', 'status' => false]);
}
}
    
 public function orderStatus(Request $request){
    $input = $request->all();

    $Employee =  Employee::where('id',$input['delivery_id'])->first();

    if($Employee->ep_token == $input['ep_token']){

    $OrderCheck = BookingRequestModel::where('order_id',$input['order_id'])
                                      ->where('delivery_id',$input['delivery_id'])->first();

    if(!empty($OrderCheck)){
        
        if($OrderCheck->type == "Res"){
             BookingRequestModel::where('order_id',$input['order_id'])->update([
            'signature' => $input['signature'],
            'status' => $input['status']
        ]);
        Restaurant_order::where('id',$OrderCheck->order_id)->update([
            'status' => 'Delivered'
        ]);
        return response()->json(['message'=>'Order is Delivered', 'status' => true]);
        }
        elseif($OrderCheck->type == "Shop"){
             BookingRequestModel::where('order_id',$input['order_id'])->update([
            'signature' => $input['signature'],
            'status' => $input['status']
        ]);
        ShopModel::where('id',$OrderCheck->order_id)->update([
            'status' => 'Delivered'
        ]);
        return response()->json(['message'=>'Order is Delivered', 'status' => true]);
        }
        else{
        return response()->json(['message'=>'Type is wrong', 'status' => false]);
        }
        
    }else{
        return response()->json(['message'=>'There is no order', 'status' => false]);
    }
}else{
    return response()->json(['message'=>'System Error', 'status' => false]);
}
}


public function order_cancel_accept(Request $request){

    $input = $request->all();

    $updateRestaurant_order = Restaurant_order::where('id', $input['order_id'])->update([
            'status' => $input['cancel'],
    ]);
        
    return response()->json(['message'=>'Order status change..', 'success'=>true]);  
         

}
    
// public function order_list_user(Request $request){
//     $error_code 	= 0;
//     $error_string 	= "";
//     $data 			= [];

//     $result = Restaurant_order::where('user_id',$request->user_id)->orderBy('id','asc')->get()->toArray();

//      foreach ($result as $res)
//             {
//                 $row1 = $res;

//                 $result1 = Restaurant::where('id',$res['res_id'])->get();

//                 // echo("<pre>");
//                 // print_r($res['res_id']);
//                 // die;

//                 if(!$result1)
//                 {
//                     $error_code = 3;
//                     $error_string = "Problem with server.";
//                 }
//                 else
//                 {
//                     $count2 = count($result1);
//                     if($count2 == 0){
//                         $row1['name'] = "";
//                         $row1['address'] = "";
//                         $row1['image'] = "";
//                     }else{
//                         foreach ($result1 as $res1)
//                         {
//                             $row1['res_name'] = $res1->name;
//                             $row1['res_address'] = $res1->address;
//                             $row1['res_image'] = $res1->image;

//                         }
//                     }

//                 }
//                 $data[] = $row1;
//     }
//     return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

//   }
    
    public function order_list_user(Request $request){
    $error_code 	= 0;
    $error_string 	= "Error..";
    $data 			= [];

    $result = Restaurant_order::where('user_id',$request->user_id)->orderBy('id','asc')->get()->toArray();
    $result_1 = ShopModel::where('user_id',$request->user_id)->orderBy('id','asc')->get()->toArray();

    foreach ($result_1 as $res_1)
    {
        $row_2 = $res_1;

        $result_2 = Vendor::where('id',$row_2['res_id'])->get();
        foreach ($result_2 as $res_2)
            {
                    $row_2['res_name'] = $res_2->first_name." ".$res_2->last_name;
                    $row_2['res_address'] = $res_2->van_address;
                    $row_2['res_image'] = $res_2->profile_image;

            }
        $data[] = $row_2;
}

     foreach ($result as $res)
            {
                $row1 = $res;

                $result1 = Restaurant::where('id',$res['res_id'])->get();
                foreach ($result1 as $res1)
                    {
                            $row1['res_name'] = $res1->name;
                            $row1['res_address'] = $res1->address;
                            $row1['res_image'] = $res1->image;

                    }
                $data[] = $row1;
    }
    return response()->json(["error_code" => $error_code, "error_string" => $error_string, "data" => $data],200);

  }
    
  public function user_address(Request $request){

    $input = $request->all();

    $result = UserAddress::where('user_id',$input['user_id'])->count();

    if($result == 1){

        $UserAddress = UserAddress::where('user_id', $input['user_id'])->update([
            'address' => $input['address'],
            'lati' => $input['lati'],
            'longi' => $input['longi'],
            'status' => $input['status']
    ]);
        return response()->json(['message'=>'Address update..', 'status' => true]);
    }
    else{

        $UserAddress = new UserAddress;
        $UserAddress->user_id = $input['user_id'];
        $UserAddress->address = $input['address'];
        $UserAddress->lati = $input['lati'];
        $UserAddress->longi = $input['longi'];
        $UserAddress->status = $input['status'];
        $UserAddress->save();


    return response()->json(['data'=>$UserAddress,'message'=>'Address Add..','status' => true]);
}
          
}
    
    
  public function user_address_work(Request $request){

    $input = $request->all();

    $result = UserAddressWork::where('user_id',$input['user_id'])->count();

    if($result == 1){

        $UserAddress = UserAddressWork::where('user_id', $input['user_id'])->update([
            'address' => $input['address'],
            'lati' => $input['lati'],
            'longi' => $input['longi'],
            'status' => $input['status']
    ]);
        return response()->json(['message'=>'Address update..', 'status' => true]);
    }
    else{

        $UserAddress = new UserAddressWork;
        $UserAddress->user_id = $input['user_id'];
        $UserAddress->address = $input['address'];
        $UserAddress->lati = $input['lati'];
        $UserAddress->longi = $input['longi'];
        $UserAddress->status = $input['status'];
        $UserAddress->save();


    return response()->json(['data'=>$UserAddress,'message'=>'Address Add..','status' => true]);
}
          
}
    
public function get_user_address(Request $request){
    $input = $request->all();
    $get_user_address = UserAddress::where('user_id',$input['user_id'])->first();
    if(!empty($get_user_address)){
    return response()->json(['data'=>$get_user_address,'message'=>'Address Add..','status' => true]);
    }else{
        return response()->json(['message'=>'Address not found..','status' => false]);
    }
}
    
public function get_user_address_work(Request $request){
    $input = $request->all();
    $get_user_address_work = UserAddressWork::where('user_id',$input['user_id'])->first();
    if(!empty($get_user_address_work)){
    return response()->json(['data'=>$get_user_address_work,'message'=>'Address Add..','status' => true]);
    }else{
        return response()->json(['message'=>'Address not found..','status' => false]);
    }
}
    
    // Start wallet API
    
public function add_money(Request $request){

    $input = $request->all();

    $wallet_user = Wallet::where('user_id',$input['user_id'])->count();
    $wallet_balance = Wallet::where('user_id',$input['user_id'])->sum('amount');

    if($wallet_user == 1){

        $total_amount = $input['amount'] + $wallet_balance;

        $UserAddress = Wallet::where('user_id', $input['user_id'])->update([
            'name' => $input['name'],
            'email' => $input['email'],
            'mobile' => $input['mobile'],
            'amount' => $total_amount,
            'mobile' => $input['mobile'],
            'status' => 1,
            'paymeny_id' => $input['payment_id'],
            'dates' => date("d-M-Y (D)")
    ]);
        return response()->json(['message'=>'Amount add..', 'status' => true]);
    }else{
        
    $Wallet = new Wallet;
    $Wallet->user_id = $input['user_id'];
    $Wallet->name = $input['name'];
    $Wallet->email = $input['email'];
    $Wallet->mobile = $input['mobile'];
    $Wallet->amount = $input['amount'];
    $Wallet->status = 1;
    $Wallet->paymeny_id = $input['payment_id'];
    $Wallet->dates = date("d-M-Y (D)");
    $Wallet->save();

        return response()->json(['data'=>$Wallet,'message'=>'Amount add..','status' => true]);
    }
}

public function wallet_list(Request $request){
        
    $input = $request->all();
    $amount = Wallet::where('user_id',$input['user_id'])->sum('amount');
    return response()->json(['amount'=>$amount,'message'=>'Show amount..','status' => true]);
    
}
    
public function money_send_check_user(Request $request){
        
    $input = $request->all();
    $user_id = Customer::where('email',$input['email_mobile'])
                         ->orWhere('mobile',$input['email_mobile'])->count();
    if($user_id == 1){
        $user_detail = Customer::where('email',$input['email_mobile'])
                                 ->orWhere('mobile',$input['email_mobile'])->first();
        return response()->json(['user_data'=> $user_detail,'message'=>'User Found..','status' => true]);
    }
    else{
        return response()->json(['message'=>'not found..','status' => false]);
    }  
}

// public function money_send(Request $request){

//      $input = $request->all();
//      $recevied_email = $input['recevied_id'];
//      $sender_email = $input['sender_id'];

//      $check_receive_user = Wallet::where('user_id',$recevied_email)->count();
//      $detail_user = Customer::where('id',$recevied_email)->first();
//      $amount = Wallet::where('user_id',$sender_email)->sum('amount');

//      $send_amount = $input['send_amount'];

//      if($amount >= $send_amount){

//      if($check_receive_user == 1){
 
//         $amount_rec = Wallet::where('user_id',$recevied_email)->sum('amount');
//         Wallet::where('user_id', $recevied_email)->update([
//             'name' => $detail_user->name,
//             'email' => $detail_user->email,
//             'mobile' => $detail_user->mobile,
//             'amount' => $send_amount +  $amount_rec,
//             'status' => 1,
//             'dates' => date("d-M-Y (D)")
//     ]);

//     $WalletTranscation = new WalletTranscation;
//     $WalletTranscation->sender = $sender_email;
//     $WalletTranscation->recevier = $recevied_email;
//     $WalletTranscation->amount = $send_amount;
//     $WalletTranscation->dates = date("d-M-Y (D)");
//     $WalletTranscation->save();

//     $total = $amount - $send_amount;

//     Wallet::where('user_id', $input['user_id'])->update([
//        'amount' => $total
//        ]);

//         return response()->json(['message'=>'Amount add..', 'status' => true]);
//     } else{

//      $WalletTranscation = new WalletTranscation;
//      $WalletTranscation->sender = $sender_email;
//      $WalletTranscation->recevier = $recevied_email;
//      $WalletTranscation->amount = $send_amount;
//      $WalletTranscation->dates = date("d-M-Y (D)");
//      $WalletTranscation->save();

//      $Wallet = new Wallet;
//      $Wallet->user_id = $recevied_email;
//      $Wallet->name = $detail_user->name;
//      $Wallet->email = $detail_user->email;
//      $Wallet->mobile = $detail_user->mobile;
//      $Wallet->amount = $send_amount;
//      $Wallet->status = 1;
//      $Wallet->save();

//      $total = $amount - $send_amount;

//      Wallet::where('user_id', $input['user_id'])->update([
//         'amount' => $total
//         ]);
//     }

//      return response()->json(['message'=>'amount send..','status' => true]);
//      }else{
//         return response()->json(['message'=>'insufficient balance..','status' => false]);
//      }

// }
    
     public function getorder_wallet(Request $request){

        $input = $request->all();
         
        $send_amount = $input['amount'];
         
        if($send_amount >= $input['total_amount']){
      
        date_default_timezone_set('Asia/Kolkata');

        $Restaurant_order = new Restaurant_order;
        $Restaurant_order->order_number = rand(9999999999,1000000000);
        $Restaurant_order->res_id = $input['res_id'];
        $Restaurant_order->user_id = $input['user_id'];
        $Restaurant_order->lati = $input['lati'];
        $Restaurant_order->longi = $input['longi'];
        $Restaurant_order->item_count = $input['item_count'];
        $Restaurant_order->total_amount = $input['total_amount'];
        $Restaurant_order->datas = $input['datas'];
        $Restaurant_order->dates = date('d-m-Y h:i:s A', time ());
        $Restaurant_order->status = "Processing";
        $Restaurant_order->name = $input['name'];
        $Restaurant_order->mobile = $input['mobile'];
        $Restaurant_order->usr_address = $input['usr_address'];
        $Restaurant_order->email = $input['email'];
        $Restaurant_order->payment_method = "wallet";
//         $Restaurant_order->razorPayId = "wallet";
        $Restaurant_order->delivery_boy = "Pending";
        $Restaurant_order->save();

        $order_list =  Restaurant_order::select('*')->orderBy('id','desc')->get()->toArray();
        
        $datas = $order_list[0]['datas'];

        $book = json_decode($datas);
        
        foreach($book->items as $order_add){
            $datass =  json_encode($order_add);
            $show = json_decode($datass);

            $orderItem = new Restaurant_order_item;
            $orderItem->order_id = $order_list[0]['id'];
            $orderItem->name = $show->name;
            $orderItem->image = $show->image;
            $orderItem->price = $show->price;
            $orderItem->cost = $show->cost;
            $orderItem->quantity = $show->quantity;
            $orderItem->save();
        } 
            
        $total_amount_add = $send_amount - $input['total_amount'];

        Wallet::where('user_id', $input['user_id'])->update([
            'amount' => $total_amount_add
        ]);
            
        app()->call('App\Http\Controllers\API\RestaurantController@smsSendAllFunction', [$input['mobile'],urlencode("The Order has placed successfully")]); 
            
 
        return response()->json(['message'=>'Order Created Successfully', 'success'=>true]);
        }else{
        return response()->json(['message'=>'insufficient balance..','success' => false]);
     }
        
  }
    
public function money_send(Request $request){

     $input = $request->all();
     $recevied_email = $input['recevied_id'];
     $sender_email = $input['sender_id'];

     $check_receive_user = Wallet::where('user_id',$recevied_email)->count();
     $detail_user = Customer::where('id',$recevied_email)->first();
     $detail_sender = Customer::where('id',$sender_email)->first();
     $amount = Wallet::where('user_id',$sender_email)->sum('amount');

     $send_amount = $input['send_amount'];

     if($amount >= $send_amount){

     if($check_receive_user == 1){
 
        $amount_rec = Wallet::where('user_id',$recevied_email)->sum('amount');
        Wallet::where('user_id', $recevied_email)->update([
            'name' => $detail_user->name,
            'email' => $detail_user->email,
            'mobile' => $detail_user->mobile,
            'amount' => $send_amount +  $amount_rec,
            'status' => 1,
            'dates' => date("d-M-Y (D)")
    ]);

        $WalletTranscation = new WalletTranscation;
        $WalletTranscation->sender = $sender_email;
        $WalletTranscation->recevier = $recevied_email;
        $WalletTranscation->sender_name = $detail_sender->name;
        $WalletTranscation->receve_name = $detail_user->name;
        $WalletTranscation->amount = $send_amount;
        $WalletTranscation->status = "Send";
        $WalletTranscation->dates = date("d-M-Y (D)");
        $WalletTranscation->save();
    
        $WalletTranscation = new WalletTranscation;
        $WalletTranscation->sender = $recevied_email; 
        $WalletTranscation->recevier = $sender_email;
        $WalletTranscation->sender_name = $detail_sender->name;
        $WalletTranscation->receve_name = $detail_user->name;
        $WalletTranscation->amount = $send_amount;
        $WalletTranscation->status = "received";
        $WalletTranscation->dates = date("d-M-Y (D)");
        $WalletTranscation->save();

    $total = $amount - $send_amount;

    Wallet::where('user_id', $sender_email)->update([
       'amount' => $total
       ]);
         
       
        return response()->json(['message'=>'Amount add..', 'status' => true]);
    } else{

        $WalletTranscation = new WalletTranscation;
        $WalletTranscation->sender = $sender_email;
        $WalletTranscation->recevier = $recevied_email;
        $WalletTranscation->sender_name = $detail_sender->name;
        $WalletTranscation->receve_name = $detail_user->name;
        $WalletTranscation->amount = $send_amount;
        $WalletTranscation->status = "Send";
        $WalletTranscation->dates = date("d-M-Y (D)");
        $WalletTranscation->save();
    
        $WalletTranscation = new WalletTranscation;
        $WalletTranscation->sender = $recevied_email; 
        $WalletTranscation->recevier = $sender_email;
        $WalletTranscation->sender_name = $detail_sender->name;
        $WalletTranscation->receve_name = $detail_user->name;
        $WalletTranscation->amount = $send_amount;
        $WalletTranscation->status = "received";
        $WalletTranscation->dates = date("d-M-Y (D)");
        $WalletTranscation->save();

     $Wallet = new Wallet;
     $Wallet->user_id = $recevied_email;
     $Wallet->name = $detail_user->name;
     $Wallet->email = $detail_user->email;
     $Wallet->mobile = $detail_user->mobile;
     $Wallet->amount = $send_amount;
     $Wallet->status = 1;
     $Wallet->save();

     $total = $amount - $send_amount;

     Wallet::where('user_id', $sender_email)->update([
        'amount' => $total
        ]);
    }
         
     return response()->json(['message'=>'amount send..','status' => true]);
     }else{
        return response()->json(['message'=>'insufficient balance..','status' => false]);
     }

}

public function payment_list(Request $request){

    $input = $request->all();
    
    $list = WalletTranscation::where('sender', $input['user_id'])->orderBy('id','desc')->get();

    return response()->json(['payment_list'=>$list,'message'=>'uploaded.....','status' => true]);
}

public function pneck_user_list(Request $request){

    $input = $request->all();
    
    $list = Customer::select('id','name','mobile','email','profile_image')
                     ->where('mobile','like',$input['mobile'] . '%')->get();
 
    return response()->json(['pneck_list'=>$list,'message'=>'uploaded.....','status' => true]);

}
    
public function orderListByStatus(Request $request){

    $input = $request->all();

    //Query to fetch all the vehicle types
    $order_list =  Restaurant_order::where('res_id',$input['res_id'])
                                     ->where('status',$input['status'])->orderBy('id','desc')->get()->toArray();
        
    if(!empty($order_list)){
          
          return response()->json(['order_list'=>$order_list,'message'=>'Order list', 'success'=>true]);  
          }
    else{
          return response()->json(['data'=>(object)[], 'message'=>'No order list Found.', 'success'=>false]);  
        
        }

}
    
  public function getNearByDriversList(Request $request){

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
		 
		$nearByData = DB::Select("SELECT *, 
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
					AS distance FROM tbl_employees where is_online = 'yes' HAVING distance <= 3 ORDER BY distance ASC");
		
		if(!empty($nearByData)){                
			return $this->sendResponse($nearByData, 'Data Retrieved Successfully');
		}
		else{
			return $this->sendResponse(array(), 'Sorry, No data Found.');
		}
      		
	}
    
public function notification(Request $request)
{
    $input = $request->all();
    $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
    $employee_id = $input['employee_id'];

    $employee_id = Booking::where('employee_id',$employee_id)->first();

    $emp_device =  Employee::where('id',$employee_id->employee_id)->first();

    $notification = [
        'title' => "You Got Order",
        'sound' => true,
    ];
    
    $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

    $fcmNotification = [
        'to'        => $emp_device->device_token,
        'notification' => $notification,
        'data' => $extraNotificationData
    ];

$headers = [
    'Authorization: key=AAAAKo8Njs4:APA91bG_FY-OcEXsbHjNhcu2HvyGwoTYDumPz8ZJ5kREC7Zp_6cHMmnn3NqWqKYfXvPulk5f-v5p_Hq1vDsk9CA1DHiIWex-HbX_YxMb0q6BDhS45zBytg5eC6kOZWe-CuA2HHO-myE9',
    'Content-Type: application/json'
];


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$fcmUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    $result = curl_exec($ch);
    
    if(!curl_close($ch)){ 
        return response()->json(['message'=>'Send Notification', 'success'=>true]);  
    }
}
    
    // Shop Order
    
      public function getorder_shop(Request $request){

        $input = $request->all();
      
        if($input['success']=='Success'){
      
        date_default_timezone_set('Asia/Kolkata');

        $ShopModel_order = new ShopModel;
        $ShopModel_order->order_number = rand(9999999999,1000000000);
        $ShopModel_order->res_id = $input['res_id'];
        $ShopModel_order->user_id = $input['user_id'];
        $ShopModel_order->lati = $input['lati'];
        $ShopModel_order->longi = $input['longi'];
        $ShopModel_order->item_count = $input['item_count'];
        $ShopModel_order->total_amount = $input['total_amount'];
        $ShopModel_order->datas = $input['datas'];
        $ShopModel_order->dates = date('d-m-Y h:i:s A', time ());
        $ShopModel_order->status = "Processing";
        $ShopModel_order->name = $input['name'];
        $ShopModel_order->mobile = $input['mobile'];
        $ShopModel_order->usr_address = $input['usr_address'];
        $ShopModel_order->email = $input['email'];
        $ShopModel_order->payment_method = $input['payment_method'];
        $ShopModel_order->razorPayId = $input['razorPayId'];
        $ShopModel_order->delivery_boy = "Pending";
        $ShopModel_order->save();

        $order_list =  ShopModel::select('*')->orderBy('id','desc')->get()->toArray();

        // echo("<pre>");
        // print_r($order_list[0]['datas']);
        // die;
        
        $datas = $order_list[0]['datas'];

        $book = json_decode($datas);
        
        foreach($book->items as $order_add){
            $datass =  json_encode($order_add);
            $show = json_decode($datass);

            $ShopModel_orderItem = new ShopModel_Item;
            $ShopModel_orderItem->order_id = $order_list[0]['id'];
            $ShopModel_orderItem->name = $show->name;
            $ShopModel_orderItem->image = $show->image;
            $ShopModel_orderItem->price = $show->price;
            $ShopModel_orderItem->cost = $show->cost;
            $ShopModel_orderItem->quantity = $show->quantity;
            $ShopModel_orderItem->save();
        } 
 
       
        return response()->json(['item'=>$ShopModel_order ,'message'=>'Order Created Successfully', 'success'=>true]);
        }else{
         return response()->json(['message'=>'Order Failed..', 'success'=>false]);
        }
        
  }
    
    public function getorder_cod_shop(Request $request){

        $input = $request->all();
      
        date_default_timezone_set('Asia/Kolkata');

        $ShopModel_order = new ShopModel;
        $ShopModel_order->order_number = rand(9999999999,1000000000);
        $ShopModel_order->res_id = $input['res_id'];
        $ShopModel_order->user_id = $input['user_id'];
        $ShopModel_order->lati = $input['lati'];
        $ShopModel_order->longi = $input['longi'];
        $ShopModel_order->item_count = $input['item_count'];
        $ShopModel_order->total_amount = $input['total_amount'];
        $ShopModel_order->datas = $input['datas'];
        $ShopModel_order->dates = date('d-m-Y h:i:s A', time ());
        $ShopModel_order->status = "Processing";
        $ShopModel_order->name = $input['name'];
        $ShopModel_order->mobile = $input['mobile'];
        $ShopModel_order->usr_address = $input['usr_address'];
        $ShopModel_order->email = $input['email'];
        $ShopModel_order->payment_method = "cod";
        $ShopModel_order->delivery_boy = "Pending";
        $ShopModel_order->save();

        $order_list =  ShopModel::select('*')->orderBy('id','desc')->get()->toArray();

        // echo("<pre>");
        // print_r($order_list[0]['datas']);
        // die;
        
        $datas = $order_list[0]['datas'];

        $book = json_decode($datas);
        
        foreach($book->items as $order_add){
            $datass =  json_encode($order_add);
            $show = json_decode($datass);

            $ShopModel_orderItem = new ShopModel_Item;
            $ShopModel_orderItem->order_id = $order_list[0]['id'];
            $ShopModel_orderItem->name = $show->name;
            $ShopModel_orderItem->image = $show->image;
            $ShopModel_orderItem->price = $show->price;
            $ShopModel_orderItem->cost = $show->cost;
            $ShopModel_orderItem->quantity = $show->quantity;
            $ShopModel_orderItem->save();
        } 
 
      
        return response()->json(['item'=>$ShopModel_order ,'message'=>'Order Created Successfully', 'success'=>true]);
        
  }
    
      public function getorder_wallet_shop(Request $request){

        $input = $request->all();
         
        $send_amount = $input['amount'];
         
        if($send_amount >= $input['total_amount']){
      
        date_default_timezone_set('Asia/Kolkata');

        $ShopModel_order = new ShopModel;
        $ShopModel_order->order_number = rand(9999999999,1000000000);
        $ShopModel_order->res_id = $input['res_id'];
        $ShopModel_order->user_id = $input['user_id'];
        $ShopModel_order->lati = $input['lati'];
        $ShopModel_order->longi = $input['longi'];
        $ShopModel_order->item_count = $input['item_count'];
        $ShopModel_order->total_amount = $input['total_amount'];
        $ShopModel_order->datas = $input['datas'];
        $ShopModel_order->dates = date('d-m-Y h:i:s A', time ());
        $ShopModel_order->status = "Processing";
        $ShopModel_order->name = $input['name'];
        $ShopModel_order->mobile = $input['mobile'];
        $ShopModel_order->usr_address = $input['usr_address'];
        $ShopModel_order->email = $input['email'];
        $ShopModel_order->payment_method = "wallet";
//         $Restaurant_order->razorPayId = "wallet";
        $ShopModel_order->delivery_boy = "Pending";
        $ShopModel_order->save();

        $order_list =  ShopModel::select('*')->orderBy('id','desc')->get()->toArray();
        
        $datas = $order_list[0]['datas'];

        $book = json_decode($datas);
        
        foreach($book->items as $order_add){
            $datass =  json_encode($order_add);
            $show = json_decode($datass);

            $ShopModel_orderItem = new ShopModel_Item;
            $ShopModel_orderItem->order_id = $order_list[0]['id'];
            $ShopModel_orderItem->name = $show->name;
            $ShopModel_orderItem->image = $show->image;
            $ShopModel_orderItem->price = $show->price;
            $ShopModel_orderItem->cost = $show->cost;
            $ShopModel_orderItem->quantity = $show->quantity;
            $ShopModel_orderItem->save();
        } 
            
        $total_amount_add = $send_amount - $input['total_amount'];

        Wallet::where('user_id', $input['user_id'])->update([
            'amount' => $total_amount_add
        ]);
            
        app()->call('App\Http\Controllers\API\RestaurantController@smsSendAllFunction', [$input['mobile'],urlencode("The Order has placed successfully")]);
        
       
        return response()->json(['message'=>'Order Created Successfully', 'success'=>true]);
        }else{
        return response()->json(['message'=>'insufficient balance..','success' => false]);
     }
        
  }
    
    // Contact List CRUD
  public function emergency_contact(Request $request){
    $input = $request->all();

    $ContactUser = ContactModel::where('user_id',$input['user_id'])->count();

    if($ContactUser <= 4){

        $ContactModel = new ContactModel;
        $ContactModel->user_id = $input['user_id'];
        $ContactModel->name = $input['name'];
        $ContactModel->number = $input['number'];
        $ContactModel->save();
        return response()->json(['data'=>$ContactModel,'message'=>'Add Contact..', 'success'=>true]);
    }else{
        return response()->json(['message'=>'You can add 5 contact..', 'success'=>false]);
    }
  }

  public function emergency_contact_list(Request $request){
        $input = $request->all();

        $list = ContactModel::where('user_id',$input['user_id'])->get();

        if(!empty($list)){
            return response()->json(['data'=>$list,'message'=>'Add Contact..', 'success'=>true]);
        }else{
            return response()->json(['message'=>'There is no contact..', 'success'=>false]);
        }
  }
    
   public function emergency_contact_delete(Request $request){
    $input = $request->all();
    $list_delete = ContactModel::where('id',$input['id'])->delete();
        return response()->json(['message'=>'Delete Contact..', 'success'=>true]);
}
    
    // Restaurant Status
    public function RestaurantStatus(Request $request){
        $input = $request->all();
        
        $checkRequest = Restaurant_order::where('id',$input['order_id'])->count();
    
        if(!empty($checkRequest)){
        $check = Restaurant_order::where('id',$input['order_id'])->first();
        if($check->status == $input['status']){
            return response()->json(['message'=>'already set status', 'success' => false]);
        }else{
            Restaurant_order::where('id',$input['order_id'])->update([
                'status' => $input['status']
            ]);
            }
            app()->call('App\Http\Controllers\API\RestaurantController@smsSendAllFunction', [$check->mobile,urlencode("Your Order has be ".$input['status'])]);
            
            
            return response()->json(['message'=>'status change', 'success' => true]);
        }
        else{
             return response()->json(['message'=>'There is no order ', 'success' => false]);
        }
    //     return response()->json(['message'=>'Order request '.$input['status'], 'status' => true]);
        }
    
    // shop Status
    public function ShopStatus(Request $request){
        $input = $request->all();
        
        $checkRequest = ShopModel::where('id',$input['order_id'])->count();
    
        if(!empty($checkRequest)){
        $check = ShopModel::where('id',$input['order_id'])->first();
        if($check->status == $input['status']){
            return response()->json(['message'=>'already set status', 'success' => false]);
        }else{
            ShopModel::where('id',$input['order_id'])->update([
                'status' => $input['status']
            ]);
            }
            app()->call('App\Http\Controllers\API\RestaurantController@smsSendAllFunction', [$check->mobile,urlencode("Your Order has be ".$input['status'])]);
            
           
            return response()->json(['message'=>'status change', 'success' => true]);
        }
        else{
             return response()->json(['message'=>'There is no order ', 'success' => false]);
        }
    //     return response()->json(['message'=>'Order request '.$input['status'], 'status' => true]);
        }
    
        public function ShopOrderItemList(Request $request){

            $input = $request->all();
        
            //Query to fetch all the vehicle types
            $order_item_list =  ShopModel_Item::where('order_id',$input['id'])->get()->toArray();
                
            if(!empty($order_item_list)){
                  
                  return response()->json(['order_item_list'=>$order_item_list,'message'=>'Order list', 'success'=>true]);  
                  }
            else{
                  return response()->json(['data'=>(object)[], 'message'=>'No order list Found.', 'success'=>false]);  
                
                }
        }
    
            public function ShopOrderListByStatus(Request $request){

            $input = $request->all();
        
            //Query to fetch all the vehicle types
            $order_list =  ShopModel::where('res_id',$input['res_id'])
                                             ->where('status',$input['status'])->orderBy('id','desc')->get()->toArray();
                
            if(!empty($order_list)){
                  
                  return response()->json(['order_list'=>$order_list,'message'=>'Order list', 'success'=>true]);  
                  }
            else{
                  return response()->json(['data'=>(object)[], 'message'=>'No order list Found.', 'success'=>false]);  
                
                }
        }
    
         public function UserOrderListDetails(Request $request){

            $BookingRequestModel = BookingRequestModel::where('order_id',$request->order_id)->first();
            $data = [];
            if($BookingRequestModel->type == "Res"){

                $data = Restaurant_order::where('id',$BookingRequestModel->order_id)->first();
                $OrderCancel = OrderCancel::where('order_id',$BookingRequestModel->order_id)->first();
                if(!empty($OrderCancel)){
                    $data['message'] = $OrderCancel->message;
                }else{
                    $data['message'] = "";
                }
                $data['rating'] = $BookingRequestModel->rating;
                $data['item'] = Restaurant_order_item::where('order_id',$data->id)->get()->toArray();
                return response()->json(['data'=>$data,'message'=>'Res', 'success'=>true]);  

            }
            elseif($BookingRequestModel->type == "Shop"){

                $data = ShopModel::where('id',$BookingRequestModel->order_id)->first();
                $OrderCancel = OrderCancel::where('order_id',$BookingRequestModel->order_id)->first();
                if(!empty($OrderCancel)){
                    $data['message'] = $OrderCancel->message;
                }else{
                    $data['message'] = "";
                }
                $data['rating'] = $BookingRequestModel->rating;
                $data['item'] = ShopModel_Item::where('order_id',$data->id)->get()->toArray();
                return response()->json(['data'=>$data,'message'=>'Shop', 'success'=>true]); 

                return response()->json(['message'=>'Shop', 'success'=>true]);  
            }else{
                return response()->json(['message'=>'Order list', 'success'=>true]);  
            }
        }
    
        public function CancelOrder(Request $request){
            $input = $request->all();

            date_default_timezone_set('Asia/Kolkata');

            $BookingRequestModel = BookingRequestModel::where('order_id',$input['order_id'])->first();

            if($BookingRequestModel->type == "Res"){

            $OrderCancel = new OrderCancel;
            $OrderCancel->order_id = $input['order_id'];
            $OrderCancel->user_id  = $input['user_id'];
            $OrderCancel->res_id   = $input['res_id'];
            $OrderCancel->status = "Cancelled";
            $OrderCancel->message = $input['message'];
            $OrderCancel->dates = date('Y-m-d H:i:s');
            $OrderCancel->save();
            Restaurant_order::where('id',$input['order_id'])->update([
                'status' => "Cancelled"
            ]);
            
            return response()->json(['message'=>'Request send..', 'success'=>true]);
            
           }
           elseif($BookingRequestModel->type == "Shop"){

            $OrderCancel = new OrderCancel;
            $OrderCancel->order_id = $input['order_id'];
            $OrderCancel->user_id  = $input['user_id'];
            $OrderCancel->res_id   = $input['res_id'];
            $OrderCancel->status = "Cancelled";
            $OrderCancel->message = $input['message'];
            $OrderCancel->dates = date('Y-m-d H:i:s');
            $OrderCancel->save();
            ShopModel::where('id',$input['order_id'])->update([
                'status' => "Cancelled"
            ]);
            return response()->json(['message'=>'Request send..', 'success'=>true]);
           
           }
           else{
            return response()->json(['message'=>'Request not send..', 'success'=>false]); 
           }
               
        }
    
            public function rating(Request $request){
            $input = $request->all();
            date_default_timezone_set('Asia/Kolkata');

                $OrderCancel = new RatingModel;
                $OrderCancel->user_id = $input['user_id'];
                $OrderCancel->order_id  = $input['order_id'];
                $OrderCancel->res_id  = $input['res_id'];
                $OrderCancel->msg   = $input['msg'];
                $OrderCancel->rating =  $input['rating'];
                $OrderCancel->dates = date('Y-m-d H:i:s');
                $OrderCancel->save();
                BookingRequestModel::where('order_id',$input['order_id'])->update([
                    'rating' => "true"
                ]);
              
                return response()->json(['message'=>'Thankyou for rating..', 'success'=>true]); 
             
        }
    
    public function driver_list(Request $request){
    $input = $request->all();

    $lat = $request->latitude; 
    $long = $request->longitude;
    
    $requestShowEmp = DB::select("SELECT *, (6371 * acos( cos( radians($lat) ) * cos( radians(curr_latitude) ) * cos( radians(curr_longitude) - radians($long)) + sin(radians($lat)) *sin(radians(curr_latitude)) )) as distance FROM tbl_employees where `type_user`= '1' HAVING distance < 10 "); //Employee::where('type_user',1)->first();

    if(!empty($requestShowEmp)){
         return response()->json(['emp_list'=>$requestShowEmp,'message'=>'Employee list', 'success'=>true]);
     }else{
        return response()->json(['message'=>'Driver not Show', 'status' => false]);
    }
    }

}
