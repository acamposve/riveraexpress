<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todaySells=DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->where('orders.order_date', date('d/m/Y'))
        ->select('customers.name', 'orders.*')
        ->orderBy('orders.id', 'desc')
        ->toSql();
        $todayIncome = DB::table('orders')->where('order_date', date('d/m/Y'))->sum('pay');
        $todayDue = DB::table('orders')->where('order_date', date('d/m/Y'))->sum('due');
        $expenses = DB::table('expenses')->where('expense_date', date('Y-m-d'))->sum('amount');

        $stockOutProducts= DB::table('products')->where('product_quantity', '=', 0)->get();



        return view('home')->with(compact('todaySells', 'todayIncome', 'todayDue', 'expenses', 'stockOutProducts'));
    }
}
