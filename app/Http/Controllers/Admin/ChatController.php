<?php

namespace App\Http\Controllers\Admin;

use App\Models\chat;
use App\Models\User;
use App\Models\points;
use App\Models\userDetalis;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chatview()
    {

        $RecentChat = chat::join('users','users.id','=','chats.id')
                    ->join('user_detalis' , 'user_detalis.id' , '=' , 'users.id')
                    ->get([
                        'chats.id',
                        'chats.userId',
                        'chats.adminId',
                        'chats.message',
                        'chats.created_at',
                        'chats.updated_at',
                        'user_detalis.ProfileImage',
                        'users.name',
                        ]);



        return view('admin/chat/chat',compact(

            'RecentChat',
        ));
    }


    public function sendMail(){
        return view('admin.chat.mail-compose');
    }

    public function checkUserCodeMail($usercode)
    {

        $userdata = User::select('name', 'id')
        ->where('usercode', $usercode)
        ->where('subtype', 'user')
        ->first();

        if (!$userdata) {
            $userdata = 'nodata';
        }


        return response()->json(array("MSG" => $userdata));

    }
    
    public function sendMessage(Request $request){

        $request->validate([
            'Recever' => ['required', 'integer','min:1', 'max:3','exists:App\Models\User,id'],
            'usercode' => ['required','string','exists:App\Models\User,usercode'],
            'title' => ['required', 'string',  'max:255'],
            'body' => ['required','string','max:255'],
        ]);


        chat::create([
            'sender'=>Auth::User()->id,
            'recever'=>$request->Recever,
            'title'=>$request->title,
            'body'=>$request->body,
        ]);
        return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(chat $chat)
    {
        //
    }
}
