<?php
namespace App\ViewComposer;

use App\Models\subCat;
use App\Models\merchant;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;

Class SearchBar
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose($view)
    {
        $req = $this->request;

        $serch = request('search');
        $serchpersent = request('persent');
        $priceRange = request('priceRange');

        if (request('search')) {
            $products = merchant::inRandomOrder()->where('append','1')->where(function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%')
                    ->where('append','1')
                    ->orWhere('productDescription', 'like', '%' . $serch . '%')
                    ->orWhere('subCat', 'like', '%' . $serch . '%');
            })->orWhereHas('productionToCategoryRealtions',function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%')->where('append','1');
            })->orWhereHas('userToProduct',function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%')->where('append','1');
            })
                ->latest()->paginate(16);

        } elseif (request('persent')) {

            $products = merchant::inRandomOrder()->where('append','1')->where(function($query) use ($serchpersent){
                $query->whereBetween('discount', [$serchpersent, 100]);
            })
                ->latest()->paginate(16);

        }elseif(request('priceRange')){
            $substringBefore = explode(';', $priceRange)[0];
            $substringAfter = explode(';', $priceRange)[1];
            $products = merchant::inRandomOrder()->where('append','1')->whereBetween('ThePriceAfterDiscount',[$substringBefore,$substringAfter])->latest()->paginate(16);
        }else{
            $products = merchant::with('userToProduct.userToDetalis')->where('append','1')->inRandomOrder()->latest()->paginate(16);
        }


        $mainCat = subCat::get();

        $mainCatindex4 = subCat::select('categoryId')->distinct()->inRandomOrder()->limit(4)->get();


        $view->with('products', $products)
        ->with('mainCat',$mainCat)
        ->with('mainCatindex4',$mainCatindex4);

    }

}
