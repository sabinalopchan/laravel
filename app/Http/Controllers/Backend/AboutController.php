<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AboutController extends Controller
{
    public function deleteFile($id){
        $about=About::findOrFail($id);
        $aboutImage=public_path('uploads/about/'.$about->image);
        if (file_exists($aboutImage) && is_file($aboutImage)){
            unlink($aboutImage);
            return true;
        }else{
            return true;
        }
    }
    public function index()
    {
        $aboutData=About::orderBy('id','desc')->get();
        return view('backend.pages.about.index', compact('aboutData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.about.create');

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

        $obj = new About();
        $obj->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/about');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image = $imageName;

        }


        if ($obj->save()) {
            return redirect()->route('admin-about.index')->with('success', 'About Page was successfully created');
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
        $aboutData=About::findOrFail($id);
        return view('backend.pages.about.edit',compact('aboutData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = About::findOrFail($id);
        $obj->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/about');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image = $imageName;
            }


        }


        if ($obj->update()) {
            return redirect()->route('admin-about.index')->with('success', 'About Page was successfully updated');
        }else{
            return redirect()->back()->with('error','there was a problem');
        }
    }


    public function destroy($id){

        if ($this->deleteFile($id) && About::findOrFail($id)->delete()){
            return redirect()->back()->with('success','data was deleted');
        }else {
            return redirect()->back('error', 'there was problem');
        }
    }
}
