<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pointsDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
class PointsAdminController extends Controller
{
    public function pointsOperations()
    {
        Carbon::setLocale('ar'); // to type date arabic


        $pointsOperations = pointsDetails::with('pointsToDetails')->get();


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
}
