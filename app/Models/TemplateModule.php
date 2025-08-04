<?php

namespace App\Models;

use App\Enums\ModuleTypeEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemplateModule extends Module
{
    protected $fillable = [
        'type',
        'name',
        'display_name',
        'active',
        'fixed',
        'on_plan',
        'template_id',
        'data',
        'media_collections',
        'index',
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class, 'template_id', 'id');
    }

    public function media(): null
    {
        return null;
    }
}
