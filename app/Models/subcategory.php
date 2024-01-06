<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class subcategory extends Model
{
    use HasFactory;
    protected $guarded= [];


public function subCategoryRelation(): BelongsTo
{
return $this->belongsTo(category::class,'id');
}
}


