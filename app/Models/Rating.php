<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Rating extends Model
{
    use HasFactory;
    protected $table = "review_rating";
    protected $fillable = [
        'username',
        'review',
        'comment',
        'productid'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'productid', 'id');
    }
}
