<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Producto;
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
        $clients=Clients::all();
        $products=Producto::all();
        $cart=Producto::select('productos.Name', 'productos.PriceSell', 'carts.Quantity')
        ->join('carts', 'productos.id', '=', 'carts.product_id')
        ->get(); // or first()



        return view('home')->with(compact('clients', 'products', 'cart'));
    }
}
