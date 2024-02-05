<?php

namespace App\Http\Controllers;

use App\Models\merchant;
use App\Models\pointRules;
use App\Models\points;
use App\Models\visitorsCount;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MarketProfileController extends Controller
{
    public function index($id)
    {

        $products = merchant::where('userId',$id)->latest()->paginate(15);
        $productsCounter = merchant::where('userId',$id)->count();
        $visetorCounter = visitorsCount::where('userId',$id)->count();
        $pointlimit = pointRules::where('merchantId',Auth::User()->id)->first();
        $usersPoints = points::where('merchantId',Auth::User()->id)->sum('points');;
        $marketData = User::where('id',$id)->first();

        return view('merchant.marketProfile',compact([
            'products',
            'marketData',
            'productsCounter',
            'visetorCounter',
            'pointlimit',
            'usersPoints',
        ]));
    }
}
