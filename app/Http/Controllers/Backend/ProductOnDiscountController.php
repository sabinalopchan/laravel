<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOnDiscount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request as CustomRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProductOnDiscountController extends Controller
{
    public function deleteFile($id){
        $product=Product::findOrFail($id);
        $productImage=public_path('uploads/productDiscount/'.$product->image);
        if (file_exists($productImage) && is_file($productImage)){
            unlink($productImage);
            return true;
        }else{
            return true;
        }
    }
    public function deleteFile1($id){
        $product=Product::findOrFail($id);
        $productImage=public_path('uploads/productDiscount/'.$product->image1);
        if (file_exists($productImage) && is_file($productImage)){
            unlink($productImage);
            return true;
        }else{
            return true;
        }
    }
    public function deleteFile2($id){
        $product=Product::findOrFail($id);
        $productImage=public_path('uploads/productDiscount/'.$product->image2);
        if (file_exists($productImage) && is_file($productImage)){
            unlink($productImage);
            return true;
        }else{
            return true;
        }
    }
    public function deleteFile3($id){
        $product=Product::findOrFail($id);
        $productImage=public_path('uploads/productDiscount/'.$product->image3);
        if (file_exists($productImage) && is_file($productImage)){
            unlink($productImage);
            return true;
        }else{
            return true;
        }
    }

    public function index()
    {
        $productData=ProductOnDiscount::orderBy('id','desc')->get();
        return view('backend.pages.productDiscount.index',compact('productData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.productDiscount.create');
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
            'title' => 'required|unique:products,title',
            'slug' => 'required|unique:products,slug',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'image1' => 'mimes:jpg,jpeg,png,gif',
            'image2' => 'mimes:jpg,jpeg,png,gif',
            'image3' => 'mimes:jpg,jpeg,png,gif',
        ]);

        $obj = new ProductOnDiscount();
        $obj->title = $request->title;
        $obj->slug = Str::slug($request->slug);
        $obj->date = $request->date;
        $obj->price = $request->price;
        $obj->meta_keywords = $request->meta_keywords;
        $obj->summary = $request->summary;
        $obj->description = $request->description;
        $obj->posted_by = Auth::user()->id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productDiscount');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image = $imageName;
        }
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productDiscount');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image1 = $imageName;
        }
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productDiscount');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image2 = $imageName;
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productDiscount');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image3 = $imageName;
        }



        if ($obj->save()) {
            return redirect()->route('admin-product-discount.index')->with('success', 'product was successfully added');
        } else {
            return redirect()->back()->with('error', 'there was a problem');
        }
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
        $productData=ProductOnDiscount::findOrFail($id);
        return view('backend.pages.productDiscount.edit',compact('productData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|',[Rule::unique('product_on_discounts','title')->ignore($id)],
            'slug' => 'required|',[Rule::unique('product_on_discounts','slug')->ignore($id)],
            'image' => 'mimes:jpg,jpeg,png,gif',
            'image1' => 'mimes:jpg,jpeg,png,gif',
            'image2' => 'mimes:jpg,jpeg,png,gif',
            'image3' => 'mimes:jpg,jpeg,png,gif',
        ]);

        $obj = ProductOnDiscount::findOrFail($id);
        $obj->title = $request->title;
        $obj->slug = Str::slug($request->slug);
        $obj->date = $request->date;
        $obj->price = $request->price;
        $obj->meta_keywords = $request->meta_keywords;
        $obj->summary = $request->summary;
        $obj->description = $request->description;
        $obj->posted_by = Auth::user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productDiscount');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image = $imageName;
            }
        }
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productDiscount');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image1 = $imageName;
        }
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productDiscount');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image2 = $imageName;
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/productDiscount');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image3 = $imageName;
        }

        if ($obj->update()) {
            return redirect()->route('admin-product-discount.index')->with('success', 'product was successfully updated');
        }else{
            return redirect()->back()->with('error','there was a problem');
        }
    }

    public function destroy($id)
    {

        if ($this->deleteFile($id) && ProductOnDiscount::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'data was deleted');
        } else {
            return redirect()->back('error', 'there was problem');
        }
    }
}
