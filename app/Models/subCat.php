<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class subCat extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function subCatRelation(): BelongsTo
    {
        return $this->belongsTo(category::class,'categoryId');
    }

}
