<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userlogin extends Model
{
    use HasFactory;

    protected $fillable = [
        'usercode',
        'first_name',
        'last_name',
        'phone_number',
        'password',
    ];

}
