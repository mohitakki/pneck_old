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
use App\Order;
use App\User_feedback;
use Illuminate\Support\Facades\DB;
use Edujugon\PushNotification\PushNotification;
use Illuminate\Support\Str;


class OrderController extends BaseController
{
    public function orderAdd(Request $request){

        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'name' => 'required',
            'product_name' => 'required',
            'product_id' => 'required',
            'image' => 'required',
            'mobile' => 'required',
            'delivery_charge'  => 'required',
            'total' => 'required',
            'tax' => 'required',
            'discount' => 'required',
            'qty' => 'required',
            'final_total' => 'required',
            'promo_code' => '',
            'deliver_by' => 'required',
            'payment_method' => 'required',
            'address' => 'required',
            'delivery_time' => 'required',
            'active_status' => 'required',
            'date_added' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if($request->image != '')
        {
          $rand=rand('100000','999999');
          $destinationPath = public_path(). '/admin_logos/';
          $image_name= $request->image->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->image->move($destinationPath, $image_name);
          $insert->image= $request->root()."/admin_logos/".$image_name;
            
            
        }

        $orders = Order::create($input);


        return $this->sendResponse($orders->toArray(), 'Order created successfully.');
    }    


    public function orderList($id)
    {

        $orders = Order::find($id);

        if (is_null($orders)) {
            return $this->sendError('Order not found.');
        }

        return $this->sendResponse($orders->toArray(), 'Order retrieved successfully.');
    }
    

    public function orderListAll()
    {

        $orders = Order::all();

        if (is_null($orders)) {
            return $this->sendError('Order not found.');
        }

        return $this->sendResponse($orders->toArray(), 'Order retrieved successfully.');
    }


    public function orderDelete($id)
    {
        $delete=Order::find($id);

        if (is_null($delete)) {
            return $this->sendError('Order not found.');
        }
        else{
            $delete=Order::find($id)->delete();
            return $this->sendResponse($delete->toArray(), 'Product deleted successfully.');
        }
    }
}
