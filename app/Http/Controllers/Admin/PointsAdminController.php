<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\notify;
use App\Models\points;
use App\Models\merchant;
use App\Models\pointRules;
use Illuminate\Http\Request;
use App\Models\pointsDetails;
use Illuminate\Support\Carbon;
use App\Events\pointNofication;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PointsAdminController extends Controller
{
    public function pointsOperations()
    {


        $pointsOperations = pointsDetails::with('pointsToDetails')->orderBy('created_at','desc')->get();


        return view('admin.points.pointsOperations',compact(
            'pointsOperations'
        ));
    }


    public function addPoints()
    {

        $merchants = User::select('name','id')->where('subtype','merchant')->get();
        return view('admin.points.addPoints',compact(
            'merchants',
        ));
    }



    public function checkUserCode($usercode,$merchantId)
    {

        $userdata = User::select('name', 'id')
        ->where('usercode', $usercode)
        ->where('subtype', 'user')
        ->first();
        $oldPoints = points::select('points')->where('userId', $userdata->id)->where('merchantId', $merchantId)->first();

        if (!$oldPoints) {
            $oldPoints = 'nodata';
        }
        if (!$userdata) {
            $userdata = 'nodata';
        }

        return response()->json(array("MSG" => $userdata, 'oldPoints' => $oldPoints));

    }


    public function addUserPoints(Request $request)
    {
        DB::transaction(function() use($request) {

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
            'reseverId' => $request->userId,
            'senderId' => $request->merchantId,
            'messages'=>' لقد تم اضافه نقاط بقميه  '  . ($pointRules * $request->price / 100) . '₪ واصبح رصيد نقاتك في المتجر ' . $totalPointCurrentStore . ' نقطه ' . '(عن طريق الاداره Karama-SC#)',
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

    }); // end transactions

        return redirect()->back()->with('success', 'تم اضافه النقاط ');

    }

    public function pointSetting(Request $request)
    {
        $allMerchant =  pointRules::get();
        return view('admin.points.pointSetting',compact(
            'allMerchant',
        ));
    }

}
