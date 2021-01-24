<?php


namespace App\Helpers;
use Request;
use App\LogActivity as LogActivityModel;
use Auth;


class LogActivity
{


    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	$log['user_id'] = Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name;
    	LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
    	return LogActivityModel::latest();
    }


}
