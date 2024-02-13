<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

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


}
