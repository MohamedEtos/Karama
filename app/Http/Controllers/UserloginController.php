<?php

namespace App\Http\Controllers;

use App\Http\Requests\userlogin as RequestsUserlogin;
use App\Http\Requests\userregister as RequestsUserRegister;
use App\Models\userlogin;
use Illuminate\Http\Request;

class UserloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //s
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(RequestsUserlogin $request)
    {
        return $request;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RequestsUserRegister $request)
    {
        userlogin::create([
            'usercode'=>$request->usercode,
            'first_name'=>$request->firstname,
            'last_name'=>$request->lastname,
            'phone_number'=>$request->phonenumber,
            'password'=>$request->password,
        ]);

        return view('login');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userlogin  $userlogin
     * @return \Illuminate\Http\Response
     */
    public function show(userlogin $userlogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userlogin  $userlogin
     * @return \Illuminate\Http\Response
     */
    public function edit(userlogin $userlogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userlogin  $userlogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userlogin $userlogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userlogin  $userlogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(userlogin $userlogin)
    {
        //
    }
}
