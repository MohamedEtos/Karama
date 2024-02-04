<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pointRules extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchantId',
        'transferPoints',
        'exchangeLimit',
    ];
    public function pointRules(): BelongsTo
    {
        return $this->belongsTo(User::class,'merchantId');
    }
}
