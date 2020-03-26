<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function __construct()
    {
        $modelMenu = new Menu();
        $this->data['menu'] = $modelMenu->getMenu();
    }


    public function index(){

        $modelAds = new Ads();
        $modelSlider = new Slider();
        $modelProduct = new Product();

        $this->data['smallAd'] = $modelAds->getSmallAd();
        $this->data['largeAd'] = $modelAds->getLargeAd();
        $this->data['homeSlider'] = $modelSlider->getHomeSlider();
        $this->data['products'] = $modelProduct->getProducts(0);


        return view('home', $this->data);


    }

    public function productsMenu(){
        $modelProduct = new Product();

        $this->data['products'] = $modelProduct->getProducts();
        return view('products', $this->data);
    }

    public function products(Request $request){
        $modelProduct = new Product();

        $sort = 0;
        $search = "";
        $offset = 0;

        if($request->has('sort')){
            $sort = $request->input('sort');
        }
        if($request->has('search')){
            $search = $request->input('search');
        }
        if($request->has('offset')){
            $offset = $request->input('offset');
        }

        $array = array();

        $data  = $modelProduct->getProducts(0, $sort, $search, $offset);
        $count = $modelProduct->getProductsCount(0, $sort, $search);

        array_push($array, $data);
        array_push($array, $count);

        return response([$array]);
    }

    public function productsCategory($id, Request $request){

        $modelProduct = new Product();
        $sort = 0;
        $search = "";
        $offset = 0;

        if($request->has('sort')){
            $sort = $request->input('sort');
        }
        if($request->has('search')){
            $search = $request->input('search');
        }
        if($request->has('offset')){
            $offset = $request->input('offset');
        }


        $array = array();


        $data  = $modelProduct->getProducts($id, $sort, $search, $offset);
        $count = $modelProduct->getProductsCount($id, $sort, $search);

        array_push($array, $data);
        array_push($array, $count);

        return response([$array]);
    }



    public function product($id){

        $modelProduct = new Product();
        $this->data['product'] = $modelProduct->getProduct($id);
        $this->data['relatedProducts'] = $modelProduct->getRelatedProducts();

        return view('product', $this->data);


    }

    public function contact(){

        $this->data['titleSlider'] = "Contact";

        return view('contact', $this->data);


    }

    public function login(){

        return view('login', $this->data);


    }

    public function registration(){

        return view('registration', $this->data);


    }

    public function cart(){
        $this->data['titleSlider'] = "Cart";


        return view('cart', $this->data);


    }

    public function myAccount(){

        return view('myaccount', $this->data);

    }





}
