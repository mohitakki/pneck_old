<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            // 'data'    => $result,
            'message' => $message,
            'data'    => $result,
        ];

        /////////
        $send_response=array('response'=>$response);


        return response()->json($send_response, 200);
    }
    public function sendResponseonestatus($result, $message)
    {
    	$response = [
            'success' => "1",
            // 'data'    => $result,
            'message' => $message,
            'data'    => $result,
        ];

        /////////
        $send_response=array('response'=>$response);


        return response()->json($send_response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        $send_response=array('response'=>$response);


        return response()->json($send_response, $code);
    }
    public function sendErrorzerostaus($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => "0",
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        $send_response=array('response'=>$response);


        return response()->json($send_response, $code);
    }
    /***system wrning like :Duplicate Email , Mobile
    @ appError
    @ system wrning like :Duplicate Email , Mobile

    */
     public function appError($error, $errorMessages = [], $code = 200)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        $send_response=array('response'=>$response);


        return response()->json($send_response, $code);
    }






    ////
}