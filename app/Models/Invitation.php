<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Casts\TimeFormatCast;
use App\Enums\FontTypeEnum;
use App\Enums\ModuleTypeEnum;
use App\Enums\StyleTypeEnum;
use App\Traits\HasMedia;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Authenticatable
{
    use HasFactory, HasMedia;

    protected $customMediaCollections = [
        'meta_img',
        'frame_img',
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
        'password',
        'plain_token',
        'meta_title',
        'meta_description',
        'icon_type',
        'style',
        'font',
        'padding',
        'color',
        'background_color',
        'modules',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'font' => FontTypeEnum::class,
        'style' => StyleTypeEnum::class,
        //'spacing' => SpacingTypeEnum::class,
        'active' => 'boolean',
        'modules' => 'array',
        'time' => TimeFormatCast::class,
        'password' => 'hashed',
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
        //$date->setTimezone($this->time_zone);

        return $currentDate->greaterThan($date);
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class, 'seller_id', 'id');
    }


    public function fechat(): string 
    {
        if($this->date && $this->time){
            Carbon::setLocale('es'); 
            $dataTime = Carbon::createFromFormat(
                'Y-m-d H:i:s',
                $this->date . ' ' . $this->time.':00',
            );
            return $dataTime->translatedFormat('j \d\e F');
        }

        return '';
    }

    public function tituloYBajada(): array 
    {
        $module = ModuleTypeEnum::getModuleFromArrayByName($this->modules, ModuleTypeEnum::COVER['name']);
        return ['titulo' => $module['tittle'], 'bajada' => $module['detail']];
    }

    public function metaImg(): string{
        $metaImg = $this->media('meta_img')->first()?->getMediaUrl();
        return $metaImg ?? '';
    }

    public function frameImg(): string{
        $frameImg = $this->media('frame_img')->first()?->getMediaUrl();
        return $frameImg ?? '';
    }
}
