<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\notify;
use App\Models\points;
use App\Models\OTPPoints;
use App\Models\pointRules;
use Illuminate\Http\Request;
use App\Models\pointsDetails;
use Illuminate\Support\Carbon;
use App\Events\pointNofication;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CheckUserCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits;

class PointsController extends Controller
{

    use Traits\navbarUser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function UserPoints()
    {
        return view('merchant.points.addUserPoints');
    }

    public function checkUserCodeAddPoints(Request $request)

    {

        // 'param' => 'integer','min:8','max:8','exists:App\Models\User,usercode', // Validation rule for the 'param' parameter

        $userdata = User::select('name', 'id')
        ->where('usercode', $request->usercode)
        ->where('subtype', 'user')
        ->first();


        $oldPoints = points::select('points')->where('userId', $userdata->id)->where('merchantId', Auth::User()->id)->first();

        if (!$userdata) {
            $userdata = 'nodata';
            return response()->json(array("MSG" => $userdata, 'oldPoints' => $oldPoints));
        }
        if (!$oldPoints ) {
            $oldPoints = 'nodata';
            return response()->json(array("MSG" => $userdata, 'oldPoints' => $oldPoints));
        }



        return response()->json(array("MSG" => $userdata, 'oldPoints' => $oldPoints));

    }

    public function checkUserCode(Request $request)

    {

        // 'param' => 'integer','min:8','max:8','exists:App\Models\User,usercode', // Validation rule for the 'param' parameter

        $userdata = User::select('name', 'id')
        ->where('usercode', $request->usercode)
        ->where('subtype', 'user')
        ->first();

        $oldPoints = points::select('points')->where('userId', $userdata->id)->where('merchantId', Auth::User()->id)->first();

        if (!$oldPoints ) {
            $oldPoints = 'nodata';
            return response()->json(array("MSG" => $userdata, 'oldPoints' => $oldPoints));
        }

        if ( !$userdata) {
            $userdata = 'nodata';
            return response()->json(array("MSG" => $userdata, 'oldPoints' => $oldPoints));
        }


        $OTP = OTPPoints::create([
            'merchantId'=>Auth::User()->id,
            'userId'=>$userdata->id,
            'OTP'=>rand(100000,999999),
        ]);

        $LastOTP = OTPPoints::where('merchantId',Auth::User()->id)
        ->where('userId',$userdata->id)
        ->where('succeed',0)
        ->orderBy('id','desc')
        ->first();

        notify::create([
            'reseverId' => $userdata->id,
            'senderId' => Auth::User()->id,
            'messages'=>'لقد قام المتجر بارسال طلب استبدال نقاط من حسابك رمز OTP هو ' . '('. $LastOTP->OTP .')' . ' لمده 10 دقايق',
        ]);

        $NotifyData= notify::where('reseverId',$userdata->id)->where('senderId', Auth::User()->id)->orderBy('id','DESC')->first();

        $data = [
            'reseverId' => $NotifyData->reseverId,
            'senderName' => $NotifyData->notifyMerchant->name,
            'senderImg' => $NotifyData->notifyMerchant->userToDetalis->ProfileImage,
            'senderId' => Auth::User()->id,
            'messages' => $NotifyData->messages,
            'price' => '' ,
            'points' => '',
            'type'=>'',
            // 'OTP'=>$LastOTP->OTP,
            'time'=>$NotifyData->created_at->diffForHumans(),
        ];

        event(new pointNofication($data));


        return response()->json(array("MSG" => $userdata, 'oldPoints' => $oldPoints));

    }

