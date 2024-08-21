<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function brands()
    {
        return $this->belongsToMany(ProductBrand::class, 'product_brand_mapping', 'product_id', 'product_brand_id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_mapping', 'product_id', 'product_category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }
}
