<?php

namespace App\Http\Controllers;

use App\Models\userDetalis;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDetalisController extends Controller
{



    public function profileDetials(Request $request){

        $MainUserTable = User::where('id',Auth::User()->id)->first();

        return view ('merchant.profile.profileDetials',compact([
            'MainUserTable'
        ]));

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
