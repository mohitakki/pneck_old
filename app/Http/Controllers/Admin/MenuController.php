<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\MenuIcon;
use App\AdminUserMenu;
use App\Admin;
use App\PopUp;
use App\Role;
use Auth;
use Redirect;
use Hash;
use App\Traits\AlertMessage;
use Session;
use App\Helpers\LogActivity;

class MenuController extends Controller
{

    use AlertMessage;

    public function menus()
    {
        $menus_icons=MenuIcon::all();
        $user=Auth::guard('admin')->user();
        $role=$user->role_type;
        if($role == '1')
        {
    		  $menus = Menu::all();
        }
        else
        {
          $menus = AdminUserMenu::where('role',$role)->get();
        }
          $popups = PopUp::where('popup_for','23')->get();
          Session::forget('sidebarid');
          Session::put('sidebarid','23');
          LogActivity::addToLog('Open View Menu List Page.');
          return view('admin.menulists',compact('menus','popups','menus_icons'));
   	}

   	public function update(Request $request)
   	{

      $user=Auth::guard('admin')->user();
      $alert_message=$this->alerts('23');

      if($user->role_type == '1')
      {
     		$exist=Menu::find($request->id);
     		$exist->menu_name=$request->menu_name;
            $exist->menu_icon=$request->menu_icon;
            if(!empty($request->menu_status))
            {
                $exist->menu_status=$request->menu_status;   
            }
     		$updated=$exist->save();
     		if($updated)
  	    	{
  	    		return redirect::route('admin.menus');
  	    	}
  	    	else
  	    	{
  	    		return redirect::back();
  	    	}
      }
      else
      {
        $exist=AdminUserMenu::find($request->id);
        $exist->menu_name=$request->menu_name;
        $exist->menu_icon=$request->menu_icon;
        $exist->menu_status=$request->menu_status;
        $updated=$exist->save();
        if($updated)
          {
            \LogActivity::addToLog('Update The Menu.'); 
            return redirect::route('admin.menus')->with('success',$alert_message['2']);
          }
          else
          {
            return redirect::back()->with('error',$alert_message['7']);
          }
         
      }	
   	}

   	public function uncheck($id)
   	{

      $user=Auth::guard('admin')->user();
      $alert_message=$this->alerts('23');
      if($user->role_type == '1')
      {
     		$exist=Menu::find($id);
     		$exist->menu_status='0';
     		$updated=$exist->save();
     		if($updated)
        {
          \LogActivity::addToLog('Inactive The Menu.');
          Session::flash('success', $alert_message['4']);
        }
        else
        {
          Session::flash('error', $alert_message['9']);
        }
      }
      else
      {
        $exist=AdminUserMenu::find($id);
        $exist->menu_status='0';
        $updated=$exist->save();
        if($updated)
        {
          \LogActivity::addToLog('Inactive The Menu.');
          Session::flash('success', $alert_message['4']);
        }
        else
        {
          Session::flash('error', $alert_message['9']);
        }
      }

   	}
   	public function check($id)
   	{

      $user=Auth::guard('admin')->user();
      $alert_message=$this->alerts('23');
      if($user->role_type == '1')
      {
     		$exist=Menu::find($id);
     		$exist->menu_status='1';
     		$updated=$exist->save();
     		if($updated)
        {
          \LogActivity::addToLog('Active The Menu.');
          Session::flash('success', $alert_message['3']);
        }
        else
        {
          Session::flash('error', $alert_message['8']);
        }
      }
      else
      {
        $exist=AdminUserMenu::find($id);
        $exist->menu_status='1';
        $updated=$exist->save();
        if($updated)
        {
          \LogActivity::addToLog('Active The Menu.');
          Session::flash('success', $alert_message['3']);
        }
        else
        {
          Session::flash('error', $alert_message['8']);
        }
      }

   	}


    public function delete($id)
    {

      $user=Auth::guard('admin')->user();
      $alert_message=$this->alerts('23');
      if($user->role_type == '1')
      {
        $delete=Menu::find($id)->delete();
        if($delete)
        {
          \LogActivity::addToLog('Delete The Menu.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }
      }
      else
      {
        $delete=AdminUserMenu::find($id)->delete();
        if($delete)
        {
          \LogActivity::addToLog('Delete The Menu.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }
      }

    }
}
