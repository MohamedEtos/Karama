<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\subCat;
use App\Models\pointRules;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Traits\HasRoles;

class ManagersControllers extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware('permission:المديرين', ['only' => ['ViewMangers']]);
        $this->middleware('permission:عرض المديرين', ['only' => ['ViewMangers']]);
        $this->middleware('permission:اضافه مدير', ['only' => ['storeMangers','AddMangers']]);
        $this->middleware('permission:حذف مدير', ['only' => ['removeManger']]);
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
            'phone' => ['numeric', 'max_digits:20','nullable', 'unique:'.userDetalis::class],
            'whatsapp' => ['numeric', 'max_digits:20','nullable', 'unique:'.userDetalis::class],
            'nationalId' => ['numeric', 'max_digits:20','nullable', 'unique:'.userDetalis::class],
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

        $allManger = User::where('subtype','admin')->latest()->paginate(10);
        return view ('admin.admins.ViewMangers',compact('allManger'));
    }


    public function editMangerView(Request $request)
    {
        $roles = Role::pluck('name','name')->all();
        $manger = User::where('id',Crypt::decrypt($request->id))->first();

        return view('admin.admins.editAdmins',compact(
            'manger',
            'roles',
        ));
    }





    public function updateManger(request $request){

        DB::transaction(function() use($request) {
            //uncrypt id and user id
            $userId =  Crypt::decrypt($request->userId);
            $userDetailsId =  Crypt::decrypt($request->userDetailsId);

            // return $request->all();
            $request->validate([
                'name' => ['required', 'string', 'min:3' , 'max:255'],
                'email' => [ 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
                'userCode' => ['required','string', 'max:8', Rule::unique('users')->ignore($userId)],
                // 'password' => ['required', Rules\Password::defaults()],
                'phone' => ['numeric', 'max_digits:20','nullable', Rule::unique('user_detalis')->ignore($userDetailsId)],
                'whatsapp' => ['numeric', 'max_digits:20','nullable', Rule::unique('user_detalis')->ignore($userDetailsId)],
                'nationalId' => ['numeric', 'max_digits:20','nullable', Rule::unique('user_detalis')->ignore($userDetailsId)],
            ]);

            userDetalis::where('id',$userDetailsId)->update([
                'phone' => $request->phone,
                'whatsapp'=>$request->whatsapp,
                'nationalId'=>$request->nationalId,
            ]);





            $user = User::find($userId);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'userCode' => $request->userCode,
                'roles_name' => $request->roles_name,
                'status'=>$request->status,
            ]);
            $user->syncRoles($request->input('roles_name'));
        });


            return redirect()->back()->with('success','تم تحديث المدير');

         }


         public function removeManger(Request $request)
         {
            User::findorfail(decrypt($request->removeManger))->delete();
            return redirect()->back();
         }


}
