<?php

namespace App\Http\Controllers;

use App\Models\visitorsCount;
use Illuminate\Http\Request;

class VisitorsCountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ip = $request->ip();
        $visitor = visitorsCount::firstOrCreate(['ip_address' => $ip]);
        $visitor->increment('visits');
        $visitor->save();
    
        $visitors = visitorsCount::count();
    
        return  compact('visitors');    
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
     * @param  \App\Models\visitorsCount  $visitorsCount
     * @return \Illuminate\Http\Response
     */
    public function show(visitorsCount $visitorsCount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\visitorsCount  $visitorsCount
     * @return \Illuminate\Http\Response
     */
    public function edit(visitorsCount $visitorsCount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\visitorsCount  $visitorsCount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, visitorsCount $visitorsCount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\visitorsCount  $visitorsCount
     * @return \Illuminate\Http\Response
     */
    public function destroy(visitorsCount $visitorsCount)
    {
        //
    }
}
