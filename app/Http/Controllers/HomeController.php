<?php

namespace App\Http\Controllers;

use App\Models\Ecommerce\PProduct;
use App\Models\Ecommerce\Product;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }

    public function saveDataToMySQL2(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $product = new Product();
        $product->setConnection('mysql2');
        $product->title = $request->title;
        $product->save();

        return redirect(route('dashboard'))->with('success', 'stored');
    }

    public function saveDataToMySQL3(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $product = new PProduct();
        $product->setConnection('mysql3');
        $product->title = $request->title;
        $product->save();

        return redirect(route('dashboard'))->with('success', 'stored');
    }
}
