<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Admin;
use Auth;


class UserController extends Controller
{

    public function view()
    {
        return view('admin.my_profile');
    }
    
}
