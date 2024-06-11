<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryApiController extends Controller
{
    public function getAll()
    {
        $data_product_category = ProductCategory::get();

        return response()->json([
            "message" => "success get all",
            "data" => $data_product_category
        ]);
    }
    public function getById($id)
    {


        $data_product_category = ProductCategory::where("id", $id)->with("product")->first();

        return response()->json([
            "message" => "success get by id",
            "data" => $data_product_category
        ]);
    }
    public function create(Request $request)
    {

        $data_product =  ProductCategory::create([
            "name" => $request->name,
        ]);

        return response()->json([
            "message" => "success create",
            "data" => $data_product
        ]);
    }
    public function update($id, Request $request)
    {

        $data_product =  ProductCategory::where("id", $id)->update([
            "name" => $request->name,
        ]);

        return response()->json([
            "message" => "success update",
            "data" => $data_product
        ]);
    }
    public function delete($id)
    {
        $data_product = ProductCategory::where("id", $id)->first();

        $data_product->delete();

        return response()->json([
            "message" => "success delete",

        ]);
    }
}
