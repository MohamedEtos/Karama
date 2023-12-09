<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index($id)
    {
        if(view()->exists($id)){
            return view($id);
        }
        else
        {
            return view('404');
        }

     //   return view($id);
    }


    public function AdminDashboard(){
        return view('admin.dashboard');
    }

    public function AllMerchant(){
        $merchants = User::where('subtype','merchant')->latest()->paginate(10);
        return view ('Admin.merchant.all_merchant',compact('merchants'));
    }

    public function DeleteMerchant($id){
        User::findorfail($id)->delete();
        return to_route('all.merchant');
    }

    public function AllUser(){
        $users = User::where('subtype','user')->latest()->paginate(10);
        return view('Admin.user.all_user',compact('users'));
    }
    public function DeleteUser($id){
        User::findorfail($id)->delete();
        return to_route('all.user');
    }
}