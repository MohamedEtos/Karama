<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\merchant;
use App\Models\notify;
use App\Models\subCat;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
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


}
