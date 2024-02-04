<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class chat extends Model
{
    use HasFactory;
    protected $guarded= [];


    public function userRelation(): BelongsTo
    {
        return $this->belongsTo(User::class,'userId');
    }

    public function adminRelation(): BelongsTo
    {
        return $this->belongsTo(User::class,'adminId');
    }

}