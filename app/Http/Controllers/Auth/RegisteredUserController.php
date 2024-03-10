<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{

    public function registerUserView(){
        return view('admin.user.registerUser');
    }


    /**
     * Display the registration view.
     */
    // public function create(): View
    // {
    //     return view('admin.register');
    // }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) //: RedirectResponse
    {

        DB::transaction(function () use ($request) {
            // return $request->all();
            $request->validate([
                'name' => ['required', 'string','min:3', 'max:255'],
                'email' => ['nullable', 'string', 'email', 'max:255', 'unique:'.User::class],
                'userCode' => ['required','numeric','min_digits:8', 'max_digits:8', 'unique:'.User::class],
                'subtype' => ['string', 'max:255'],
                'password' => ['required',  Rules\Password::defaults()],
                'phone' => ['numeric','nullable ' ,'min_digits:1' , 'max_digits:15', 'unique:'.userDetalis::class],
                'whatsapp' => ['numeric' ,'nullable ','min_digits:1' , 'max_digits:15', 'unique:'.userDetalis::class],
                'startOfSubscription'=>['required','date'],
                'endOfSubscription'=>['required','date'],
            ]);



            userDetalis::create([
                'phone' => $request->phone,
                'whatsapp'=>$request->whatsapp,
                'nationalId'=>$request->nationalId,
                'ProfileImage'=>'assets/img/defultUserImg/defultUserImg.webp',
            ]);

            $lastid = userDetalis::latest()->orderBy('id','DESC')->first()->id;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'userCode' => $request->userCode,
                'subtype' => 'user',
                'roles_name' => 'user',
                'startOfSubscription' => $request->startOfSubscription,
                'endOfSubscription' => $request->endOfSubscription,
                'password' => Hash::make($request->password),
                'userDetalis'=>$lastid,
                'roles_name' =>'تاجر',

            ]);

             $user->assignRole('مشترك');

            // event(new Registered($user));

            // Auth::login($user);

            // return redirect(RouteServiceProvider::HOME);
        });


        return redirect()->back()->with("success",'تم اضافه المشترك');
    }



}
