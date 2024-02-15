<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notify;
use App\Traits;
use Illuminate\Support\Facades\Auth;
class NotifyController extends Controller
{
    use Traits\navbarUser;

    public function markAllReaded($markedId)
    {
        $NotifyData= notify::where('userId',$markedId)->update([
            'readed'=>'1'
        ]);

        return redirect()->back();
    }


    public function allNotify(Request $request)
    {

        $NotifyData= notify::where('userId',Auth::User()->id)->update([
            'readed'=>'1'
        ]);


        $allNotify = notify::where('userId',Auth::User()->id)->orderBy('id','DESC')->get();

//        traits
        $search = $this->search($request);
        $merchants = $this->merchant();
        $category = $this->category();
        $notifyCount = $this->notifyCount();
        $notify = $this->notify();
        $notifyId = $this->notifyId();

        return view('allNotify',compact([
            'merchants',
            'category',
            'notifyCount',
            'notifyId',
            'notify',
            'allNotify',
        ]));
    }


    public function notifyList(){
        $notify = notify::orderBy('id','DESC')->get();
        return view('admin.notify.notifyList',compact([
            'notify',
        ]));
    }

    public function sendNotify(){
        return view('admin.notify.sendNotify');
    }

}
