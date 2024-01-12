<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\userDetalis;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
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

    public function DeleteUser(Request $request){
        userDetalis::where('id',$request->userId)->delete();
        return redirect()->back()->with('success','تم حذف المستخدم');
    }

    public function editUser($id){
        $user = User::where('id',$id)->first();
        return view('admin.user.editUser',compact(
            'user',
        ));
    }

    public function updateUser(Request $request){
        
        userDetalis::where('id',$request->userId)->update([
            'phone' => $request->phone,
            'whatsapp'=>$request->whatsapp,
            'nationalId'=>$request->nationalId,
            'ProfileImage'=>'assets/img/defultUserImg/defultUserImg.webp',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userCode' => $request->userCode,
            'subtype' => 'user',
            'startOfSubscription' => $request->startOfSubscription,
            'endOfSubscription' => $request->endOfSubscription,
            'password' => Hash::make($request->password),
            'userDetalis'=>$lastid,
        ]);

    }


}