<?php
namespace App\Traits;

use App\Models\category;
use App\Models\notify;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\merchant;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;


trait navbarUser{

    function merchant (){
        $merchants = User::where('subtype','merchant')->get('name');

        return $merchants;
    }

    function category(){
        $category = category::get('name');
        return $category;
    }

    function notifyCount()
    {
        $notifyCount = notify::where('userid',Auth::User()->id)
            ->where('readed','0')
            ->count();
        return $notifyCount;

    }

    function notify()
    {
        $notify = notify::where('userid',Auth::User()->id)->limit(10)->orderBy('id','DESC')->get();
        return $notify;
    }

    function notifyId()
    {
        $notifyId = notify::where('userid',Auth::User()->id)->orderBy('id','DESC')->first();
        return $notifyId;
    }

    function search(Request $request)
    {
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
        return $products;

    }



}
