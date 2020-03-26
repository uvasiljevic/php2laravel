<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product;

    public function addToCart(CartRequest $request, $id){
        if($request->has('btnCart')){
            $productModel = new Product();
            try{
                $this->product = $productModel->getProductCart($id);
                $this->product[0]->quantity = $request->input('quantity');
                //dd(session()->get('cart'));
                $ima = false;
                if(session()->has('cart')){

                    foreach (session()->get('cart') as $items){

                            if($items[0]->id == $this->product[0]->id){
                                $items[0]->quantity += $this->product[0]->quantity;
                                $ima = true;
                            }

                    }
                    if(!$ima){
                        $request->session()->push('cart', $this->product);
                    }
                }
                else{
                    $request->session()->push('cart', $this->product);
                }

                //dd(session()->get('cart'));
                return redirect()->back()->with('message','Product added to cart!');
            }
            catch(\Exception $ex) {
                return redirect()->back()->with('messageError','Problem with server.');
            }
        }

    }

    public function emptyCart(){

        if(session()->has('cart')){
            //dd('tu sam');
            session()->forget('cart');

            return redirect()->back()->with('message', 'Cart is empty now.');
        }

        return redirect()->back()->with('message', 'Cart is already empty.');
    }

    public function makeOrder(){
        if(session()->has('cart')){

            $userId = session()->get('user')->id;
            //dd(session()->get('cart'));
            foreach (session()->get('cart') as $items){

                    $order = new Order;

                    $order->productId   = $items[0]->id;
                    $order->userId      = $userId;
                    $order->quantity    = $items[0]->quantity;
                    $order->orderPrice  = $items[0]->quantity*$items[0]->price;
                    $order->save();

            }

            session()->forget('cart');

            return redirect()->back()->with('message', 'You have made order.');
        }

    }

}
