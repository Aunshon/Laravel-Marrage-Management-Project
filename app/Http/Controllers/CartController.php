<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Carbon\Carbon;
use Auth;
use App\City;
use App\Country;
use App\userProfile;
use App\Order;
use App\Billing_Info;
use App\Order_History;


class CartController extends Controller
{
    function addToCart($productId){
        // print_r($_SERVER['REMOTE_ADDR']);
        $existing = Cart::where('productId',$productId)->first();
        if ($existing !=null) {
            $nowQuantity = Cart::where('productId',$productId)->first()->productQuantity;
            Cart::where('productId', $productId)->update([
                'productQuantity' => $nowQuantity+1,
            ]);
            return back()->with('msg', "Prodyct Added to cart");
        }
        else {
            $prodtctData = Product::find($productId);
            Cart::insert([
                'productId'  => $productId,
                'productQuantity' => 1,
                'categoryId' => $prodtctData->categoryId,
                'userIP' => $_SERVER['REMOTE_ADDR'],
                'userId' => Auth::id(),
                'created_at' => Carbon::now(),
            ]);
            return back()->with('msg', "Prodyct Added to cart");
        }
    }

    public function cartShow(){
    	$cartProducts = Cart::Content();

    	return view('frontEnd.cart.showCart',['cartProducts'=>$cartProducts]);
    }
    function cart()
    {
        // $allCart = Cart::where('userIP',$_SERVER['REMOTE_ADDR'])->paginate(4);
        $allCart = Cart::where('userIP',$_SERVER['REMOTE_ADDR'])->get();
        return view('cart/showCart',compact('allCart'));
    }
    function delereCart($id)
    {
        Cart::find($id)->delete();
        return back()->with('msg','Deleted successfully 👍');
    }
    function cartUpdate(Request $request)
    {
        // print_r($request->cart_id);
        foreach ($request->cart_id as $key => $value) {
            if ($request->quantity[$key] > 0) {
                Cart::where('id',$value)->update([
                    'productQuantity' => $request->quantity[$key],
                ]);
            }
            else {
                return back()->with('msg', 'Product amount should be greater then zero');
            }
        }
        return back()->with('msg', 'Cart Updated 😊');
    }
    function goToCheckOut()
    {
        // City::all();
        $allcountry = Country::all();
        $totalAmount = 0;
        $p_id = Cart::where('userIP', $_SERVER['REMOTE_ADDR'])->get('productId');
        foreach ($p_id as $value) {
            // echo $value->productId;
            $totalAmount += Product::find($value->productId)->productPrice;
        }
        // echo $totalAmount;
        $cusInfo = userProfile::where('customer_id', Auth::id())->first();
        return view('cart/goToCheckOut' ,compact('allcountry', 'totalAmount', 'cusInfo'));
        // $checkUser = userProfile::where('customer_id', Auth::user()->id)->exists();
        // if ($checkUser) {
        // }
        // else {
        //     $cusInfo = null;
        //     return view('cart/goToCheckOut', compact('allcountry', 'totalAmount', 'cusInfo'));
        // }
    }
    function getcityname(Request $request)
    {
        // echo $request->country_id;
        $allCity = City::where('country_id', $request->country_id)->get();
        foreach ($allCity as $key => $value) {
            echo "<option value=" . $value->id . ">$value->name</option>";
        }
    }
    function placeorder(Request $request)
    {
        // // print_r($request->all());
        // // print_r($request->all());
        $order_id = Order::insertGetId([
            'customer_id' => Auth::id(),
            'discount' => 0,
            'subtotal' => 0,
            'shipping' => 0,
            'total_amount' => $request->total_amount,
            'payment_type' => $request->payment_type,
            'payment_status' => 1,
            'created_at' => Carbon::now(),
        ]);
        Billing_Info::insert([
            'order_id' => $order_id,
            'customer_id' => Auth::id(),
            'customer_name' => $request->customer_name,
            'company' => $request->company,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'created_at' => Carbon::now(),
        ]);

        $all_products = Cart::where('userIP', $_SERVER['REMOTE_ADDR'])->get();
        foreach ($all_products as $value) {
            Order_History::insert([
                'customer_id' => Auth::id(),
                'order_id' => $order_id,
                'product_id' => $value->productId,
                'product_name' => Product::find($value->productId)->productName,
                'product_price'  => Product::find($value->productId)->productPrice,
                'product_quentity' => $value->productQuantity,
                'total_price' => (Product::find($value->productId)->productPrice) * $value->productQuantity,
                'created_at' => Carbon::now(),
            ]);
            $value->delete();
        }
        // echo "<h1>Done</h1>";
        if ($request->payment_type == 2) {
            $totalamount = $request->total_amount;
            return view('stripe', compact('order_id', 'totalamount'));
        } else {
            echo "done";
        }
    }
    function pending($orderid)
    {
        Order::find($orderid)->update([
            'payment_status' => 2,
        ]);
        return back();
    }
    function cusorderdetails($ordrer_id)
    {
        $allProducts = Order_History::where('order_id', $ordrer_id)->get();

        // print_r($allProducts->all());
        return view('cusorderdetails', compact('allProducts'));

    }
}
