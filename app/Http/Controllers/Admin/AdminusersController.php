<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use App\State;
use App\City;
use App\PopUp;
use App\Alert;
use App\AlertType;
use App\Role;
use Auth;
use Redirect;
use Hash;
use Session;
use App\Traits\AlertMessage;
use App\Helpers\LogActivity;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class AdminusersController extends Controller
{
    
    use AlertMessage;

    public function users(Request $request)
    {
    	if($request->all())
      {
        
        $users= Admin::where('admins_users.state_id',$request->state_id)
        ->orWhere('admins_users.city_id',$request->city_id)
      ->select('admins_users.*')
      ->orderBy('updated_at', 'desc')->get();
      }
      else{

          if(Auth::user()->id == '1')
          {
            
        $users= Admin::orderBy('updated_at', 'desc')->get();

             /* foreach($users as $user)
              {
                if($user->city != ''){
                  echo $user->city->city_name;
                  exit;
                }
              } */
          }
          else{
            $users= Admin::orderBy('updated_at', 'desc')->get();

            
          }
      }

      
        
        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','15');
        LogActivity::addToLog('View the user list.');
        return view('admin.userlists',compact('users','popups'));
   	}
   	
   	public function dbm(Request $request)
    {
      
      if($request->all())
      {
        
        $users= Admin::where('admins_users.state_id',$request->state_id)->where('role_type','=','5')
        ->orWhere('admins_users.city_id',$request->city_id)
        ->select('admins_users.*')
        ->orderBy('updated_at', 'desc')->get();
      }
      else{

          if(Auth::user()->id == '1')
          {
            
        $users= Admin::orderBy('updated_at', 'desc')->where('role_type','=','5')->get();
             
          }
          else{
            $agentId = explode(',',Auth::user()->assign_agent);
            
            $users= Admin::whereIn('id',$agentId)->orderBy('updated_at', 'desc')->get();
            
          }
      }
        
        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','15');
        LogActivity::addToLog('View the dbm list.');
        return view('admin.dbm',compact('users','popups'));
     }

   	
   	public function distributor(Request $request)
    {
      
      if($request->all())
      {
        
        $users= Admin::where('admins_users.state_id',$request->state_id)->where('role_type','=','2')
        ->orWhere('admins_users.city_id',$request->city_id)
      ->select('admins_users.*')
      ->orderBy('updated_at', 'desc')->get();
      }
      else{

          if(Auth::user()->id == '1')
          {
            
                if(\Request::segment(2)=='distributorlist' && \Request::segment(3)=='')
                {
                  
                  $query= Admin::where('role_type',2)->orderBy('updated_at', 'desc')->get();
                  $users = $query;
                }else{
                  $query= Admin::where('id',\Request::segment(3))->orderBy('updated_at', 'desc')->first();
                  $agentId = explode(',',$query->assign_agent);
                  $users = $query->whereIn('id',$agentId)->get();      
                }
             
          }
          else{
            $agentId = explode(',',Auth::user()->assign_agent);
            
            $users= Admin::whereIn('id',$agentId)->orderBy('updated_at', 'desc')->get();
            
          }
      }
        
        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','15');
        LogActivity::addToLog('View the distributor list.');
        return view('admin.distributorlist',compact('users','popups'));
     }
   	
   	public function agent(Request $request)
    {
      
      if($request->all())
      {
        
        $users= Admin::where('admins_users.state_id',$request->state_id)->where('id','!=','1')
        ->orWhere('admins_users.city_id',$request->city_id)
      ->select('admins_users.*')
      ->orderBy('updated_at', 'desc')->get();
      }
      else{
          
          if(Auth::user()->id == '1')
          {

            if(\Request::segment(2)=='agentlist' && \Request::segment(3)=='')
            {
              
              $query= Admin::where('role_type',3)->orderBy('updated_at', 'desc')->get();
              $users = $query;
            }else{
              $query= Admin::where('id',\Request::segment(3))->orderBy('updated_at', 'desc')->first();
              $agentId = explode(',',$query->assign_agent);
              $users = $query->whereIn('id',$agentId)->get();      
            }
            
          }
          else{
            $agentId = explode(',',Auth::user()->assign_agent);
            
            $users= Admin::whereIn('id',$agentId)->orderBy('updated_at', 'desc')->get();
            
          }
      }
        
        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','15');
        LogActivity::addToLog('View the user list.');
        return view('admin.agentlist',compact('users','popups'));
     }
   	
   	 public function search()
     {
         $roles = Role::all();
         $state = State::where('country_id','10')->orderBy('name','asc')->get();
         LogActivity::addToLog('Open the user create page.');
         return view('admin.usersearch',compact('roles','state'));
      }
   	
   	 //For fetching states
    public function getStates($id)
    {
        $states = State::where("country_id",$id)->orderBy('name','asc')
                    ->pluck("state_name","id");
        return response()->json($states);
    }

    //For fetching cities
    public function cities($id)
    {
      
        $cityinfo = City::where("state_id",$id)->get();
          $cities = $cityinfo->pluck("city_name","id");         
        return response()->json($cities);
    }

   	public function create()
    {
        $roles = Role::all();
        $users= Admin::orderBy('updated_at', 'desc')->where('role_type',3)->get();
        $distributor= Admin::orderBy('updated_at', 'desc')->where('role_type',2)->get();
         $state = State::where('country_id','10')->orderBy('name','asc')->get();
        LogActivity::addToLog('Open the user create page.');
    		return view('admin.usercreate',compact('roles','state','users','distributor'));
   	}
    

    public function submit(Request $request)
    {
    	$exist=Admin::where('email',$request->email)->first();
    	$alert_message=$this->alerts('15');
        
        if($exist =='')
    	{
    		$insert=new Admin($request->all());
    		
        if(!empty($request->assign_agent))
        {
            $assign_agent = implode(',',$request->assign_agent);
            $insert->assign_agent = $assign_agent;
        }
        
        
        if(!empty($request->assign_distributor))
        {
          
          $assign_distributor = implode(',',$request->assign_distributor);
            $insert->assign_distributor = $assign_distributor;
        }
        
     
    		 
    		$insert->password=Hash::make($request->password);
    		$insert->branch_id = 'BRID'.mt_rand(111,999);
    	
    	
    	if($request->role_type==2)
        {
          $AgentId = IdGenerator::generate(['table' => 'admins_users','field' => 'mobile','length' => 6,'prefix'=> 'DISID' ]); 
          $insert->agent_id = $AgentId;
        }
        if($request->role_type==3)
        {
          $AgentId = IdGenerator::generate(['table' => 'admins_users','field' => 'mobile','length' => 6,'prefix'=> 'AGID' ]); 
          $insert->agent_id = $AgentId;
        }
        if($request->role_type==5)
        {
          $AgentId = IdGenerator::generate(['table' => 'admins_users','field' => 'mobile','length' => 6,'prefix'=> 'DBMID' ]); 
          $insert->agent_id = $AgentId;
        }   
    	    
    		$inserted=$insert->save();
          if($inserted)
          {
            LogActivity::addToLog('Create a new user in admin panel.');
            return redirect::route('admin.users')->with('success',$alert_message['1']);
          }
          else
          {
            return redirect::back()->with('error',$alert_message['6']);
          }  
    	}
    	else
    	{
    		return redirect::back()->with('warning',$alert_message['11']);
    	}
    	
    }

    public function edit($id)
    {
    		$user=Admin::find($id);
        $roles = Role::all();
        $distributor= Admin::orderBy('updated_at', 'desc')->where('role_type','2')->get();
        $users= Admin::orderBy('updated_at', 'desc')->where('role_type','3')->get();
         $state = State::where('country_id','10')->orderBy('name','asc')->pluck('name','id');
        $city = City::where('country_id','10')->orderBy('city_name','asc')->pluck('city_name','id');
        LogActivity::addToLog('Open edit user page.');
    		return view('admin.edituser',compact('user','users','roles','state','city','distributor'));
        
   	}


   	public function update(Request $request)
   	{
   		$exist=Admin::find($request->id);
      $data_exist=Admin::where('email',$request->email)->first();
      $alert_message=$this->alerts('15');

      if(empty($data_exist) || ($data_exist->id == $exist->id))
      {

          if(!empty($request->role_type))
          {
            $exist->role_type=$request->role_type;
          }
          
          if(!empty($request->assign_agent))
          {
              $assign_agent = implode(',',$request->assign_agent);
              $exist->assign_agent = $assign_agent;
          }
  
          if(!empty($request->assign_distributor))
          {           
              $assign_distributor = implode(',',$request->assign_distributor);
              $exist->assign_agent = $assign_distributor;
          }
          
            $exist->first_name=$request->first_name;
       		$exist->last_name=$request->last_name;
       		$exist->mobile=$request->mobile;
       		$exist->email=$request->email;
       		$exist->latitude=$request->latitude;
            $exist->lognitude=$request->lognitude;
            $exist->address=$request->address;
            $exist->state_id=$request->state_id;
            $exist->city_id=$request->city_id;
           
          if(!empty($request->password))
          {
       		 $exist->password=Hash::make($request->password);
            
          }
          if($request->image != '')
          {
            $rand=rand('100000','999999');
            $destinationPath = public_path('/admin_image');
            $image_name=$request->image->getClientOriginalName();
            $image_name = $rand.str_replace(' ','',$image_name);
            $request->image->move($destinationPath, $image_name);
            $exist->image=$image_name;
          }

       		$updated=$exist->save();
       		if($updated)
    	    	{
              if(!empty($request->url))
              {
                return redirect::back()->with('success',$alert_message['2']);
              }
              else
              {
                LogActivity::addToLog('Edit the user.');
    	    		   return redirect::route('admin.users')->with('success',$alert_message['2']);
              }
    	    	}
    	    	else
    	    	{
    	    		return redirect::back()->with('error',$alert_message['7']);
    	    	}
      }
      else
      {
        return redirect::back()->with('warning',$alert_message['12']);
      }	
   	}

   	public function uncheck($id)
   	{

   		$exist=Admin::find($id);
   		$exist->status='0';
   		$updated=$exist->save();
        
       $alert_message=$this->alerts('15');
      if($updated)
	    	{
          LogActivity::addToLog('Inactive the user.');
	    		Session::flash('success', $alert_message['4']); 
	    	}
	    	else
	    	{
	    		Session::flash('error', $alert_message['9']);
	    	}

   	}
   	public function check($id)
   	{

   		$exist=Admin::find($id);
   		$exist->status='1';
   		$updated=$exist->save();  
      $alert_message=$this->alerts('15');
      if($updated)
	    	{
          LogActivity::addToLog('Active the user.');
	    		Session::flash('success', $alert_message['3']);
	    	}
	    	else
	    	{
	    		Session::flash('error', $alert_message['8']);
	    	}

   	}

    public function delete($id)
    {

      $delete=Admin::find($id)->delete();
      $alert_message=$this->alerts('15');
      if($delete)
        {
          LogActivity::addToLog('Delete the user.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }

    }
	
	public function vehicleType(){
		
		
	}
}
