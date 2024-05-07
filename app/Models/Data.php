<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'datas'; 

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
    ];
}
