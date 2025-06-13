<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;

class CoverModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::COVER;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = 'default';

    const DATA = [
        'format' => 'Imagenes',
        'frame_type' => '',
        'align' => '',
        'active_header' => false,
        'active_logo' => false,
        'active_central' => false,
        'names' => '',
        'tittle' => '¡Nos Casamos!',
        'detail' => 'y queremos compartirlo con vos',
        'text_color_cover' => '#E2BF83',
        'desktop_images' => [],
        'mobile_images' => [],
        'desktop_design' => '',
        'mobile_design' => '',
        'desktop_video' => '',
        'mobile_video' => '',
        'logo_cover' => '',
        'central_image_cover' => '',
    ];

    static function getMediaCollections(string $name): array{
        return [
            $name . '/desktop_images',
            $name . '/mobile_images',
            $name . '/desktop_design',
            $name . '/mobile_design',
            $name . '/desktop_video',
            $name . '/mobile_video',
            $name . '/logo_cover',
            $name . '/central_image_cover',
        ];
    }
}