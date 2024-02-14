<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //redirect to the landing page
    public function index()
    {
        $product = Product::paginate(8);

        //sent all the products to this page
        return view('home.userpage', compact('product'));
    }

    public function redirect()
    {

        //get the usertype of the user
        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {
            return view('admin.home');
        }
        else
        {
            $product = Product::paginate(8);
            return view('home.userpage', compact('product'));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));

    }

    public function add_cart(Request $request, $id)
    {
        //check if the user is logged in
        if(Auth::id())
        {
            $user=Auth::user();

            $product = Product::find($id);

            //store data in the cart table
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone_num = $user->phone;
            // $cart->address = $user->address;

            //product data
            $cart->title = $product->title;
            $cart->quantity = $request->quantity;

            //conditions if the product has discount price
            if($product->discount_price == null)
            {
                $cart->price = $product->price;
            }
            else
            {
                $cart->price = $product->discount;
            }
            $cart->product_id = $product->id;
            $cart->user_id = $user->id;
            $cart->image=$product->image;
            $cart->save();

            return redirect()-> back();

        }
        else
        {
            return redirect('/login');
        }
    }

    public function show_cart()
    {

        //conditions for users who are not logged in
        if(Auth::id())
        {
            $user=Auth::user();
            $cart = Cart::where('user_id', $user->id)->get();
            return view('home.show_cart', compact('cart'));
        }
        else
        {
            return redirect('/login');
        }

    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid = $user->id;

        $cart = Cart::where('user_id', $user->id)->get();

        foreach($cart as $cart)
        {
            $order = new Order;
            $order->name = $cart->name;
            $order->email = $cart->email;
            $order->phone = $cart->phone_num;
            $order->address = $cart->address;
            $order->user_id = $cart->user_id;

            $order->title = $cart->title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->image = $cart->image;
            $order->product_id = $cart->product_id;

            $order->payment_status = 'pending';
            $order->delivery_status = 'pending';
            $order->save();

            //get the id of the cart
            $cart_id = $cart->id;
            $cart = Cart::find($cart_id);
            $cart->delete();

        }

        return redirect()->back()->with('success', 'Order Placed Successfully');

    }


}
