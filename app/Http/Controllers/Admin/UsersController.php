<?php

namespace Musicshop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

}
