<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AdsStore;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use Intervention\Image\ImageManagerStatic;

class AdsStoreController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:عرض الاعلانات', ['only' => ['AdsView']]);
        $this->middleware('permission:اضافه اعلان', ['only' => ['StoreAdsView','storeAds']]);
        $this->middleware('permission:تجديد اعلان', ['only' => ['resumeAds']]);
        $this->middleware('permission:ايقاف اعلان', ['only' => ['StopAds']]);
        $this->middleware('permission:حذف اعلان', ['only' => ['deleteAds']]);

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdsView()
    {
        $AdsStore = AdsStore::orderBy('status','desc')->get();
        return view('admin.Ads.AdsView',compact(
            'AdsStore',
        ));
    }

    public function StoreAdsView(Request $request)
    {
        return view('admin.Ads.StoreAdsView');
    }


    public function storeAds(Request $request)
    {


        $request->validate([
            'usercode' => 'required|numeric|exists:App\Models\User,usercode',
            'startAds' => ['required', 'date', ],
            'endAds' => ['required', 'date', ],
            'text1' => [ 'string', 'max:255'],
            'text2' => [ 'string', 'max:255'],
            'adsLink' => [ 'string', 'max:255','nullable'],
            'mainImage'=>'required|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'adsPrice'=>'numeric|nullable',
        ],[
            'usercode.required'=>'لا يمكن ترك رقم المستخدم فارغ',
            'usercode.numeric'=>'رقم المستخدم ارقام فقط',
            'usercode.exists'=>'رقم المتجر غير صحيح',
            'startAds.required'=>'ضع تاريخ صالح',
            'endAds.required'=>'ضع تاريخ صالح',
            'mainImage.required'=>'ضع صوره للاعلان',
            'mainImage.mimes'=>'الامتدادات المسموح بها فقط (jpeg,png,jpg,gif,webp)',
            'mainImage.max'=>'يجب الا يكون حجم الصوره اكبر من 2048 MB',
        ]);



        $usercode = User::Where('usercode',$request->usercode)->first()->id;



        if($request->hasFile('mainImage')){
            $image  = ImageManagerStatic::make($request->file('mainImage'))->encode('webp'); //->resize(600,600);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/ads/'. $imageName));
            $mainImage = 'upload/ads/'. $imageName;
        };

        if(empty($request->adsLink)){
            AdsStore::create([
                'user_id'=>$usercode,
                'startAds'=>$request->startAds,
                'endAds'=>$request->endAds,
                'text1'=>$request->text1,
                'text2'=>$request->text2,
                'text3'=>$request->text3,
                'link'=>'MarketProfile/'.$usercode,
                'price'=>$request->adsPrice,
                'textColor'=>$request->color,
                'img1'=>$mainImage,
            ]);
        }else{
            AdsStore::create([
                'user_id'=>$usercode,
                'startAds'=>$request->startAds,
                'endAds'=>$request->endAds,
                'text1'=>$request->text1,
                'text2'=>$request->text2,
                'text3'=>$request->text3,
                'link'=>$request->adsLink,
                'price'=>$request->adsPrice,
                'textColor'=>$request->color,
                'img1'=>$mainImage,
            ]);
        }



        return redirect()->back()->with(['success'=>'تم وضع  الاعلان']);
    }

    public function resumeAds(Request $request)
    {

        $AdsId = decrypt($request->AdsId);

        $deleteAds = AdsStore::where('id',$AdsId)->update([

            'status'=>'activeAT',
            'startAds'=>$request->startAds,
            'endAds'=>$request->endAds,
        ]);

        return redirect()->back()->with(['success'=>'تم استئناف الاعلان']);
    }
    public function StopAds(Request $request,$id)
    {

        $AdsId = decrypt($id);
        $deleteAds = AdsStore::where('id',$AdsId)->update([
            'status'=>'Stop',
        ]);

        return redirect()->back()->with(['success'=>'تم ايقاف الاعلان']);
    }

    public function deleteAds(Request $request)
    {
        $AdsId = decrypt($request->AdsId);
        $deleteAds = AdsStore::where('id',$AdsId)->delete();
        return redirect()->back();
    }

}
