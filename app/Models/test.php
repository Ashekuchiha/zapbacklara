<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class test extends Model
// {
//     /** @use HasFactory<\Database\Factories\TestFactory> */
//     use HasFactory;
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'password',
        'email',
        'profileImage',
        'birthday',
        'favoriteColors',
    ];

    protected $casts = [
        'favoriteColors' => 'array',
        'birthday' => 'date',
    ];
}

