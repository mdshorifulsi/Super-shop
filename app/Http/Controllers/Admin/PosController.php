<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use DB;

class PosController extends Controller
{
    public function getProduct($id)
    {

        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('categories.cat_name', 'brands.brand_name', 'products.*')
            ->where('category_id', $id)
            ->get();
        return response()->json($product);
    }



    public function addtocard(Request $request, $id)
    {

        $product = DB::table('products')->where('id', $id)->first();
        $check = DB::table('pos')->where('product_id', $id)->first();

        if ($check) {
            DB::table('pos')->where('product_id', $id)
                ->increment('product_quantity');

            $product = DB::table('pos')->where('product_id', $id)->first();

            $sub_total = $product->product_quantity * $product->product_price;
            DB::table('pos')->where('product_id', $id)->update(['sub_total' => $sub_total]);

        } else {

            $data = array();
            $data['product_id'] = $id;
            $data['product_name'] = $product->product_name;
            $data['product_quantity'] = 1;
            $data['product_price'] = $product->selling_price;
            $data['sub_total'] = $product->selling_price;

            DB::table('pos')->insert($data);

        }

        return response()->json('done');


    }


    public function cartproduct()
    {

        $cart = DB::table('pos')->get();

        return response()->json($cart);

    }

    public function increment($id)
    {


        $quantity = DB::table('pos')->where('id', $id)
            ->increment('product_quantity');

        $product = DB::table('pos')->where('id', $id)->first();

        $sub_total = $product->product_quantity * $product->product_price;
        DB::table('pos')->where('id', $id)->update(['sub_total' => $sub_total]);

        return response('done');

    }


    public function decrement($id)
    {


        $quantity = DB::table('pos')->where('id', $id)
            ->decrement('product_quantity');

        $product = DB::table('pos')->where('id', $id)->first();

        $sub_total = $product->product_quantity * $product->product_price;
        DB::table('pos')->where('id', $id)->update(['sub_total' => $sub_total]);

        return response('done');
    }





    public function removeCart($id)
    {

        DB::table('pos')->where('id', $id)->delete();
        return response('done');

    }
}