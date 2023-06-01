<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function deleteFile($id){
        $banner=Banner::findOrFail($id);
        $bannerImage=public_path('uploads/banner/'.$banner->image);
        if (file_exists($bannerImage) && is_file($bannerImage)){
            unlink($bannerImage);
            return true;
        }else{
            return true;
        }
    }
    public function index()
    {
        $bannerData=Banner::orderBy('id','desc')->get();
        return view('backend.pages.banner.index', compact('bannerData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.banner.create');

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
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new Banner();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/banner');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image = $imageName;

        }


        if ($obj->save()) {
            return redirect()->route('admin-banner.index')->with('success', 'Banner is successfully uploaded');
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
        $bannerData=Banner::findOrFail($id);
        return view('backend.pages.banner.edit',compact('bannerData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = Banner::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/banner');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image = $imageName;
            }


        }


        if ($obj->update()) {
            return redirect()->route('admin-banner.index')->with('success', 'Banner was successfully updated');
        }else{
            return redirect()->back()->with('error','there was a problem');
        }
    }


    public function destroy($id){

        if ($this->deleteFile($id) && Banner::findOrFail($id)->delete()){
            return redirect()->back()->with('success','data was deleted');
        }else {
            return redirect()->back('error', 'there was problem');
        }
    }
}
