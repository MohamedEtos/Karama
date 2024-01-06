<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function StoreMerchant(request $request){

        $request->validate([
           'name' => 'required',
           'usercode' => 'required',
           'phone_number' => 'required',
           'email' => 'required|email',
           'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'usercode' =>$request->usercode,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => $request->password,
            'subtype' => 'merchant',
        ]);
        return to_route('all.merchant');
    }

    public function DeleteMerchant($id){
        User::findorfail($id)->delete();
        return to_route('all.merchant');
    }

    public function AllUser(){
        $users = User::where('subtype','user')->latest()->paginate(10);
        return view('Admin.user.all_user',compact('users'));
    }

    public function StoreUser(request $request){

        $request->validate([
            'name' => 'required',
            'usercode' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'password' => 'required'
         ]);

         User::create([
             'name' => $request->name,
             'usercode' =>$request->usercode,
             'phone_number' => $request->phone_number,
             'email' => $request->email,
             'password' => $request->password,
             'subtype' => 'user',
         ]);
         return to_route('all.user');
    }

    public function DeleteUser($id){
        User::findorfail($id)->delete();
        return to_route('all.user');
    }

    public function changeStatus(request $request){
        $user = User::findorfail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status Changes Successfully']);
     }





    public function NewUser(request $request){
        return view('admin.registerUser');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [ 'string', 'email', 'max:255', 'unique:'.User::class],
            'usercode' => ['required','string', 'max:255', 'unique:'.User::class],
            'phone_number' => ['string', 'max:255', 'unique:'.User::class],
            'subtype' => ['string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usercode' => $request->usercode,
            'phone_number' => $request->phone_number,
            'subtype' => $request->subtype,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

     }
}