    public function addUserPoints(Request $request)
    {

        // return $request->all();

        $request->validate([
            'usercode' => ['required', 'numeric','lt:99999999','exists:App\Models\User,usercode'],
            'price' => ['required','numeric','gt:1'],
            'userId' => ['required', 'numeric',  'exists:App\Models\User,id'],
            'merchantId' => ['required', 'numeric',  'exists:App\Models\User,id'],
        ]);

        $prevPoints = points::select('price', 'points')
            ->where('userId', $request->userId)
            ->where('merchantId', $request->merchantId)
            ->first();

        if (!$prevPoints) {
            $oldPrice = '0';
            $oldPoints = '0';
        } else {
            $oldPrice = $prevPoints->price;
            $oldPoints = $prevPoints->points;
        }

        $pointRules = pointRules::where('merchantId',$request->merchantId)->first()->transferPoints;


         points::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'userId' => $request->userId,
            'merchantId' => $request->merchantId,

        ], [
            'userId' => $request->userId,
            'merchantId' => $request->merchantId,
            'usercode' => $request->usercode,
            'price' => $request->price + $oldPrice,
            'points' => ( $pointRules * $request->price / 100) + $oldPoints,
        ]);

        $lastRowUpdated = points::orderBy('updated_at','DESC')->first()->id;

        pointsDetails::create([
            'pointsDetailsId' => $lastRowUpdated,
            'userId' => $request->userId,
            'merchantId' => $request->merchantId,
            'usercode' => $request->usercode,
            'price' => $request->price ,
            'points' => ($pointRules * $request->price / 100),
            'type'=>'add'
        ]);

        $totalPointCurrentStore = points::select('price', 'points')
        ->where('userId', $request->userId)
        ->where('merchantId', $request->merchantId)
        ->sum('points');


        notify::create([
            'senderId' => $request->merchantId,
            'reseverId' => $request->userId,
            'messages'=>' لقد تم اضافه نقاط بقميه  '  . ($pointRules * $request->price / 100) . '₪ واصبح رصيد نقاتك في متجرنا ' . $totalPointCurrentStore . ' نقطه ' . 'شكرا علي زيارتك لنا ',
        ]);

        $NotifyData= notify::where('reseverId',$request->userId)->where('senderId',$request->merchantId)->orderBy('id','DESC')->first();



        $data = [
            'reseverId' => $NotifyData->reseverId,
            'senderName' => $NotifyData->notifyMerchant->name,
            'senderImg' => $NotifyData->notifyMerchant->userToDetalis->ProfileImage,
            'senderId' => $request->merchantId,
            'messages' => $NotifyData->messages,
            'price' => $request->price ,
            'points' => ($pointRules * $request->price / 100),
            'type'=>'add',
            'time'=>$NotifyData->created_at->diffForHumans(),
        ];




        event(new pointNofication($data));


        return redirect()->back()->with('success', 'تم اضافه النقاط ');

    }

    public function exchangePointsView()
    {
        $exchangeLimit = pointRules::where('merchantId',Auth::User()->id)->first();
        return view('merchant.points.exchangepoints ',compact(
            'exchangeLimit'
        ));

    }

    public function exchangePoints(Request $request)
    {

        // return $request->all();

        $request->validate([
            // 'otp' => ['required', 'numeric','lt:999999','exists:App\Models\OTPPoints,OTP'],
            'merchantId' => ['required', 'numeric',  'exists:App\Models\User,id'],
            'userId' => ['required', 'numeric',  'exists:App\Models\User,id'],
            'price' => ['required','numeric','gt:1'],
            'points' => ['required','numeric','gt:1'],
        ]);


        $OTP = OTPPoints::where('merchantId',$request->merchantId)
        ->where('userId',$request->userId)
        ->orderBy('id','desc')
        ->first();


        if($request->otp != $OTP->OTP){
            return redirect()->back()->with('error', 'رمز OTP غير صحيح');
        }


        if($request->price != $request->points ){
            return redirect()->back();
        }

        DB::transaction(function () use ($request){


        $pointRules = pointRules::where('merchantId',$request->merchantId)->first()->transferPoints;

        $prevPoints = points::select('price', 'points')
            ->where('userId', $request->userId)
            ->where('merchantId', $request->merchantId)
            ->first();

        $points = points::where('userId', $request->userId)
            ->where('merchantId', $request->merchantId)
            ->update([
                'points' => $prevPoints->points - $request->points,
                'price' => $prevPoints->price - $request->points * $pointRules,
            ]);

        $lastRowUpdated = points::orderBy('updated_at','DESC')->first()->id;

        pointsDetails::create([
            'pointsDetailsId' => $lastRowUpdated,
            'userId' => $request->userId,
            'merchantId' => $request->merchantId,
            'usercode' => $request->usercode,
            'price' => $request->price ,
            'points' => $request->points,
            'type'=>'Subtract'
        ]);

        $totalPointCurrentStore = points::select('price', 'points')
        ->where('userId', $request->userId)
        ->where('merchantId', $request->merchantId)
        ->sum('points');

        notify::create([
            'reseverId' => $request->userId,
            'senderId' => $request->merchantId,
            'messages'=>' لقد تم استبدال نقاط بقميه  '  . ($request->price ) . '₪ واصبح رصيد نقاتك في متجرنا ' . $totalPointCurrentStore . ' نقطه ' . 'شكرا علي زيارتك لنا ',
        ]);

        $NotifyData= notify::where('reseverId',$request->userId)->where('senderId',$request->merchantId)->orderBy('id','DESC')->first();

        // update otp success to 1
        $OTPUpdate = OTPPoints::where('OTP',$request->otp)->update([
            'succeed'=>1
        ]);

    $data = [
        'reseverId' => $NotifyData->reseverId,
        'senderName' => $NotifyData->notifyMerchant->name,
        'senderImg' => $NotifyData->notifyMerchant->userToDetalis->ProfileImage,
        'senderId' => $request->merchantId,
        'messages' => $NotifyData->messages,
        'price' => $request->price ,
        'points' => ($pointRules * $request->price / 100),
        'type'=>'add',
        'time'=>$NotifyData->created_at->diffForHumans(),
    ];


    event(new pointNofication($data));
});


        return redirect()->back()->with('success', 'تم استبدال النقاط ');

    }


    public function settingPoints()
    {
        return view('merchant.points.settingPoints');
    }



    public function myPoints(Request $request)
    {
        $mypoints = points::where('userId',Auth::User()->id)->inRandomOrder()->get();


        return view('myPoints',compact([

        ]));
    }








}
