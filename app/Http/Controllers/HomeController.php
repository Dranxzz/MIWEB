<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();

        return view('welcome', ['products' => $products]);
    }

    public function home()
    {
        $this->middleware('auth');

        return view('home');
    }

    public function detail()
    {
        $product = Product::where('id', 1)->first();
        return view('detail', ['product' => $product]);
    }


}
