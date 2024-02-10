<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\merchant;
use App\Models\notify;
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
        Carbon::setLocale('ar'); // to type date arabic

        $notify = notify::where('userid',Auth::User()->id)->orderBy('id','DESC')->get();
        $notifyId = notify::where('userid',Auth::User()->id)->orderBy('id','DESC')->first();

        $notifyCount = notify::where('userid',Auth::User()->id)
        ->where('readed','0')
        ->count();

        $serch = $request->search;
        $serchpersent = $request->persent;
        $priceRange = $request->priceRange;

        if (request('search')) {
            $products = merchant::where(function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%')
                ->orWhere('productDescription', 'like', '%' . $serch . '%');
            })->orWhereHas('productionToCategoryRealtions',function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%');
            })->orWhereHas('userToProduct',function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%');
            })
            ->latest()->paginate(16);

        } elseif (request('persent')) {

            $products = merchant::where(function($query) use ($serchpersent){
                $query->whereBetween('discount', [$serchpersent, 100]);
            })
            ->latest()->paginate(16);

        }elseif(request('priceRange')){
            $substringBefore = explode(';', $priceRange)[0];
            $substringAfter = explode(';', $priceRange)[1];
            $products = merchant::whereBetween('ThePriceAfterDiscount',[$substringBefore,$substringAfter])->latest()->paginate(16);
        }else{
            $products = merchant::with('userToProduct.userToDetalis')->latest()->paginate(16);
        }

        $merchants = User::where('subtype','merchant')->get('name');
        $category = category::get('name');

        return view('products',compact(
            'products',
            'category',
            'merchants',
            'notify',
            'notifyCount',
            'notifyId',
        ));
    }
}
