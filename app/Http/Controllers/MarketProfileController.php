<?php

namespace App\Http\Controllers;

use App\Models\merchant;
use App\Models\pointRules;
use App\Models\points;
use App\Models\visitorsCount;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits;
class MarketProfileController extends Controller
{
    use Traits\navbarUser;

    public function index(Request $request  ,$id)
    {

        $products = merchant::where('userId',$id)->latest()->paginate(15);
        $productsCounter = merchant::where('userId',$id)->count();
        $visetorCounter = visitorsCount::where('userId',$id)->count();
        $pointlimit = pointRules::where('merchantId',$id)->first();
        $usersPoints = points::where('merchantId',$id)->sum('points');;
        $marketData = User::where('id',$id)->first();

//        traits
        $search = $this->search($request);
        $merchants = $this->merchant();
        $category = $this->category();
        $notifyCount = $this->notifyCount();
        $notify = $this->notify();
        $notifyId = $this->notifyId();
        return view('merchant.marketProfile',compact([
            'products',
            'marketData',
            'productsCounter',
            'visetorCounter',
            'pointlimit',
            'usersPoints',
            'merchants',
            'category',
            'notifyCount',
            'notifyId',
            'notify',
        ]));
    }
}
