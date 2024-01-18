<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllCategory(){
        $categories = category::latest()->paginate(5);

        return view('admin.category.all_category',compact('categories'));
    }

    public function StoreCategory(request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'descrption' => 'required|max:200'

        ]);

        category::create([
            'name' =>$request->name,
            'descrption' => $request->descrption,
        ]);

        return to_route('all.category');
    }

    public function EditCategory($id){
        $data = category::findorfail($id);
        return response()->json(['status' => true,'message'=>'','data'=>$data]);
    }

    public function UpdateCategory(request $request, $id){
        $data = category::find($id);
        $data->update([
            'name' =>$request->name,
            'descrption' =>$request->descrption,
        ]);
        return to_route('all.category');

    }
    public function DeleteCategory($id){
        Category::findorfail($id)->delete();
        return to_route('all.category');
    }


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


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, category $category)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}