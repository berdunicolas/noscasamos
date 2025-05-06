<?php

namespace App\Models;

use App\Enums\PlanTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'modules'
    ];

    protected $casts = [
        'plan' => PlanTypeEnum::class,
        'modules' => 'array'
    ];
}
