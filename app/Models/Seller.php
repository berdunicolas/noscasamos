<?php

namespace App\Models;

use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory, HasMedia;

    protected $customMediaCollections = [
        'banner_bg',
        'banner_logo',
    ];

    protected $fillable = [
        'name',
        'text',
        'has_banner',
        'only_logo',
        'site_link',
        'ig_link',
        'wpp_link',
        'tk_link',
        'x_link',
        'ytube_link',
    ];
}
