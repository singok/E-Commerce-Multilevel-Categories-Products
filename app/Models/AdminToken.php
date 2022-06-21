<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminToken extends Model
{
    use HasFactory;
    protected $table = "admin_access_tokens";
    protected $fillable = [
        'admin_id',
        'token'
    ];
}
