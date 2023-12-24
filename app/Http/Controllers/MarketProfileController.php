<?php

namespace App\Http\Controllers;

use App\Models\merchant;
use Illuminate\Http\Request;

class MarketProfileController extends Controller
{
    public function index($id)
    {

        $products = merchant::where('userId',$id)->latest()->paginate(15);
        

        return view('merchant.marketProfile',compact([
            'products'
        ]));
    }
}
