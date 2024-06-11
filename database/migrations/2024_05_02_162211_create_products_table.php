<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_category_id");
            $table->string("name");
            $table->string("image_url");
            $table->float("harga_beli");
            $table->float("harga_jual");
            $table->integer("stock");
            $table->integer("stock_awal");
            $table->integer("sold")->nullable();
            $table->foreign("product_category_id")->references("id")->on("product_categories")->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
