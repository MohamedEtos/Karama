<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AdsStore;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic;

class AdsStoreController extends Controller
{
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
        // return $request->all();

        $usercode = User::Where('usercode',$request->usercode)->first()->id;

        // return $useecode;


        if($request->hasFile('mainImage')){
            $image  = ImageManagerStatic::make($request->file('mainImage'))->encode('webp'); //->resize(600,600);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/ads/'. $imageName));
            $mainImage = 'upload/ads/'. $imageName;
        };

        AdsStore::create([
            'user_id'=>$usercode,
            'startAds'=>$request->startAds,
            'endAds'=>$request->endAds,
            'text1'=>$request->text1,
            'text2'=>$request->text2,
            'text3'=>$request->text3,
            'link'=>'MarketProfile/'.$usercode,
            'img1'=>$mainImage,
        ]);

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
