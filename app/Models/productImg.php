<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class productImg extends Model
{
    use HasFactory;

    protected $fillable = [
        'mainImage',
        'img2',
        'img3',
        'productId',
    ];


        public function productionToImgRealtions(): BelongsTo
        {
            return $this->belongsTo(merchant::class,'productId');
        }
}