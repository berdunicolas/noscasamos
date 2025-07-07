<?php

namespace App\Models;

use App\Enums\EventTypeEnum;
use App\Enums\PlanTypeEnum;
use Illuminate\Contracts\Database\Eloquent\Builder;
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
        'created_by',
        'is_legacy',
        'created_at',
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

    public function countryDivision(): BelongsTo
    {
        return $this->belongsTo(CountryDivision::class, 'country_division_id', 'id');
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(Invitation::class, 'event_id', 'id');
    }

    public function scopeForAdvisorFilter(Builder $query): Builder
    {
        if (auth()->user()->roles->where('name', 'ADVISOR')->isNotEmpty()) {
            return $query->where('created_by', auth()->user()->id);
        }
        return $query;
    }
}
