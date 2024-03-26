<?php

namespace App\Http\Controllers;

use App\Models\subCat;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Intervention\Image\ImageManagerStatic;

class CategoryController extends Controller
{



    public function __construct()
    {
        $this->middleware('permission:الاقسام', ['only' => ['AllCategory']]);
        $this->middleware('permission:اضافة قسم', ['only' => ['StoreCategory']]);
        $this->middleware('permission:تعديل قسم', ['only' => ['UpdateCategory','EditCategory']]);
        $this->middleware('permission:حذف قسم', ['only' => ['DeleteCategory']]);
    }



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
        // return $request->all();
        $oldValues = subCat::where('categoryId',$request->category)->get('name');
        foreach($oldValues as $datas){
          $collectionToArray[] =    trim($datas->name);
        };
        $newvlaues = explode(',',$request->subCat);
        $trimmedArray = array_map('trim', $newvlaues);
        $array_diffs = array_diff($trimmedArray, $collectionToArray);
        foreach($array_diffs as $string){
            $subCat = subCat::create([
                'categoryId'=> $request->category,
                'name'=> $string,
            ]);
        }


        return redirect()->back()->with('success','تم اضافه القسم الفرعي');
    }





    public function StoreCategory(request $request)
    {


        $request->validate([
            'name' => [ 'string', 'required',  'max:255', 'unique:'.category::class],
            'subCat' => 'required|max:200',
            'catimg'=>'required|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);


        if($request->hasFile('catimg')){
            $image  = ImageManagerStatic::make($request->file('catimg'))->encode('webp')->resize(600,600);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/catsimg/img/'. $imageName));
            $catimg = 'upload/catsimg/img/'. $imageName;
        }


        $category = category::create([
            'name' =>$request->name,
            'catimg' => $catimg,
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

    public function UpdateCategory(request $request){

        // dd($request->all());
        $request->validate([
            'name' => ['required','string', 'max:30', Rule::unique('categories')->ignore($request->idCat)],
        ]);


        if($request->hasFile('catimg')){
            $image  = ImageManagerStatic::make($request->file('catimg'))->encode('webp')->resize(600,600);
            $imageName = Str::random().'.webp';
            $image->save(public_path('upload/catsimg/img/'. $imageName));
            $catimg = 'upload/catsimg/img/'. $imageName;

            category::where('id',$request->idCat)->update([
                'name' =>$request->name,
                'catimg' =>$catimg,
            ]);

        }else{

            category::where('id',$request->idCat)->update([
                'name' =>$request->name,
            ]);

        }

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
