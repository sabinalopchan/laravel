<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Discount;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\ProductOnDiscount;
use App\Models\ProductOnOffer;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
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
        $this->data('product',Product::all());
        $this->data('discount',Discount::all());
        $this->data('productDiscountData',ProductOnDiscount::all());
        $this->data('productOnOffer',ProductOnOffer::orderBy('id','desc')->limit(3)->get());
        $this->data('aboutData',About::all());
        $this->data('contactData',Contact::all());
        $this->data('footerData',Footer::all());

    }

    public function index(){
        $this->data('latestProduct',Product::orderBy('id','desc')->limit(5)->get());
        $this->data('trendingProduct',Product::orderBy('page_visit','desc')->limit(5)->get());

        return view('frontend.pages.home.home',$this->data);
    }
    public function about(){
        return view('frontend.pages.about.about',$this->data);
    }
    public function contact(){
        return view('frontend.pages.contact.contact',$this->data);
    }

    public function terms(){
        return view('frontend.pages.terms_condition.terms',$this->data);
    }
    public function privacy(){
        return view('frontend.pages.terms_condition.privacy',$this->data);
    }
    public function getProductByCategory(Request $request){
        $criteria=$request->criteria;
        $categoryData=Category::where('slug','=',$criteria)->first();
        $this->data('categorySingleData',$categoryData);
        return view('frontend.pages.product.product-list',$this->data);
    }
    public function productDetails(Request $request){
        $criteria=$request->criteria;
        $productData=Product::where('slug','=',$criteria)->first();
        $productData->page_visit+=1;
        $productData->update();
        $this->data('productDetails',$productData);
        return view('frontend.pages.product.product-details',$this->data);
    }
    public function productDiscountDetails(Request $request){
        $criteria=$request->criteria;
        $productDiscount=ProductOnDiscount::where('slug','=',$criteria)->first();
        $this->data('productDiscountDetails',$productDiscount);
        return view('frontend.pages.product.product-discount-details',$this->data);
    }
    public function productOfferDetails(Request $request){
        $criteria=$request->criteria;
        $productOffer=ProductOnOffer::where('slug','=',$criteria)->first();
        $this->data('productOfferDetails',$productOffer);
        return view('frontend.pages.product.product-offer-details',$this->data);
    }
    public function search(Request $request){

       $product=Product::where('title', 'like', '%'.$request->input('query').'%')->get();
       $this->data('products',$product);
       return view('frontend.pages.search.search',$this->data);
    }
    public function dashboard(){
        return view('frontend.pages.customer.dashboard',$this->data);
    }
    public function accountDetails(){
        return view('frontend.pages.customer.account_details',$this->data);
    }

}
