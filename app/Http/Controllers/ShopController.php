<?php

namespace App\Http\Controllers;


use App\Models\Product;

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
        $products = Product::where('status', 1)->latest('id')->get();

        return view('shop')->with('products', $products);
    }

    /**
     * Display single product by title.
     *
     * @return \Illuminate\Http\Response
     */
    public function productSingle(Request $request, $product)
    {
        $product = Product::where('title', $product)->first();

        return view('product_single')->with('product', $product);
    }
}
