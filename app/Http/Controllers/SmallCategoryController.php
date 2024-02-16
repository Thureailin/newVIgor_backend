<?php

namespace App\Http\Controllers;

use App\Http\Resources\SmallCategoryResource;
use App\Models\SmallCategory;
use Illuminate\Http\Request;

class SmallCategoryController extends Controller
{
public function index(){
    $smallCategory = SmallCategory::all();

    return SmallCategoryResource::collection($smallCategory->all());
}
    public function store(Request $request){
        $smallCategory = new SmallCategory();
        $smallCategory->name = $request->name;

        $smallCategory->save();
        return response()->json([
            'error'=>false,
            "message"=>'Category created is successfully',
            "data"=>$smallCategory
        ]);
    }
    public function destroy($id){
        $smallCategory = SmallCategory::find($id);

        $smallCategory->delete();
        return response()->json([
            'data'=>'SmallCategory Deleted Successfully!',
        ]);
    }
    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            // Add other validation rules here
        ]);
        $smallCategory = SmallCategory::find($id);
        $smallCategory->update($validatedData);
        return response()->json([
            'data'=>'SmallCategory Updated Successfully!',
        ]);
    }
}
