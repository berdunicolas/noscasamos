<?php

namespace App\Models;

use App\Enums\ModuleTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemplateModule extends Model
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
        'template_id',
        'media_collections',
        'index',
    ];

    protected $casts = [
        'type' => ModuleTypeEnum::class,
        'active' => 'boolean',
        'fixed' => 'boolean',
        'on_plan' => 'boolean',
        'data' => 'array',
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class, 'template_id', 'id');
    }
}
