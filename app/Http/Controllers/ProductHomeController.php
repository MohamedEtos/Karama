<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\notify;
use App\Models\subCat;
use App\Models\category;
use App\Models\merchant;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductHomeController extends Controller
{
    public function index(Request $request){

        // get notifactions

        $mainCatindex = subCat::select('categoryId')->distinct()->inRandomOrder()->limit(20)->get();



        return view('store.index',compact(
            'mainCatindex',
        ));
    }

    public function products(Request $request){


        return view('store.products');
    }

    public function filterSearch(Request $request){

        return $request->all();

        // $products =merchant::inRandomOrder()->where('append','1')->orWhereHas('userToProduct')->get();

        // return $products;


    }


}
