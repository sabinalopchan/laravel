<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUser;
use App\Models\CustomerRegister;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        $contactData=ContactUser::all();
        return view('frontend.pages.contact.contact',compact('contactData'));
    }
    public function contactUser(Request $request){
        if ($request->isMethod('get')){
            return view('frontend.pages.contact.contact');
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:20',
                'company' => 'required|min:4|max:20',
                'email' => 'required|email',
                'phone' => 'required|min:8|max:20',
                'details' => 'required|min:10|max:50',

            ]);
            $data['name'] = $request->name;
            $data['company'] = $request->company;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['details'] = $request->details;
            if (ContactUser::create($data)) {
                return redirect()->back()->with('success', 'data have sent successfully');
            } else {
                return redirect()->back()->with('error', 'there was a problem');
            }
        }
    }
}

