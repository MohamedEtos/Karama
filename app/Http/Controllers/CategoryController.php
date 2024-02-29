<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\subCat;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllCategory(){
        $categories = category::latest()->get();
        $categoriesSelect = category::get();
        return view('admin.category.all_category',compact('categories','categoriesSelect'));
    }




    private function convertDataToString($data)
    {
        // Logic to convert your data to a string
        // This could be a simple concatenation or a more complex transformation

        // Example: Concatenate the names from the data into a single string
        $string = '';
        foreach ($data as $item) {
            $string .= $item->name . ', '; // Assuming 'name' is a field in your database table
        }
        // Remove the last comma and space
        $string = rtrim($string, ', ');

        return $string;
    }
    public function getCategoryAjax(Request $request){

        $AllCat = subCat::where('categoryId',$request->id)->get('name');

        $dataAsString = $this->convertDataToString($AllCat);



        return response()->json(['Done'=>$dataAsString]);

    }


    public function subCatUpdate(Request $request)
    {
        $explode = explode(',',$request->subCat);
        subCat::where('categoryId',$request->category)->delete();
        foreach($explode as $index){
            $subCat = subCat::create([
                'categoryId'=> $request->category,
                'name'=> $index,
            ]);
        }

        return redirect()->back();
    }





    public function StoreCategory(request $request)
    {


        $request->validate([
            'name' => [ 'string', 'required',  'max:255', 'unique:'.category::class],
            'descrption' => 'nullable|max:200',
            'subCat' => 'required|max:200',
        ]);

        $category = category::create([
            'name' =>$request->name,
            'descrption' => $request->descrption,
        ]);

        if(! empty($request->subCat)){
            $explode = explode(',',$request->subCat);
            foreach($explode as $index){
                $subCat = subCat::create([
                    'categoryId'=> $category->id,
                    'name'=> $index,
                ]);
            }
        }

        return to_route('all.category');
    }

    public function EditCategory($id){
        $data = category::findorfail($id);
        return response()->json(['status' => true,'message'=>'','data'=>$data]);
    }

    public function UpdateCategory(request $request, $id){
        category::where('id',$id)->update([
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
