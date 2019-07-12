<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display all products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status',1)->latest('id')->get();

        return view('public.shop')->with('products', $products);
    }

    public function productSingle(Request $request, $product)
    {
        $product = Product::where('title','like', $product)->first();

        return view('public.product_single')->with('product', $product);
    }
}
