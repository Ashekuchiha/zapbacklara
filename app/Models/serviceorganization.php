<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Serviceorganization extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'organizationName',
//         'ownerName',
//         'state',
//         'city',
//         'mapSelection',
//         'address',
//         'organizationBio',
//         'organizationDescription',
//         'organizationWebsite',
//         'phoneNumber',
//         'emergencyPhoneNumber',
//         'employeeNumbers',
//         'organizationLogo',
//         'organizationBanner',
//         'tradeLicense',
//         'organizationDocuments',
//         'featured',
//     ];

//     protected $casts = [
//         'mapSelection' => 'array',
//     ];
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviceorganization extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizationName',
        'ownerName',
        'state',
        'city',
        'address',
        'mapSelection',
        'organizationBio',
        'organizationDescription',
        'organizationWebsite',
        'phoneNumber',
        'emergencyPhoneNumber',
        'employeeNumbers',
        'organizationLogo',
        'organizationBanner',
        'tradeLicense',
        'organizationDocuments',
        'featured',
    ];

    protected $casts = [
        'mapSelection' => 'array',
        'featured' => 'boolean',
    ];
}
