<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdsStore;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

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
