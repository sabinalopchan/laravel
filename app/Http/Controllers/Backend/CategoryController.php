<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function deleteFile($id){
        $category=Category::findOrFail($id);
        $categoryImage=public_path('uploads/category/'.$category->image);
        if (file_exists($categoryImage) && is_file($categoryImage)){
            unlink($categoryImage);
            return true;
        }else{
            return true;
        }
    }
    public function index()
    {
        $categoryData=Category::orderBy('id','desc')->get();
        return view('backend.pages.category.index', compact('categoryData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:categories,title',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new Category();
        $obj->title = $request->title;
        $obj->slug = Str::slug($request->slug);
        $obj->date = $request->date;
        $obj->status = $request->status;
        $obj->meta_keywords = $request->meta_keywords;
        $obj->meta_description = $request->meta_description;
        $obj->summary = $request->summary;
        $obj->description = $request->description;
        $obj->posted_by = Auth::user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/category');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image = $imageName;

        }


        if ($obj->save()) {
            return redirect()->route('admin-category.index')->with('success', 'category is successfully uploaded');
        }else{
            return redirect()->back()->with('error','there was a problem');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $categoryData=Category::findOrFail($id);
        return view('backend.pages.category.edit',compact('categoryData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|',[Rule::unique('categories','title')->ignore($id)],
            'slug' => 'required|',[Rule::unique('categories','slug')->ignore($id)],
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = Category::findOrFail($id);
        $obj->title = $request->title;
        $obj->slug = Str::slug($request->slug);
        $obj->date = $request->date;
        $obj->status = $request->status;
        $obj->meta_keywords = $request->meta_keywords;
        $obj->meta_description = $request->meta_description;
        $obj->summary = $request->summary;
        $obj->description = $request->description;
        $obj->posted_by = Auth::user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/category');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image = $imageName;
            }
        }


        if ($obj->update()) {
            return redirect()->route('admin-category.index')->with('success', 'category is successfully updated');
        }else{
            return redirect()->back()->with('error','there was a problem');
        }
    }


    public function destroy($id){

        if ($this->deleteFile($id) && Category::findOrFail($id)->delete()){
            return redirect()->back()->with('success','category data is deleted');
        }else {
            return redirect()->back('error', 'there was problem');
        }
    }
}
