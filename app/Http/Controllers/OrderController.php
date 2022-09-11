<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Pos;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index()
    {
        $products=Pos::all();
        $customers=Customer::all();
        $categories = Category::all();
        $vats = DB::table('extra')->first();
        $catProducts = DB::table('products')
        ->join('categories', 'products.category_id', 'categories.id')
        ->select('products.id','products.product_name', 'products.selling_price', 'products.product_quantity')
        ->get();
        $expenses = DB::table('expenses')->where('expense_date', date('Y-m-d'))->sum('amount');

        $stockOutProducts= DB::table('products')->where('product_quantity', '=', 0)->get();

        $filtersearch=Product::all();

        return view('orders.index')->with(compact('products', 'customers', 'categories', 'catProducts', 'vats', 'filtersearch'));
    }


    public function todayOrder()
    {
    	$orders = DB::table('orders')
    				->join('customers', 'orders.customer_id', 'customers.id')
    				->where('orders.order_date', date('d/m/Y'))
    				->select('customers.name', 'orders.*')
    				->orderBy('orders.id', 'desc')
    				->get();
    	return response()->json($orders);
    }

    public function orders($id)
    {
    	$orders = DB::table('orders')
    				->join('customers', 'orders.customer_id', 'customers.id')
    				->where('orders.id', $id)
    				->select('customers.name', 'customers.phone', 'customers.address', 'orders.*')
    				->first();

    	return response()->json($orders);
    }

    public function orderDetails($id)
    {
    	$details = DB::table('order_details')
    				->join('products', 'order_details.product_id', 'products.id')
    				->where('order_details.order_id', $id)
    				->select('products.product_name', 'products.product_code', 'products.image', 'order_details.*')
    				->get();
    	return response()->json($details);
    }

    public function searchOrder(Request $request){
    	$orderdate = $request->date;
    	$newdate = new DateTime($orderdate);
    	$done = $newdate->format('d/m/Y');

    	$order = DB::table('orders')
    	->join('customers','orders.customer_id','customers.id')
    	->select('customers.name','orders.*')
    	->where('orders.order_date',$done)
    	->get();

    	return response()->json($orderdate);

    }
}
