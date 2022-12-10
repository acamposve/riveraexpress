<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id)
    {
        $exist_product = DB::table('pos')->where('product_id', $id)->first();

        if ($exist_product) {

            DB::table('pos')->where('product_id', $id)->increment('product_quantity');

            $product = DB::table('pos')->where('product_id', $id)->first();
            $sub_total = $product->product_price * $product->product_quantity;
            DB::table('pos')->where('product_id', $id)->update(['sub_total' => $sub_total]);

            // $product = Product::find($id);
            // $product->product_quantity -= 1;
            // $product->save();
        } else {
            $product = DB::table('products')->where('id', $id)->first();

            $data = [];
            $data['product_id'] = $id;
            $data['product_name'] = $product->product_name;
            $data['product_quantity'] = 1;
            $data['product_price'] = $product->selling_price;
            $data['sub_total'] = $product->selling_price;

            DB::table('pos')->insert($data);
        }
    }

    public function cartProducts()
    {
        $products = DB::table('pos')->get();
        return response()->json($products);
    }

    public function destroy($id)
    {
        DB::table('pos')->where('id', $id)->delete();
        return redirect('/home');
    }

    public function increment($id)
    {
        $quantity = DB::table('pos')->where('id', $id)->increment('product_quantity');

        $product = DB::table('pos')->where('id', $id)->first();
        $sub_total = $product->product_price * $product->product_quantity;
        DB::table('pos')->where('id', $id)->update(['sub_total' => $sub_total]);
    }

    public function decrement($id)
    {
        $quantity = DB::table('pos')->where('id', $id)->decrement('product_quantity');

        $product = DB::table('pos')->where('id', $id)->first();
        $sub_total = $product->product_price * $product->product_quantity;
        DB::table('pos')->where('id', $id)->update(['sub_total' => $sub_total]);
    }

    public function vat()
    {
        $vat = DB::table('extra')->first();
        return response()->json($vat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productSeek = DB::table('products')
        ->where('product_code', '=', $request->searchParam)
        ->orWhere('id', '=', $request->product_id)
        ->first();

        if ($productSeek) {

            $exist_product = DB::table('pos')->where('product_id', $productSeek->id)->first();

            if ($exist_product) {

                DB::table('pos')->where('product_id', $exist_product->product_id)->increment('product_quantity');

                $product = DB::table('pos')->where('product_id', $exist_product->product_id)->first();
                $sub_total = $product->product_price * $product->product_quantity;
                DB::table('pos')->where('product_id', $exist_product->product_id)->update(['sub_total' => $sub_total]);
                return redirect('/home');
                // $product = Product::find($id);
                // $product->product_quantity -= 1;
                // $product->save();
            } else {
                $product = DB::table('products')->where('id', $productSeek->id)->first();

                $data = [];
                $data['product_id'] = $product->id;
                $data['product_name'] = $product->product_name;
                $data['product_quantity'] = 1;
                $data['product_price'] = $product->selling_price;
                $data['sub_total'] = $product->selling_price;

                DB::table('pos')->insert($data);
                return redirect('/home');

            }} else {return redirect('/home');}
    }
}
