<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\merchant;
use Illuminate\Http\Request;
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

        $product = merchant::where('id',$id)->first();
        $category  = category::get();
        return view('admin.products.reviewProudcts',compact(
            'product',  
            'category',  
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
        merchant::where('id',$request->productsId)->update([
            'append'=>'2'
        ]);
        return redirect('admin/allProducts');  
    }


    public function reviewAllProudcts(Request $request)
    {
        $products = merchant::where('append','0')->paginate(5);
        $category  = category::get();
        return view('admin.products.reviewAllProudcts',compact(
            'products',  
        ));    
    }


    public function acceptedProudcts(Request $request)
    {
        $products = merchant::where('append','1')->paginate(10);
        return view('admin.products.acceptedProudcts',compact(
            'products',  
        ));    
    }


    public function rejectedProudcts(Request $request)
    {
        $products = merchant::where('append','1')->paginate(10);
        return view('admin.products.rejectedProudcts',compact(
            'products',  
        ));    
    }



}
