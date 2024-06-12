<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Image;
use File;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return response()->json($category);


    }
    public function store(Request $request)
    {
        $cat_image = $request->cat_image;
        $position = strpos($request->cat_image, ';');
        $sub = substr($request->cat_image, 0, $position);
        $ext = explode('/', $sub)[1];
        $name = time() . '.' . $ext;
        $img = Image::make($request->cat_image)->resize(240, 200);
        $upload_path = "images/category/";
        $images_url = $upload_path . '/' . $name;
        $img->save($images_url);
        $category = new Category;
        $category->cat_name = $request->cat_name;
        $category->cat_slug = Str::slug($category->cat_name);
        $category->cat_image = $images_url;
        $category->save();
    }


    public function show($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $cat_image = $request->cat_image;
        $position = strpos($request->cat_image, ';');
        $sub = substr($request->cat_image, 0, $position);
        $ext = explode('/', $sub)[1];
        $name = time() . '.' . $ext;
        $img = Image::make($request->cat_image)->resize(240, 200);
        $upload_path = "images/category/";
        $images_url = $upload_path . '/' . $name;
        $img->save($images_url);
        $category->cat_name = $request->cat_name;
        $category->cat_slug = Str::slug($category->cat_name);
        $category->cat_image = $images_url;
        $category->save();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (File::exists($category->cat_image)) {
            File::delete($category->cat_image);
        }

        $category->delete();
    }
}