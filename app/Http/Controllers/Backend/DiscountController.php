<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount=Discount::orderBy('id','desc')->get();
        return view('backend.pages.discount.index',compact('discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.discount.create');

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
            'title' => 'required|unique:discounts,title',
        ]);
        $obj = new Discount();
        $obj->title = $request->title;
        if ($obj->save()) {
            return redirect()->route('admin-discount.index')->with('success', 'discount header is successfully uploaded');
        }else{
            return redirect()->back()->with('error','there was a problem');
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
        {
            $discount=Discount::findOrFail($id);
            return view('backend.pages.discount.edit',compact('discount'));
        }
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

        $this->validate($request, [
            'title' => 'required|',
        ]);
        $obj = Discount::findOrFail($id);
        $obj->title = $request->title;
        if ($obj->update()) {
            return redirect()->route('admin-discount.index')->with('success', 'discount header is successfully updated');
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
        if (Discount::findOrFail($id)->delete()){
            return redirect()->back()->with('success','discount header  is deleted');
        }else {
            return redirect()->back('error', 'there was problem');
        }
    }
}
