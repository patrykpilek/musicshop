<?php

namespace Musicshop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.dashboard.index');
    }

}
