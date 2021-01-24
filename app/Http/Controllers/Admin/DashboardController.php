<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Customer;
use App\Employee;
use App\Vendor;
use App\Booking;
use App\Admin;
use Auth;
use DB;
use App\Helpers\LogActivity;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{

    public function index()
    {
        $userDistributor = 0;
        $userAgent = 0;
        $userDBM = 0;
        $agentCount = '';
        
            if(Auth::user()->id == 1)
            {
            $userCount = Customer::all()->count();
            $EmployeeCount = Employee::all()->count();
            $VendorCount = Vendor::all()->count();
            $userDistributor = Admin::where('role_type',2)->count();
            $userAgent = Admin::where('role_type',3)->count();
            $userDBM = Admin::where('role_type',5)->count();
            }
            else{
            $userCount = Customer::all()->count();
            $EmployeeCount = Employee::where('branch_id',Auth::user()->branch_id)
            ->where('branch_id','!=','NULL')->count();
            
            $VendorCount = Vendor::where('branch_id',Auth::user()->branch_id)
            ->where('branch_id','!=','NULL')->count();
            $agentCount = '';
            $agent = Admin::where('id',Auth::user()->id)->where('assign_agent','!=','')->first();
                if($agent['assign_agent'])
                {
                    $agentCount = count(explode(',',$agent['assign_agent']));
                }
                else{
                    $agentCount = '';
                }            
            
            }

            $totalSuccessRides = Booking::where('order_status','order_completed')->count();
            $totalFailRides = Booking::where('order_status','rejected')->count();
            $totalCOD = Booking::where('order_status','order_completed')->where('payment_mode','COD')->count();
            $totalEarning = Booking::where('order_status','order_completed')->where('payment_mode','COD')->where('booking_charge','50')->sum('booking_charge');
            
            $totalsales = Booking::select(
                DB::raw('sum(booking_charge) as sums'), 
                DB::raw("DATE_FORMAT(created_at,'%M') as months"))
                ->where('order_status','order_completed')
                ->where('payment_mode','COD')
                ->where('booking_charge','50')
                ->where(DB::raw("DATE_FORMAT(created_at,'%Y')"),'2020')
                ->groupBy('months')
                ->orderBy(DB::raw("DATE_FORMAT(created_at,'%m')"),'asc')
                ->get();
                
               
                $sales = '';
                $month = '';

                foreach($totalsales as $monthsales)
                {
                    $sales .= $monthsales->sums.',';
                    $month .= "'$monthsales->months'".',';
                }

                $monthsales = rtrim($sales,',');

               $month = rtrim($month,',');
               
              
               
            
    		LogActivity::addToLog('Open dashboard page.');
            return view('admin.dashboard',compact('userDistributor','userAgent','userDBM','userCount','EmployeeCount','VendorCount',

            'totalSuccessRides','totalFailRides','totalCOD','totalEarning','monthsales','month',"agentCount"));
    }
    
}

