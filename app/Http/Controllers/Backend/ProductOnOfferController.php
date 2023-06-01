<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductOnOffer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductOnOfferController extends Controller
{
    public function deleteFile($id){
        $category=ProductOnOffer::findOrFail($id);
        $categoryImage=public_path('uploads/productOffer/'.$category->image);
        if (file_exists($categoryImage) && is_file($categoryImage)){
            unlink($categoryImage);
            return true;
        }else{
            return true;
        }
    }
    public function deleteFile1($id){
        $category=ProductOnOffer::findOrFail($id);
        $categoryImage=public_path('uploads/productOffer/'.$category->image1);
        if (file_exists($categoryImage) && is_file($categoryImage)){
            unlink($categoryImage);
            return true;
        }else{
            return true;
        }
    }
    public function deleteFile2($id){
        $category=ProductOnOffer::findOrFail($id);
        $categoryImage=public_path('uploads/productOffer/'.$category->image2);
        if (file_exists($categoryImage) && is_file($categoryImage)){
            unlink($categoryImage);
            return true;
        }else{
            return true;
        }
    }
    public function deleteFile3($id){
        $category=ProductOnOffer::findOrFail($id);
        $categoryImage=public_path('uploads/productOffer/'.$category->image3);
        if (file_exists($categoryImage) && is_file($categoryImage)){
            unlink($categoryImage);
            return true;
        }else{
            return true;
        }
    }
    public function index()
    {
        $categoryData=ProductOnOffer::orderBy('id','desc')->get();
        return view('backend.pages.productOffer.index', compact('categoryData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.productOffer.create');

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
            'title' => 'required|unique:product_on_offers,title',
            'slug' => 'required|unique:product_on_offers,slug',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'image1' => 'mimes:jpg,jpeg,png,gif',
            'image2' => 'mimes:jpg,jpeg,png,gif',
            'image3' => 'mimes:jpg,jpeg,png,gif',
        ]);

        $obj = new ProductOnOffer();
        $obj->title = $request->title;
        $obj->slug = Str::slug($request->slug);
        $obj->date = $request->date;
        $obj->price = $request->price;
        $obj->meta_keywords = $request->meta_keywords;
        $obj->summary = $request->summary;
        $obj->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productOffer');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image = $imageName;
        }
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productOffer');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image1 = $imageName;
        }
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productOffer');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image2 = $imageName;
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productOffer');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image3 = $imageName;
        }


        if ($obj->save()) {
            return redirect()->route('admin-product-offer.index')->with('success', 'product was successfully created');
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
        $categoryData=ProductOnOffer::findOrFail($id);
        return view('backend.pages.productOffer.edit',compact('categoryData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|',[Rule::unique('product_on_offers','title')->ignore($id)],
            'slug' => 'required|',[Rule::unique('product_on_offers','slug')->ignore($id)],
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = ProductOnOffer::findOrFail($id);
        $obj->title = $request->title;
        $obj->slug = Str::slug($request->slug);
        $obj->date = $request->date;
        $obj->price = $request->price;
        $obj->meta_keywords = $request->meta_keywords;
        $obj->summary = $request->summary;
        $obj->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productOffer');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image = $imageName;
            }
        }
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productOffer');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image1 = $imageName;
            }
        }
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productOffer');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image2 = $imageName;
            }
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productOffer');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image3 = $imageName;
            }
        }
        if ($obj->update()) {
            return redirect()->route('admin-product-offer.index')->with('success', 'product was successfully updated');
        }else{
            return redirect()->back()->with('error','there was a problem');
        }
    }


    public function destroy($id){

        if ($this->deleteFile($id) && ProductOnOffer::findOrFail($id)->delete()){
            return redirect()->back()->with('success','data was deleted');
        }else {
            return redirect()->back('error', 'there was problem');
        }
    }

}
