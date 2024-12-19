<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class services extends Model
// {
//     /** @use HasFactory<\Database\Factories\ServicesFactory> */
//     use HasFactory;
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'icon', 'featured', 'status', 'amount', 'type', 'bookingsFee', 'bookingType'
    ];
}
