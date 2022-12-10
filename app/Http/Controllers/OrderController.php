<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->orderBy('orders.id', 'desc')
            ->select('orders.id', 'customers.name', 'customers.nickname', 'orders.qty', 'orders.total', 'orders.pay', 'orders.due', 'orders.payBy', 'orders.order_date', 'orders.order_ticket', 'orders.order_time')
            ->paginate(15);


            $orderdetails =  DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')

            ->select('products.product_name', 'order_details.product_quantity', 'order_details.order_id')
            ->get();

        return view('order.index', compact('orders', 'orderdetails'))
            ->with('i', (request()->input('page', 1) - 1) * $orders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        return view('order.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Order::$rules);

        $order = Order::create($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        $details = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')

            ->select('products.product_name', 'order_details.product_quantity', 'order_details.product_price', 'order_details.sub_total')
            ->where('order_details.order_id', '=', $id)
            ->get();

        return view('order.show', compact('order', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        request()->validate(Order::$rules);

        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $order = Order::find($id)->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
