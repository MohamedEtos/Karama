<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class notify extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'merchantId',
        'messages',
    ];


    public function notifyUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'userId');
    }
    public function notifyMerchant(): BelongsTo
    {
        return $this->belongsTo(User::class,'merchantId');
    }
}
