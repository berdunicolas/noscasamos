<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'font_name',
        'font_family',
        'font_url'
    ];
}
