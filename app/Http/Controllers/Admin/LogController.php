<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use Auth;
use App\EmailLog;
use App\SMSLog;
use App\PaymentLog;
use App\Helpers\LogActivity;
use App\LogActivity as ActivityLogList;
use App\LoginLog;
use DB;
use Session;

/**
 * Class DashboardController.
 */
class LogController extends Controller
{

    public function login()
    {
    	$data=LoginLog::orderby('id','desc')->get();
    	Session::forget('sidebarid');
        Session::put('sidebarid','13');
        LogActivity::addToLog('Open login log page.');
        return view('admin.login-log',compact('data'));
    }

    public function payment()
    {
    	$data=PaymentLog::orderby('id','desc')->get();
    	Session::forget('sidebarid');
        Session::put('sidebarid','14');
        LogActivity::addToLog('Open payment log page.');
        return view('admin.payment-log',compact('data'));
    }


    public function email()
    {
    	$data=EmailLog::orderby('id','desc')->get();
    	Session::forget('sidebarid');
        Session::put('sidebarid','21');
        LogActivity::addToLog('Open email log page.');
        return view('admin.email-log',compact('data'));
    }


        public function sms()
    {
    	$data=SMSLog::orderby('id','desc')->get();
    	Session::forget('sidebarid');
        Session::put('sidebarid','12');
        LogActivity::addToLog('Open sms log page.');
        return view('admin.sms-log',compact('data'));
    }


        public function Activity()
    {
    	$data=ActivityLogList::orderby('id','desc')->get();
    	Session::forget('sidebarid');
        Session::put('sidebarid','11');
        LogActivity::addToLog('Open activity log page.');
        return view('admin.activity-log',compact('data'));
    }
    
}
