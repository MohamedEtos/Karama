<?php

namespace App\Http\Controllers;

use App\Models\points;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
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

        $userdata = User::select('name','id')->where('usercode',$usercode)->first();
        $oldPoints = points::select('points')->where('userId',$userdata->id)->where('merchantId',Auth::User()->id)->first();

        if(! $oldPoints ){
            $oldPoints = 'nodata';
        }
        if(! $userdata ){
            $userdata = 'nodata';
        }
        return response()->json(array("MSG"=>$userdata,'oldPoints'=>$oldPoints));

    }

    public function addUserPoints(Request $request)
    {

        $prevPoints = points::select('price','points')
        ->where('userId',$request->userId)
        ->where('merchantId',$request->merchantId)
        ->first();

        if(!$prevPoints){
            $oldPrice = '0';
            $oldPoints = '0';
        }else{
            $oldPrice = $prevPoints->price;
            $oldPoints = $prevPoints->points;
        }

        $pointstest =points::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'userId'   => $request->userId,
            'merchantId'=> $request->merchantId,

        ],[
            'userId'=> $request->userId,
            'merchantId'=> $request->merchantId,
            'usercode'=> $request->usercode,
            'price'=> $request->price +  $oldPrice,
            'points'=> ($request->price /10) + $oldPoints ,
        ]);


        return redirect()->back()->with('success','تم اضافه النقاط ');

    }

    public function exchangePointsView()
    {
        return view('merchant/exchangeUserPointsView');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\points  $points
     * @return \Illuminate\Http\Response
     */
    public function show(points $points)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\points  $points
     * @return \Illuminate\Http\Response
     */
    public function edit(points $points)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\points  $points
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, points $points)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\points  $points
     * @return \Illuminate\Http\Response
     */
    public function destroy(points $points)
    {
        //
    }
}
