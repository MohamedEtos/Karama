<?php

namespace App\Http\Controllers;

use App\Models\merchant;
use App\Models\points;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\visitorsCount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Intervention\Image\Point;

class UserDetalisController extends Controller
{

    public function profileDetials(Request $request){

        $MainUserTable = User::where('id',Auth::User()->id)->first();
        $userDetalis = userDetalis::where('id',Auth::User()->id)->first();
        $productData= merchant::where('userId',Auth::User()->id)->orderBy('id','DESC')->limit('6')->get();
        $countProuduct = merchant::where('userId',Auth::User()->id)->count();
        $storeViews = visitorsCount::where('userId',Auth::User()->id)->count();
        $points = points::where('merchantId',Auth::User()->id)->sum('points');
        return view ('merchant.profile.profileDetials',compact([
            'MainUserTable',
            'userDetalis',
            'productData',
            'countProuduct',
            'storeViews',
            'points',
        ]));

    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ProfileImage(Request $request)
    {



        $image = $request->image;

        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);

        $image = base64_decode($image);
        $image_name= time().'.webp';
        $path = public_path('upload/Profile/img/'.$image_name);

        file_put_contents($path, $image);
        $userDetalisId = User::select('userDetalis')->where('id',Auth::User()->id)->first();

        userDetalis::where('id',$userDetalisId->userDetalis)->update([
            'ProfileImage'=>'upload/Profile/img/'.$image_name,
        ]);

        return response()->json(["MSG" => "تم تغير الصوره "]);


    }


    public function CoverImage(Request $request)
    {




        if($request->hasFile('coverImage')){

            $ImageFile =  $request->file('coverImage');
            $data = getimagesize($ImageFile);
            $width = $data[0];
            $height = $data[1];

            if($width > '1024'){
                $width = '1024';
            }elseif($width < '1024'){
                $width;
            };
            if($height > '1024'){
                $height = '1024';
            }elseif($height < '1024'){
                $height;
            };

            $image  = ImageManagerStatic::make($request->file('coverImage'))->encode('webp')->resize($width,$height);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/Profile/img/'. $imageName));
            $coverImage = 'upload/Profile/img/'. $imageName;
        }

        $userDetalisId = User::select('userDetalis')->where('id',Auth::User()->id)->first();

        userDetalis::where('id',Auth::User()->id)->update([
            'coverImage'=>$userDetalisId->userDetalis,
        ]);

        return response()->json(["MSG" => "تم تغير صوره الغلاف "]);
    }



    public function updateSochial(Request $request)
    {
        $hashedPassword = User::findOrFail(Auth::User()->id)->password;
        if (Hash::check($request->password,$hashedPassword) ) {
            userDetalis::where('id',Auth::User()->id)->update([
                'phone' => $request->phone,
                'whatsapp' => $request->whatsapp,
                'facebook' => $request->facebook,
                'website' => $request->website,
            ]);
        }else{
            return back()->with('faild','كلمه المرور غير صحيحه');
        }
        // return response()->json(["MSG" => "تم التحديث"]);
        return back()->with('success','تم التحديث');
    }

    public function updateBasicProfile(Request $request)
    {
        $hashedPassword = User::findOrFail(Auth::User()->id)->password;
        if (Hash::check($request->password,$hashedPassword) ) {
            User::where('id',Auth::User()->id)->update([
                'name' => $request->name,
            ]);
            userDetalis::where('id',Auth::User()->id)->update([
                'bio' => $request->bio,
                'location' => $request->location,
            ]);
        }else{
            return back()->with('faild','كلمه المرور غير صحيحه');
        }
        // return response()->json(["MSG" => "تم التحديث"]);
        return back()->with('success','تم التحديث');
    }






}
