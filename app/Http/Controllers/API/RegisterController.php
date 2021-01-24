<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class RegisterController extends BaseController
{
 protected function sendOTP($mobile){
   //return 'OTP send';
    $msg_url="http://pneck.in/emp_login_otp.php?mob=".$mobile."&msg=RohitK99";
     return file_get_contents($msg_url);
     // return $msg_url;
   }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        $mobile='7291920268';
        //////////Send OTP//////////////


        

        //////////Send OTP////////////////


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

            
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
         //print_r($input); die;
         $input['name']='TH';

        $user = User::create($input);
       // $success['token'] =  $user->createToken('MyApp')->accessToken;
         //$len=strlen($success['token']);
         //print_r($len); die;

        $success['name'] =  $user->name;


        return $this->sendResponse($success, 'xxregister successfully.');
    }
}