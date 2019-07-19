<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Address;

use App\Models\Order;

use App\Models\OrderItem;

use App\Http\Requests\ValidateCheckoutRequest;

use \Cart as Cart;

use Auth;

class CheckoutController extends Controller
{
    public function index()
    {
    	if ( ! Cart::count() ) {
    		return redirect()->route('cart');
    	}
    	return view('checkout');
    }

    public function order(ValidateCheckoutRequest $request)
    {
    	$address = new Address();

        // Save user address.
    	$address->store(
    		[
    			'user_id' => Auth::id(),
    			'address' => $request->input('address'),
    			'city' => $request->input('city'),
    			'state' => $request->input('state'),
    			'pincode' => $request->input('pincode'),
    		]
    	);

    	$order = new Order();

        // Save order.
    	$order->store([
    		'user_id' => Auth::id(),
    		'amount' => Cart::total(),
    		'address_id' => $address->id
    	]);
        
        // Save cart items.
        foreach (Cart::content() as $item) {

            $orderItem = new OrderItem();

            $orderItem->store([
                'order_id' => $order->id,
                'item' => $item->name,
                'item_id' =>$item->id,
                'amount' => $item->subtotal,
                'quantity' => $item->qty
            ]);
        }

        // Clear cart items.
        Cart::destroy();

    	return redirect()->route('orderRecieved', $order->id);
    }
}