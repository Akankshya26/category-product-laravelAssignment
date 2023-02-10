<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{

    use HasFactory;
    public $timestamps = false;
    // protected $uploads = '/public/images/';
    protected $fillable = [
        'product_id',
        'image_name',
    ];
}
