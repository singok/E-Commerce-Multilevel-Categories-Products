<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Image;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $fillable = [
        'order',
        'productname',
        'slug',
        'categoryid'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'categoryid', 'id');
    }

    public function image() {
        return $this->hasOne(Image::class, 'productid');
    }
}
