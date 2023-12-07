<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'merchantName',
        'name',
        'category',
        'productDescription',
        'productDetalis',
        'price',
        'discount',
        'ThePriceAfterDiscount',
        'img',
        'append',
        'productViews',
    ];
}