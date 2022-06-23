<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Product;

class Specification extends Model
{
    use HasFactory;
    protected $table = 'specifications';
    protected $fillable = [
        'productid',
        'title',
        'description'
    ];

    public function product() {
        $this->belongsTo(Product::class, 'productid', 'id');
    }
}
