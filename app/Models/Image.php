<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $uploads = '/public/images/';
    protected $fillable = [
        'product_id',
        'image',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
