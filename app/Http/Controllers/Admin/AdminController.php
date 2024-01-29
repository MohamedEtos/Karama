<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\userDetalis;
use App\Models\visitorsCount;
use App\Models\merchant;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{

    // public function index($id)
    // {
    //     if(view()->exists($id)){
    //         return view($id);
    //     }
    //     else
    //     {
    //         return view('404');
    //     }

    //  //   return view($id);
    // }


    public function AdminDashboard(){


        $usersCount = User::where('subtype','user')->count();
        $visetorsUnique = visitorsCount::distinct()->count('ip_address');
        $merchantCount = User::where('subtype','merchant')->count();
        $userdata = User::where('subtype','user')->limit(5)->orderBy('id','DESC')->get();
        $merchantdata = User::with('userToDetalis')->where('subtype','merchant')->limit(5)->orderBy('id','DESC')->get();
        $reviewproduct = merchant::where('append','0')->orderBy('id','DESC')->limit(5)->get();
        $lastOrders = merchant::where('append','1')->orderBy('id','DESC')->limit(5)->get();
        $todayOrdersPrice = merchant::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('ThePriceAfterDiscount');
        $todayOrders = merchant::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('append',1)->count();
        $category = category::orderBy('id','DESC')->limit(5)->get();


        // // count category in every monthes 
        // $category = merchant::select('id', 'created_at')
        // ->where('subtype','merchant')
        // ->get()
        // ->groupBy(function($date) {
        //     // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
        //     return Carbon::parse($date->created_at)->format('m'); // grouping by months
        // });
        
        // $catcc = [];
        // $userArr = [];
        
        // foreach ($category as $key => $value) {
        //     $catcc[(int)$key] = count($value);
        // }
        
        // for($i = 1; $i <= 12; $i++){
        //     if(!empty($catcc[$i])){
        //         $userArr[$i] = $catcc[$i];    
        //     }else{
        //         $userArr[$i] = 0;    
        //     }
        // }
        // //  end count category in every monthes 


        // count merchant in every monthes 
        $mercahnt = User::select('id', 'created_at')
        ->where('subtype','merchant')
        ->whereYear('created_at', '=', Carbon::now()->year)
        ->get()
        ->groupBy(function($date) {
            // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });
        
        $mercahntCC = [];
        $userArr = [];
        
        foreach ($mercahnt as $key => $value) {
            $mercahntCC[(int)$key] = count($value);
        }
        
        for($i = 1; $i <= 12; $i++){
            if(!empty($mercahntCC[$i])){
                $userArr[$i] = $mercahntCC[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }
        //  end count merchant in every monthes 



        // count users in every monthes 
        $users = User::select('id', 'created_at')
        ->where('subtype','user')
        ->whereYear('created_at', '=', Carbon::now()->year)
        ->get()
        ->groupBy(function($date) {
            // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });
        
        $usermcount = [];
        $userArr = [];
        
        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }
        
        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }
        //  end count users in every monthes 


        // count merchant in every monthes 
        $store = merchant::select('id', 'created_at')
        ->whereYear('created_at', '=', Carbon::now()->year)
        ->get()

        ->groupBy(function($date) {
            // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });
        
        $MCC = [];
        $userArr = [];
        
        foreach ($store as $key => $value) {
            $MCC[(int)$key] = count($value);
        }
        
        for($i = 1; $i <= 12; $i++){
            if(!empty($MCC[$i])){
                $userArr[$i] = $MCC[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }
        //  end count merchant in every monthes 



        Carbon::setLocale('ar');


        return view('admin.dashboard',compact(
            'usersCount',
            'merchantCount',
            'visetorsUnique',
            'userdata',
            'merchantdata',
            'lastOrders',
            'reviewproduct',
            'todayOrders',
            'todayOrdersPrice',
            'category',
            //charts
            'usermcount',
            'MCC',
            'mercahntCC',
            // 'catcc',

        ));
    }

    public function AllMerchant(){
        $merchants = User::where('subtype','merchant')->latest()->paginate(10);
        return view ('admin.merchant.all_merchant',compact('merchants'));
    }


    public function AllUser(){
        $users = User::where('subtype','user')->latest()->paginate(10);
        return view('admin.user.all_user',compact('users'));
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