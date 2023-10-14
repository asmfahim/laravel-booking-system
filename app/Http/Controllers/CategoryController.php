<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.category.category-view',compact('categories'));
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
            'category_name' => 'required | unique:categories,category_name',
            'category_image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('category_image');
        $input['imagename'] = hexdec(uniqid()).$image->getClientOriginalName();
        $location = public_path("upload/category");
        // dd($image->getPathname());
        $imgs = Image::make($image->getPathname());
        $imgs->resize(300 , 300, function ($constraint) { $constraint->aspectRatio(); })->save($location.'/'.$input['imagename']);
        $save_url = $input['imagename'];

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
            'category_image' => $save_url,

        ]);

        session()->flash('success', 'Category has been Inserted !!');
        return redirect()->route('category.index');
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
        $categories = Category::find($id);
        return view('pages.category.category-edit',compact('categories'));
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
            'category_name' => 'required | unique:categories,category_name,'.$id,
            'category_image'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = Category::find($id);
        $data->category_name = $request->category_name;
        $data->category_slug = strtolower(str_replace(' ','-',$request->category_name));
        if($request->file('category_image')){
            if(File::exists(public_path('upload/category/'.$data->catetgory_image))){
                File::delete(public_path('upload/category/'.$data->catetgory_image));
            }

            $image = $request->file('category_image');
            $input['imagename'] = hexdec(uniqid()).$image->getClientOriginalName();
            $location = public_path("upload/category");
            // dd($image->getPathname());
            $imgs = Image::make($image->getPathname());
            $imgs->resize(300 , 300, function ($constraint) { $constraint->aspectRatio(); })->save($location.'/'.$input['imagename']);
            $data->category_image = $input['imagename'];
        }
        $data->save();

        session()->flash('success', 'Category has been Updated !!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        File::delete(public_path('upload/category/'.$category->category_image));

        if (!is_null($category)) {
            $category->delete();
        }

        session()->flash('success', 'Category has been deleted !!');
        return back();
    }

}
