<?php
namespace App\ViewComposer;

use App\Models\subCat;
use App\Models\category;
use App\Models\merchant;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Builder;

Class SearchBar
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose($view)
    {


        $req= $this->request;

        $title = request('title');
        $brandName = request('brandName');
        $startPrice = request('startPrice');
        $endPrice = request('endPrice');
        $persent = request('persent');

        $category = category::get();

        $query = merchant::query();

        if(isset($title) && ($title != null))
        {
            $query->where('name', 'like', '%' . $title . '%')

            ->orWhere('productDescription', 'like', '%' . $title . '%')

            ->orWhere('subCat', 'like', '%' . $title . '%')

            ->orWhereHas(
				'subCatMerchant',
				function (Builder $query) use ($title) {
					$query->where('name', 'like', '%'.$title.'%');
            })

            ->orWhereHas(
				'productionToCategoryRealtions',
				function (Builder $query) use ($title) {
					$query->where('name', 'like', '%'.$title.'%');
            });

        }



        if(isset($persent) && ($persent != null))
        {
            $query->where('discount','>=' ,$persent );
        }

        if(isset($startPrice) && ($startPrice != null))
        {
            $query->where('ThePriceAfterDiscount','>=' ,$startPrice );
        }

        if(isset($endPrice) && ($endPrice != null))
        {
            $query->where('ThePriceAfterDiscount','<=' ,$endPrice );
        }

        if(isset($brandName) && ($brandName != null))
        {
            $query->whereHas('userToProduct',function($q) use ($brandName) {
                $q->whereIn('id', $brandName);
            });
        }


        $products = $query->inRandomOrder()->where('append','1')->paginate(16)->withQueryString();


        // $serch = request('search');
        // $serchpersent = request('persent');
        // $startPrice = request('startPrice');
        // $endPrice = request('endPrice');

        // if (request('search')) {
        //     $products = merchant::inRandomOrder()->where('append','1')->where(function($query) use ($serch){
        //         $query->where('name', 'like', '%' . $serch . '%')
        //             ->where('append','1')
        //             ->orWhere('productDescription', 'like', '%' . $serch . '%')
        //             ->orWhere('subCat', 'like', '%' . $serch . '%');
        //     })->orWhereHas('productionToCategoryRealtions',function($query) use ($serch){
        //         $query->where('name', 'like', '%' . $serch . '%')->where('append','1');
        //     })->orWhereHas('userToProduct',function($query) use ($serch){
        //         $query->where('name', 'like', '%' . $serch . '%')->where('append','1');
        //     })
        //         ->latest()->paginate(16);

        // } elseif (request('persent')) {

        //     $products = merchant::inRandomOrder()->where('append','1')->where(function($query) use ($serchpersent){
        //         $query->whereBetween('discount', [$serchpersent, 100]);
        //     })
        //         ->latest()->paginate(16);

        // }elseif(request('startPrice')){

        //     $products = merchant::inRandomOrder()->where('append','1')->whereBetween('ThePriceAfterDiscount',[$startPrice,$endPrice])->latest()->paginate(16);
        // }else{
        //     $products = merchant::with('userToProduct.userToDetalis')->where('append','1')->inRandomOrder()->latest()->paginate(16);
        // }


        $mainCat = subCat::inRandomOrder()->get();

        $mainCatindex = subCat::select('categoryId')->distinct()->inRandomOrder()->limit(20)->get();


        $view->with('products', $products)
        ->with('mainCat',$mainCat)
        ->with('mainCatindex',$mainCatindex);

    }

}
