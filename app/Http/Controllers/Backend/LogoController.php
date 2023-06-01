<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class LogoController extends Controller
{
    public function deleteFile($id){
        $logo=Logo::findOrFail($id);
        $logoImage=public_path('uploads/logo/'.$logo->image);
        if (file_exists($logoImage) && is_file($logoImage)){
            unlink($logoImage);
            return true;
        }else{
            return true;
        }
    }
    public function index()
    {
        $logoData=Logo::orderBy('id','desc')->get();
        return view('backend.pages.logo.index', compact('logoData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.logo.create');

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

        $obj = new Logo();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/logo');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image = $imageName;

        }


        if ($obj->save()) {
            return redirect()->route('admin-logo.index')->with('success', 'logo was successfully uploades');
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
        $logoData=Logo::findOrFail($id);
        return view('backend.pages.logo.edit',compact('logoData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = Logo::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/logo');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image = $imageName;
            }

        }

        if ($obj->update()) {
            return redirect()->route('admin-logo.index')->with('success', 'logo was successfully updated');
        }else{
            return redirect()->back()->with('error','there was a problem');
        }
    }


    public function destroy($id){

        if ($this->deleteFile($id) && Logo::findOrFail($id)->delete()){
            return redirect()->back()->with('success','data was deleted');
        }else {
            return redirect()->back('error', 'there was problem');
        }
    }
}
