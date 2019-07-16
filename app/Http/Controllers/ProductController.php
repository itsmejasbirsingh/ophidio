<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductCategory;

use App\Product;

use Auth;

class ProductController extends Controller
{
    public function index(){

        $products = Product::latest('id')->paginate(config('constants.NUMBER_OF_PRODUCTS'));

    	return view('admin.list_products', [
    		'activeTab' => 'products',
            'products' => $products,
    	]);

    }

    public function add()
    {
    	return view('admin.add_product',
                [  
                    'activeTab' => 'products', 
                    'activeLink' => 'add',
                    'categories' => ProductCategory::get()
                ] 
            );
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $product_name = $request->input('title');

        $featured_image_name = '';

        if ($request->hasFile('featured_image')) {

            $image = $request->file('featured_image');
            $featured_image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/products');
            $image->move($destinationPath, $featured_image_name);

        }

        $product = new Product();

        $product->store([
            "title" => $product_name,
            "description" => $request->input('description'),
            "category_id" => $request->input('category'),
            "featured_image" => $featured_image_name,
            "price" => $request->input('price'),
            "status" => 1,
            "user_id" => Auth::id()
        ]);

        return back()->with('productAddStatus', 'Product ' . $product_name . ' added!');
    }
}
