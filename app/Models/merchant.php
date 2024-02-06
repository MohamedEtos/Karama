<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'rejectId',
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

    public function rejectMess(): BelongsTo
    {
        return $this->belongsTo(rejectProductmess::class,'rejectId');
    }

}

