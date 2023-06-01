<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\CustomerRegister;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\ProductOnDiscount;
use App\Models\ProductOnOffer;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerRegisterController extends Controller
{

    public $data=[];

    public function data($key,$value=null){
        return $this->data[$key]=$value;
    }
    public function __construct(){
        $this->data('logoData',Logo::all());
        $this->data('categoryData',Category::all());
        $this->data('sliderData',Slider::all());
        $this->data('bannerData',Banner::all());
        $this->data('productDiscountData',ProductOnDiscount::all());
        $this->data('productOnOffer',ProductOnOffer::all());
        $this->data('aboutData',About::all());
        $this->data('contactData',Contact::all());
        $this->data('footerData',Footer::all());
//        $this->data('customer',CustomerRegister::orderBy('id','desc')->paginate(4));

    }


    public function index(){
        return view('frontend.pages.customer.register',$this->data);
    }
    public function customerRegister(Request $request){
        if ($request->isMethod('get')){
            return view('frontend.pages.customer.register',$this->data);
        }
        if ($request->isMethod('post')){
            $this->validate($request,[
                'firstname'=>'required|min:4|max:20',
                'lastname'=>'required|min:4|max:20',
                'email'=>'required|email|unique:customer_registers,email',
                'password'=>'required|min:3|max:20|confirmed',
                'password_confirmation'=>'required',
            ]);
            $data['firstname']=$request->firstname;
            $data['lastname']=$request->lastname;
            $data['email']=$request->email;
            $data['password']=bcrypt($request->password);
            if (CustomerRegister::create($data)){
                return redirect()->back()->with('success','you have successfully registered');
            }else{
                return redirect()->back()->with('error','there was a problem');
            }
        }
    }
//    public function login(){
//        return view('frontend.pages.customer.login',$this->data);
//    }
//    public function customerLogin(Request $request){
//        $this->validate($request,[
//            'email'=>'required',
//            'password'=>'required'
//        ]);
//        $email=$request->email;
//        $password=$request->password;
//        if (Auth::attempt(['email'=>$email,'password'=>$password,])){
////            return redirect()->back()->with('success','successfully login');
//        }else{
//            return redirect()->back()->with('error','Invalid Access');
//        }
//    }
//
}
