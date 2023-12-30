<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\merchant;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ProductHomeController extends Controller
{
    public function index(Request $request){


        $serch = $request->search;

        if (request('search')) {
            $products = merchant::where(function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%');
            })->orWhereHas('productionToCategoryRealtions',function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%');
            })->orWhereHas('userToProduct',function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%');
            })
            ->latest()->paginate(16);        
        } else {
            $products = merchant::with('userToProduct.userToDetalis')->latest()->paginate(16);
            }

            $category = category::get();

        return view('products',compact(
            'products',
            'category',
        ));
    }
}
