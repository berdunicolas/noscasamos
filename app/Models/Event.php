<?php

namespace App\Models;

use App\Enums\EventTypeEnum;
use App\Enums\PlanTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event',
        'plan',
        'country_id',
        'country_division_id',
        'creted_by',
    ];

    protected $casts = [
        'event' => EventTypeEnum::class,
        'plan' => PlanTypeEnum::class,
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(Invitation::class, 'event_id', 'id');
    }
}
