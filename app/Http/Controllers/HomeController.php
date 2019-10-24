<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing_Info;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('customerRoleAuth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $allBills = Billing_Info::all();
        return view('admin.home.homeContent',compact('allBills'));
        // echo "admin";
    }

}
