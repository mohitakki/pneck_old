<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Customer;
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


class PneckusersController extends Controller
{
    
    use AlertMessage;

    public function pneckUsers()
    {
    		$users = Customer::orderby('updated_at','desc')->get();
        $popups = PopUp::where('popup_for','15')->where('status','1')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','15');
        LogActivity::addToLog('View the Pneck User list.');
        return view('admin.pneckuserlists',compact('users','popups'));
   	}

   	public function create()
    {
        $roles = Role::all();
        LogActivity::addToLog('Open the user create page.');
    		return view('admin.usercreate',compact('roles'));
   	}
    

    public function submit(Request $request)
    {
    	$exist=Admin::where('email',$request->email)->first();
    	$alert_message=$this->alerts('15');
      if($exist =='')
    	{
    		$insert=new Admin($request->all());
    		$insert->password=Hash::make($request->password);
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
        
        $user=Customer::find($id);
        $roles = Role::all();
        LogActivity::addToLog('Open edit pneck user page.');
    	return view('admin.pneckedituser',compact('user','roles'));
   	}


   	public function update(Request $request)
   	{
   		$exist=Customer::find($request->id);
      $data_exist=Customer::where('email',$request->email)->first();
      $alert_message=$this->alerts('15');

      if(empty($data_exist) || ($data_exist->id == $exist->id))
      {

          if(!empty($request->role_type))
          {
            $exist->role_type=$request->role_type;
          }
          $exist->first_name=$request->first_name;
       		$exist->last_name=$request->last_name;
       		$exist->mobile=$request->mobile;
       		$exist->email=$request->email;
         /*  if(!empty($request->password))
          {
       		 $exist->password=Hash::make($request->password);
            
          } */
          if($request->image != '')
          {
            $rand=rand('100000','999999');
            $destinationPath = storage_path('/user_img/');
            $image_name=$request->image->getClientOriginalName();
            $image_name = $rand.str_replace(' ','',$image_name);
            $request->image->move($destinationPath, $image_name);
            $exist->profile_image=$image_name;
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
                LogActivity::addToLog('Edit the Pneck user.');
    	    		   return redirect::route('admin.pneckusers')->with('success',$alert_message['2']);
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

   		$exist=Customer::find($id);
   		$exist->status='0';
   		$updated=$exist->save();
        
       $alert_message=$this->alerts('15');
      if($updated)
	    	{
          LogActivity::addToLog('Inactive the Pneck user.');
	    		Session::flash('success', $alert_message['4']); 
	    	}
	    	else
	    	{
	    		Session::flash('error', $alert_message['9']);
	    	}

   	}
   	public function check($id)
   	{

   		$exist=Customer::find($id);
   		$exist->status='1';
   		$updated=$exist->save();  
      $alert_message=$this->alerts('15');
      if($updated)
	    	{
          LogActivity::addToLog('Active the Pneck user.');
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
}
