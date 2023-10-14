<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::all();
        $categories = Category::orderBy('category_name',"ASC")->get();
//        dd($subcategories);
        return view('pages.subcategory.subcategory-view',compact('subcategories','categories'));
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
        $request->validate([
            'subcategory_name' => 'required | unique:sub_categories,subcategory_name',
            'category_id'   => 'required',
        ],
            [
                'category_id.required' => 'Please Select an Option'
            ]);

        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'category_id' => $request->category_id,

        ]);

        session()->flash('success', 'Sub Category has been Inserted !!');
        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategories = SubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name',"ASC")->get();

        return view('pages.subcategory.subcategory-edit',compact('subcategories','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_name' => 'required | unique:sub_categories,subcategory_name,' . $id,
            'category_id' => 'required'
        ],
            [
                'category_id.requried' => 'Please Select an Option'
            ]);

        $data = SubCategory::find($id);
        $data->category_id = $request->category_id;
        $data->subcategory_name = $request->subcategory_name;
        $data->subcategory_slug = strtolower(str_replace(' ','-',$request->subcategory_name));
        $data->save();

        session()->flash('success', 'Sub Category has been Updated !!');
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);

        if (!is_null($subcategory)) {
            $subcategory->delete();
        }

        session()->flash('success', 'Sub Category has been deleted !!');
        return back();
    }

}
