<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'icon_name',
        'icon_code',
        'icon_type',
    ];
}
