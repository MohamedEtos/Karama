<?php

namespace App\Http\Controllers;

use App\Models\merchant;
use App\Models\visitorsCount;
use App\Models\User;
class MarketProfileController extends Controller
{
    public function index($id)
    {

        $products = merchant::where('userId',$id)->latest()->paginate(15);
        $productsCounter = merchant::where('userId',$id)->count();
        $visetorCounter = visitorsCount::where('userId',$id)->count();
        
        $marketData = User::where('id',$id)->first();

        return view('merchant.marketProfile',compact([
            'products',
            'marketData',
            'productsCounter',
            'visetorCounter',
        ]));
    }
}
