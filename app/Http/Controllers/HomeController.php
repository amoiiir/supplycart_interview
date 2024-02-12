<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    //redirect to the landing page
    public function index()
    {
        return view('home.userpage');
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
            return view('home.userpage');

        }
    }

}
