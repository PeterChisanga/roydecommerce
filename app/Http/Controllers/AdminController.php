<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\AdminUser;

class AdminController extends Controller
{
    function showLoginForm(){
        return view('/admin/login');
        // return view('admin.login');
    }

    function login(Request $req){
        $adminUser = AdminUser::where('email', $req->email)->first();

        if (!$adminUser) {
            Session::flash('error', 'Invalid email');
            return redirect()->route('admin.login.submit');
        }
        
        $checkPassword = Hash::check($req->password, $adminUser->password);
        // dd($checkPassword);  // Debug line
        
        if (!$checkPassword) { 
            Session::flash('error', 'Invalid password');
            return redirect()->route('admin.login.submit');
        } else {
            $req->session()->put('adminUser', $adminUser);
            return redirect('/admin/dashboard');
        }
    }

    function dashboard(){
        if (!session()->get('adminUser')) {
            return redirect()->route('admin.login');
        }

        $products = Product::all();
        $orders = Order::all();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();

        return view('admin.dashboard', [
            'products' => $products, 
            'orders' => $orders,
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'totalUsers' => $totalUsers,
            ]);
    }

    function createAccount(Request $req){
        $allowed_emails = ['peterchisangamwamba@gmail.com','contact@petermwamba.com','royd@samalasuppliers.com','francis@samalasuppliers.com','lilian@samalasuppliers.com','luckson@samalasuppliers.com'];
        if(!in_array($req->email, $allowed_emails)){
            return redirect('/');
        }

        $validatedData = $req->validate([
        'name' => 'required',
        'email' => ['required', 'email', Rule::unique('admin_users')],
        'password' => 'required|min:8',
        ]);

        if(!$validatedData){
            return redirect()->back()->withErrors($validatedData);
        }
      
        $user = new AdminUser();
        $user->name = $req->name; 
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect('/admin/dashboard')->with('success', 'Admin account created successfully');
    }

    function viewOrders(){
        if (!session()->get('adminUser')) {
            return redirect()->route('admin.login');
        }

        $totalOrders = Order::count();
        $orders = DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->join('users','orders.user_id','=','users.id')
            ->select('products.*','status','address','quantity','number','delivery_date','city','orders.color as color','orders.size as size','orders.id as id','orders.created_at as order_date','email','payment_method','payment_status','orders.price as cart_price','orders.created_at as date','users.name as user_name', 'user_id')
            ->orderBy('orders.created_at', 'desc')  // Order by created_at in descending order
            ->get();

        return view('admin.orders', [
            'orders' => $orders,
            'totalOrders' => $totalOrders,
            ]);
    }

    function deleteOrder($id){
        if (!session()->get('adminUser')) {
            return redirect()->route('admin.login');
        }
        Order::where('id', $id)->delete();
        return redirect('/admin/orders')->with('success', 'Product deleted successfully');
    }

    function viewCustomers(){
        if (!session()->get('adminUser')) {
            return redirect()->route('admin.login');
        }

        $customers = User::all();
        $totalCustomers = User::count();

        return view('admin.customers',[
        'customers' => $customers,
        'totalCustomers' => $totalCustomers,
        ]);
    }

    function viewProducts(){
        if (!session()->get('adminUser')) {
            return redirect()->route('admin.login');
        }

        $products = Product::all();
        $totalProducts = Product::count();

        return view('admin.products',[
        'products' => $products,
        'totalProducts' => $totalProducts,
        ]);
    }

    function addProduct(Request $req){
        if (!session()->get('adminUser')) {
            return redirect()->route('admin.login');
        }

        if ($req->isMethod('post')) {
            $req->validate([
                'name' => 'required',
                'category' => 'required',
                'price' => 'required|numeric',
                'color' => 'required', 
                'size' => 'required', 
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            ]);

            $imageName = time().'.'.$req->image->extension();  
            $req->image->move(public_path('images/products'), $imageName);

            $product = new Product();
            $product->name = $req->input('name');
            $product->description = $req->input('description');
            $product->price = $req->input('price');
            $product->category = $req->input('category');
            $product->color = $req->input('color'); // added color
            $product->size = $req->input('size'); // added size
            $product->gallery = $imageName;
            $product->save();
            return redirect('/admin/products')->with('success', 'Product added successfully');
        }

        return view('admin.addProduct', ['errors' => $req->session()->get('errors')]);
    }

    function updateProduct(Request $req, $id) {
        if (!session()->get('adminUser')) {
            return redirect()->route('admin.login');
        }

        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('admin.products')->with('error', 'Product not found.');
        }

        if ($req->isMethod('post')) {
            if ($req->hasFile('image')) {
                $imageName = time().'.'.$req->image->extension();  
                $req->image->move(public_path('images/products'), $imageName);
                $product->gallery = $imageName;
            }

            $product->name = $req->input('name');
            $product->description = $req->input('description');
            $product->price = $req->input('price');
            $product->category = $req->input('category');
            $product->color = $req->input('color'); 
            $product->size = $req->input('size'); 
            $product->save();

            return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
        }

        return view('admin.editProduct', ['product' => $product]);
    }

    function deleteProduct($id){
        if (!session()->get('adminUser')) {
            return redirect()->route('admin.login');
        }
        Product::where('id', $id)->delete();
        return redirect('/admin/products')->with('success', 'Product deleted successfully');
    }
}