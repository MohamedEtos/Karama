<?php

namespace App\Http\Controllers;

use App\Models\merchant;
use App\Models\userDetalis;
use App\Models\visitorsCount;
use Illuminate\Http\Request;

class MarketProfileController extends Controller
{
    public function index($id)
    {

        $products = merchant::where('userId',$id)->latest()->paginate(15);
        $productsCounter = merchant::where('userId',$id)->count();
        $visetorCounter = visitorsCount::where('userId',$id)->count();
        
        $marketData = userDetalis::where('userId',$id)->first();

        return view('merchant.marketProfile',compact([
            'products',
            'marketData',
            'productsCounter',
            'visetorCounter',
        ]));
    }
}
