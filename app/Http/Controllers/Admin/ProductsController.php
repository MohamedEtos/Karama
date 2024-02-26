<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use App\Models\merchant;
use Illuminate\Http\Request;
use App\Models\rejectProductmess;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class ProductsController extends Controller
{
    public function allProducts()
    {
        $product = merchant::get();
        return view('admin.products.Proudcts',compact(
            'product',
        ));
    }
    public function editProudcts($id)
    {
        $id =  Crypt::decrypt($id);

        $product = merchant::where('id',$id)->first();
        $category  = category::get();
        return view('admin.products.editProudcts',compact(
            'product',
            'product',
        ));
    }

    public function reviewProudcts($id)
    {
        $id =  Crypt::decrypt($id);

        $product = merchant::where('id',$id)->orderBy('id','DESC')->first();
        $category  = category::get();
        // $rejectmess  = rejectProductmess::where('productId','=',$id)->orderBy('productId','DESC')->first();
        return view('admin.products.reviewProudcts',compact(
            'product',
            'category',
            // 'rejectmess',
        ));
    }


    public function appendProduct(Request $request)
    {

        merchant::where('id',$request->id)->update([
            'append'=>'1'
        ]);
        return redirect()->back()->with('success','تم الموافقه علي المنتج');
    }

    public function unappendProduct(Request $request)
    {
        DB::transaction(function () use ($request){
        rejectProductmess::create([
            'rejectMessage'=>$request->redjectmass,
        ]);
        $lastId = rejectProductmess::latest()->first()->id;

        // $lastId = rejectProductmess::orderBy('id','DESC')->first()->rejectId;
        merchant::where('id',$request->productsId)->update([
            'rejectId' =>  $lastId,
            'append'=>'2',
        ]);
    });

        return redirect()->back();
    }


    public function reviewAllProudcts(Request $request)
    {
        $ReviewProducts = merchant::where('append','0')->paginate(5);
        $ReviewCategory  = category::get();
        return view('admin.products.reviewAllProudcts',compact(
            'ReviewProducts',
        ));
    }


    public function acceptedProudcts(Request $request)
    {
        $acceptedproducts = merchant::where('append','1')->paginate(10);
        return view('admin.products.acceptedProudcts',compact(
            'acceptedproducts',
        ));
    }


    public function rejectedProudcts(Request $request)
    {
        // $products = merchant::where('append','2')->paginate(10);
        $rejectproducts = merchant::where('append','2')->paginate(10);
        return view('admin.products.rejectedProudcts',compact(
            'rejectproducts',
        ));
    }



}
