<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addcategory(Request $request){
        $req = $request->validate([
            'category_name' => 'required|string|max:255',
            'category_images' =>'required|array'
        ]);

        $newdata_category = [
            'name' => $req['category_name']
        ];
        Queries::addnew('categories_tbl',$newdata_category);
        return response([
            'error'=>false,
            'message'=>"Successfully added category",
        ],200);
    }

    public function editcategory(){
        $req = $request->validate([
            'category_id' => 'required|numeric|min:0',
            'category_name' => 'required|string|max:255',
            'category_images' =>'required|array'
        ]);

        $updatedata_category = [
            'name' => $req['category_name']
        ];
        Queries::edit('categories_tbl', 'id', $updatedata_category, $req['category_id']);
        return response([
            'error'=>false,
            'message'=>"Successfully edit category",
        ],200);
    }

    public function deletecategory(){
        $req = $request->validate([
            'category_id' => 'required|numeric|min:0'
        ]);

        Queries::deleterow('categories_tbl','id',$req['category_id']);
        return response([
            'error'=>false,
            'message'=>"Successfully deleted category",
        ],200);

    }

    public function dropdowncategories(){

    }

    public function categories(){
        
    }
}
