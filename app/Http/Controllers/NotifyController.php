<?php

namespace App\Http\Controllers;

use App\Traits;
use App\Models\User;
use App\Models\notify;
use Illuminate\Http\Request;
use App\Events\pointNofication;
use Illuminate\Support\Facades\Auth;

class NotifyController extends Controller
{
    use Traits\navbarUser;

    public function markAllReadedAjax(Request $request)
    {
        $NotifyData= notify::where('userId',$request->uId)->update([
            'readed'=>'1'
        ]);
        return response()->json(["MSG" => 'done']);

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
    public function sendMail(){
        return view('admin.notify.sendMail');
    }
    public function sendNotifyAjax(Request $request){

        // get usercode to id

        $userId = User::where('userCode',$request->userCode)->first();
        $request->validate([
            'userCode' => ['required', 'numeric','lt:99999999','exists:App\Models\User,usercode'],
            'notify' => ['required','string','min:10'],
        ],[
           'userCode.required'=>'هذه الحقل مطلوب',
           'userCode.numeric'=>'يجب ان يكون رقم المستخدم او التاجر ارقام',
           'userCode.exists'=>'رقم السمتخدم غير صحيح',
           'notify.required'=>'هذه القحل مطلوب',
           'notify.min'=>'يجب ان يكون الموضوع اكبر من 10 حروف علي الاقل',

        ]);

       $notify = notify::create([
            'userId'=>$userId->id,
            'merchantId'=>Auth::User()->id,
            'messages'=>$request->notify,
        ]);


        $data = [
            'userId' => $userId->id,
            'merchantName' => 'Karama-SC # ',
            'merchantImg' => Auth::User()->userToDetalis->ProfileImage,
            'merchantId' => Auth::User()->id,
            'messages' => $request->notify,
            'price' => '',
            'points' => '',
            'type'=>'',
            'time'=>$notify->created_at->diffForHumans(),
        ];


        event(new pointNofication($data));


        return response()->json(["MSG" => 'تم الارسال']);
    }

}
