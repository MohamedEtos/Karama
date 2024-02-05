<?php

namespace App\Http\Controllers;

use App\Models\pointRules;
use App\Models\points;
use App\Models\pointsDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function UserPoints()
    {
        return view('merchant.addUserPoints');
    }

    public function checkUserCode($usercode)
    {

        $userdata = User::select('name', 'id')
        ->where('usercode', $usercode)
        ->where('subtype', 'user')
        ->first();
        $oldPoints = points::select('points')->where('userId', $userdata->id)->where('merchantId', Auth::User()->id)->first();

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


        return redirect()->back()->with('success', 'تم اضافه النقاط ');

    }

    public function exchangePointsView()
    {
        $exchangeLimit = pointRules::where('merchantId',Auth::User()->id)->first();
        return view('merchant/exchangepoints',compact(
            'exchangeLimit'
        ));

    }

    public function exchangePoints(Request $request)
    {

        if($request->price != $request->points){
            return redirect()->back();
        }

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

        return redirect()->back()->with('success', 'تم استبدال النقاط ');

    }

}
