<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitorsCount extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip_address',
        'visitors',
        'productId',
        'visits',
        'userId',
    ];


    public function productionToviewrsRealtions(): BelongsTo
    {
        return $this->belongsTo(merchant::class,'productId');
    }
}
