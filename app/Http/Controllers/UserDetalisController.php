<?php

namespace App\Http\Controllers;

use App\Models\merchant;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\visitorsCount;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;

class UserDetalisController extends Controller
{



    public function profileDetials(Request $request){

        $MainUserTable = User::where('id',Auth::User()->id)->first();
        $userDetalis = userDetalis::where('id',Auth::User()->id)->first();
        $productData= merchant::where('userId',Auth::User()->id)->orderBy('id','DESC')->limit('6')->get();
        $countProuduct = merchant::where('userId',Auth::User()->id)->count();
        $storeViews = visitorsCount::where('userId',Auth::User()->id)->count();
        return view ('merchant.profile.profileDetials',compact([
            'MainUserTable',
            'userDetalis',
            'productData',
            'countProuduct',
            'storeViews',
        ]));

    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ProfileImage(Request $request)
    {
     
        if($request->hasFile('ProfileImage')){

            $image  = ImageManagerStatic::make($request->file('ProfileImage'))->encode('webp')->resize(400,400);
  
            $imageName = Str::random().'.webp';

            $image->save(public_path('upload/Profile/img/'. $imageName));
    
            $ProfileImage = 'upload/Profile/img/'. $imageName;

        }

        userDetalis::where('userId',Auth::User()->id)->update([
            'ProfileImage'=>$ProfileImage,
        ]);



        return response()->json(["MSG" => "تم تغير الصوره "]);

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\userDetalis  $userDetalis
     * @return \Illuminate\Http\Response
     */
    public function show(userDetalis $userDetalis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userDetalis  $userDetalis
     * @return \Illuminate\Http\Response
     */
    public function edit(userDetalis $userDetalis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userDetalis  $userDetalis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userDetalis $userDetalis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userDetalis  $userDetalis
     * @return \Illuminate\Http\Response
     */
    public function destroy(userDetalis $userDetalis)
    {
        //
    }
}
