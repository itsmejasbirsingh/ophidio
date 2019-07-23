<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function add()
    {
    	return view('admin.add_product_category',
                [  
                    'activeTab' => 'products', 
                    'activeLink' => 'addCategory',
                    'categories' => ProductCategory::get()
                ] 
            );
    }

    public function store(Request $request)
    {

    	$request->validate([
            'category' => 'required|unique:product_categories,name|min:2',
        ]);

    	$productCategory = new ProductCategory();

        $productCategory->store([
            "name" => $request->input('category'),
        ]);

        return back()->with('productCategoryAddStatus', 'Category ' . $request->input('category') . ' Added!');
    }

    public function productsByCategoryName(Request $request, $category)
    {
        $category = ProductCategory::select('id', 'name')->whereName($category)->get()->first();

        $products = Product::get([
            'search' => $request->input('s', ''),
            'orderby' => $request->input('sortby', ''),
            'category_id' => $category->id
        ]);

        return view('shop')->with([ 'products' => $products, 'active_category' => $category->name ]);

    }
}
