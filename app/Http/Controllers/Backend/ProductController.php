<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductOnOffer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request as CustomRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function deleteFile($id){
    $product=Product::findOrFail($id);
    $productImage=public_path('uploads/product/'.$product->image);
    if (file_exists($productImage,) && is_file($productImage)){
        unlink($productImage);
        return true;
    }else{
        return true;
    }
}
    public function deleteFile1($id){
        $product=Product::findOrFail($id);
        $productImage=public_path('uploads/product/'.$product->image1);
        if (file_exists($productImage,) && is_file($productImage)){
            unlink($productImage);
            return true;
        }else{
            return true;
        }
    }
    public function deleteFile2($id){
        $product=Product::findOrFail($id);
        $productImage=public_path('uploads/product/'.$product->image2);
        if (file_exists($productImage,) && is_file($productImage)){
            unlink($productImage);
            return true;
        }else{
            return true;
        }
    }
    public function deleteFile3($id){
        $product=Product::findOrFail($id);
        $productImage=public_path('uploads/product/'.$product->image3);
        if (file_exists($productImage,) && is_file($productImage)){
            unlink($productImage);
            return true;
        }else{
            return true;
        }
    }
    public function index()
    {
        $productData=Product::orderBy('id','desc')->paginate(10);
        return view('backend.pages.product.index',compact('productData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryData=Category::all();
        return view('backend.pages.product.create',compact('categoryData'));
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
            'category_id' => 'required',
            'title' => 'required|unique:products,title',
            'slug' => 'required|unique:products,slug',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'image1' => 'mimes:jpg,jpeg,png,gif',
            'image2' => 'mimes:jpg,jpeg,png,gif',
            'image3' => 'mimes:jpg,jpeg,png,gif',
        ]);

        $obj = new Product();
        $obj->category_id =$request->category_id;
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
            $uploadPath = public_path('uploads/product');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image = $imageName;

        }
        if ($request->hasFile('image1')) {
        $file = $request->file('image1');
        $ext = $file->getClientOriginalExtension();
        $imageName = md5(microtime()) . '.' . $ext;
        $uploadPath = public_path('uploads/product');
        if (!$file->move($uploadPath, $imageName)) {
            return redirect()->back();
        }
        $obj->image1 = $imageName;
    }
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/product');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image2 = $imageName;
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/product');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image3 = $imageName;
        }


        if ($obj->save()) {
            return redirect()->route('admin-product.index')->with('success', 'product was successfully added');
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
        $productData=Product::findOrFail($id);
        return view('backend.pages.product.edit',compact('productData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|',[Rule::unique('product_on_offers','title')->ignore($id)],
            'slug' => 'required|',[Rule::unique('product_on_offers','slug')->ignore($id)],
            'image' => 'mimes:jpg,jpeg,png,gif',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = Product::findOrFail($id);
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
            $uploadPath = public_path('uploads/product');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image = $imageName;
            }
        }
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/product');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image1 = $imageName;
        }
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/product');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image2 = $imageName;
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/product');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image3 = $imageName;
        }
        if ($obj->update()) {
            return redirect()->route('admin-product.index')->with('success', 'product was successfully updated');
        }else{
            return redirect()->back()->with('error','there was a problem');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if ($this->deleteFile($id) && Product::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'data was deleted');
        } else {
            return redirect()->back('error', 'there was problem');
        }
    }
}
