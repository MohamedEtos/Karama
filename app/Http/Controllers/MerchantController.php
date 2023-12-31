<?php

namespace App\Http\Controllers;

use App\Models\visitorsCount;
use App\Models\merchant;
use App\Models\category;
use App\Models\productImg;
use App\Models\User;
use App\Models\userDetalis;
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

        // get user with relations
        // $product = visitorsCount::with('productionToviewrsRealtions.userToProduct')->first();
        // $product->productionToviewrsRealtions->userToProduct->name; // get user name

        $storeViews = visitorsCount::where('userId',Auth::User()->id)->count();

        $products_data = merchant::where('userid',Auth::User()->id)->get();
        $products_count = merchant::where('userid',Auth::User()->id)->count();

        // calculate append product present
        $appendPersent = merchant::where('userId',Auth::User()->id)->where('append','1')->count();
        $unappendPersent = merchant::where('userId',Auth::User()->id)->where('append','0')->count();
        
        if($unappendPersent>=0 or $appendPersent>=0){ 
         $persent = 0;   
        } else{
            $persent = ($unappendPersent/$appendPersent*100);
        }


        // $persent = round($persent,'1');
        $test = User::where('id','1')->first();

        return view('merchant.merchant',compact(
            'products_data',
            'products_count',
            'appendPersent',
            'unappendPersent',
            'persent',
            'storeViews',
            'test',
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

        // check max number in cateogry

        $max = category::latest()->orderBy('id','DESC')->first()->id;
        $min = 1;

        $request->validate([
            'name'=>'required|string',
            'categoryId' => 'required|integer|between:'.$min.','.$max,
            'productDescription'=>'required|string',
            'productDetalis'=>'required|string',
            'price'=>'required|numeric',
            'discount'=>'required|integer',
            // 'ThePriceAfterDiscount'=>'required| integer',
            'mainImage'=>'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'img2'=>'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'img3'=>'required|mimes:jpeg,png,jpg,gif,webp|max:1024',

        ],[
            'name.required'=>'لا يمكن ترك الاسم فارغ',
            'name.string'=>'ادخل حروف صالحه',
            'categoryId.required'=>'تاكد من اخيار قسم من الاقسام الموجوده',
            'categoryId.integer'=>'برجاء اختيار قسم من الاقسام المعروضه فقط',
            'categoryId.min'=>'برجاء اختيار قسم من الاقسام المعروضه فقط',
            'categoryId.max'=>'برجاء اختيار قسم من الاقسام المعروضه فقط',
            'productDescription.required'=>'لا يمكن ترك الوصف فارغ',
            'productDetalis.required'=>'لا يمكن ترك التفاصيل فارغه',
            'price.required'=>'اكتب سعر اولاً',
            'price.numeric'=>'اكتب ارقام صالحه',
            'discount.required'=>'لا يمكن ترك الخصم فارغ',
            // 'ThePriceAfterDiscount.required'=>'يجب ادخال سعر مناسب',
            'mainImage.required'=>'ضع صوره للمنتج',
            'mainImage.mimes'=>'الامتدادات المسموح بها فقط (jpeg,png,jpg,gif,webp)',
            'mainImage.max'=>'يجب الا يكون حجم الصوره اكبر من 1024 MB',
            'img2.required'=>'ضع صوره للمنتج',
            'img2.mimes'=>'الامتدادات المسموح بها فقط (jpeg,png,jpg,gif,webp)',
            'img2.max'=>'يجب الا يكون حجم الصوره اكبر من 1024 MB',
            'img3.required'=>'ضع صوره للمنتج',
            'img3.mimes'=>'الامتدادات المسموح بها فقط (jpeg,png,jpg,gif,webp)',
            'img3.max'=>'يجب الا يكون حجم الصوره اكبر من 1024 MB',
            ]);




        if($request->hasFile('mainImage')){
            $image  = ImageManagerStatic::make($request->file('mainImage'))->encode('webp')->resize(600,350);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $mainImage = 'upload/products/img/'. $imageName;
        }
        if($request->hasFile('img2')){
            $image  = ImageManagerStatic::make($request->file('img2'))->encode('webp')->resize(600,350);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $img2 = 'upload/products/img/'. $imageName;
        }
        if($request->hasFile('img3')){
            $image  = ImageManagerStatic::make($request->file('img3'))->encode('webp')->resize(600,350);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $img3 = 'upload/products/img/'. $imageName;
        }

        productImg::create([
            'userId'=>Auth::User()->id, // this colum for show userid only (not relations)
            'mainImage'=>$mainImage,
            'img2'=>$img2,
            'img3'=>$img3,
        ]);

        $getLastImageId = productImg::where('userId',Auth::User()->id)->latest()->first()->id;

        merchant::create([
            'userId'=>Auth::User()->id,
            'name'=>$request->name,
            'categoryId'=>$request->categoryId,
            'productDescription'=>$request->productDescription,
            'productDetalis'=>$request->productDetalis,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'ThePriceAfterDiscount'=>$request->price * $request->discount/100,
            'imgId'=>$getLastImageId,
        ]);

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
        $category = category::get();
        return view('merchant.new-product',compact(
            'category'
        ));
    }

    public function ProductDetails(Request $request ,$id){

        // get id user

        $userId = merchant::where('id',$id)->first();
        

        // count visetors
        $ip = $request->ip();
        $visitor = visitorsCount::firstOrCreate([
            'ip_address' => $ip,
            'productId' => $id,
            'userId' => $userId->userToProduct->id,
        ]);
        $visitor->increment('visits');
        $visitor->save();
        // $visitors = visitorsCount::count();
        $productRevew = visitorsCount::where('productId',$id)->count('ip_address');
        // merchant::where('id', $id)->increment('productViews');

                // get user with relations
        // $test = userDetalis::with('userDetails')->first();
        // $test->userDetails; // get user name

        // return $test;

        // get merchant id 


        $product_details = merchant::where('id',$id)->get();
        $product = merchant::findorfail($id);
        $product_cat = $product->categoryId;

        $related_products = merchant::where('id',$product_cat)
        ->where('id','!=',$id)
        ->inRandomOrder()
        ->limit(4)
        ->get();

        $merchantId = merchant::where('id',$id)->first()->userId;

        $merchantData = User::where('id',$merchantId)->first();


        return view('product-details',compact(
            'product_details',
            'related_products',
            'productRevew',
            'merchantData',
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
        $products = merchant::where('userid',Auth::User()->id)->get(); //get product from image table relation

        return view('merchant.list-product',compact(
            'products',
        ));
    }



    public function show_update (Request $request,$id)
    {


        // get current product data 
        $product = merchant::where('id',$id)->first();
        $category = category::where('id','!=',$product->productionToCategoryRealtions->id)->get();

        return view('merchant.edit-product',compact(
            'product',
            'category',
        ));
    }





     
    public function update(Request $request, $id)
    {
        // check max number in cateogry

        $max = category::latest()->orderBy('id','DESC')->first()->id;
        $min = 1;

        $request->validate([
            'name'=>'required|string',
            'categoryId' => 'required|integer|between:'.$min.','.$max,
            'productDescription'=>'required|string',
            'productDetalis'=>'required|string',
                'price'=>'required|numeric|between:0,9999.99',
            'discount'=>'required| integer',
            // 'ThePriceAfterDiscount'=>'required| integer',
            'mainImage'=>'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'img2'=>'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'img3'=>'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',

        ],[
            'name.required'=>'لا يمكن ترك الاسم فارغ',
            'name.string'=>'ادخل حروف صالحه',
            'categoryId.required'=>'تاكد من اخيار قسم من الاقسام الموجوده',
            'categoryId. integer'=>'برجاء اختيار قسم من الاقسام المعروضه فقط',
            'categoryId.min'=>'برجاء اختيار قسم من الاقسام المعروضه فقط',
            'categoryId.max'=>'برجاء اختيار قسم من الاقسام المعروضه فقط',
            'productDescription.required'=>'لا يمكن ترك الوصف فارغ',
            'productDetalis.required'=>'لا يمكن ترك التفاصيل فارغه',
            'price.required'=>'اكتب سعر اولاً',
            'discount.required'=>'لا يمكن ترك الخصم فارغ',
            // 'ThePriceAfterDiscount.required'=>'يجب ادخال سعر مناسب',
            'mainImage.nullable'=>'ضع صوره للمنتج',
            'mainImage.mimes'=>'الامتدادات المسموح بها فقط (jpeg,png,jpg,gif,webp)',
            'mainImage.max'=>'يجب الا يكون حجم الصوره اكبر من 1024 MB',
            'img2.nullable'=>'ضع صوره للمنتج',
            'img2.mimes'=>'الامتدادات المسموح بها فقط (jpeg,png,jpg,gif,webp)',
            'img2.max'=>'يجب الا يكون حجم الصوره اكبر من 1024 MB',
            'img3.nullable'=>'ضع صوره للمنتج',
            'img3.mimes'=>'الامتدادات المسموح بها فقط (jpeg,png,jpg,gif,webp)',
            'img3.max'=>'يجب الا يكون حجم الصوره اكبر من 1024 MB',
            ]);


        // update product 
        if($request->hasFile('mainImage')){
            $image  = ImageManagerStatic::make($request->file('mainImage'))->encode('webp')->resize(600,350);
            // $image  = ImageManagerStatic::make($request->file('mainImg'))->encode('webp')->resize(600,350);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $mainImage = 'upload/products/img/'. $imageName;
            productImg::where('id',$id)->update([
                'mainImage'=>$mainImage,
            ]);
        }

        if($request->hasFile('img2')){
            $image  = ImageManagerStatic::make($request->file('img2'))->encode('webp')->resize(600,350);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $img2 = 'upload/products/img/'. $imageName;
            productImg::where('id',$id)->update([
                'img2'=>$img2,
            ]);
        }

        if($request->hasFile('img3')){
            $image  = ImageManagerStatic::make($request->file('img3'))->encode('webp')->resize(600,350);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $img3 = 'upload/products/img/'. $imageName;
            $save_url = 'upload/products/img/'. $imageName;
            productImg::where('id',$id)->update([
                'img3'=>$img3,
            ]);
        }


        merchant::where('id',$id)->update([
            'name'=>$request->name,
            'categoryId'=>$request->categoryId,
            'productDescription'=>$request->productDescription,
            'productDetalis'=>$request->productDetalis,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'ThePriceAfterDiscount'=>$request->price * $request->discount/100,
        ]);

        return redirect()->back()->with('success','تم تعديل المنتج سيتم المراجعه من قبل الادارة ');


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


    public function previewProduct($id)
    {
        $previewProduct = merchant::findOrFail($id);
        $productRevew = visitorsCount::where('productId',$id)->count('ip_address');
        $userDetails = User::where('userDetalis',Auth::user()->id)->first();
        return view('merchant.preview-product',compact([
            'previewProduct',
            'productRevew',
            'userDetails',
        ]));
    }
}