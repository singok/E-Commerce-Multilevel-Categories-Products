<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
    use HasFactory;
    protected $table = "product_image";

    protected $fillable = [
        'multipleimages',
        'specification',
        'description',
        'productid'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'productid', 'id');
    }
}
