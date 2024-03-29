<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\userDetalis;
use App\Models\visitorsCount;
use App\Models\merchant;
use App\Models\points;
use App\Models\pointsDetails;
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

    public function __construct()
{
    $this->middleware('permission:رئيسيه المدير', ['only' => ['AdminDashboard']]);
    $this->middleware('permission:عرض التجار', ['only' => ['AllMerchant']]);
    $this->middleware('permission:عرض المستخدمين', ['only' => ['AllUser']]);
    $this->middleware('permission:حذف مستخدم|حذف تاجر', ['only' => ['DeleteUser']]);
    $this->middleware('permission:تعديل مستخدم', ['only' => ['editUser','updateUser']]);
}

    public function AdminDashboard(){


        $usersCount = User::where('subtype','user')->count();
        $visetorsUnique = visitorsCount::distinct()->count('ip_address');
        $merchantCount = User::where('subtype','merchant')->count();
        $userdata = User::where('subtype','user')->limit(5)->orderBy('id','DESC')->get();
        $merchantdata = User::with('userToDetalis')->where('subtype','merchant')->limit(5)->orderBy('id','DESC')->get();
        $reviewproduct = merchant::where('append','0')->orderBy('id','DESC')->limit(5)->get();
        $reviewproduct = merchant::where('append','0')->orderBy('id','DESC')->limit(5)->get();
        $exchangPointTable = pointsDetails::orderBy('id','DESC')->limit(5)->get();
        $lastOrders = merchant::where('append','1')->orderBy('id','DESC')->limit(5)->get();
        $todayOrdersPrice = merchant::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('ThePriceAfterDiscount');
        $todayOrders = merchant::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('append',1)->count();
        $unappendproduct = merchant::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('append',0)->sum('ThePriceAfterDiscount');
        $categorys = category::orderBy('id','DESC')->limit(5)->get();
        $weekpoints = points::whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('price');
        $totalpoints = points::orderBy('updated_at','DESC')->get();
        $weekTransPoints = pointsDetails::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('type','Subtract')->sum('price');



        // count add points in every monthes
        $pointsadd = pointsDetails::select('id', 'created_at')
            ->where('type','add')
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->get()
            ->groupBy(function($date) {
                // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months

            });

        $pointsAddCount = [];
        $userArr = [];

        foreach ($pointsadd as $key => $value) {
            $pointsAddCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];
            }else{
                $userArr[$i] = 0;
            }
        }
        //  end add points in every monthes

        // count exchange points every monthes
        $pointsSub = pointsDetails::select('id', 'created_at')
            ->where('type','Subtract')
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->get()
            ->groupBy(function($date) {
                // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months

            });

        $pointsSubCount = [];
        $userArr = [];

        foreach ($pointsSub as $key => $value) {
            $pointsSubCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];
            }else{
                $userArr[$i] = 0;
            }
        }
        // end count exchange points every monthes



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





        return view('admin.dashboard',compact(
            'usersCount',
            'merchantCount',
            'visetorsUnique',
            'userdata',
            'merchantdata',
            'lastOrders',
            'reviewproduct',
            'todayOrders',
            'exchangPointTable',
            'todayOrdersPrice',
            'categorys',
            'unappendproduct',
            'pointsAddCount',
            'pointsSubCount',
            'totalpoints',
            //charts
            'usermcount',
            'MCC',
            'mercahntCC',
            'weekpoints',
            'weekTransPoints',
            // 'catcc',

        ));
    }

    public function AllMerchant(){

        $allMerchants = User::where('subtype','merchant')->latest()->paginate(10);
        return view ('admin.merchant.all_merchant',compact('allMerchants'));
    }


    public function AllUser(){
        $AllUser = User::where('subtype','user')->latest()->paginate(10);
        return view('admin.user.all_user',compact('AllUser'));
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
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->userId)],
            'usercode' => ['required','numeric','min_digits:8', 'max_digits:8', Rule::unique('users')->ignore($request->userId)],
            'subtype' => ['string', 'max:255'],
            // 'password' => ['required',  Rules\Password::defaults()],
            'phone' => ['numeric' ,'nullable','min_digits:7' , 'max_digits:20', Rule::unique('user_detalis')->ignore($request->userDetailsId)],
            'whatsapp' => ['numeric' ,'nullable','min_digits:7' , 'max_digits:20', Rule::unique('user_detalis')->ignore($request->userDetailsId)],
            'startOfSubscription'=>['required','date'],
            'endOfSubscription'=>['required','date'],
        ]);

        DB::transaction(function () use ($request){
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
                'status'=>$request->status,
                // 'password' => Hash::make($request->password),
            ]);
        });

        return redirect()->back()->with('success','تم تحديث البيانات');

    }


}
