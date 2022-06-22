<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function subcategory() {
        return $this->hasMany(Category::class, 'parentid');
    }

    public function parent() {
        return $this->belongsTo(Category::class, 'parentid', 'id');
    }
}
