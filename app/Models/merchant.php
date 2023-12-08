<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class merchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'merchantName',
        'name',
        'categoryId',
        'productDescription',
        'productDetalis',
        'price',
        'discount',
        'ThePriceAfterDiscount',
        'img',
        'append',
        'productViews',
    ];

    public function productionToCategoryRealtions(): BelongsTo
    {
        return $this->belongsTo(category::class,'categoryId');
    }
}