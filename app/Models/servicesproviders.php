<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicesproviders extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'service',
        'specialized',
        'experience',
        'service_organization',
        'status',
        'amount',
        'type',
        'featured',
        'certificate',
        'profile_image',
    ];

    protected $casts = [
        'service_organization' => 'array',
    ];
}

