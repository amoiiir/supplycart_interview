<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //redirect to the landing page
    public function index()
    {
        return view('home.userpage');
    }
}
