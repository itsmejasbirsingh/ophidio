<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;

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

    	$category = $request->input('category');

    	$productCategory = new ProductCategory();

        $productCategory->store([
            "name" => $category,
        ]);

        return redirect()->route('addCategory')->with('productCategoryAddStatus', 'Category ' .$category . ' Added!');
    }
}
