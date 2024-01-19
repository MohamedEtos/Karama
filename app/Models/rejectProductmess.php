<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rejectProductmess extends Model
{
    use HasFactory;
    protected $fillable = [
        'merchantId',
        'productId',
        'rejectMessage',
    ];


    public function merchantRejectMess()
    {
        return $this->belongsTo(merchant::class);
    }
}
