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

class NewStoreController extends Controller
{

    public function NewStoreView()
    {
        $category = category::all('id','name');
        return view('admin.registerStore',compact(
            'category',
        ));
    }


    public function create(request $request){

        // return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [ 'string', 'email', 'max:255', 'unique:'.User::class],
            'userCode' => ['required','string', 'max:255', 'unique:'.User::class],
            'phone' => ['string', 'max:255', 'unique:'.userDetalis::class],
            'subtype' => ['string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
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
}
