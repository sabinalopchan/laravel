<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CustomerPasswordResetMail;
use App\Mail\PasswordResetMail;
use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\CustomerRegister;
use App\Models\CustomerResetPassword;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\ProductOnDiscount;
use App\Models\ProductOnOffer;
use App\Models\Slider;
use App\Models\User;
use App\Models\UserPasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CustomerLoginController extends Controller
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

    }
    public function login(){

        return view('frontend.pages.customer.login',$this->data);
    }
    public function customerLogin(Request $request){

        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        $email=$request->email;
        $password=$request->password;
        if (Auth::guard('customer_register')->attempt(['email'=>$email,'password'=>$password])){
            return redirect()->intended(route('customer_dashboard'));
        }else{
            return redirect()->back()->with('error','invalid Access');
        }
    }


    public function customerPasswordReset(Request $request){
        if ($request->isMethod('get')){
            return view('frontend.pages.customer.customer_password_reset');
        }
        if ($request->isMethod('post')){
            $this->validate($request,[
                'email'=>'required|email'
            ],[
                'email.required'=>'please enter your email'
            ]);
            $email= $request->email;
            $getData=CustomerRegister::where('email','=',$email)->count();
            if ($getData>0){
                $token=bcrypt(microtime());
                $sendUrl=url("customer_password_reset_link?_token=$token&email=$email");
                $data['token']=$token;
                $data['email']=$email;
                $user=CustomerResetPassword::create($data);

                $data['users']=$user;
                $data['sendUrl']=$sendUrl;
                Mail::to($user->email)->send(new CustomerPasswordResetMail($data));
                return redirect()->back()->with('success','please click on the link');
            }else{
                return redirect()->back()->with('error','invalid access');
            }
        }
    }
    public function customerPasswordResetLink(Request $request){
        $token=$request->_token;
        $email=$request->email;
        if ($request->isMethod('get')){
            $getTokenAndEmail=CustomerResetPassword::where('token','=',$token)
                ->where('email','=',$email)->count();
            if ($getTokenAndEmail>0){
                return view('frontend.pages.customer.reset');
            }else{
                echo 'no';
            }
        }
        if ($request->isMethod('post')){
            $this->validate($request,[
                'password' => 'required|min:3|max:20|confirmed',
                'password_confirmation' => 'required',
            ]);
            $objUser=CustomerRegister::where('email','=',$email)->first();
            $objUser->password=bcrypt($request->password);
            $objUser->update();
            CustomerResetPassword::where('email','=',$email)->delete();
            return redirect()->route('customer_login')->with('success','password was successfully reset');
        }

    }
}
