<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use App\Models\merchant;
use App\Models\productImg;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\rejectProductmess;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\ImageManagerStatic;

class ProductsController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:عرض المنتجات', ['only' => ['allProducts']]);
        $this->middleware('permission:تعديل منتج', ['only' => ['editProudcts','updateprduct']]);
        $this->middleware('permission:المراجعات', ['only' => ['reviewProudcts','reviewAllProudcts']]);
        $this->middleware('permission:قبول منتجات', ['only' => ['appendProduct']]);
        $this->middleware('permission:رفض منتجات', ['only' => ['unappendProduct']]);
        $this->middleware('permission:منتجات مقبوله', ['only' => ['acceptedProudcts']]);
        $this->middleware('permission:منتجات مرفوضه', ['only' => ['rejectedProudcts']]);
    }


    public function allProducts()
    {
        $producta = merchant::get();
        return view('admin.products.Proudcts',compact(
            'producta',
        ));
    }
    public function editProudcts($id)
    {
        $id =  Crypt::decrypt($id);

        $product = merchant::where('id',$id)->first();
        $subCat  = category::where('id',$product->categoryId)->first();

        $array1 = explode(",", $subCat->subCat);

        $uniqueArray = array_unique($array1);
        $trimmedArray = array_map('trim', $uniqueArray);
        $arrayunique = array_unique($trimmedArray);


        return view('admin.products.editProudcts',compact(
            'product',
            'arrayunique',
        ));
    }



    public function updateprduct(Request $request)
    {
        // check max number in cateogry

        // return $request->all();
        $merchantId =  Crypt::decrypt($request->merchantId);
        $productId =  Crypt::decrypt($request->productId);

        $request->validate([
            // 'merchantId' => 'required|integer|exists:App\Models\merchant,userId',
            // 'productId' => 'required|integer|exists:App\Models\merchant,id',
            'name'=>'required|string',
            'productDescription'=>'required|string',
            'productDetalis'=>'required|string',
            'price'=>'required|numeric|between:0,9999.99',
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
            $image  = ImageManagerStatic::make($request->file('mainImage'))->encode('webp')->resize(600,350);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $mainImage = 'upload/products/img/'. $imageName;
            $imgId = merchant::where('id',$productId)->first()->imgId;
            productImg::where('id',$imgId)->update([
                'mainImage'=>$mainImage,
            ]);
        }

        if($request->hasFile('img2')){
            $image  = ImageManagerStatic::make($request->file('img2'))->encode('webp')->resize(600,350);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $img2 = 'upload/products/img/'. $imageName;
            $imgId = merchant::where('id',$productId)->first()->imgId;
            productImg::where('id',$imgId)->update([
                'img2'=>$img2,
            ]);
        }

        if($request->hasFile('img3')){
            $image  = ImageManagerStatic::make($request->file('img3'))->encode('webp')->resize(600,350);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/products/img/'. $imageName));
            $img3 = 'upload/products/img/'. $imageName;
            $save_url = 'upload/products/img/'. $imageName;
            $imgId = merchant::where('id',$productId)->first()->imgId;
            productImg::where('id',$imgId)->update([
                'img3'=>$img3,
            ]);
        }

        // $rejectId = merchant::where('id',$id)->first()->rejectId;

        merchant::where('id',$productId)->update([
            'name'=>$request->name,
            // 'categoryId'=>
            'subCat'=>$request->subCat,
            'productDescription'=>$request->productDescription,
            'productDetalis'=>$request->productDetalis,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'ThePriceAfterDiscount'=>$request->price - ( $request->price * ($request->discount/100)) ,
            'append'=>'0',
            // 'rejectId'=>null
        ]);

        // rejectProductmess::where('id',$rejectId)->delete();





        return redirect()->back()->with('success','تم تعديل المنتج سيتم المراجعه من قبل الادارة ');


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
