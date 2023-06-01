<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index()
    {
        $contactData=Contact::orderBy('id','desc')->get();
        return view('backend.pages.contact.index', compact('contactData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.contact.create');

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
            'email' => 'required|unique:contacts,email',
            'telephone' => 'required|unique:contacts,telephone',
            'mobile' => 'required|unique:contacts,mobile',

        ]);

        $obj = new Contact();
        $obj->name= $request->name;
        $obj->email = $request->email;
        $obj->telephone = $request->telephone;
        $obj->mobile = $request->mobile;
        $obj->location = $request->location;
        if ($obj->save()) {
            return redirect()->route('admin-contact.index')->with('success', 'Contact is successfully created');
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
        $contactData=Contact::findOrFail($id);
        return view('backend.pages.contact.edit',compact('contactData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|',[Rule::unique('contacts','email')->ignore($id)],
            'telephone' => 'required|',[Rule::unique('contacts','telephone')->ignore($id)],
            'mobile' => 'required|',[Rule::unique('contacts','mobile')->ignore($id)],

        ]);

        $obj = Contact::findOrFail($id);
        $obj->name= $request->name;
        $obj->email = $request->email;
        $obj->telephone = $request->telephone;
        $obj->mobile = $request->mobile;
        $obj->location = $request->location;

        if ($obj->update()) {
            return redirect()->route('admin-contact.index')->with('success', 'Contact was successfully updated');
        }else{
            return redirect()->back()->with('error','there was a problem');
        }
    }


    public function destroy($id){

        if (Contact::findOrFail($id)->delete()){
            return redirect()->back()->with('success','data was deleted');
        }else {
            return redirect()->back('error', 'there was problem');
        }
    }
}
