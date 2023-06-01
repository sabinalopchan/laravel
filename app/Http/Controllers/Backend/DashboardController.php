<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactUser;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\ProductOnDiscount;
use App\Models\ProductOnOffer;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\CustomerRegister;

class DashboardController extends Controller
{
//    public $data=[];
//
//    public function data($key,$value=null){
//        return $this->data[$key]=$value;
//    }
//    public function __construct(){
//        $this->data('customer',CustomerRegister::all());
//    }

    public function index(){
        return view('backend.pages.dashboard.dashboard');
    }
    public function customerRegister(){
        $customer=CustomerRegister::all();
        return view('backend.pages.customer.index',compact('customer'));

    }
    public function customerContact(){
        $customerContact=ContactUser::all();
        return view('backend.pages.customer.customer_contact',compact('customerContact'));

    }
}
