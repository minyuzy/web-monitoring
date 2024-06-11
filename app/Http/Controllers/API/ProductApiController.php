<?php

namespace App\Http\Controllers\API;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function getAll()
    {
        $data_product = Product::get();

        return response()->json([
            "message" => "success get all",
            "data" => $data_product
        ]);
    }
    public function getById($id)
    {


        $data_product = Product::where("id", $id)->first();

        return response()->json([
            "message" => "success get by id",
            "data" => $data_product
        ]);
    }
    public function create(Request $request)
    {
        $product_name = UploadFile::upload("foto_product", $request->file("image_url"));
        $data_product =  Product::create([
            "product_category_id" => $request->product_category_id,
            "name" => $request->name,
            "image_url" => $product_name,
            "harga_beli" => $request->harga_beli,
            "harga_jual" => $request->harga_jual,
            "stock_awal" => $request->stock,
            "stock" => $request->stock,
            "sold" => 0,
        ]);

        return response()->json([
            "message" => "success create",
            "data" => $data_product
        ]);
    }
    public function update($id, Request $request)
    {
        $data_product = Product::where("id", $id)->first();
        if ($data_product != null) {
            DeleteFile::delete($data_product->image_url);
        }
        $product_name = UploadFile::upload("foto_product", $request->file("image_url"));
        $data_product->update([
            "product_category_id" => $request->product_category_id,
            "name" => $request->name,
            "image_url" => $product_name,
            "harga_beli" => $request->harga_beli,
            "harga_jual" => $request->harga_jual,
            "stock_awal" => $request->stock,
            "stock" => $request->stock,
            "sold" => 0,
        ]);

        return response()->json([
            "message" => "success update",
            "data" => $data_product
        ]);
    }

    public function pembelian($id, Request $request)
    {
        $data_product =  Product::where("id", $id)->first();
        $sold = $data_product->sold + $request->jumlah_dibeli;

        $data_product->update([
            "sold" => $sold,
        ]);
        return response()->json([
            "message" => "success pembelian",
            "data" => $data_product
        ]);
    }

    public function delete($id)
    {
        $data_product = Product::where("id", $id)->first();
        if ($data_product->image_url != null) {
            DeleteFile::delete($data_product->image_url);
        }
        $data_product->delete();

        return response()->json([
            "message" => "success delete",

        ]);
    }
}
