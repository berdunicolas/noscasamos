<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryDivision extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'state_name',
        'state_code',
        'country_code',
    ];
}
