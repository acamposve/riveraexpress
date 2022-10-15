<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Pos;
use App\Models\Category;

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
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $filtersearch = DB::table('products')->orderBy('product_name', 'asc')
        ->get();
        if (!empty($filter)) {
            $filtersearch = $filtersearch->where('product_name', 'like', '%'.$filter.'%');

        }
        //dd($filtersearch);
        $products=Pos::all();
        $customers=Customer::all();
        $categories = Category::all();

        $catProducts = DB::table('products')
        ->join('categories', 'products.category_id', 'categories.id')
        ->select('products.id','products.product_name', 'products.selling_price','products.night_price', 'products.product_quantity')
        ->get();
        $stockOutProducts= DB::table('products')->where('product_quantity', '=', 0)->get();
        return view('home')->with(compact('products', 'customers', 'categories', 'catProducts', 'filtersearch', 'filter', 'stockOutProducts', 'filtersearch'));
    }
}
