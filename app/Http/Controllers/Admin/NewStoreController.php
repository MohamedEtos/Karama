<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\category;
use App\Models\merchant;
use App\Models\pointRules;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Auth\Events\Registered;


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
            'phone' => ['numeric', 'max_digits:10','nullable', 'unique:'.userDetalis::class],
            'whatsapp' => ['numeric', 'max_digits:10','nullable', 'unique:'.userDetalis::class],
            'facebook' => [ 'string', 'max:255','active_url','nullable'],
            'website' => [ 'string', 'max:255','active_url','nullable'],
            'maps' => [ 'string', 'max:255','active_url','nullable'],
            'location' => [ 'string', 'max:255','nullable'],
            'bio' => [ 'string', 'max:255','nullable'],
            'storeDescription' => [ 'string', 'max:255','nullable'],
            'nationalId' => ['numeric', 'max_digits:10','nullable', 'unique:'.userDetalis::class],
        ]);


        DB::transaction(function() use($request) {


        $userDetalis = userDetalis::create([
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

        // $lastid = userDetalis::latest()->orderBy('id','DESC')->first()->id;

        $lastid = $userDetalis->id;
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userCode' => $request->userCode,
            'subtype' => 'merchant',
            'userDetalis' => $lastid ,
            'password' => Hash::make($request->password ),
        ]);

        pointRules::create([
            'merchantId'=>$lastid,
        ]);

    });


        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect()->back()->with('success','تم اضافه المتجر');

     }


    public function editStoreView($id)
    {
        $category = category::get();
        $UserData = User::where('id',Crypt::decrypt($id))->first();
        return view('admin.merchant.editStore',compact(
            'category',
            'UserData'
        ));
    }


    public function updateStore(request $request){

    DB::transaction(function() use($request) {
        //uncrypt id and user id
        $userId =  Crypt::decrypt($request->userId);
        $userDetailsId =  Crypt::decrypt($request->userDetailsId);

        // return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'min:3' , 'max:255'],
            'email' => [ 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'userCode' => ['required','string', 'max:8', Rule::unique('users')->ignore($userId)],
            'subtype' => ['string', 'max:255'],
            // 'password' => ['required', Rules\Password::defaults()],
            'categoryId' => 'required|numeric|exists:App\Models\category,id',
            'phone' => ['numeric', 'max_digits:10','nullable', Rule::unique('user_detalis')->ignore($userDetailsId)],
            'whatsapp' => ['numeric', 'max_digits:10','nullable', Rule::unique('user_detalis')->ignore($userDetailsId)],
            'facebook' => [ 'string', 'max:255','active_url','nullable'],
            'website' => [ 'string', 'max:255','active_url','nullable'],
            'maps' => [ 'string', 'max:255','active_url','nullable'],
            'location' => [ 'string', 'max:255','nullable'],
            'bio' => [ 'string', 'max:255','nullable'],
            'storeDescription' => [ 'string', 'max:255','nullable'],
            'nationalId' => ['numeric', 'max_digits:10','nullable', Rule::unique('user_detalis')->ignore($userDetailsId)],
        ]);

        userDetalis::where('id',$userDetailsId)->update([
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


        User::where('id',$userId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'userCode' => $request->userCode,
            'subtype' => 'merchant',
        ]);

    });

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect()->back()->with('success','تم تحديث المتجر');

     }


     public function deleteMerchant(Request $request)
     {
        User::findorfail(decrypt($request->merchantId))->delete();
        return to_route('all.merchant');
     }
}
