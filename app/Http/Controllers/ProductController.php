<?php

namespace App\Http\Controllers;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request)
    {

        $product_name = UploadFile::upload("foto_product", $request->file("image_url"));
        Product::create([
            "product_category_id" => $request->product_category_id,
            "name" => $request->name,
            "image_url" => $product_name,
            "harga_beli" => $request->harga_beli,
            "harga_jual" => $request->harga_jual,
            "stock_awal" => $request->stock,
            "stock" => $request->stock,
            "sold" => 0,
        ]);

        return redirect("/product/index");
    }

    public function pembelian(Request $request)
    {

        $data_product =  Product::where("id", $request->product_id)->first();
        $sold = $data_product->sold + $request->jumlah_dibeli;

        $data_product->update([
            "sold" => $sold,
        ]);
        return redirect("/pembelian/index");
    }
    public function edit(Request $request)
    {
        Product::where("id", $request->id)->update([
            "product_category_id" => $request->product_category_id,
            "name" => $request->name,
            // "image_url" => $request->image_url,
            "harga_beli" => $request->harga_beli,
            "harga_jual" => $request->harga_jual,
            "stock" => $request->stock,
        ]);

        return redirect("/product/index");
    }
    public function delete($id)
    {
        $data_product = Product::where("id", $id)->first();

        DeleteFile::delete($data_product->image_url);

        Product::where("id", $id)->delete();

        return redirect("/product/index");
    }
}
