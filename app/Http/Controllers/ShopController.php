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
    public function index(Request $request)
    {
        
        $products = Product::get([
            'search' => $request->input('s', ''),
            'orderby' => $request->input('sortby', ''),
        ]);

        return view('shop')->withProducts($products);
    }

    /**
     * Display single product by title.
     *
     * @return \Illuminate\Http\Response
     */
    public function productSingle(Request $request, $product)
    {
        $product = Product::whereTitle($product)->first();

        return view('product_single')->withProduct($product);
    }

}
