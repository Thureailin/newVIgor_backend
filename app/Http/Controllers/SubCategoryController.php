<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
public function index(){
    $subCategory = SubCategory::all();

    return SubCategoryResource::collection($subCategory->all());
}
    public function store(Request $request){
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->title = $request->title;
        $subCategory->description = $request->description;
        $subCategory->main_photo = $request->main_photo;
        $subCategory->series_title =$request->series_title;
        $subCategory->series_photo = $request->series_photo;
        $subCategory->description = $request->description;
        $subCategory->available_product = $request->available_product;
        $subCategory->category_id = $request->category_id;
        $subCategory->save();
        return response()->json([
            'error'=>false,
            "message"=>'Category created is successfully',
            "data"=>$subCategory
        ]);
    }
    public function destroy($id){
        $subCategory = SubCategory::find($id);

        $subCategory->delete();
        return response()->json([
            'data'=>'Category Deleted Successfully!',
        ]);
    }
    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            // Add other validation rules here
        ]);
        $category = SubCategory::find($id);
        $category->update($validatedData);
        return response()->json([
            'data'=>'Category Updated Successfully!',
        ]);
    }}
