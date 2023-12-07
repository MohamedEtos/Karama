<?php

namespace App\Http\Controllers;

use App\Models\visitorsCount;
use App\Models\merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products_data = merchant::get();
        $products_count = merchant::count();

        // calculate append product present
        $appendPersent = merchant::where('merchantName',Auth::User()->name)->where('append','1')->count();
        $unappendPersent = merchant::where('merchantName',Auth::User()->name)->where('append','0')->count();
        if($appendPersent > 1 or $unappendPersent > 1){
            $persent = $appendPersent / $unappendPersent * 100;
            $persent = round($persent,'1');
        }else{
            $persent = '0';
        }


        return view('merchant.merchant',compact(
            'products_data',
            'products_count',
            'appendPersent',
            'unappendPersent',
            'persent',
            // 'VisitorsCountController',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|string',
            'category'=>'required|string',
            'productDescription'=>'required|string',
            'productDetalis'=>'required|string',
            'price'=>'required|integer',
            'discount'=>'required|integer',
            // 'ThePriceAfterDiscount'=>'required|integer',
            // 'img'=>'required|mimes:jpeg,png,jpg,gif|max:2048',

        ],[
            'name.required'=>'لا يمكن ترك الاسم فارغ',
            'name.string'=>'ادخل حروف صالحه',
            'category.required'=>'تاكد من اخيار قسم من الاقسام الموجوده',
            'category.string'=>'ادخل حروف صالحه',
            'productDescription.required'=>'لا يمكن ترك الوصف فارغ',
            'productDetalis.required'=>'لا يمكن ترك التفاصيل فارغه',
            'price.required'=>'اكتب سعر اولاً',
            'discount.required'=>'لا يمكن ترك الخصم فارغ',
            // 'ThePriceAfterDiscount.required'=>'يجب ادخال سعر مناسب',
        ]);

        if($request->hasFile('img')){

            $image  = ImageManagerStatic::make($request->file('img'))->encode('webp')->resize(600,350);
  
            $imageName = Str::random().'.webp';
      
            $image->save(public_path('upload/products/img/'. $imageName));
    
            $save_url = 'upload/products/img/'. $imageName;

        }

        merchant::create([
            'merchantName'=>Auth::User()->name,
            'name'=>$request->name,
            'category'=>$request->category,
            'productDescription'=>$request->productDescription,
            'productDetalis'=>$request->productDetalis,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'ThePriceAfterDiscount'=>$request->price * $request->discount/100,
            'img'=> $save_url,
        ]);


        // return $request->all();
        return response()->json(["MSG" => "تم الاضافه سيتم الموفقه علي المنتج من قبل الادارة في اقرب وقت "]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('merchant.new-product');
    }

    public function ProductDetails(Request $request ,$id){

        // count visetors
        $ip = $request->ip();
        $visitor = visitorsCount::firstOrCreate([
            'ip_address' => $ip,
            'productId' => $id,
        ]);
        $visitor->increment('visits');
        $visitor->save();
        // $visitors = visitorsCount::count();
        $productRevew = visitorsCount::where('productId',$id)->count('ip_address');

        merchant::where('id', $id)->increment('productViews');
        $product_details = merchant::where('id',$id)->get();
        $product = merchant::findorfail($id);
        $product_cat = $product->category;

        $related_products = merchant::where('category',$product_cat)
        ->where('id','!=',$id)
        ->inRandomOrder()
        ->limit(4)
        ->get();
        
        return view('product-details',compact(
            'product_details',
            'related_products',
            'productRevew',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        $products_data = merchant::get();

        return view('merchant.list-product',compact(
            'products_data',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = merchant::where('id',$id)->first();
        return view('merchant.edit-product',compact(
            'product',
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $imgName = merchant::where('id',$request->id)->first('img');
        $imgName = merchant::findOrFail($request->id)->img;
        File::delete(public_path().$imgName);
        merchant::where('id',$request->id)->delete();
        return response()->json(["id" => $request->id,'test'=>public_path().$imgName]);


    }
}