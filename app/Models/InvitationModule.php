<?php

namespace App\Models;

use App\Enums\ModuleTypeEnum;
use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvitationModule extends Model
{
    use HasFactory, HasMedia;

    protected $fillable = [
        'type',
        'name',
        'display_name',
        'active',
        'on_plan',
        'data',
        'invitation_id',
        'media_collections'
    ];

    protected $casts = [
        'type' => ModuleTypeEnum::class,
        'active' => 'boolean',
        'on_plan' => 'boolean',
        'data' => 'array',
        'media_collections' => 'array',
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class, 'invitation_id', 'id');
    }
}
