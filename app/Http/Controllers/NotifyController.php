<?php

namespace App\Http\Controllers;

use App\Traits;
use App\Models\User;
use App\Models\notify;
use Illuminate\Http\Request;
use App\Events\pointNofication;
use App\Models\OTPPoints;
use App\Models\OTPTrigger;
use Illuminate\Support\Facades\Auth;

class NotifyController extends Controller
{
    use Traits\navbarUser;

    public function markAllReadedAjax(Request $request)
    {
        $NotifyData= notify::where('reseverId',$request->uId)->update([
            'readed'=>'1'
        ]);
        return response()->json(["MSG" => 'done']);

    }


    public function allNotify(Request $request)
    {

        $NotifyData= notify::where('reseverId',Auth::User()->id)->update([
            'readed'=>'1'
        ]);


        $allNotify = notify::where('reseverId',Auth::User()->id)->orderBy('id','DESC')->get();



        return view('allNotify',compact([

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
    public function validOTP(){
        $validOTP = OTPPoints::get();
        return view('admin.notify.validOTP',compact(
            'validOTP'
        ));
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
            'reseverId'=>$userId->id,
            'senderId'=>Auth::User()->id,
            'messages'=>$request->notify,
        ]);


        $data = [
            'reseverId' => $userId->id,
            'senderName' => 'Karama-SC # ',
            'senderImg' => Auth::User()->userToDetalis->ProfileImage,
            'senderId' => Auth::User()->id,
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
