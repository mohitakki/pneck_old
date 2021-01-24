<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use App\Alert;
use App\AlertType;
use App\Role;
use Auth;
use Redirect;
use Hash;
use App\PopUp;
use Session;
use App\Traits\AlertMessage;
use App\Helpers\LogActivity;

class AlertController extends Controller
{

    use AlertMessage;

    public function view()
    {
        $data = Alert::orderby('updated_at','desc')->get();;
        $menus = Menu::all();
        $types= AlertType::all();
        $popups = PopUp::where('popup_for','10')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','10');
        LogActivity::addToLog('Open alert page.');

        return view('admin.alerts',compact('data','menus','types','popups'));
    }

    public function create()
    {
        $user=Auth::guard('admin')->user();
        LogActivity::addToLog('Open alert create page.');
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
        $types=AlertType::all();
        return view('admin.alert_create',compact('menus','types'));
    }
    

    public function submit(Request $request)
    {

      $exist=Alert::where('alert_for',$request->alert_for)->where('alert_type',$request->alert_type)->first();
      $alert_message=$this->alerts('10');
      if($exist == '')
      {

        $insert=new Alert($request->all());
        $insert->updated_by=Auth::guard('admin')->user()->id;
        $inserted=$insert->save();
        if($inserted)
        {
          LogActivity::addToLog('Add a new alert.');
          return redirect::route('admin.alerts')->with('success',$alert_message['1']);
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
        $data=Alert::find($id);
        $user=Auth::guard('admin')->user();
        LogActivity::addToLog('Open alert edit page.');
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
        $types=AlertType::all();
        return view('admin.edit_alert',compact('data','menus','types'));
    }


    public function update(Request $request)
    {
      $exist=Alert::find($request->id);
      $data_exist=Alert::where('alert_for',$request->alert_for)->where('alert_type',$request->alert_type)->first();
      $alert_message=$this->alerts('10');

      if($data_exist->id == $exist->id)
      {
        $exist->updated_by=Auth::guard('admin')->user()->id;
        $exist->alert_for=$request->alert_for;
        $exist->alert_type=$request->alert_type;
        $exist->alert_title=$request->alert_title;
        $exist->alert_message=$request->alert_message;
        $updated=$exist->save();
        if($updated)
        {

          LogActivity::addToLog('Edit a alert.');
          return redirect::route('admin.alerts')->with('success',$alert_message['2']);
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
      

     public function check($id)
    {

      $exist=Alert::find($id);
      $exist->status='1';
      $updated=$exist->save();
      $alert_message=$this->alerts('10');
      if($updated)
        {

          LogActivity::addToLog('Active a alert.');
          Session::flash('success', $alert_message['3']);
        }
        else
        {
          Session::flash('error', $alert_message['8']);
        }

    }

    public function uncheck($id)
    {

      $exist=Alert::find($id);
      $exist->status='0';
      $updated=$exist->save();
      $alert_message=$this->alerts('10');
      if($updated)
        {

          LogActivity::addToLog('InActive a alert.');
          Session::flash('success', $alert_message['4']);
        }
        else
        {
          Session::flash('error', $alert_message['9']);
        }

    }

    public function delete($id)
    {

      $delete=Alert::find($id)->delete();
      $alert_message=$this->alerts('10');
      if($delete)
        {

          LogActivity::addToLog('Delete a alert.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }

    }
}
