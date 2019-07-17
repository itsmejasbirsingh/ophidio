<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\ProductCategory;

use App\Models\Product;

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

    public function edit(Request $request, Product $product)
    {
        return view('admin.add_product',
                [  
                    'activeTab' => 'products', 
                    'activeLink' => 'edit',
                    'categories' => ProductCategory::get(),
                    'product' => $product
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

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'title' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $featured_image_name = '';

        if ($request->hasFile('featured_image')) {

            $image = $request->file('featured_image');
            $featured_image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img/products');
            $image->move($destinationPath, $featured_image_name);

        }

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category');
        $product->featured_image = ! empty( $featured_image_name ) ? $featured_image_name : ( $product->featured_image ? $product->featured_image : '' );
        $product->price = $request->input('price');
        $product->user_id = Auth::id();

        if ( empty( $request->input('is_active') ) ) {
            
            $product->status = 0;
        }else{
            $product->status = 1;
        }

        $product->touch();
        $product->update();

        return back()->with('productUpdateStatus', 'Product ' . $request->input('title') . ' updated!');
    }
}
