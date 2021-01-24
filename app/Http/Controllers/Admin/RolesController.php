<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use App\Role;
use App\PopUp;
use App\AdminUserMenu;
use Session;
use Auth;
use Redirect;
use Hash;
use App\Traits\AlertMessage;
use App\Helpers\LogActivity;


class RolesController extends Controller
{
    use AlertMessage;

    public function roles()
    {
    	     $roles = Role::orderby('updated_at','desc')->get();
          $popups = PopUp::where('popup_for','16')->get();
          Session::forget('sidebarid');
        Session::put('sidebarid','16');
        LogActivity::addToLog('Open View Role Page.');
          return view('admin.rolelists',compact('roles','popups'));
   	}

   	public function create()
    {
        $menus=Menu::all();
        LogActivity::addToLog('Open Create Role Page.');
    	return view('admin.rolecreate',compact('role','menus'));
   	}
    

    public function submit(Request $request)
    {
    	$exist=Role::where('role_name',$request->role_name)->first();
      $alert_message=$this->alerts('16');
    	if($exist =='')
    	{
    		$role_insert=new Role($request->all());
    		$inserted=$role_insert->save();

        	if($inserted)
	    	  {

			          $selected_menus=$request->checkboxlist;

			          if(!empty($selected_menus))
			          {
				          foreach($selected_menus as $menu)
				          {
                    $get_data=Menu::where('id',$menu)->first();
                    $data_exist=AdminUserMenu::where('role',$role_insert->id)->where('menu_id',$get_data->id)->first();
                    if(empty($data_exist))
                    {
				              $insert=new AdminUserMenu();
				              $insert->menu_id=$get_data->id;
				              $insert->menu_name=$get_data->menu_name;
				              $insert->menu_icon=$get_data->menu_icon;
				              $insert->menu_parent=$get_data->menu_parent;
				              $insert->menu_link=$get_data->menu_link;
				              $insert->menu_status=$get_data->menu_status;
				              $insert->sort=$get_data->sort;
				              $insert->role=$role_insert->id;
				              $inserted=$insert->save();

                      $parentmenu = $get_data->parent_menus;
                      
                      if(!empty($parentmenu))
                      {
                        $get_data=Menu::where('id',$parentmenu->id)->first();
                        $data_exist_parent=AdminUserMenu::where('role',$role_insert->id)->where('menu_id',$parentmenu->id)->first();

                        if(empty($data_exist_parent))
                        {
                            $insert=new AdminUserMenu();
                            $insert->menu_id=$parentmenu->id;
                            $insert->menu_name=$parentmenu->menu_name;
                            $insert->menu_icon=$parentmenu->menu_icon;
                            $insert->menu_parent=$parentmenu->menu_parent;
                            $insert->menu_link=$parentmenu->menu_link;
                            $insert->menu_status=$parentmenu->menu_status;
                            $insert->sort=$parentmenu->sort;
                            $insert->role=$role_insert->id;
                            $inserted=$insert->save();

                            $parent_parentmenu = $parentmenu->parent_menus;

                          if(!empty($parent_parentmenu))
                          {
                              $get_data=Menu::where('id',$parent_parentmenu->id)->first();
                              $data_exist_parent1=AdminUserMenu::where('role',$role_insert->id)->where('menu_id',$parent_parentmenu->id)->first();

                                if(empty($data_exist_parent1))
                                {
                                    $insert=new AdminUserMenu();
                                    $insert->menu_id=$parent_parentmenu->id;
                                    $insert->menu_name=$parent_parentmenu->menu_name;
                                    $insert->menu_icon=$parent_parentmenu->menu_icon;
                                    $insert->menu_parent=$parent_parentmenu->menu_parent;
                                    $insert->menu_link=$parent_parentmenu->menu_link;
                                    $insert->menu_status=$parent_parentmenu->menu_status;
                                    $insert->sort=$parent_parentmenu->sort;
                                    $insert->role=$role_insert->id;
                                    $inserted=$insert->save();
                                }
                          }
                        }
                      }
				            }
                  }
                }
                	LogActivity::addToLog('Submit New Role.');
	    		     return redirect::route('admin.roles')->with('success',$alert_message['1']);
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
    	$role=Role::find($id);
        $menus=Menu::all();
        $rolemenus=AdminUserMenu::where('role',$id)->get();  
        LogActivity::addToLog('Open Edit Role Page.');
          if(count($rolemenus) > 0)
          {
              foreach($rolemenus as $rolemenu)
              {
                $existrole_menu[]=$rolemenu->menu_id;
              }
          }
          else
          {
            $existrole_menu=[];
          }
    		return view('admin.editrole',compact('role','menus','existrole_menu'));
   	}


   	public function update(Request $request)
   	{
   		$exist=Role::find($request->id);
      $data_exist=Role::where('role_name',$request->role_name)->first();
      $alert_message=$this->alerts('16');

      if(empty($data_exist->id))
      {
          $exist->role_name=$request->role_name;
          $updated=$exist->save();
          if($updated)
            {

              $selected_menus=$request->checkboxlist;

              if(!empty($selected_menus))
              {

                foreach($selected_menus as $menu)
                {
                  $get_data=Menu::where('id',$menu)->first();

                  $exist_menu=AdminUserMenu::where('role',$request->id)->where('menu_id',$get_data->id)->first();

                    if(empty($exist_menu))
                    {
                      $insert=new AdminUserMenu();
                      $insert->menu_id=$get_data->id;
                      $insert->menu_name=$get_data->menu_name;
                      $insert->menu_icon=$get_data->menu_icon;
                      $insert->menu_parent=$get_data->menu_parent;
                      $insert->menu_link=$get_data->menu_link;
                      $insert->menu_status=$get_data->menu_status;
                      $insert->sort=$get_data->sort;
                      $insert->role=$request->id;
                      $inserted=$insert->save();

                      $parentmenu = $get_data->parent_menus;

                      if(!empty($parentmenu))
                      {
                        $get_data=Menu::where('id',$parentmenu->id)->first();
                        $data_exist_parent=AdminUserMenu::where('role',$request->id)->where('menu_id',$parentmenu->id)->first();

                        if(empty($data_exist_parent))
                        {

                            $insert=new AdminUserMenu();
                            $insert->menu_id=$parentmenu->id;
                            $insert->menu_name=$parentmenu->menu_name;
                            $insert->menu_icon=$parentmenu->menu_icon;
                            $insert->menu_parent=$parentmenu->menu_parent;
                            $insert->menu_link=$parentmenu->menu_link;
                            $insert->menu_status=$parentmenu->menu_status;
                            $insert->sort=$parentmenu->sort;
                            $insert->role=$request->id;
                            $inserted=$insert->save();

                            $parent_parentmenu = $parentmenu->parent_menus;

                          if(!empty($parent_parentmenu))
                          {
                              $get_data=Menu::where('id',$parent_parentmenu->id)->first();
                              $data_exist_parent1=AdminUserMenu::where('role',$request->id)->where('menu_id',$parent_parentmenu->id)->first();

                                if(empty($data_exist_parent1))
                                {
                                    $insert=new AdminUserMenu();
                                    $insert->menu_id=$parent_parentmenu->id;
                                    $insert->menu_name=$parent_parentmenu->menu_name;
                                    $insert->menu_icon=$parent_parentmenu->menu_icon;
                                    $insert->menu_parent=$parent_parentmenu->menu_parent;
                                    $insert->menu_link=$parent_parentmenu->menu_link;
                                    $insert->menu_status=$parent_parentmenu->menu_status;
                                    $insert->sort=$parent_parentmenu->sort;
                                    $insert->role=$request->id;
                                    $inserted=$insert->save();
                                }
                          }
                        }
                      }
                    } 
                }

                      $exist_menus=AdminUserMenu::where('role',$request->id)->get();
                      
                      foreach($exist_menus as $parentmenu)
                      {
                        if(!empty($parentmenu->menu_parent))
                        {
                          $parent_menu[]=$parentmenu->menu_parent;
                        }
                      }
                      $parent_menu=array_unique($parent_menu);
                    

                      foreach($exist_menus as $exist_menu)
                      {
                          $menus[]=$exist_menu->menu_id; 
                      }

                      $delete_values=array_diff($menus, $selected_menus);
                      $delete_this_values=array_diff($delete_values,$parent_menu);

                      foreach($delete_this_values as $delete_value)
                      {
                          $menu_parent_name=AdminUserMenu::where('role',$request->id)->where('menu_id',$delete_value)->first();
                          $delete=AdminUserMenu::where('role',$request->id)->where('menu_id',$delete_value)->delete();            
                          $menu_parent_exist=AdminUserMenu::where('role',$request->id)->where('menu_parent',$menu_parent_name->menu_parent)->first();
                          dd($menu_parent_exist);
                          if(empty($menu_parent_exist))
                          {
                            $delete=AdminUserMenu::where('role',$request->id)->where('menu_id',$menu_parent_name->menu_parent)->delete();  
                          }
                      }
              }
              else
              {
                $delete=AdminUserMenu::where('role',$request->id)->delete();
              }
              LogActivity::addToLog('Edit The Role.');
              return redirect::route('admin.roles')->with('success',$alert_message['2']);
            }

            else
            {
              return redirect::back()->with('error',$alert_message['7']);
            }
      }
      else if($exist->id == $data_exist->id)
      {
          $exist->role_name=$request->role_name;
          $updated=$exist->save();
          if($updated)
          {

              $selected_menus=$request->checkboxlist;

              if(!empty($selected_menus))
              {

                foreach($selected_menus as $menu)
                {
                  $get_data=Menu::where('id',$menu)->first();

                  $exist_menu=AdminUserMenu::where('role',$request->id)->where('menu_id',$get_data->id)->first();

                    if(empty($exist_menu))
                    {
                      $insert=new AdminUserMenu();
                      $insert->menu_id=$get_data->id;
                      $insert->menu_name=$get_data->menu_name;
                      $insert->menu_icon=$get_data->menu_icon;
                      $insert->menu_parent=$get_data->menu_parent;
                      $insert->menu_link=$get_data->menu_link;
                      $insert->menu_status=$get_data->menu_status;
                      $insert->sort=$get_data->sort;
                      $insert->role=$request->id;
                      $inserted=$insert->save();

                      $parentmenu = $get_data->parent_menus;


                      if(!empty($parentmenu))
                      {
                        $get_data=Menu::where('id',$parentmenu->id)->first();
                        $data_exist_parent=AdminUserMenu::where('role',$request->id)->where('menu_id',$parentmenu->id)->first();



                        if(empty($data_exist_parent))
                        {

                            $insert=new AdminUserMenu();
                            $insert->menu_id=$parentmenu->id;
                            $insert->menu_name=$parentmenu->menu_name;
                            $insert->menu_icon=$parentmenu->menu_icon;
                            $insert->menu_parent=$parentmenu->menu_parent;
                            $insert->menu_link=$parentmenu->menu_link;
                            $insert->menu_status=$parentmenu->menu_status;
                            $insert->sort=$parentmenu->sort;
                            $insert->role=$request->id;
                            $inserted=$insert->save();

                            $parent_parentmenu = $parentmenu->parent_menus;

                          if(!empty($parent_parentmenu))
                          {
                              $get_data=Menu::where('id',$parent_parentmenu->id)->first();
                              $data_exist_parent1=AdminUserMenu::where('role',$request->id)->where('menu_id',$parent_parentmenu->id)->first();

                                if(empty($data_exist_parent1))
                                {
                                    $insert=new AdminUserMenu();
                                    $insert->menu_id=$parent_parentmenu->id;
                                    $insert->menu_name=$parent_parentmenu->menu_name;
                                    $insert->menu_icon=$parent_parentmenu->menu_icon;
                                    $insert->menu_parent=$parent_parentmenu->menu_parent;
                                    $insert->menu_link=$parent_parentmenu->menu_link;
                                    $insert->menu_status=$parent_parentmenu->menu_status;
                                    $insert->sort=$parent_parentmenu->sort;
                                    $insert->role=$request->id;
                                    $inserted=$insert->save();
                                }
                          }
                        }
                      }
                    } 
                }

                $exist_menus=AdminUserMenu::where('role',$request->id)->get();
                
                foreach($exist_menus as $parentmenu)
                {
                  if(!empty($parentmenu->menu_parent))
                  {
                    $parent_menu[]=$parentmenu->menu_parent;
                  }
                }
                $parent_menu=array_unique($parent_menu);
              

                foreach($exist_menus as $exist_menu)
                {
                    $menus[]=$exist_menu->menu_id; 
                }

                $delete_values=array_diff($menus, $selected_menus);
                $delete_this_values=array_diff($delete_values,$parent_menu);

                
                foreach($delete_this_values as $delete_value)
                {
                      $menu_parent_name=AdminUserMenu::where('role',$request->id)->where('menu_id',$delete_value)->first();
                      $delete=AdminUserMenu::where('role',$request->id)->where('menu_id',$delete_value)->delete();            
                      $menu_parent_exist=AdminUserMenu::where('role',$request->id)->where('menu_parent',$menu_parent_name->menu_parent)->first();
                      if(empty($menu_parent_exist))
                      {
                        $delete=AdminUserMenu::where('role',$request->id)->where('menu_id',$menu_parent_name->menu_parent)->delete();  
                      }
                }
              }
              else
              {
                  $delete=AdminUserMenu::where('role',$request->id)->delete();
              }

              LogActivity::addToLog('Edit The Role.');
               return redirect::route('admin.roles')->with('success',$alert_message['2']);
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

   		$exist=Role::find($id);
   		$exist->status='0';
   		$updated=$exist->save();
      	$alert_message=$this->alerts('16');
   		if($updated)
	    	{

          LogActivity::addToLog('Inactive The Role.');
	    		Session::flash('success', $alert_message['4']);
	    	}
	    	else
	    	{
	    		Session::flash('error', $alert_message['9']);
	    	}

   	}
   	public function check($id)
   	{

   		$exist=Role::find($id);
   		$exist->status='1';
   		$updated=$exist->save();
      $alert_message=$this->alerts('16');
   		if($updated)
	    	{

          LogActivity::addToLog('Active The Role.');
	    		Session::flash('success', $alert_message['3']);
	    	}
	    	else
	    	{
	    		Session::flash('error', $alert_message['8']);
	    	}

   	}

    public function delete($id)
    {

      $delete=Role::find($id)->delete();
      $alert_message=$this->alerts('16');
      if($delete)
        {
          LogActivity::addToLog('Delete The Role.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }

    }

}
