<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userDetalis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class NewStoreController extends Controller
{

    public function NewStoreView()
    {
        $category = category::all('id','name');
        return view('admin.merchant.registerStore',compact(
            'category',
        ));
    }


    public function create(request $request){

        // return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'min:3' , 'max:255'],
            'email' => [ 'string', 'email', 'max:255', 'unique:'.User::class],
            'userCode' => ['required','string', 'max:8', 'unique:'.User::class],
            'subtype' => ['string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
            'categoryId' => 'required|numeric|exists:App\Models\category,id',
            'phone' => ['numeric', 'max_digits:10', 'unique:'.userDetalis::class],
            'whatsapp' => ['numeric', 'max_digits:10', 'unique:'.userDetalis::class],
            'facebook' => [ 'string', 'max:255','active_url','nullable'],
            'website' => [ 'string', 'max:255','active_url','nullable'],
            'maps' => [ 'string', 'max:255','active_url','nullable'],
            'location' => [ 'string', 'max:255','nullable'],
            'bio' => [ 'string', 'max:255','nullable'],
            'storeDescription' => [ 'string', 'max:255','nullable'],
            'nationalId' => ['numeric', 'max_digits:10', 'unique:'.userDetalis::class],
        ]);

        userDetalis::create([
            'categoryId'=>$request->categoryId,
            'phone' => $request->phone,
            'whatsapp'=>$request->whatsapp,
            'facebook'=>$request->facebook,
            'website'=>$request->website,
            // 'maps'=>$request->maps,
            'location'=>$request->location,
            'bio'=>$request->bio,
            'maps'=>$request->maps,
            'nationalId'=>$request->nationalId,
            'ProfileImage'=>'assets/img/defultUserImg/defultUserImg.webp',
            'coverImage'=>'assets/img/defultUserImg/cover.webp',
        ]);

        $lastid = userDetalis::latest()->orderBy('id','DESC')->first()->id;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userCode' => $request->userCode,
            'subtype' => 'merchant',
            'userDetalis' => $lastid ,
            'password' => Hash::make($request->password ),


        ]);



        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect()->back()->with('success','تم اضافه المتجر');

     }
    public function updateStore(request $request){

        // return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'min:3' , 'max:255'],
            'email' => [ 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->userId)],
            'userCode' => ['required','string', 'max:8', Rule::unique('users')->ignore($request->userId)],
            'subtype' => ['string', 'max:255'],
            // 'password' => ['required', Rules\Password::defaults()],
            'categoryId' => 'required|numeric|exists:App\Models\category,id',
            'phone' => ['numeric', 'max_digits:10', Rule::unique('user_detalis')->ignore($request->userDetailsId)],
            'whatsapp' => ['numeric', 'max_digits:10', Rule::unique('user_detalis')->ignore($request->userDetailsId)],
            'facebook' => [ 'string', 'max:255','active_url','nullable'],
            'website' => [ 'string', 'max:255','active_url','nullable'],
            'maps' => [ 'string', 'max:255','active_url','nullable'],
            'location' => [ 'string', 'max:255','nullable'],
            'bio' => [ 'string', 'max:255','nullable'],
            'storeDescription' => [ 'string', 'max:255','nullable'],
            'nationalId' => ['numeric', 'max_digits:10', Rule::unique('user_detalis')->ignore($request->userDetailsId)],
        ]);

        userDetalis::where('id',$request->userDetailsId)->update([
            'categoryId'=>$request->categoryId,
            'phone' => $request->phone,
            'whatsapp'=>$request->whatsapp,
            'facebook'=>$request->facebook,
            'website'=>$request->website,
            // 'maps'=>$request->maps,
            'location'=>$request->location,
            'bio'=>$request->bio,
            'maps'=>$request->maps,
            'nationalId'=>$request->nationalId,
        ]);


        User::where('id',$request->userId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'userCode' => $request->userCode,
            'subtype' => 'merchant',
            'userDetalis' => $lastid ,
        ]);



        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect()->back()->with('success','تم تحديث المتجر');

     }
}
