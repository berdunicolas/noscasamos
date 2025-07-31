<?php

namespace App\Models;

use App\Enums\EventTypeEnum;
use App\Enums\FontTypeEnum;
use App\Enums\PlanTypeEnum;
use App\Enums\StyleTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event',
        'plan',
        'duration',
        'icon_type',
        'style',
        'font',
        'padding',
        'color',
        'background_color'
    ];

    protected $casts = [
        'font' => FontTypeEnum::class,
        'style' => StyleTypeEnum::class,
        'event' => EventTypeEnum::class,
        'plan' => PlanTypeEnum::class,
    ];

    public function modules(): HasMany
    {
        return $this->hasMany(TemplateModule::class, 'template_id', 'id');
    }
}
