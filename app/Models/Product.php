<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'product_category_id',
        'name',
        'image_url',
        'harga_beli',
        'harga_jual',
        'stock',
        'stock_awal',
        'sold',


    ];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    use HasFactory;
}
