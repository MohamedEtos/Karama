<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\subCat;
use App\Models\category;
use App\Models\merchant;
use App\Models\pointRules;
use App\Models\subcategory;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Auth\Events\Registered;


class NewStoreController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:اضافة تاجر', ['only' => ['create','NewStoreView']]);
        $this->middleware('permission:تعديل تاجر', ['only' => ['editStoreView','updateStore']]);
        $this->middleware('permission:حذف تاجر', ['only' => ['deleteMerchant']]);
    }



    public function NewStoreView()
    {
        // $subCat = subCat::where('categoryId',$UserData->userToDetalis->userToCategory->id)->first()->name;
        $categoryData = category::select('id','name')->get();
        // return $categoryData;
        $roles = Role::pluck('name','name')->all();
        return view('admin.merchant.registerStore',compact(
            'categoryData',
            'roles',
        ));
    }

    private function convertDataToString($data)
    {
        // Logic to convert your data to a string
        // This could be a simple concatenation or a more complex transformation

        // Example: Concatenate the names from the data into a single string
        $string = '';
        foreach ($data as $item) {
            $string .= $item->name . ', '; // Assuming 'name' is a field in your database table
        }
        // Remove the last comma and space
        $string = rtrim($string, ', ');

        return $string;
    }

    public function getCategoryAjax(Request $request){
        $AllCat = subCat::where('categoryId',$request->id)->get('name');
        $dataAsString = $this->convertDataToString($AllCat);
        return response()->json(['Done'=>$dataAsString]);
    }


    public function create(request $request)
    {

        // return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'min:3' , 'max:255'],
            'email' => [ 'string','nullable', 'email', 'max:255', 'unique:'.User::class],
            'userCode' => ['required','string', 'max:8', 'unique:'.User::class],
            // 'subtype' => ['string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
            'category' => 'required|numeric|exists:App\Models\category,id',
            'category' => 'required|string',
            'subCat' => 'required|string',
            'phone' => ['numeric', 'max_digits:10','nullable', 'unique:'.userDetalis::class],
            'whatsapp' => ['numeric', 'max_digits:10','nullable', 'unique:'.userDetalis::class],
            'facebook' => [ 'string', 'max:255','active_url','nullable'],
            'website' => [ 'string', 'max:255','active_url','nullable'],
            'maps' => [ 'string', 'max:255','active_url','nullable'],
            'location' => [ 'string', 'max:255','nullable'],
            'bio' => [ 'string', 'max:255','nullable'],
            'storeDescription' => [ 'string', 'max:255','nullable'],
            'nationalId' => ['numeric', 'max_digits:10','nullable', 'unique:'.userDetalis::class],
            // 'roles_name' => 'required',
        ]);


        DB::transaction(function() use($request) {


        $userDetalis = userDetalis::create([
            'categoryId'=>$request->category,
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

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userCode' => $request->userCode,
            'subtype' => 'merchant',
            'userDetalis' => $lastid ,
            'password' => Hash::make($request->password ),
            'roles_name' =>'تاجر',
        ]);

        $user->assignRole('تاجر');


        pointRules::create([
            'merchantId'=>$user->id,
        ]);


        $explode = explode(',',$request->subCat);
        subCat::where('categoryId',$request->category)->delete();
        foreach($explode as $index){
            $subCat = subCat::create([
                'categoryId'=> $request->category,
                'name'=> $index,
            ]);
        }

    });


        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect()->back()->with('success','تم اضافه المتجر');

     }


    public function editStoreView($id)
    {
        $categorylist = category::get();
        $UserData = User::where('id',Crypt::decrypt($id))->first();
        $subCat = subCat::where('categoryId',$UserData->userToDetalis->userToCategory->id)->first()->name;
        return view('admin.merchant.editStore',compact(
            'categorylist',
            'UserData',
            'subCat'
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
            'email' => [ 'string', 'nullable', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'userCode' => ['required','string', 'max:8', Rule::unique('users')->ignore($userId)],
            'subtype' => ['string', 'max:255'],
            // 'password' => ['required', Rules\Password::defaults()],
            'category' => 'required|numeric|exists:App\Models\category,id',
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
            'categoryId'=>$request->category,
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


        // $oldSubCat = category::select('subCat')->where('id',$request->categoryId)->first();

        // $array1 = explode(",", $oldSubCat->subCat);
        // $array2 = explode(",", $request->subCat);

        // $mergedArray = array_merge($array1, $array2);
        // $uniqueArray = array_unique($mergedArray);
        // $trimmedArray = array_map('trim', $uniqueArray);
        // $arrayunique = array_unique($trimmedArray);
        // $text = implode(',', $arrayunique);


        $explode = explode(',',$request->subCat);
        subCat::where('categoryId',$request->category)->delete();
        foreach($explode as $index){
            $subCat = subCat::create([
                'categoryId'=> $request->category,
                'name'=> $index,
            ]);
        }

        User::where('id',$userId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'userCode' => $request->userCode,
            'status'=>$request->status,
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


