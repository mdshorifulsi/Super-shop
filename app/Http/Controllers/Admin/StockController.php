<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StockController extends Controller
{
    public function stock(){


        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('categories.cat_name', 'brands.brand_name', 'products.*')
            ->get();
            return response()->json($product);
    }


    public function stock_update(Request $request,$id){

         $data=array();
         $data['stock_quantity']=$request->stock_quantity;
         DB::table('products')->where('id',$id)->update($data);

    }
}
