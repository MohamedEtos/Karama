<?php

namespace App\Http\Controllers;

use App\Traits;
use App\Models\User;
use App\Models\notify;
use App\Models\points;
use App\Models\subCat;
use App\Models\category;
use App\Models\merchant;
use App\Models\productImg;
use App\Models\subcategory;
use App\Models\userDetalis;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\pointsDetails;
use App\Models\visitorsCount;
use Illuminate\Support\Carbon;
use App\Events\pointNofication;
use App\Models\rejectProductmess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\ImageManagerStatic;

// use App\Http\Controllers\ProductHomeController;


class MerchantController extends Controller
{
    use Traits\navbarUser;




    public function __construct()
    {
        $this->middleware('permission:تاجر', ['only' => [
            'index',
            'previewProduct',
            'destroy',
            'update',
            'show_update',
            'edit',
            'show',
            'store',
            'update',
            ]]);
        $this->middleware('permission:مستخدم', ['only' => ['ProductDetails']]);
    }

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

        $myId= Auth::User()->id;

        $storeViews = visitorsCount::where('userId',$myId)->count();

        $products_data = merchant::where('userid',$myId)->get();
        $products_count = merchant::where('userid',$myId)->count();

        // calculate append product present
        $appendPersent = merchant::select('id')->where('userId',$myId)->where('append','1')->count();
        $unappendPersent = merchant::select('id')->where('userId',$myId)->where('append','0')->count();

        if($unappendPersent>=0 or $appendPersent>=0){
         $persent = 0;
        } else{
            $persent = ($unappendPersent/$appendPersent*100);
        }

        $userPoint = points::select(
            'created_at',
            'price',
            'points',
            'userId',
            )->where('merchantId',$myId)->orderBy('id','DESC')->limit(5)->get();
        $userPointDetails = pointsDetails::with('pointsToDetails')->where('merchantId',$myId)->orderBy('id','DESC')->limit(5)->get();

        // $persent = round($persent,'1');


        // count users in every monthes
        $points = points::select('id', 'created_at')
        ->where('merchantId',$myId)
        ->whereYear('created_at', '=', Carbon::now()->year)
        ->get()
        ->groupBy(function($date) {
            // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months

        });

        $pointsCount = [];
        $userArr = [];

