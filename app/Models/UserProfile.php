<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'birthday',
        'post_code',
        'address',
    
    ];

    // 他の関連やメソッドを定義することもできます
}