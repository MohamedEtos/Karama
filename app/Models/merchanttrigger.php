<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merchanttrigger extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'name',
        'categoryId',
        'subCat',
        'imgId',
        'productDescription',
        'productDetalis',
        'price',
        'discount',
        'ThePriceAfterDiscount',
        'append',
        'rejectId',
        'productViews',
    ];
}
