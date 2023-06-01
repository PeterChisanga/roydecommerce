<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

use Exception;
use Mail;
use App\Mail\MailNotify;
use Session;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index(){
        $data = Product::inRandomOrder()->get();
        return view('product',['products' => $data]);
    }

    function products(){
        $category = null;
        $products = Product::inRandomOrder()->get();
        return view('products', ['products' => $products, 'category' => $category ]);
    }

    public function showCategory($category)
    {
        $query = Product::query();
        if ($category === 'men' || $category === 'women') {
            $query->whereIn('category', [$category, 'gender-neutral']);
        } else {
            $query->where('category', $category);
        }
        $products = $query->inRandomOrder()->get();

        return view('products', ['products' => $products, 'category' => $category]);
    }
    
    //used just for testing php infor 
    function infor(){
        phpinfo();
    }

    function detail($id){
        $data = Product::find($id);
        $products = Product::inRandomOrder()->get();
        return view('detail',['product' => $data],['products' => $products]);
    }

    function search(Request $req){
        if($req->input('query') == ""){
            $data = Product::all();
            return view('product',['products' => $data]);
        }

        $data = Product::where('name','like','%'.$req->input('query').'%')->get();
        return view('search',['products' => $data]);
    }

    function addToCart(Request $req){
        $cart = session()->get('cart', []);

        $productId = $req->product_id;
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $req->quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => $req->quantity,
                'price' => $req->price,
                'size' => $req->size,
                'color' => $req->color,
            ];
        }
        session()->put('cart', $cart);
        return redirect('/cartlist');
    }

    function cartList() {
        $cart = session()->get('cart');
        $total = 0;
        $products = [];

        if ($cart) {
            foreach ($cart as $id => $item) {
                $product = Product::find($id);
                if ($product) {
                    $price = $item['price'];
                    $total += $price;

                    $products[] = [
                        'product' => $product,
                        'cart_id' => $id,
                        'quantity' => $item['quantity'],
                        'cart_price' => $price,
                    ];
                }
            }
        }
        return view('cartlist', compact('products', 'total'));
    }

    function removeCart($id) {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect('cartlist');
    }

    function orderNow() {
        $cart = session()->get('cart');
        $total = 0;
        $products = [];

        if ($cart) {
            foreach ($cart as $id => $item) {
                $product = Product::find($id);
                if ($product) {
                    $price = $item['price'];
                    $total += $price;

                    $products[] = [
                        'product' => $product,
                        'cart_id' => $id,
                        'quantity' => $item['quantity'],
                    ];
                }
            }
        }

        return view('ordernow', compact('products', 'total'));
    }

    public function orderPlace(Request $request)
    {
        $userId = $request->session()->get('user')['id'];
        $userEmail = $request->session()->get('user')['email'];
        $cart = $request->session()->get('cart');

        $total = 35;// 35 is the delivery price
        foreach ($cart as $product) {
            $total += $product['price'];
        }

        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'payment' => 'required',
            'city' => 'required',
            'delivery_date' => 'required',
        ]);

        if ($validator->fails()) {
           $errors = ["Please provide the city, address, and delivery date."];
            return view('/ordernow', ['errors' => $errors, 'total' => $total]);
        }

        foreach ($cart as $product) {
            $order = new Order;
            $order->product_id = $product['product_id'];
            $order->user_id = $userId;
            $order->quantity = $product['quantity'];
            $order->color = $product['color'];
            $order->size = $product['size'];
            $order->price = $product['price'];
            $order->status = "pending";
            $order->payment_method = $request->input('payment');
            $order->payment_status = "pending";
            $order->address = $request->input('address');
            $order->delivery_date = $request->input('delivery_date');
            $order->city = $request->input('city');
            $order->save();
        }

        $request->session()->forget('cart');

        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('products.*', 'quantity','status','orders.color as color','address', 'payment_method', 'payment_status', 'orders.price as cart_price')
            ->where('orders.user_id', $userId)
            ->get();
            
        if($userEmail){
            try {
                Mail::to($userEmail)->send(new MailNotify($orders));
                return redirect('myorders')->with('success', 'You have successfully made an order. Please check your email.');
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
                dd($e->getMessage()); // Dump and die to inspect the error message
                return response()->json(['Sorry something went wrong']);
            }
        }

        return view('order_confirmation',['orders'=>$orders]);
    }

    function myOrders() {
        if (!session()->get('user')) {
            return redirect('/login');
        }
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->join('users','orders.user_id','=','users.id')
        ->where('orders.user_id',$userId)
        ->select('products.*','quantity','status','address','email','number','payment_method','payment_status','orders.price as cart_price')
        ->get();

        return view('myorders',['orders'=>$orders]);
    }
}
