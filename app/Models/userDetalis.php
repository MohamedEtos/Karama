<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class userDetalis extends Model
{
    use HasFactory;
    protected $guarded= [];


    // public function userDetalis(): HasOne
    // {
    //     return $this->hasOne(userDetalis::class);
    // }


    public function userToCategory(): BelongsTo
    {
        return $this->belongsTo(category::class,'categoryId');
    }



}
