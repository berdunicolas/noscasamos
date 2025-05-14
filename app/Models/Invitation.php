<?php

namespace App\Models;

use App\Enums\FontTypeEnum;
use App\Enums\ModuleTypeEnum;
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

    protected $customMediaCollections = [
        ModuleTypeEnum::HIGHLIGHTS['name'],
        ModuleTypeEnum::EVENTS['name'].'/civil',
        ModuleTypeEnum::EVENTS['name'].'/ceremony',
        ModuleTypeEnum::EVENTS['name'].'/party',
        ModuleTypeEnum::EVENTS['name'].'/dresscode',
        ModuleTypeEnum::SUGGESTIONS['name'],
        ModuleTypeEnum::HISTORY['name'],
        ModuleTypeEnum::INFO['name'],
        ModuleTypeEnum::GALERY['name'],
        ModuleTypeEnum::INTRO['name'],
        ModuleTypeEnum::MUSIC['name'],
        ModuleTypeEnum::COVER['name'],
        ModuleTypeEnum::COVER['name'].'/desktop_images',
        ModuleTypeEnum::COVER['name'].'/mobile_images',
        ModuleTypeEnum::COVER['name'].'/desktop_video',
        ModuleTypeEnum::COVER['name'].'/mobile_video',
        ModuleTypeEnum::COVER['name'].'/logo_cover',
        ModuleTypeEnum::COVER['name'].'/central_image_cover',
        ModuleTypeEnum::GIFTS['name'].'/background',
        ModuleTypeEnum::GIFTS['name'].'/module',
        ModuleTypeEnum::GIFTS['name'].'/product_1',
        ModuleTypeEnum::GIFTS['name'].'/product_2',
        ModuleTypeEnum::GIFTS['name'].'/product_3',
        ModuleTypeEnum::GIFTS['name'].'/product_4',
        ModuleTypeEnum::GIFTS['name'].'/product_5',
        ModuleTypeEnum::GIFTS['name'].'/product_6',
        ModuleTypeEnum::WELCOME['name'],
    ];

    protected $fillable = [
        'host_names',
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
        'icon_type',
        'style',
        'font',
        'spacing',
        'color',
        'background_color',
        'modules',
    ];

    protected $casts = [
        'font' => FontTypeEnum::class,
        'style' => StyleTypeEnum::class,
        'spacing' => SpacingTypeEnum::class,
        'active' => 'boolean',
        'modules' => 'array'
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

        $validTime = Setting::where('name', 'valid_time')->first();
        
        $date = Carbon::parse($this->date)->addDays($validTime->value);
        $currentDate = Carbon::now();
        //$currentDate->setTimezone($this->time_zone);

        return $currentDate->greaterThan($date);
    }
}
