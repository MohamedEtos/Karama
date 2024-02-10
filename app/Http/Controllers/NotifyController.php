<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notify;

class NotifyController extends Controller
{
    public function markAllReaded($markedId)
    {
        $NotifyData= notify::where('userId',$markedId)->update([
            'readed'=>'1'
        ]);

        return redirect()->back();
    }
}
