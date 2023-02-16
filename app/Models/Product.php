<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description'
    ];
    public function img()
    {
        return $this->hasMany(ImageProduct::class, 'product_id');
    }
    public function cat()
    {
        return $this->belongsTo(Category::class);
    }
}
