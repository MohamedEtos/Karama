<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class points extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'usercode',
        'merchantId',
        'price',
        'points',
    ];

    public function pointToUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'userId');
    }

    public function pointTomerchant(): BelongsTo
    {
        return $this->belongsTo(User::class,'merchantId');
    }




}
