<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Coin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function categoryProducts($id)
    {
        $categoryProducts = DB::table('products')->where('category_id', $id)->get();

        return response()->json($categoryProducts);
    }

    public function store(Request $request)
    {

//entrada billetes
        if ($request->e20 > 0) {
            Bill::where('name', '=', '20')->increment('quantity', (int) $request->e20);
        }
        if ($request->e50 > 0) {
            Bill::where('name', '=', '50')->increment('quantity', (int) $request->e50);
        }
        if ($request->e100 > 0) {
            Bill::where('name', '=', '100')->increment('quantity', (int) $request->e100);
        }

        if ($request->e200 > 0) {
            Bill::where('name', '=', '200')->increment('quantity', (int) $request->e200);
        }

        if ($request->e500 > 0) {
            Bill::where('name', '=', '500')->increment('quantity', (int) $request->e500);
        }
        if ($request->e1000 > 0) {
            Bill::where('name', '=', '1000')->increment('quantity', (int) $request->e1000);
        }
        if ($request->e2000 > 0) {
            Bill::where('name', '=', '2000')->increment('quantity', (int) $request->e2000);
        }


        //salida billetes
        if ($request->s20 > 0) {
            Bill::where('name', '=', '20')->decrement('quantity', (int) $request->s20);
        }
        if ($request->s50 > 0) {
            Bill::where('name', '=', '50')->decrement('quantity', (int) $request->s50);
        }
        if ($request->s100 > 0) {
            Bill::where('name', '=', '100')->decrement('quantity', (int) $request->s100);
        }

        if ($request->s200 > 0) {
            Bill::where('name', '=', '200')->decrement('quantity', (int) $request->s200);
        }

        if ($request->s500 > 0) {
            Bill::where('name', '=', '500')->decrement('quantity', (int) $request->s500);
        }
        if ($request->s1000 > 0) {
            Bill::where('name', '=', '1000')->decrement('quantity', (int) $request->s1000);
        }
        if ($request->s2000 > 0) {
            Bill::where('name', '=', '2000')->decrement('quantity', (int) $request->s2000);
        }


        //entrada monedas

        if ($request->e1 > 0) {
            Coin::where('name', '=', '1')->increment('quantity', (int) $request->e1);
        }
        if ($request->e2 > 0) {
            Coin::where('name', '=', '2')->increment('quantity', (int) $request->e2);
        }
        if ($request->e5 > 0) {
            Coin::where('name', '=', '5')->increment('quantity', (int) $request->e5);
        }

        if ($request->e10 > 0) {
            Coin::where('name', '=', '10')->increment('quantity', (int) $request->e10);
        }

        if ($request->em50 > 0) {
            Coin::where('name', '=', '50')->increment('quantity', (int) $request->em50);
        }



        //salida monedas

        if ($request->s1 > 0) {
            Coin::where('name', '=', '1')->decrement('quantity', (int) $request->e1);
        }
        if ($request->s2 > 0) {
            Coin::where('name', '=', '2')->decrement('quantity', (int) $request->e2);
        }
        if ($request->s5 > 0) {
            Coin::where('name', '=', '5')->decrement('quantity', (int) $request->e5);
        }

        if ($request->s10 > 0) {
            Coin::where('name', '=', '10')->decrement('quantity', (int) $request->e10);
        }

        if ($request->sm50 > 0) {
            Coin::where('name', '=', '50')->decrement('quantity', (int) $request->em50);
        }


        request()->merge(['order_date' => date('d/m/Y')]);
        request()->merge(['order_month' => date('F')]);
        request()->merge(['order_year' => date('Y')]);

        $order = Order::create($request->all());
        $cartContents = DB::table('pos')->get();

        $cartData = [];

        foreach ($cartContents as $content) {
            $cartData['order_id'] = $order->id;
            $cartData['product_id'] = $content->product_id;
            $cartData['product_quantity'] = $content->product_quantity;
            $cartData['product_price'] = $content->product_price;
            $cartData['sub_total'] = $content->sub_total;
            DB::table('order_details')->insert($cartData);

            DB::table('products')
                ->where('id', $content->product_id)
                ->update(['product_quantity' => DB::raw('product_quantity - ' . $content->product_quantity)]);
        }

        DB::table('pos')->delete();

        return redirect('/home');

    }

    public function todaySell()
    {
        $todaySell = DB::table('orders')->where('order_date', date('d/m/Y'))->sum('total');
        return response()->json($todaySell);
    }

    public function todayIncome()
    {
        $todayIncome = DB::table('orders')->where('order_date', date('d/m/Y'))->sum('pay');
        return response()->json($todayIncome);
    }

    public function todayDue()
    {
        $todayDue = DB::table('orders')->where('order_date', date('d/m/Y'))->sum('due');
        return response()->json($todayDue);
    }

    public function expenses()
    {
        $expenses = DB::table('expenses')->where('expense_date', date('Y-m-d'))->sum('amount');
        return response()->json($expenses);
    }

    public function stockOut()
    {
        $stockOut = DB::table('products')->where('product_quantity', '<', 1)->get();
        return response()->json($stockOut);
    }
}
