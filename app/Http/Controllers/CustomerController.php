<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\Orderline;
use App\Customer;
use App\Category;
use App\Advertisement;
use App\Rating;
use App\Notify;
use Session;
use Auth;
use Carbon\Carbon;


class CustomerController extends Controller
{
    public function index()
    {
        $product = Product::paginate(6);
        $category = Category::get();
        $productcat = Product::get();
        $adv = Advertisement::get();
        return view('customer.index',compact('product','productcat','category','adv'));
    }

    public function show($id){
        $product = Product::where('category_id',$id)->paginate(6);
        $category = Category::get();
        $productcat = Product::get();
        $adv = Advertisement::get();
        return view('customer.index',compact('product','productcat','category','adv'));
    }

    public function pricelow(){
        $product = Product::orderBy('product_price','asc')->paginate(6);
        $category = Category::get();
        $productcat = Product::get();
        $adv = Advertisement::get();
        return view('customer.index',compact('product','productcat','category','adv'));
    }

    public function pricehigh(){
        $product = Product::orderBy('product_price','desc')->paginate(6);
        $category = Category::get();
        $productcat = Product::get();
        $adv = Advertisement::get();
        return view('customer.index',compact('product','productcat','category','adv'));
    }

    public function ratinghigh(){
        $product = Product::orderBy('product_rating','desc')->paginate(6);
        $category = Category::get();
        $productcat = Product::get();
        $adv = Advertisement::get();
        return view('customer.index',compact('product','productcat','category','adv'));
    }

    public function AddToCart(Request $request, $product_id){
        $product = Product::find($product_id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->product_id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('cust.index');
    }

    public function getAddByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addByOne($id);

        Session::put('cart', $cart);
        return redirect()->route('cust.getcart');
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0){
            Session::put('cart',$cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('cust.getcart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);


        if(count($cart->items) > 0){
            Session::put('cart',$cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('cust.getcart');
    }

    public function getCart(){
        if (!Session::has('cart')){
            return view('customer.cart',['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('customer.cart',['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

        public function manageprofile(){
        return view('customer.profile');
        }



    public function checkout(Request $request, $user){
        $customer = Customer::find($user); 
        $category = Category::get(); 

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $totalPrice=$cart->totalPrice;
        $balance = $customer->cust_balance;

        if($balance<$totalPrice){
            return redirect()->route('cust.index')->with('error','Sorry, you have insufficient balance. Please topup at the store.');
        }
        else{
            $balance -=  $cart->totalPrice;

            $order_id = 'OD'. substr(uniqid(),2,8);
            $order_status = 'In Progress';
            $order_date = date('d-m-y h:i:s A');

            Order::create([
                'order_id' => $order_id,
                'cust_id' => $user,
                'order_date' => $order_date,
                'order_status' => $order_status,
                'total_price' => $totalPrice
            ]);

            if (Session::has('cart')){
                foreach ($cart->items as $products) {
                    Orderline::create([
                    'order_id' => $order_id,
                    'product_id' => $products['item']['product_id'], 
                    'quantity' => $products['qty']
                    ]);
                }
            }
            
            Customer::findOrFail($user)->update([
                'cust_balance' => $balance
            ]);
            
            Session::forget('cart');
            return redirect()->route('cust.index')->with('success','Order has been successfully made!');
        }
    }
    
    public function orderHistory()
    {
        $order = Order::where('order_date', '>=', Carbon::now()->subDay())->get();
        $orderline = Orderline::get();
        $product = Product::get();
        $notify = Notify::get();
        $rating = Rating::get();
        return view('customer.orderhistory',compact('order','orderline','product','notify','rating'));
    }
    public function sendRating(Request $request, $order_id, $product_id){
        // $this->user_id = Auth::user()->user_id;
        // $rating = $this->notSpam()->approved();

        $rating = new Rating;
        $rating->product_id = $product_id;
        $rating->product_rating = $request->input('product_rating');
        $rating->save();
        $orderline = Orderline::where('order_id', '=', $order_id)->where('product_id', '=', $product_id)->first();
        $orderline->rating_id=Rating::all()->last()->rating_id;
        $orderline->save(); 
        //$rating = Rating::create($request->input());
        $r = number_format(\DB::table('rating')->where('product_id', $product_id)->average('product_rating'),2);
        $product = \DB::table('product')->where('product_id', $product_id)->update(['product_rating' => $r]);
        return redirect('/orderhistory');

        // $rating = Rating::create($request->input());
        // $id = $request->product_id;
        // $r = number_format(\DB::table('rating')->where('product_id', $id)->average('product_rating'),1);
        // $product = \DB::table('product')->where('product_id', $id)->update(['product_rating' => $r]);
        // return redirect()->route('customer.orderHistory')->with('success','Thank you for your rating!');

    }

    public function sendFeedback(Request $request, $id)
    {
        //
        Order::findOrFail($id)->update($request->all());
        return redirect('/orderhistory');
    }
}