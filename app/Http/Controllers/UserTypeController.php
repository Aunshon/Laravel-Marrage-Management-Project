<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Carbon\Carbon;
use Auth;
use App\userProfile;
use App\Order;
use App\Order_History;

class UserTypeController extends Controller
{
    function user_register(){
        return view( 'user_register\user_register');
    }
    function user_register_post(Request $request)
    {
        user::insert([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 2,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now()
        ]);

        return redirect(url('login'));
    }
    function userhome()
    {
        $ordrers = Order::where('customer_id', Auth::id())->paginate(6);
        return view( 'user/userhome',compact('ordrers'));
    }
    function orderdetails($ordrer_id)
    {
        $allProducts = Order_History::where('order_id', $ordrer_id)->where('customer_id', Auth::id())->get();
        // echo $allProducts;
        return view('user.orderDetails', compact('allProducts'));
    }
    function managepassword()
    {
        return view("user.managepassword");
    }
    function changeusernewpassword(Request $request)
    {
        print_r($request->all());
    }
    function setusernewpassword(Request $request)
    {
        // print_r($request->all());
        $request->validate([
            'new_password' => "required|min:8",
            'confirm_password' => 'same:new_password',
        ]);

        user::find(Auth::id())->update([
            'password' => bcrypt($request->confirm_password),
            'updated_at ' => Carbon::now(),
        ]);

        return back()->with('pass_ch',"Password Changed Successfully 😍");
    }
    function userprofile()
    {
        $cus_data = userProfile::where('customer_id', Auth::id())->get();
        return view('user.userprofile', compact('cus_data'));
    }
    function setprofile(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
        ]);

        userProfile::insert([
            'customer_id' => Auth::id(),
            'company' => $request->company,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('pass_ch' , 'Profile Updated 👍');
    }
    function updatecustomerprofile(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
        ]);
        userProfile::where('customer_id', Auth::id())->update([
            'company' => $request->company,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('pass_ch', 'Profile Updated 👍');
    }
}
