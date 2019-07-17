<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = new Order();

    	return view('admin.list_orders', [
    		'orders' => $orders->showAll(),
    		'activeTab' => 'orders',
    		'activeLink' => 'ordersList'
    	]);
    }

    public function view(Request $request, Order $order)
    {

    	return view('admin.view_order')->with(['order' => $order, 'activeTab' => 'orders' ]);
    }
}
