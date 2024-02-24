<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class chat extends Model
{
    use HasFactory;
    protected $guarded= [];


    public function senderChat(): BelongsTo
    {
        return $this->belongsTo(User::class,'senderId');
    }

    public function reseverChat(): BelongsTo
    {
        return $this->belongsTo(User::class,'reseverId');
    }

}
