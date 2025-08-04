<?php

namespace App\Models;

use App\Enums\ModuleTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'display_name',
        'active',
        'fixed',
        'on_plan',
        'data',
        'media_collections',
        'index',
    ];

    protected $casts = [
        'type' => ModuleTypeEnum::class,
        'active' => 'boolean',
        'fixed' => 'boolean',
        'on_plan' => 'boolean',
        'data' => 'array',
        'media_collections' => 'array',
    ];
}
