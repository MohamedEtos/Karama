<?php

namespace App\Http\Controllers\Admin;

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
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

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

    public function updateUser(Request $request,User $user){

        // return $request->all();
       
        $request->validate([
            'name' => ['required', 'string','min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->userId)],

            'usercode' => ['required','numeric','min_digits:8', 'max_digits:8', Rule::unique('users')->ignore($request->userDetailsId)],
            'subtype' => ['string', 'max:255'],
            // 'password' => ['required',  Rules\Password::defaults()],
            'phone' => ['numeric' ,'min_digits:10' , 'max_digits:10', Rule::unique('user_detalis')->ignore($request->userDetailsId)],
            'whatsapp' => ['numeric' ,'min_digits:10' , 'max_digits:10', Rule::unique('user_detalis')->ignore($request->userDetailsId)],
            'startOfSubscription'=>['required','date'],
            'endOfSubscription'=>['required','date'],
        ]);
        
        userDetalis::where('id',$request->userDetailsId)->update([
            'phone' => $request->phone,
            'whatsapp'=>$request->whatsapp,
            'nationalId'=>$request->nationalId,
        ]);

        User::where('id',$request->userId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'usercode' => $request->usercode,
            'startOfSubscription' => $request->startOfSubscription,
            'endOfSubscription' => $request->endOfSubscription,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success','تم تحديث البيانات');

    }


}