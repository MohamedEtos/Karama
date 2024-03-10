<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\pointRules;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Models\subCat;

class ManagersControllers extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:المديرين', ['only' => ['ViewMangers']]);
        $this->middleware('permission:عرض المديرين', ['only' => ['ViewMangers']]);
        $this->middleware('permission:اضافه مدير', ['only' => ['storeMangers','AddMangers']]);
    }

    public function AddMangers(){
        $roles = Role::pluck('name','name')->all();
        return view('admin.admins.storeAdmins',compact(
            'roles',
        ));
    }


    public function storeMangers(request $request)
    {

        // return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'min:3' , 'max:255'],
            'email' => [ 'string','nullable', 'email', 'max:255', 'unique:'.User::class],
            'userCode' => ['required','string', 'max:8', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'phone' => ['numeric', 'max_digits:10','nullable', 'unique:'.userDetalis::class],
            'whatsapp' => ['numeric', 'max_digits:10','nullable', 'unique:'.userDetalis::class],
            'nationalId' => ['numeric', 'max_digits:10','nullable', 'unique:'.userDetalis::class],
            'roles_name' => 'required',
        ]);


        DB::transaction(function() use($request) {


        $userDetalis = userDetalis::create([
            'phone' => $request->phone,
            'whatsapp'=>$request->whatsapp,
            'nationalId'=>$request->nationalId,
            'ProfileImage'=>'assets/img/defultUserImg/defultUserImg.webp',
            'coverImage'=>'assets/img/defultUserImg/cover.webp',
        ]);

        // $lastid = userDetalis::latest()->orderBy('id','DESC')->first()->id;

        $lastid = $userDetalis->id;

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userCode' => $request->userCode,
            'subtype' => 'admin',
            'userDetalis' => $lastid ,
            'password' => Hash::make($request->password ),
            'roles_name' =>$request->roles_name,
        ]);

        $user->assignRole($request->roles_name);



    });

        return redirect()->back()->with('success','تم اضافه المدير');

     }


     public function ViewMangers(){

        $allMerchants = User::where('subtype','admin')->latest()->paginate(10);
        return view ('admin.admins.ViewMangers',compact('allMerchants'));
    }


}
