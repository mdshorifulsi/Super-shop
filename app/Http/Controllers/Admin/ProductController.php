<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Image;
use File;
use DB;

class ProductController extends Controller
{
    
    public function index()
    {

        // $product=Product::with('category','brand')->latest()->get();
        // return response()->json($product);


        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('categories.cat_name', 'brands.brand_name', 'products.*')
            ->latest()
            ->get();
            return response()->json($product);


    }

   
    
    public function store(Request $request)
    {
        $image = $request->image;
        $position = strpos($request->image, ';');
        $sub = substr($request->image, 0, $position);
        $ext = explode('/', $sub)[1];
        $name = time() . '.' . $ext;
        $img = Image::make($request->image)->resize(240, 200);
        $upload_path = "images/product/";

        $images_url = $upload_path . '/' . $name;
        $img->save($images_url);

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;

        $product->best_price=($request->selling_price)-$request->selling_price*$request->discount_price/100;


        $product->stock_quantity = $request->stock_quantity;
        $product->description = $request->description;
        $product->weight = $request->weight;
        $product->color = $request->color;
        $product->image = $images_url;
        $product->save();


        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

  
   
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $image = $request->image;
        $position = strpos($request->image, ';');
        $sub = substr($request->image, 0, $position);
        $ext = explode('/', $sub)[1];
        $name = time() . '.' . $ext;
        $img = Image::make($request->image)->resize(240, 200);
        $upload_path = "images/product/";

        $images_url = $upload_path . '/' . $name;
        $img->save($images_url);


        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->description = $request->description;
        $product->weight = $request->weight;
        $product->color = $request->color;
        $product->image = $images_url;
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product = Product::find($id);
        if (File::exists($product->image)) {
            File::delete($product->image);
        }

        $product->delete();
    }


    
}
