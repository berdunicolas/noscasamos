<?php

namespace App\Models;

use App\Enums\FontTypeEnum;
use App\Enums\SpacingTypeEnum;
use App\Enums\StyleTypeEnum;
use App\Traits\HasMedia;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    use HasFactory, HasMedia;

    protected $fillable = [
        'seller_id',
        'event_id',
        'date',
        'time',
        'time_zone',
        'duration',
        'active',
        'created_by',
        'path_name',
        'meta_title',
        'meta_description',
        'style',
        'font',
        'spacing',
        'color',
        'background_color',
    ];

    protected $casts = [
        'font' => FontTypeEnum::class,
        'style' => StyleTypeEnum::class,
        'spacing' => SpacingTypeEnum::class,
        'active' => 'boolean',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function isExpired(): bool|null
    {   
        if(!$this->date) return null;
        
        $date = Carbon::parse($this->date)->addDays(30);
        $currentDate = Carbon::now();
        //$currentDate->setTimezone($this->time_zone);

        return $currentDate->greaterThan($date);
    }
}
