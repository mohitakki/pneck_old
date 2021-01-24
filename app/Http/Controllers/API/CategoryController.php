<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoryModel;
use Validator;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        $rules = [
            'name'  =>'required',

            'user_id'  =>'required'
          ];
          $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
          // Validation failed
          return response()->json([

            'status' =>"0",

            'error' => $validator->messages(),
          ],400);
        }
        else{


            if (CategoryModel::where('name',$request->name)->exists()) {
                 return response()->json(['status' =>"0",'error' => 'Category with this name already exists.'],200);                  
            }
            else{
                $cat = CategoryModel::create([
                'name' => $request->name,
                'user_id' => $request->user_id
                ]);
                return response()->json(['status' =>"1",'success' => $cat],200);
            }        

          
        }

    }


    public function categoryList(Request $request)
    {
        $rules = [
            'user_id'  =>'required'
          ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
          // Validation failed
          return response()->json([
            'status' =>"0",
            'error' => $validator->messages(),
          ],400);
        }else{
             $categoryList = CategoryModel::where('user_id',$request->user_id)->get();
            return response()->json(['status'=>"1",'success' => $categoryList],200);
        }
       

    }

    public function categeoryDetails(Request $request)
    {
        $editCategory = CategoryModel::where('id',$request->id)->first();
        if ($editCategory) {
            return response()->json(['success' => $editCategory],200);            
        }
        else{
            return response()->json(['success' => 'Not found'],400);
        }
    }

    public function updateCategory(Request $request)
    {
        $rules = [
            'name'  =>'required',
          ];
          $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
          // Validation failed
          return response()->json([
            'error' => $validator->messages(),
          ],400);
        }
        else{
            if (CategoryModel::where('id',$request->id)->exists()) {
                $category = CategoryModel::where('id',$request->id)->first();
                CategoryModel::where('id',$request->id)->update(array(
                    'name' => is_null($request->name) ? $category['name'] : $request->name,
                ));
                return response()->json(['success' => 'Updated'],200);            
            }
            else{
                return response()->json(['error' => 'Not found'],400);            
            }
        }
    }

    public function deleteCategory(Request $request)
    {
        if (CategoryModel::where('id',$request->id)->exists()) {
            CategoryModel::where('id',$request->id)->delete();
            return response()->json(['message' => 'Deleted'],200);
        }
        else{
            return response()->json(['error' => 'Id not found'],200);
        }
    }

    public function activeOrDeactive(Request $request)
    {
        if (CategoryModel::where('id',$request->id)->exists()) {
            if($request->is_active == '0'){
                CategoryModel::where('id',$request->id)->update(array('is_active' => $request->is_active));
                return response()->json(['message' => 'Deactive'],200);
            }
            if($request->is_active == '1'){
                CategoryModel::where('id',$request->id)->update(array('is_active' => $request->is_active));
                return response()->json(['message' => 'Active'],200);
            }
            
        }
        else{
            return response()->json(['error' => 'Id not found'],200);
        }
    }
}
