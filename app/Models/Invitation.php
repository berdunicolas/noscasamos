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
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invitation extends Authenticatable
{
    use HasFactory, HasMedia;

    protected $customMediaCollections = [
        'meta_img',
        'frame_img',
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
        'icon_type',
        'style',
        'font',
        'padding',
        'color',
        'background_color',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'font' => FontTypeEnum::class,
        'style' => StyleTypeEnum::class,
        //'spacing' => SpacingTypeEnum::class,
        'active' => 'boolean',
        'time' => TimeFormatCast::class,
        'password' => 'hashed',
    ];

    public function modules(): HasMany
    {
        return $this->hasMany(InvitationModule::class, 'invitation_id', 'id');
    }

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
        
        $date = Carbon::createFromFormat(
            'Y-m-d H:i', 
            $this->date . ' ' . $this->time, 
            $this->time_zone
        );

        $currentDate = Carbon::now();

        return $currentDate->greaterThan($date);
    }

    public function stillValid(): bool|null
    {
        if(!$this->date) return null;

        $validTime = Setting::where('name', 'valid_time')->first();

        $date = Carbon::parse($this->date)->addDays($validTime->value);
        $currentDate = Carbon::now();

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
        $cover = $this->modules()->where('type', ModuleTypeEnum::COVER->value)->first();
        return ['titulo' => $cover->data['tittle'], 'bajada' => $cover->data['detail']];
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
