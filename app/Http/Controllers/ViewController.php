<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\ProductCategory;


class ViewController extends Controller
{

    public function berandaIndex()
    {

        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex");
        }
        $total_terjual = 0;
        $total_pengeluaran = 0;
        $keuntungan = 0;
        $data_product = Product::get();
        foreach ($data_product as $dtp) {
            $total_terjual += $dtp->sold;
            $total_pengeluaran += ($dtp->harga_beli * $dtp->stock_awal);
            $keuntungan += ($dtp->harga_jual * $dtp->sold);
        }
        return view("beranda.index", compact("total_terjual", "total_pengeluaran", "keuntungan"));
    }
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function registerIndex()
    {
        return view('auth.register');
    }
    public function productCategoryIndex()
    {

        $data_product_category = ProductCategory::get();
        return view("product_category.index", compact("data_product_category"));
    }
    public function productCategoryCreateIndex()
    {

        return view("product_category.create",);
    }
    public function productCategoryEditIndex($id)
    {
        $data_product_category = ProductCategory::where("id", $id)->get();

        return view("product_category.edit", compact("data_product_category"));
    }
    public function productIndex()
    {
        $data_product_category = ProductCategory::get();
        $data_product = Product::with("product_category")->get();
        return view("product.index", compact("data_product", "data_product_category"));
    }
    public function pembelianIndex()
    {

        $data_product = Product::with("product_category")->get();
        return view("pembelian.create", compact("data_product",));
    }
    public function productCreateIndex()
    {
        $data_product_category = ProductCategory::get();
        return view("product.create", compact("data_product_category"));
    }
    public function productEditIndex($id)
    {
        $data_product = Product::with("product_category")->where("id", $id)->get();
        $data_product_category = ProductCategory::get();
        return view("product.edit", compact("data_product", "data_product_category"));
    }
}
