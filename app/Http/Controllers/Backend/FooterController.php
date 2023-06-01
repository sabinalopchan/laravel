<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Footer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FooterController extends Controller
{

    public function deleteFile($id){
        $footer=About::findOrFail($id);
        $footerimage=public_path('uploads/footer/'.$footer->image);
        if (file_exists($footerimage) && is_file($footerimage)){
            unlink($footerimage);
            return true;
        }else{
            return true;
        }
    }
    public function index()
    {
        $footerData=Footer::orderBy('id','desc')->get();
        return view('backend.pages.footer.index', compact('footerData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.footer.create');

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

        $obj = new Footer();
        $obj->description = $request->description;
        $obj->summary= $request->summary;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/footer');
            if (!$file->move($uploadPath, $imageName)) {
                return redirect()->back();
            }
            $obj->image = $imageName;

        }


        if ($obj->save()) {
            return redirect()->route('admin-footer.index')->with('success', 'Footer Page was successfully created');
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
        $footerData=Footer::findOrFail($id);
        return view('backend.pages.footer.edit',compact('footerData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = Footer::findOrFail($id);
        $obj->description = $request->description;
        $obj->summary= $request->summary;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/footer');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image = $imageName;
            }


        }


        if ($obj->update()) {
            return redirect()->route('admin-footer.index')->with('success', 'Footer Page was successfully updated');
        }else{
            return redirect()->back()->with('error','there was a problem');
        }
    }


    public function destroy($id){

        if ($this->deleteFile($id) && Footer::findOrFail($id)->delete()){
            return redirect()->back()->with('success','data was deleted');
        }else {
            return redirect()->back('error', 'there was problem');
        }
    }
}
