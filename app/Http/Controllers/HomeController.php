<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirects');
        }else
        $chefs = Chef::all();
        $foods = Food::all();
        return view('Home.Home',compact('foods','chefs'));
    }

    public function redirects()
    {
        $foods = Food::all();
        $chefs = Chef::all();
        $userType = Auth::user()->userType;

        if($userType == '1')
        {
            return view('Admin.admin');
        }
        else
        {
            $user_id = Auth::id();
            $count = Cart::where('user_id',$user_id)->count();

            return view('Home.Home',compact('foods','chefs','count'));
        }
    }

    public function addcart(Request $request,$food_id)
    {
        if(Auth::id())
        {
            $user_id = Auth::id();
            $foodid = $food_id;
            $quantity = $request->quantity;

            $cart = new Cart;

            $cart->user_id = $user_id;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;
            $cart->save();


            return redirect()->back();
        }
        else
        {
            redirect('login');
        }
    }

    public function showcart(Request $request,$id)
    {
        $count = Cart::where('user_id',$id)->count();

        if(Auth::id() == $id)
        {
            $data = Cart::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();
            $data2 = Cart::select('*')->where('user_id', '=' ,$id)->get();
    
            return view('Home.showcart',compact('count','data','data2'));
        }
        else
        {
            return redirect()->back();
        }
        
    }

    public function deleteshowcart($cart_id)
    {
        $carts = Cart::find($cart_id);
        $carts->delete();

        if(!$carts)
        {
            return back()->with('failed','Failed to Delete Cart');
        }else
        {
            return back()->with('success','Cart Deleted Successfully');
        }
    }

    #for order

    public function orderconfirm(Request $request)
    {
        foreach($request->foodname as $key => $foodname)
        {
            $data = new Order;

            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;

            $data->save();
        }

        if(!$data)
        {
            return back()->with('failed','Failed to Add Order');
        }else
        {
            return back()->with('success','Order Successfully');
        }
    }
}