        foreach ($points as $key => $value) {
            $pointsCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];
            }else{
                $userArr[$i] = 0;
            }
        }
        //  end count users in every monthes

        // count add points in every monthes
        $pointsadd = pointsDetails::select('id', 'created_at')
        ->where('merchantId',$myId)
        ->where('type','add')
        ->whereYear('created_at', '=', Carbon::now()->year)
        ->get()
        ->groupBy(function($date) {
            // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months

        });

        $pointsAddCount = [];
        $userArr = [];

        foreach ($pointsadd as $key => $value) {
            $pointsAddCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];
            }else{
                $userArr[$i] = 0;
            }
        }
        //  end add points in every monthes

        // count exchange points every monthes
        $pointsSub = pointsDetails::select('id', 'created_at')
            ->where('merchantId',$myId)
            ->where('type','Subtract')
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->get()
            ->groupBy(function($date) {
                // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months

            });

        $pointsSubCount = [];
        $userArr = [];

        foreach ($pointsSub as $key => $value) {
            $pointsSubCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];
            }else{
                $userArr[$i] = 0;
            }
        }
        // end count exchange points every monthes

        $countUsers = User::where('subtype','user')->count();

        return view('merchant.merchant',compact(
            'products_data',
            'products_count',
            'appendPersent',
            'unappendPersent',
            'persent',
            'storeViews',
            'userPoint',
            'pointsCount',
            'userPointDetails',
            'pointsAddCount',
            'pointsSubCount',
            'countUsers',
            // 'VisitorsCountController',
        ));
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

        $request->all();
        DB::transaction(function() use($request) {



        $request->validate([
            'name'=>'required|string',
            // 'categoryId' => 'required|numeric|between:'.$min.','.$max,
            // 'subCat' => ['required','exists:App\Models\subCat,name'],
            'productDescription'=>'required|string',
            'productDetalis'=>'required|string',
            'price'=>'required|numeric',
            'discount'=>'required|numeric',
            'ThePriceAfterDiscount'=>'required| numeric',
            'mainImage'=>'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'img2'=>'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'img3'=>'required|mimes:jpeg,png,jpg,gif,webp|max:1024',

        ],[
            'name.required'=>'لا يمكن ترك الاسم فارغ',
            'name.string'=>'ادخل حروف صالحه',
            // 'categoryId.required'=>'تاكد من اخيار قسم من الاقسام الموجوده',
            // 'categoryId.numeric'=>'برجاء اختيار قسم من الاقسام المعروضه فقط',
            // 'categoryId.min'=>'برجاء اختيار قسم من الاقسام المعروضه فقط',
            // 'categoryId.max'=>'برجاء اختيار قسم من الاقسام المعروضه فقط',
            'productDescription.required'=>'لا يمكن ترك الوصف فارغ',
            'productDetalis.required'=>'لا يمكن ترك التفاصيل فارغه',
            'price.required'=>'اكتب سعر اولاً',
            'price.numeric'=>'اكتب ارقام صالحه',
            'discount.required'=>'لا يمكن ترك الخصم فارغ',
            'ThePriceAfterDiscount.required'=>'يجب ادخال سعر مناسب',
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
            $image  = ImageManagerStatic::make($request->file('mainImage'))->encode('webp');
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $mainImage = 'upload/products/img/'. $imageName;
        }
        if($request->hasFile('img2')){
            $image  = ImageManagerStatic::make($request->file('img2'))->encode('webp')->resize(600,600);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $img2 = 'upload/products/img/'. $imageName;
        }
        if($request->hasFile('img3')){
            $image  = ImageManagerStatic::make($request->file('img3'))->encode('webp')->resize(600,600);
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
            'categoryId'=>Auth::User()->userToDetalis->categoryId,
            'subCat'=>$request->subCat,
            'productDescription'=>$request->productDescription,
            'productDetalis'=>$request->productDetalis,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'ThePriceAfterDiscount'=>$request->price - ( $request->price * ($request->discount/100)) ,

            'imgId'=>$getLastImageId,
        ]);



        $adminsId = User::where('subtype','admin')->first()->id;

        $notify = notify::create([
            'reseverId'=>$adminsId,
            'senderId'=>Auth::User()->id,
            'messages'=>'لقد قمت باضافه منتج برجاء المراجعه   ',
        ]);


        $data = [
            'reseverId' => $adminsId,
            'senderName' => Auth::User()->name,
            'senderImg' => Auth::User()->userToDetalis->ProfileImage,
            'senderId' => Auth::User()->id,
            'messages' => $notify->messages,
            'price' => '',
            'points' => '',
            'type'=>'',
            'time'=>$notify->created_at->diffForHumans(),
        ];


        event(new pointNofication($data));

        });

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

        $subCatarr = subCat::where('categoryId',Auth::User()->userToDetalis->categoryId)->get   ();


        // $subCatarrExplode = explode(",", $subCat->subCat);

        // $subCatarr = array_unique($subCatarrExplode);


        return view('merchant.new-product',compact(
            'subCatarr',
        ));
    }

    public function ProductDetails(Request $request ,$id){


        // get id user

        $userId = merchant::select('userId')->where('id',$id)->first();


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

        $related_products = merchant::where('categoryId',$product_cat)
        ->where('id','!=',$id)
        ->where('append','1')
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
        $listproducts = merchant::where('userid',Auth::User()->id)->get(); //get product from image table relation

        return view('merchant.list-product',compact(
            'listproducts',
        ));
    }



    public function show_update (Request $request,$id)
    {

        $id = Crypt::decrypt($id);

        // get current product data
        $product = merchant::where('id',$id)->first();

        $subCatarr = subCat::where('categoryId',Auth::User()->userToDetalis->categoryId)->get();

        return view('merchant.edit-product',compact(
            'product',
            'subCatarr',
        ));
    }






    public function update(Request $request, $id)
    {
        // check max number in cateogry




        $request->validate([
            'name'=>'required|string',
            'productDescription'=>'required|string',
            'productDetalis'=>'required|string',
            'price'=>'required|numeric|between:0,9999.99',
            'subCat' => ['required','exists:App\Models\subCat,id'],
            'discount'=>'required|numeric',
            'ThePriceAfterDiscount'=>'required|numeric',
            'mainImage'=>'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'img2'=>'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'img3'=>'nullable|mimes:jpeg,png,jpg,gif,webp|max:1024',

        ],[
            'name.required'=>'لا يمكن ترك الاسم فارغ',
            'name.string'=>'ادخل حروف صالحه',
            'productDescription.required'=>'لا يمكن ترك الوصف فارغ',
            'productDetalis.required'=>'لا يمكن ترك التفاصيل فارغه',
            'price.required'=>'اكتب سعر اولاً',
            'discount.required'=>'لا يمكن ترك الخصم فارغ',
            'ThePriceAfterDiscount.required'=>'يجب ادخال سعر مناسب',
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
            $image  = ImageManagerStatic::make($request->file('mainImage'))->encode('webp')->resize(600,600);
            // $image  = ImageManagerStatic::make($request->file('mainImg'))->encode('webp')->resize(600,600);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $mainImage = 'upload/products/img/'. $imageName;
            $imgId = merchant::where('id',$id)->first()->imgId;
            productImg::where('id',$imgId)->update([
                'mainImage'=>$mainImage,
            ]);
        }

        if($request->hasFile('img2')){
            $image  = ImageManagerStatic::make($request->file('img2'))->encode('webp')->resize(600,600);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $img2 = 'upload/products/img/'. $imageName;
            $imgId = merchant::where('id',$id)->first()->imgId;
            productImg::where('id',$imgId)->update([
                'img2'=>$img2,
            ]);
        }

        if($request->hasFile('img3')){
            $image  = ImageManagerStatic::make($request->file('img3'))->encode('webp')->resize(600,600);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $img3 = 'upload/products/img/'. $imageName;
            $save_url = 'upload/products/img/'. $imageName;
            $imgId = merchant::where('id',$id)->first()->imgId;
            productImg::where('id',$imgId)->update([
                'img3'=>$img3,
            ]);
        }

        $rejectId = merchant::where('id',$id)->first()->rejectId;

        merchant::where('id',$id)->update([
            'name'=>$request->name,
            'categoryId'=>Auth::User()->userToDetalis->categoryId,
            'subCat'=>$request->subCat,
            'productDescription'=>$request->productDescription,
            'productDetalis'=>$request->productDetalis,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'ThePriceAfterDiscount'=>$request->price - ( $request->price * ($request->discount/100)) ,
            'append'=>'0',
            'rejectId'=>null
        ]);

        rejectProductmess::where('id',$rejectId)->delete();


        $adminsId = User::where('subtype','admin')->first();

        $notify = notify::create([
            'reseverId'=>$adminsId->id,
            'senderId'=>Auth::User()->id,
            'messages'=>'لقد قمت بتعديل المنتج برجاء المراجعه مره اخري ',
        ]);

        $data = [
            'reseverId' => $adminsId->id,
            'senderName' => Auth::User()->name,
            'senderImg' => Auth::User()->userToDetalis->ProfileImage,
            'senderId' => Auth::User()->id,
            'messages' => $notify->messages,
            'price' => '',
            'points' => '',
            'type'=>'',
            'time'=>$notify->created_at->diffForHumans(),
        ];


        event(new pointNofication($data));


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
        $id = Crypt::decrypt($request->id);
        $imgName = merchant::findOrFail($id)->img;
        File::delete(public_path().$imgName);
        merchant::where('id',$id)->delete();
        $idResponse = Crypt::encrypt($id);
        return response()->json(["id" => $idResponse,'test'=>public_path().$imgName]);


    }


    public function previewProduct($id)
    {
        $previewProduct = merchant::findOrFail($id);
        $productRevew = visitorsCount::where('productId',$id)->count('ip_address');
        $userDetails = User::where('id',Auth::user()->id)->first();
        return view('merchant.preview-product',compact([
            'previewProduct',
            'productRevew',
            'userDetails',
        ]));
    }
}
