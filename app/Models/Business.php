<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'business_name', 
        'business_address', 
        'business_phone', 
        'business_type', 
        'business_lat', 
        'business_long', 
        'year_founded', 
        'year_closed', 
        'naics_code', 
        'business_photos',
    ];

    protected $casts = [
    ];
}