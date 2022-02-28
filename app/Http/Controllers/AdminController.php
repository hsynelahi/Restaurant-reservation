<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    #for users
    public function users()
    {
        $users = User::all();
        return view('Admin.Users.users',compact('users'));
    }

    public function deleteusers($user_id)
    {
        $users = User::find($user_id);
        $users->delete();
        return back()->with('success','User Deleted Successfully');
    }

    #for foods
    public function foodmenu()
    {
        $foods = Food::all();
        return view('Admin.Food.food',compact('foods'));
    }

    public function uploadFood(Request $request)
    {

        $newImageName = time() . '-' .$request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'),$newImageName);

        $createFood = Food::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $newImageName,
        ]);

        if(!$createFood)
        {
            return back()->with('failed','Failed to Added Food');
        }else
        {
            return back()->with('success','Food Added Successfully');
        }
    }

    public function deleteFood($food_id)
    {

        $foods = Food::find($food_id);
        $foods->delete();

        if(!$foods)
        {
            return back()->with('failed','Failed to Delete Food');
        }
        else
        {
            return back()->with('success','Food Deleted Successfully');
        }
    }

    public function updateView($food_id)
    {
        $foods = Food::find($food_id);
        return view('Admin.Food.updateView',compact('foods'));
    }

    public function updatefood(Request $request ,$food_id)
    {
        $foods = Food::find($food_id);
        $foods->title = $request->input('title');
        $foods->description = $request->input('description');
        $foods->price = $request->input('price');
        $foods->image = $request->input('image');

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '-' .$extension;
            $file->move('images',$filename);
            $foods->image = $filename;
        }

        $foods->save();

        return back()->with('success','Food Updated Successfully');
    }

    #for reservation

    public function reservation()
    {
        if(Auth::id())
        {
            $reservations = Reservation::all();
            return view('Admin.Reservation.reservation',compact('reservations'));
        }
        else
        {
            return redirect('login');
        }
       
    }

    public function addreservation(Request $request)
    {
        $addreservation = Reservation::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'guest'=>$request->guest,
            'date'=>$request->date,
            'time'=>$request->time,
            'message'=>$request->message,
        ]);

        if(!$addreservation)
        {
            return back()->with('failed','Filed to Reserve');
        }else
        {
            return back()->with('success','Reserved Successfully');
        }
    }

    #for chef

    public function chefview()
    {
        $chefs = Chef::all();
        return view('Admin.Chef.chef',compact('chefs'));
    }

    public function addchef(Request $request)
    {        
        $newImageName = time() . '-' .$request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'),$newImageName);

        $addchefs = Chef::create([
            'name'=>$request->name,
            'speciality'=>$request->speciality,
            'image'=>$newImageName,
        ]);

        if(!$addchefs)
        {
            return back()->with('failed','Failed to Add Chef');
        }else
        {
            return back()->with('success','Chef Added Succesfully');
        }
    }

    public function deleteChef($chef_id)
    {
        $chefs = Chef::find($chef_id);
        $chefs->delete();

        if(!$chefs)
        {
            return back()->with('failed','Failed to Delete Chef');
        }else
        {
            return back()->with('success','Chef Deleted Successfully');
        }
    }

    public function updatechef(Request $request,$chef_id)
    {
        $chefs = Chef::find($chef_id);
        $chefs->name = $request->input('name');
        $chefs->speciality = $request->input('speciality');
        $chefs->image = $request->input('image');
        $chefs->image = $request->input('current_image');

        if($request->file != ''){        
            $path = public_path().'/images';
  
            //code for remove old file
            if($chefs->file != ''  && $chefs->file != null){
                 $file_old = $path.$chefs->file;
                 unlink($file_old);
            }
  
            //upload new file
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
  
            //for update in table
            $chefs->update(['file' => $filename]);
       }
        $chefs->update();

        return back()->with('success','Chef Updated Successfully');
  }

    public function updateChefView($chef_id)
    {
        $chef = Chef::find($chef_id);
        return view('Admin.Chef.updatechefview',compact('chef'));
    }

    #for orders

    public function orderview()
    {
        $orders = Order::all();
        return view('Admin.Orders.orders',compact('orders'));
    }

    #for search

    public function search(Request $request)
    {
        $search = $request->search;

        $orders = Order::where('name','LIKE','%'.$search.'%')->orwhere('foodname','LIKE','%'.$search.'%')->get();
        return view('Admin.Orders.orders',compact('orders'));
    }


}
