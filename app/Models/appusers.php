<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appusers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'dob',
        'city',
        'profile',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
