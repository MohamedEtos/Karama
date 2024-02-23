<?php
namespace App\ViewComposer;

use App\Models\merchant;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

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
            $products = merchant::inRandomOrder()->where(function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%')
                    ->orWhere('productDescription', 'like', '%' . $serch . '%')
                    ->orWhere('subCat', 'like', '%' . $serch . '%');
            })->orWhereHas('productionToCategoryRealtions',function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%');
            })->orWhereHas('userToProduct',function($query) use ($serch){
                $query->where('name', 'like', '%' . $serch . '%');
            })
                ->latest()->paginate(16);

        } elseif (request('persent')) {

            $products = merchant::inRandomOrder()->where(function($query) use ($serchpersent){
                $query->whereBetween('discount', [$serchpersent, 100]);
            })
                ->latest()->paginate(16);

        }elseif(request('priceRange')){
            $substringBefore = explode(';', $priceRange)[0];
            $substringAfter = explode(';', $priceRange)[1];
            $products = merchant::inRandomOrder()->whereBetween('ThePriceAfterDiscount',[$substringBefore,$substringAfter])->latest()->paginate(16);
        }else{
            $products = merchant::with('userToProduct.userToDetalis')->inRandomOrder()->latest()->paginate(16);
        }

        $view->with('products', $products);

    }

}
