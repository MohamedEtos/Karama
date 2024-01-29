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

        

      points::create([
            'userId'=> $request->userId,
            'usercode'=> $request->usercode,
            'price'=> $request->price,
            'merchantId'=> $request->merchantId,
            'points'=> $request->price/10,
        ]);

        return redirect()->back()->with('success','تم اضافه النقاط ');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
