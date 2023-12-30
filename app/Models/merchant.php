<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class merchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'name',
        'categoryId',
        'imgId',
        'productDescription',
        'productDetalis',
        'price',
        'discount',
        'ThePriceAfterDiscount',
        'append',
        'productViews',
    ];

    public function productionToCategoryRealtions(): BelongsTo
    {
        return $this->belongsTo(category::class,'categoryId');
    }

    public function productionToImgRealtions(): BelongsTo
    {
        return $this->belongsTo(productImg::class,'imgId');
    }

    public function userToProduct(): BelongsTo
    {
        return $this->belongsTo(User::class,'userId');
    }
    public function userDetailsToProduct(): BelongsTo
    {
        return $this->belongsTo(userDetalis::class);
    }

    
}

