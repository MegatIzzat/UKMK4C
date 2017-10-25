<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\Orderline;
use App\Customer;
use App\Category;
use Session;

class CustomerController extends Controller
{
    public function index()
    {
        //
        $product = Product::paginate(6);
        $category = Category::get();
        return view('customer.index',compact('product','category'));
    }

    public function AddToCart(Request $request, $product_id){
        $product = Product::find($product_id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->product_id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('customer.index');
    }

    public function getCart(){
        if (!Session::has('cart')){
            return view('customer.cart',['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('customer.cart',['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function checkout(Request $request, $user){
        $customer = Customer::find($user);  

        if (!Session::has('cart')){
            return view('customer.cart',['products' => null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $totalPrice=$cart->totalPrice;
        $balance = $customer->cust_balance;
        $balance -=  $cart->totalPrice;

        $order_id = 'OD'. substr(uniqid(),2,8);
        $order_status = 'In Progress';
        $order_date = date('d-m-y h:i:s A');

        Order::create([
            'order_id' => $order_id,
            'cust_id' => $user,
            'order_date' => $order_date,
            'order_status' => $order_status
        ]);

        if (Session::has('cart')){
            foreach ($cart->items as $products) {
                Orderline::create([
                'order_id' => $order_id,
                'product_id' => $products['item']['product_id'], 
                'quantity' => $products['qty'],
                'total_price' => $totalPrice
                ]);
            }
        }
        

        Customer::findOrFail($user)->update([
            'cust_balance' => $balance
        ]);
        
        Session::forget('cart');
        return view('customer.index', ['products'=>$cart->items],compact('customer','balance','totalPrice'));

    }
}
