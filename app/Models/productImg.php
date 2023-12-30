<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class productImg extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'mainImage',
        'img2',
        'img3',
    ];



}