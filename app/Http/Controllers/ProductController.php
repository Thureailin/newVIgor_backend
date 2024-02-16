<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
public function index(){
    $product = Product::all();

    return ProductResource::collection($product->all());
}
    public function store(Request $request){
        $product = new Product();
        $product->image = $request->image;
        $product->relative_image = $request->relative_image ;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->storage = $request->storage;
        $product->discount_flag = $request->discount_flag;
        $product->discount = $request->discount;
        $product->dimension = $request->dimension;
        $product->description = $request->description;
        $product->display = $request->display ;
        $product->camera = $request->camera;
        $product->battery = $request->battery;
        $product->consistency = $request->consistency ;
        $product->chip_set = $request->chip_set;
        $product->other_specification = $request->other_specification ;
        $product->save();
        return response()->json([
            'error'=>false,
            "message"=>'Product created is successfully',
            "data"=>$product
        ]);
    }
    public function destroy($id){
        $product = Product::find($id);

        $product->delete();
        return response()->json([
            'data'=>'Product is Deleted Successfully!',
        ]);
    }
    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // Add other validation rules here
        ]);
        $product = Product::find($id);
        $product->update($validatedData);
        return response()->json([
            'data'=>'Product is Updated Successfully!',
        ]);
    }
}
