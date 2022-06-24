<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = [
        'categoryname',
        'order',
        'slug',
        'parentid'
    ];

    public function product() {
        return $this->hasMany(Product::class, 'categoryid');
    }

    public function subcategory() {
        return $this->hasMany(Category::class, 'parentid');
    }

    public function parent() {
        return $this->belongsTo(Category::class, 'parentid', 'id');
    }

    // relation - (Category -> SubCategory -> Product)
    // public function productlist() {
    //     return $this->hasManyThrough(Product::class, Category::class, 'parentid', 'categoryid');
    // }
}
