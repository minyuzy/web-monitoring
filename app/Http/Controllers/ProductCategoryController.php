<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function create(Request $request)
    {
        ProductCategory::create([
            "name" => $request->name,
        ]);

        return redirect("/product_category/index");
    }
    public function edit(Request $request)
    {
        ProductCategory::where("id", $request->id)->update([
            "name" => $request->name,
        ]);

        return redirect("/product_category/index");
    }
    public function delete($id)
    {
        ProductCategory::where("id", $id)->delete();

        return redirect("/product_category/index");
    }
}
