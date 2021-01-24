<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use App\PopUp;
use App\Role;
use App\PopUpType;
use Auth;
use Redirect;
use Hash;
use Session;
use App\Traits\AlertMessage;
use App\Helpers\LogActivity;

class PopUpController extends Controller
{
    use AlertMessage;
    public function view()
    {
        $data = PopUp::orderby('updated_at','desc')->get();;
        $menus = Menu::all();
        $popups = PopUp::where('popup_for','9')->where('status','1')->get();
        $poptypes = PopUpType::all();
        Session::forget('sidebarid');
        Session::put('sidebarid','9');
        LogActivity::addToLog('Open View PopUp Page.');
        return view('admin.popups',compact('data','menus','popups','poptypes'));
    }

    public function create()
    {
        $user=Auth::guard('admin')->user();
        $poptypes = PopUpType::all();
        LogActivity::addToLog('Open Create PopUp Page.');
        if($user->role_type == '1')
        {
          $exist_menus=Menu::where('menu_parent','!=','0')->where('menu_status','1')->get();
            
            foreach($exist_menus as $menu)
            {
              if(count($menu->sub_menus) != 0)
              {
                foreach($menu->sub_menus as $role_sub_menu)
                {
                  $menus[$role_sub_menu->id]=$role_sub_menu->menu_name;
                }
              }
              else
              {
                  $menus[$menu->id]=$menu->menu_name;
              }
            }
            
        }
        else
        {
          $exist_menus=AdminUserMenu::where('menu_status','1')->where('role',$user->role_type)->get(); 
        
          foreach($exist_menus as $menu)
            {
              if(count($menu->sub_menus) != 0)
              {
                foreach($menu->sub_menus as $role_sub_menu)
                {
                  $menus[$role_sub_menu->id]=$role_sub_menu->menu_name;
                }
              }
              else
              {
                  $menus[$menu->id]=$menu->menu_name;
              }
            }
        }
        return view('admin.popup_create',compact('menus','user','poptypes'));
    }
    

    public function submit(Request $request)
    {
      
        $insert=new PopUp($request->all());
        $insert->updated_by=Auth::guard('admin')->user()->id;
        $inserted=$insert->save();
        $alert_message=$this->alerts('9');
        if($inserted)
        {
          LogActivity::addToLog('Submit New PopUp.');
          return redirect::route('admin.popups')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['6']);
        } 
      
      
    }

    public function edit($id)
    {
        $data=PopUp::find($id);
        $user=Auth::guard('admin')->user();
        LogActivity::addToLog('Open edit popup page.');
        $poptypes = PopUpType::all();
        if($user->role_type == '1')
        {
          $exist_menus=Menu::where('menu_parent','!=','0')->where('menu_status','1')->get();
            
            foreach($exist_menus as $menu)
            {
              if(count($menu->sub_menus) != 0)
              {
                foreach($menu->sub_menus as $role_sub_menu)
                {
                  $menus[$role_sub_menu->id]=$role_sub_menu->menu_name;
                }
              }
              else
              {
                  $menus[$menu->id]=$menu->menu_name;
              }
            }
            
        }
        else
        {
          $exist_menus=AdminUserMenu::where('menu_status','1')->where('role',$user->role_type)->get(); 
        
          foreach($exist_menus as $menu)
            {
              if(count($menu->sub_menus) != 0)
              {
                foreach($menu->sub_menus as $role_sub_menu)
                {
                  $menus[$role_sub_menu->id]=$role_sub_menu->menu_name;
                }
              }
              else
              {
                  $menus[$menu->id]=$menu->menu_name;
              }
            }
        }
        return view('admin.edit_popup',compact('data','menus','user','poptypes'));
    }


    public function update(Request $request)
    {
      $exist=PopUp::find($request->id);
      $exist->updated_by=Auth::guard('admin')->user()->id;
      $exist->popup_for=$request->popup_for;
      $exist->popup_type=$request->popup_type;
      $exist->popup_title=$request->popup_title;
      $exist->popup_message=$request->popup_message;
      $updated=$exist->save();
      $alert_message=$this->alerts('9');
      if($updated)
        {

          LogActivity::addToLog('Update The PopUp.');
          return redirect::route('admin.popups')->with('success',$alert_message['2']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['7']);
        } 
    }

    public function uncheck($id)
    {

      $exist=PopUp::find($id);
      $exist->status='0';
      $updated=$exist->save();
      $alert_message=$this->alerts('9');
      if($updated)
        {

          LogActivity::addToLog('Inactive The PopUp.');
          Session::flash('success', $alert_message['4']);
        }
        else
        {
          Session::flash('error', $alert_message['9']);
        }

    }
    public function check($id)
    {

      $exist=PopUp::find($id);
      $exist->status='1';
      $updated=$exist->save();
      $alert_message=$this->alerts('9');
      if($updated)
        {

          LogActivity::addToLog('Active The PopUp.');
          Session::flash('success', $alert_message['3']);
        }
        else
        {
          Session::flash('error', $alert_message['8']);
        }

    }

    public function delete($id)
    {

      $delete=PopUp::find($id)->delete();
      $alert_message=$this->alerts('9');
      if($delete)
        {
          LogActivity::addToLog('Delete The PopUp.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }

    }
}
