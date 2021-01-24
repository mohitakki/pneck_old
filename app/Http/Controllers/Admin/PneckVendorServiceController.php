<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use App\Package;
use App\Role;
use App\PopUp;
use App\Vendor_service as VendorServices;
use App\Vendor_subcat as VendorSubCat;
use App\Vendor_catalogue as VendorCatalogue;
use App\State;
use App\City;
use App\AdminUserMenu;
use Session;
use Auth;
use Redirect;
use Hash;
use App\Traits\AlertMessage;
use App\Helpers\LogActivity;

class PneckVendorServiceController extends Controller
{

    use AlertMessage;

    public function view()
    {
        $data = Package::orderby('updated_at','desc')->get();
        $popups = PopUp::where('popup_for','8')->get();
        $currency = Currency::all();
        Session::forget('sidebarid');
        Session::put('sidebarid','8');
        LogActivity::addToLog('Open View Package Page.');
        return view('admin.packages',compact('data','popups','currency'));
    }

    public function create()
    {

        $services = VendorServices::all();
        LogActivity::addToLog('Open Create Vendor Service Page.');
        return view('admin.service_create',compact('services'));
    }

    public function createCatalogue()
    {

        $services = VendorServices::all();
        $category = VendorSubCat::orderBy("title","asc")->get();
        LogActivity::addToLog('Open Create Vendor Catalogue Page.');
        return view('admin.catalogue_create',compact('services','category'));
    }

    public function showCategory()
    {

        $services = VendorServices::all();
        $category = VendorSubCat::orderBy("title","asc")->get();
        LogActivity::addToLog('Open Catalogue List Page.');
        return view('admin.category_show',compact('services','category'));
    }

    public function showCatalogue()
    {

        $services = VendorServices::all();
        $category = VendorSubCat::orderBy("title","asc")->get();
        LogActivity::addToLog('Open Catalogue List Page.');
        return view('admin.catalogue_show',compact('services','category'));
    }

     //For fetching catalogue
     public function catalogue($id)
     {
       
         $catalogueinfo = VendorCatalogue::where("subcat_id",$id)->get();
           $catalogue = $catalogueinfo->pluck("title","id");         
         return response()->json($catalogue);
     }
     

     //For fetching Category
     public function category($id)
     {       
         $categoryinfo = VendorSubCat::where("service_id",$id)->get();
           $category = $categoryinfo->pluck("title","id");         
         return response()->json($category);
     }

    public function showCity()
    {

        $state = State::where('country_id','10')->orderBy('name','asc')->get();
        LogActivity::addToLog('Open State & City List Page.');
        return view('admin.city_show',compact('state'));
    }

    public function createCity()
    {

        $state = State::where('country_id','10')->orderBy("name","asc")->get();
        LogActivity::addToLog('Open Create Vendor City Page.');
        return view('admin.city_create',compact('state'));
    }

    
    

    public function submit(Request $request)
    {
      
        $insert=new VendorSubCat($request->all());
        $insert->service_id=$request->profession;
        $insert->title=$request->category_name;
        $insert->code=$request->category_name;
        $insert->body=$request->category_name;
        
        $inserted=$insert->save();
        $alert_message=$this->alerts('8');
        if($inserted)
        {
          LogActivity::addToLog('Submit New Vendor Category Name.');
          return redirect::route('admin.create')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['6']);
        } 
      
      
    }
    
    public function submitCity(Request $request)
    {
      
        $insert=new City($request->all());
        $insert->state_id=$request->state;        
        $insert->city_name=$request->city_name;
        $insert->country_id="10";       
        $inserted=$insert->save();
        $alert_message=$this->alerts('8');
        if($inserted)
        {
          LogActivity::addToLog('New City Create Successfully.');
          return redirect::route('admin.city-create')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['6']);
        }
      
    }

    public function submitCatalogue(Request $request)
    {
      
        $insert=new VendorCatalogue($request->all());
        $insert->cat_id=$request->profession;
        $insert->subcat_id=$request->category_name;
        $insert->title=$request->catalogue_name;
        $insert->code=$request->catalogue_name;
        $insert->body=$request->catalogue_name;

        $inserted=$insert->save();
        $alert_message=$this->alerts('8');
        if($inserted)
        {
          LogActivity::addToLog('Submit New Vendor Catalogue Name.');
          return redirect::route('admin.create')->with('success',$alert_message['1']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['6']);
        }
      
    }

    public function edit($id)
    {
        $data=Package::find($id);
        $currency = Currency::all();
        LogActivity::addToLog('Open Edit Page For Package.');
        return view('admin.edit_package',compact('data','currency'));
    }


    public function update(Request $request)
    {
      $exist=Package::find($request->id);
      $exist->updated_by=Auth::guard('admin')->user()->id;
      $exist->package_name=$request->package_name;
      $exist->currency=$request->currency;
      $exist->package_price=$request->package_price;
      $exist->duration=$request->duration;
      $exist->package_description=$request->package_description;
      $updated=$exist->save();
      $alert_message=$this->alerts('8');
      if($updated)
        {

          LogActivity::addToLog('Edit The Package.');
          return redirect::route('admin.packages')->with('success',$alert_message['2']);
        }
        else
        {
          return redirect::back()->with('error',$alert_message['7']);
        } 
    }

    public function uncheck($id)
    {

      $exist=Package::find($id);
      $exist->status='0';
      $updated=$exist->save();
      $alert_message=$this->alerts('8');
      if($updated)
        {
          LogActivity::addToLog('Inactive The Package.');
          Session::flash('success', $alert_message['4']);
        }
        else
        {
          Session::flash('error', $alert_message['9']);
        }

    }
    public function check($id)
    {

      $exist=Package::find($id);
      $exist->status='1';
      $updated=$exist->save();
      $alert_message=$this->alerts('8');
      if($updated)
        {
          LogActivity::addToLog('Active The Package.');
          Session::flash('success', $alert_message['3']);
        }
        else
        {
          Session::flash('error', $alert_message['8']);
        }

    }

    public function cityDelete(Request $request)
    {
     
      $delete=City::find($request->city_id)->delete();
      $alert_message=$this->alerts('8');
      if($delete)
        {
          LogActivity::addToLog('This City Successfully Deleted.');
          Session::flash('success', $alert_message['5']);
          return  $this->showCity();
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }

    }

    public function categoryDelete(Request $request)
    {
      
      $delete=VendorSubCat::find($request->subcat_id)->delete();
      $alert_message=$this->alerts('8');
      if($delete)
        {
          LogActivity::addToLog('This Category Successfully Deleted.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }

    }


    public function catalogueDelete(Request $request)
    {
      
      $delete=VendorCatalogue::find($request->catalogue_id)->delete();
      $alert_message=$this->alerts('8');
      if($delete)
        {
          LogActivity::addToLog('This Catalogue Successfully Deleted.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }

    }

    public function delete($id)
    {

      $delete=Package::find($id)->delete();
      $alert_message=$this->alerts('8');
      if($delete)
        {
          LogActivity::addToLog('Delete The Package.');
          Session::flash('success', $alert_message['5']);
        }
        else
        {
          Session::flash('error', $alert_message['10']);
        }

    }
}
