<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use App\PopUp;
use App\Category;
use App\Subcategory;
use App\Role;
use Auth;
use Redirect;
use Hash;
use Session;
use App\Vendor_subcat;
use App\Traits\AlertMessage;


class CategoryController extends Controller
{

      use AlertMessage;

        public function view()
    {
        $data = Vendor_subcat::orderby('updated_at','desc')->get();
        $popups = PopUp::where('popup_for','4')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','4');
        return view('admin.category_list',compact('data','popups'));
    }

    public function create()
    {
        return view('admin.category_add');
    }
    

    public function submit(Request $request)
    {
      
        $insert=new Vendor_subcat($request->all());
        $insert->service_id=Auth::guard('admin')->user()->id;
        if($request->category_images != '')
        {
          $rand=rand('100000','999999');
          $destinationPath = public_path(). '/admin_logos/';
          $image_name= $request->category_images->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->category_images->move($destinationPath, $image_name);
          $insert->category_images= $request->root()."/admin_logos/".$image_name;

        }
        $inserted=$insert->save();
        $alert_message=$this->alerts('4');
        if($inserted)
        {
          return redirect::route('admin.category')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['5']);
        } 
      
      
    }

    public function edit($id)
    {
        $data=Vendor_subcat::find($id);
        return view('admin.edit_category',compact('data'));
    }


    public function update(Request $request)
    {
      $exist=Vendor_subcat::find($request->id);
      $exist->service_id=Auth::guard('admin')->user()->id;
      if($request->category_images != '')
        {
          $rand=rand('100000','999999');
          $destinationPath = public_path(). '/admin_logos/';
          $image_name= $request->category_images->getClientOriginalName();
          $image_name = $rand.str_replace(' ','',$image_name);
          $request->category_images->move($destinationPath, $image_name);
          $exist->category_images= $request->root()."/admin_logos/".$image_name;
        }
      $exist->title=$request->title;
      $exist->code=$request->code;
      $exist->body=$request->body;
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          return redirect::route('admin.category')->with('success',$alert_message['2']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['6']);
        } 
    }

    // public function uncheck($id)
    // {
    //   $exist=GeneralSetting::find($id);
    //   $exist->status='0';
    //   $updated=$exist->save();
    //   $alert_message=$this->alerts('4');
    //   if($updated)
    //     {
    //       Session::flash('success', $alert_message['4']);
    //     }
    //     else
    //     {
    //       Session::flash('error', $alert_message['8']);
    //     }

    // }

    // public function check($id)
    // {
    //   $data_exist=GeneralSetting::where('status','1')->first();
    //   if(!empty($data_exist))
    //   {
    //       $data_exist->status='0';
    //       $data_exist->save();
    //   }
    //   $exist=GeneralSetting::find($id);
    //   $exist->status='1';
    //   $updated=$exist->save();
    //   $alert_message=$this->alerts('4');
    //   if($updated)
    //     {
    //       Session::flash('success', $alert_message['3']);
    //     }
    //     else
    //     {
    //       Session::flash('error', $alert_message['7']);
    //     }

    // }

    public function delete($id)
    {
      $delete=Vendor_subcat::find($id)->delete();
      $alert_message=$this->alerts('4');
      if($delete)
        {
          Session::flash('success', $alert_message['3']);
        }
        else
        {
          Session::flash('error', $alert_message['7']);
        }

    }

    public function subview(){

        $data = Subcategory::orderby('updated_at','desc')->get();

        $popups = PopUp::where('popup_for','4')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','2');
        return view('admin.sub_category_list',compact('data','popups'));
    }

    public function subcreate(){
        $data = Subcategory::orderby('updated_at','desc')->get();
        $popups = PopUp::where('popup_for','4')->get();
        Session::forget('sidebarid');
        Session::put('sidebarid','2');
      return view('admin.sub_category_add',compact('data','popups'));
    }

    public function subsubmit(Request $request)
    {
      
        $insert=new Subcategory($request->all());
        $insert->updated_by=Auth::guard('admin')->user()->id;
        $inserted=$insert->save();
        $alert_message=$this->alerts('4');
        if($inserted)
        {
          return redirect::route('admin.subcategory')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['5']);
        } 

    }

    // public function banneruncheck($id)
    // {
    //   $exist=Banner::find($id);
    //   $exist->status='0';
    //   $updated=$exist->save();
    //   $alert_message=$this->alerts('4');
    //   if($updated)
    //     {
    //       Session::flash('success', $alert_message['4']);
    //     }
    //     else
    //     {
    //       Session::flash('error', $alert_message['8']);
    //     }

    // }

    // public function bannercheck($id)
    // {
    //   $data_exist=Banner::where('status','1')->first();
    //   if(!empty($data_exist))
    //   {
    //       $data_exist->status='0';
    //       $data_exist->save();
    //   }
    //   $exist=Banner::find($id);
    //   $exist->status='1';
    //   $updated=$exist->save();
    //   $alert_message=$this->alerts('4');
    //   if($updated)
    //     {
    //       Session::flash('success', $alert_message['3']);
    //     }
    //     else
    //     {
    //       Session::flash('error', $alert_message['7']);
    //     }

    // }

    public function subdelete($id)
    {
      $delete=Subcategory::find($id)->delete();
      $alert_message=$this->alerts('4');
      if($delete)
        {
          Session::flash('success', $alert_message['3']);
        }
        else
        {
          Session::flash('error', $alert_message['7']);
        }

    }

    public function subedit($id)
    {
        $data=Subcategory::find($id);
        return view('admin.edit_sub_category',compact('data'));
    }

    public function subupdate(Request $request)
    {
      $exist=Subcategory::find($request->id);
      $exist->updated_by=Auth::guard('admin')->user()->id;
      $exist->subtitle=$request->subtitle;
      $exist->title=$request->title;
      $updated=$exist->save();
      $alert_message=$this->alerts('4');
      if($updated)
        {
          return redirect::route('admin.subcategory')->with('success',$alert_message['2']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['6']);
        } 
    }

}
