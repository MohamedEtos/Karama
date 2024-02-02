<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pointsDetails extends Model
{
    use HasFactory;
    protected $guarded= [];


    public function pointsToDetails(): BelongsTo
    {
        return $this->belongsTo(pointsDetails::class,'pointsDetailsId');
    }
}
