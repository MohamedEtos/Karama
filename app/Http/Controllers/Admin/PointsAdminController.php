<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\notify;
use App\Models\pointsDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;

class PointsAdminController extends Controller
{
    public function pointsOperations()
    {


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
